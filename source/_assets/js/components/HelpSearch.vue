<template>
  <div class="flex flex-1 justify-center items-center w-full" ref="searchContainer">
    <div class="relative w-full z-10" :class="{ 'hidden md:block': !searching }">
      <label for="search" class="hidden">Search</label>

      <input
        id="search"
        v-model="query"
        ref="search"
        class="transition-fast relative block h-12 w-full border border-grey-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 outline-none cursor-pointer text-grey-700 px-4 py-3 rounded-lg shadow-sm"
        :class="{ 'transition-border': query }"
        autocomplete="off"
        name="search"
        placeholder="Search for help articles..."
        type="text"
        style="font-size: 16px"
        @keyup.esc="reset"
        @focus="showResults = true"
        @blur="handleBlur"
      />

      <button
        v-if="query || searching"
        class="absolute top-0 right-0 leading-snug font-400 text-3xl text-indigo-500 hover:text-indigo-600 focus:outline-none pr-4 pt-2"
        @click="reset"
      >
        &times;
      </button>

      <transition name="fade">
        <div v-if="query && showResults" class="absolute left-0 right-0 w-full text-left mt-2">
          <div class="flex flex-col bg-white border border-grey-200 rounded-lg shadow-xl">
            <a
              v-for="(result, index) in results"
              class="bg-white hover:bg-indigo-50 border-b border-grey-100 text-lg cursor-pointer p-4 transition-colors"
              :class="{
                'rounded-b-lg border-b-0': index === results.length - 1,
                'rounded-t-lg': index === 0,
              }"
              :href="result.item.link"
              :title="result.item.title"
              :key="result.item.link"
              @mousedown.prevent
              @mousedown="clearBlurTimeout"
            >
              <div class="font-semibold text-grey-900 mb-1">{{ result.item.title }}</div>
              <span
                class="block font-normal text-grey-600 text-sm"
                v-html="getHighlightedSnippet(result)"
              ></span>
            </a>

            <div
              v-if="!results.length"
              class="bg-white w-full hover:bg-indigo-50 rounded-lg border-b-0 cursor-pointer p-4"
            >
              <p class="my-0">
                No results for <strong>{{ query }}</strong>
              </p>
            </div>
          </div>
        </div>
      </transition>
    </div>

    <button
      v-if="!searching"
      title="Start searching"
      type="button"
      class="flex md:hidden bg-grey-50 hover:bg-indigo-100 justify-center items-center border border-grey-300 rounded-lg focus:outline-none h-12 px-4 w-full"
      @click.prevent="showInput"
    >
      <img
        src="/assets/img/magnifying-glass.svg"
        alt="search icon"
        class="h-4 w-4 max-w-none mr-2"
      />
      <span class="text-grey-600">Search for help articles...</span>
    </button>
  </div>
</template>

<script>
import Fuse from 'fuse.js'
import axios from 'axios'

