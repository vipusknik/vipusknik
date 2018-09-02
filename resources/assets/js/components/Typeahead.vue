<template>
  <div class="relative">

    <div class="relative">
      <!-- the input field -->
      <input type="search"
             :name="name"
             :placeholder="placeholder"
             autocomplete="off"
             v-model="query"
             @keydown.down="down"
             @keydown.up="up"
             @keydown.enter="hit"
             @keydown.esc="reset"
             @blurя="reset"
             @input="update"
             :class="inputClasses"
             :style="inputStyles">

      <svg v-if="loading" width="35" height="35" class="inline-block absolute pin-t pin-r" :class="spinnerClasses" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" style="background:0 0"><rect x="47" y="24" rx="9.4" ry="4.8" width="6" height="12" fill="#2f84a9"><animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.9166666666666666s" repeatCount="indefinite"/></rect><rect x="47" y="24" rx="9.4" ry="4.8" width="6" height="12" fill="#2f84a9" transform="rotate(30 50 50)"><animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.8333333333333334s" repeatCount="indefinite"/></rect><rect x="47" y="24" rx="9.4" ry="4.8" width="6" height="12" fill="#2f84a9" transform="rotate(60 50 50)"><animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.75s" repeatCount="indefinite"/></rect><rect x="47" y="24" rx="9.4" ry="4.8" width="6" height="12" fill="#2f84a9" transform="rotate(90 50 50)"><animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.6666666666666666s" repeatCount="indefinite"/></rect><rect x="47" y="24" rx="9.4" ry="4.8" width="6" height="12" fill="#2f84a9" transform="rotate(120 50 50)"><animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.5833333333333334s" repeatCount="indefinite"/></rect><rect x="47" y="24" rx="9.4" ry="4.8" width="6" height="12" fill="#2f84a9" transform="rotate(150 50 50)"><animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.5s" repeatCount="indefinite"/></rect><rect x="47" y="24" rx="9.4" ry="4.8" width="6" height="12" fill="#2f84a9" transform="rotate(180 50 50)"><animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.4166666666666667s" repeatCount="indefinite"/></rect><rect x="47" y="24" rx="9.4" ry="4.8" width="6" height="12" fill="#2f84a9" transform="rotate(210 50 50)"><animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.3333333333333333s" repeatCount="indefinite"/></rect><rect x="47" y="24" rx="9.4" ry="4.8" width="6" height="12" fill="#2f84a9" transform="rotate(240 50 50)"><animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.25s" repeatCount="indefinite"/></rect><rect x="47" y="24" rx="9.4" ry="4.8" width="6" height="12" fill="#2f84a9" transform="rotate(270 50 50)"><animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.16666666666666666s" repeatCount="indefinite"/></rect><rect x="47" y="24" rx="9.4" ry="4.8" width="6" height="12" fill="#2f84a9" transform="rotate(300 50 50)"><animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.08333333333333333s" repeatCount="indefinite"/></rect><rect x="47" y="24" rx="9.4" ry="4.8" width="6" height="12" fill="#2f84a9" transform="rotate(330 50 50)"><animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="0s" repeatCount="indefinite"/></rect></svg>
    </div>

    <!-- the list -->
    <div v-show="hasItems" class="absolute z-10 w-full bg-white">
      <a :href="item.url" v-for="(item, $item) in items" :class="activeClass($item)" @click.stop @mousedown="hit" @mousemove="setActive($item)" class="block text-black no-underline typeahead-suggestion px-6 py-2 text-lg">
        <div>{{ item.title }}</div>
        <div v-if="item.description" class="text-sm mt-1">{{ item.description }}</div>
      </a>
    </div>
  </div>
</template>

<script>
import VueTypeahead from 'vue-typeahead'
import qs from 'qs'

export default {
  extends: VueTypeahead,

  props: {
    name: {
      type: String,
      required: false,
      default: ''
    },

    value: {
      type: String,
      required: false,
      default: ''
    },

    placeholder: {
      type: String,
      required: false,
      default: ''
    },

    endpoint: {
      type: String,
      required: true
    },

    inputClasses: {
      type: String,
      required: false,
      default: ''
    },

    inputStyles: {
      type: String,
      required: false,
      default: ''
    },

    spinnerClasses: {
      type: String,
      required: false,
      default: ''
    }
  },

  data () {
    return {
      // The source url
      // (required)
      src: this.endpoint,

      // The data that would be sent by request
      // (optional)
      data: {},

      // Limit the number of items which is shown at the list
      // (optional)
      limit: 10,

      // The minimum character length needed before triggering
      // (optional)
      minChars: 3,

      // Highlight the first item in the list
      // (optional)
      selectFirst: true,

      // Override the default value (`q`) of query parameter name
      // Use a falsy value for RESTful query
      // (optional)
      queryParamName: 'query'
    }
  },

  created() {
    let queryParams = qs.parse(location.search.slice(1))

    if (queryParams.hasOwnProperty('query')) {
      this.query = queryParams.query
    }
  },

  methods: {
    // The callback function which is triggered when the user hits on an item
    // (required)
    onHit (item) {
      window.location.href = item.url
    },

    // The callback function which is triggered when the response data are received
    // (optional)
    prepareResponseData (data) {
      // data = ...
      return data
    },

    reset () {
      this.items = []
      this.loading = false
    }
  }
}
</script>

<style>
  .typeahead-suggestion.active {
    background-color: #2f84a9;
  }

  .typeahead-suggestion.active {
    color: white;
  }
</style>
