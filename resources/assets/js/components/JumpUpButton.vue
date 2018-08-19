<template>
    <div v-if="alwaysVisible || scrolledToOffset" @click="onClick" class="vue-jump-up-button fixed z-10">
        <slot></slot>
    </div>
</template>

<script>
    export default {
        props: {
            // TODO: change name
            alwaysVisible: {
                type: Boolean,
                required: false,
                default: false
            },

            visibleOffset: {
                type: Number,
                required: false,
                default: 1
            }
        },

        data() {
            return {
                scrolledToOffset: false
            }
        },

        mounted() {
            // TODO: debounce
            if (! this.alwaysVisible) {
                window.addEventListener('scroll', () => {
                    this.scrolledToOffset = window.pageYOffset >= this.visibleOffset
                })
            }
        },

        methods: {
            onClick() {
                window.scroll({
                  top: 0,
                  left: 0,
                  behavior: 'smooth'
                })
            }
        }
    }
</script>

<style scoped>
    /*
     * Transitions
     */
    .fade-enter-active, .fade-leave-active {
      transition: opacity .4s;
    }

    .fade-enter, .fade-leave-to {
      opacity: 0;
    }
</style>
