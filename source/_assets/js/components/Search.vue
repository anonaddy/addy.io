<template>
  <div class="flex flex-1 justify-end items-center text-right pl-4">
    <div
      class="absolute md:relative w-full justify-end left-0 top-0 z-10 mt-1 md:mt-0"
      :class="{ 'hidden md:flex': !searching }"
    >
      <label for="search" class="hidden">Search</label>

      <input
        id="search"
        v-model="query"
        ref="search"
        class="transition-fast relative block h-10 w-full lg:w-1/2 lg:focus:w-3/4 border border-grey-500 focus:border-indigo-400 outline-none cursor-pointer text-grey-700 px-4 pb-0 pt-px"
        :class="{ 'transition-border': query }"
        autocomplete="off"
        name="search"
        placeholder="Search"
        type="text"
        @keyup.esc="reset"
        @blur="reset"
      />

      <button
        v-if="query || searching"
        class="absolute top-0 right-0 leading-snug font-400 text-3xl text-indigo-500 hover:text-indigo-600 focus:outline-none pr-3 md:pr-3"
        @click="reset"
      >
        &times;
      </button>

      <transition name="fade">
        <div
          v-if="query"
          class="absolute left-0 right-0 md:inset-auto w-full lg:w-3/4 text-left mb-4 md:mt-10"
        >
          <div
            class="flex flex-col bg-white border border-b-0 border-t-0 border-indigo-400 rounded-b-lg shadow-lg mx-4 md:mx-0"
          >
            <a
              v-for="(result, index) in results"
              class="bg-white hover:bg-indigo-100 border-b border-indigo-400 text-xl cursor-pointer p-4"
              :class="{ 'rounded-b-lg': index === results.length - 1 }"
              :href="result.item.link"
              :title="result.item.title"
              :key="result.item.link"
              @mousedown.prevent
            >
              {{ result.item.title }}

              <span
                class="block font-normal text-grey-700 text-sm my-1"
                v-html="getHighlightedSnippet(result)"
              ></span>
            </a>

            <div
              v-if="!results.length"
              class="bg-white w-full hover:bg-indigo-100 border-b border-indigo-400 rounded-b-lg shadow cursor-pointer p-4"
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
      title="Start searching"
      type="button"
      class="flex md:hidden bg-grey-50 hover:bg-indigo-100 justify-center items-center border border-grey-500 rounded-full focus:outline-none h-10 px-3"
      @click.prevent="showInput"
    >
      <img src="/assets/img/magnifying-glass.svg" alt="search icon" class="h-4 w-4 max-w-none" />
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
    }
  },
  computed: {
    results() {
      return this.query && this.fuse ? this.fuse.search(this.query) : []
    },
  },
  methods: {
    showInput() {
      this.searching = true
      this.$nextTick(() => {
        this.$refs.search.focus()
      })
    },
    reset() {
      this.query = ''
      this.searching = false
    },
    getHighlightedSnippet(result) {
      const queryLower = this.query.toLowerCase().trim()
      const content = result.item.content || ''
      const snippet = result.item.snippet || ''

      let bestMatchIndex = -1
      let bestMatchLength = 0

      const exactIndex = content.toLowerCase().indexOf(queryLower)
      if (exactIndex !== -1) {
        bestMatchIndex = exactIndex
        bestMatchLength = queryLower.length
      } else {
        const words = queryLower.split(/\s+/).filter((w) => w.length >= 2)
        for (const word of words) {
          const wordIndex = content.toLowerCase().indexOf(word)
          if (wordIndex !== -1 && (bestMatchIndex === -1 || wordIndex < bestMatchIndex)) {
            bestMatchIndex = wordIndex
            bestMatchLength = word.length
          }
        }
      }

      if (bestMatchIndex !== -1 && content.length > 0) {
        const snippetStart = Math.max(0, bestMatchIndex - 120)
        const snippetEnd = Math.min(content.length, bestMatchIndex + bestMatchLength + 120)
        let extractedSnippet = content.substring(snippetStart, snippetEnd)

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

        if (snippetStart > 0) extractedSnippet = '...' + extractedSnippet
        if (snippetEnd < content.length) extractedSnippet = extractedSnippet + '...'

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
    axios('/index.json').then((response) => {
      this.fuse = new Fuse(response.data, {
        minMatchCharLength: 2,
        keys: [
          { name: 'title', weight: 0.4 },
          { name: 'snippet', weight: 0.3 },
          { name: 'content', weight: 0.3 },
          { name: 'categories', weight: 0.1 },
        ],
        threshold: 0.3,
        ignoreLocation: true,
        includeScore: true,
        includeMatches: true,
      })
    })
  },
}
</script>