export default {
  data() {
    return {
      fuse: null,
      searching: false,
      query: '',
      showResults: false,
      blurTimeout: null,
    }
  },
  computed: {
    results() {
      return this.query && this.fuse ? this.fuse.search(this.query) : []
    },
  },
  watch: {
    query(newQuery) {
      // Show results when query changes if input is focused
      if (newQuery && this.$refs.search && document.activeElement === this.$refs.search) {
        this.showResults = true
      }
    },
  },
  methods: {
    showInput() {
      this.searching = true
      this.$nextTick(() => {
        this.$refs.search.focus()
        this.showResults = true
      })
    },
    reset() {
      this.query = ''
      this.showResults = false
      // Delay hiding the input to prevent flicker on mobile
      setTimeout(() => {
        this.searching = false
      }, 200)
    },
    handleBlur() {
      // Delay hiding results to allow clicks on result links
      this.blurTimeout = setTimeout(() => {
        this.showResults = false
      }, 200)
    },
    clearBlurTimeout() {
      // Clear the blur timeout when clicking on a result
      if (this.blurTimeout) {
        clearTimeout(this.blurTimeout)
        this.blurTimeout = null
      }
    },
    handleClickOutside(event) {
      // Check if click is outside the search container
      if (this.$refs.searchContainer && !this.$refs.searchContainer.contains(event.target)) {
        this.showResults = false
        if (this.blurTimeout) {
          clearTimeout(this.blurTimeout)
          this.blurTimeout = null
        }
      }
    },
    getHighlightedSnippet(result) {
      const queryLower = this.query.toLowerCase().trim()
      const content = result.item.content || ''
      const snippet = result.item.snippet || ''

      // Try to find the best match location in content
      let bestMatchIndex = -1
      let bestMatchLength = 0

      // Look for exact phrase match first
      const exactIndex = content.toLowerCase().indexOf(queryLower)
      if (exactIndex !== -1) {
        bestMatchIndex = exactIndex
        bestMatchLength = queryLower.length
      } else {
        // If no exact match, try individual words
        const words = queryLower.split(/\s+/).filter((w) => w.length >= 2)
        for (const word of words) {
          const wordIndex = content.toLowerCase().indexOf(word)
          if (wordIndex !== -1 && (bestMatchIndex === -1 || wordIndex < bestMatchIndex)) {
            bestMatchIndex = wordIndex
            bestMatchLength = word.length
          }
        }
      }

      // If we found a match in content, extract snippet around it
      if (bestMatchIndex !== -1 && content.length > 0) {
        // Extract snippet around the match (120 chars before and after)
        const snippetStart = Math.max(0, bestMatchIndex - 120)
        const snippetEnd = Math.min(content.length, bestMatchIndex + bestMatchLength + 120)
        let extractedSnippet = content.substring(snippetStart, snippetEnd)

        // Try to start/end at word boundaries for cleaner snippets
        if (snippetStart > 0) {
          const wordBoundaryStart = extractedSnippet.search(/\s/)
          if (wordBoundaryStart > 0 && wordBoundaryStart < 30) {
            extractedSnippet = extractedSnippet.substring(wordBoundaryStart + 1)
          }
        }
        if (snippetEnd < content.length) {
          const lastSpace = extractedSnippet.lastIndexOf(' ')
          if (lastSpace > extractedSnippet.length - 30 && lastSpace > 0) {
            extractedSnippet = extractedSnippet.substring(0, lastSpace)
          }
        }

        // Add ellipsis if not at start/end
        if (snippetStart > 0) extractedSnippet = '...' + extractedSnippet
        if (snippetEnd < content.length) extractedSnippet = extractedSnippet + '...'

        // Highlight all matched terms (case-insensitive)
        const words = queryLower.split(/\s+/).filter((w) => w.length >= 2)
        let highlighted = extractedSnippet
        for (const word of words) {
          const regex = new RegExp(`(${this.escapeRegex(word)})`, 'gi')
          highlighted = highlighted.replace(
            regex,
            '<strong class="font-semibold text-grey-900">$1</strong>'
          )
        }

        return highlighted
      }

      // Fall back to description snippet, also highlight matches
      if (snippet) {
        const words = queryLower.split(/\s+/).filter((w) => w.length >= 2)
        let highlighted = snippet
        for (const word of words) {
          const regex = new RegExp(`(${this.escapeRegex(word)})`, 'gi')
          highlighted = highlighted.replace(
            regex,
            '<strong class="font-semibold text-grey-900">$1</strong>'
          )
        }
        return highlighted
      }

      return snippet
    },
    escapeRegex(str) {
      return str.replace(/[.*+?^${}()|[\]\\]/g, '\\$&')
    },
  },
  created() {
    axios('/help/index.json').then((response) => {
      this.fuse = new Fuse(response.data, {
        minMatchCharLength: 2,
        keys: [
          { name: 'title', weight: 0.4 },
          { name: 'snippet', weight: 0.3 },
          { name: 'content', weight: 0.3 },
          { name: 'categories', weight: 0.1 },
        ],
        threshold: 0.3, // Lower threshold for more lenient matching, especially for content
        ignoreLocation: true, // Don't penalize matches based on location in text
        includeScore: true,
        includeMatches: true, // Include match information for highlighting
      })
    })

    // Add click outside listener
    document.addEventListener('click', this.handleClickOutside)
  },
  beforeUnmount() {
    // Clean up event listener
    document.removeEventListener('click', this.handleClickOutside)
    if (this.blurTimeout) {
      clearTimeout(this.blurTimeout)
    }
  },
}
</script>
