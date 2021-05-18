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
        class="
          transition-fast
          relative
          block
          h-10
          w-full
          lg:w-1/2
          lg:focus:w-3/4
          border border-grey-500
          focus:border-indigo-400
          outline-none
          cursor-pointer
          text-grey-700
          px-4
          pb-0
          pt-px
        "
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
        class="
          absolute
          top-0
          right-0
          leading-snug
          font-400
          text-3xl text-indigo-500
          hover:text-indigo-600
          focus:outline-none
          pr-3
          md:pr-3
        "
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
            class="
              flex flex-col
              bg-white
              border border-b-0 border-t-0 border-indigo-400
              rounded-b-lg
              shadow-lg
              mx-4
              md:mx-0
            "
          >
            <a
              v-for="(result, index) in results"
              class="
                bg-white
                hover:bg-indigo-100
                border-b border-indigo-400
                text-xl
                cursor-pointer
                p-4
              "
              :class="{ 'rounded-b-lg': index === results.length - 1 }"
              :href="result.item.link"
              :title="result.item.title"
              :key="result.item.link"
              @mousedown.prevent
            >
              {{ result.item.title }}

              <span
                class="block font-normal text-grey-700 text-sm my-1"
                v-html="result.item.snippet"
              ></span>
            </a>

            <div
              v-if="!results.length"
              class="
                bg-white
                w-full
                hover:bg-indigo-100
                border-b border-indigo-400
                rounded-b-lg
                shadow
                cursor-pointer
                p-4
              "
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
      class="
        flex
        md:hidden
        bg-grey-50
        hover:bg-indigo-100
        justify-center
        items-center
        border border-grey-500
        rounded-full
        focus:outline-none
        h-10
        px-3
      "
      @click.prevent="showInput"
    >
      <img src="/assets/img/magnifying-glass.svg" alt="search icon" class="h-4 w-4 max-w-none" />
    </button>
  </div>
</template>

<script>
import Fuse from 'fuse.js'

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
      return this.query ? this.fuse.search(this.query) : []
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
  },
  created() {
    axios('/index.json').then((response) => {
      this.fuse = new Fuse(response.data, {
        minMatchCharLength: 3,
        keys: ['title', 'snippet', 'categories'],
      })
    })
  },
}
</script>
