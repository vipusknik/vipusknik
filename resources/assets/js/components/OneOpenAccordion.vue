<template>
    <div>
        <div @click="toggle" :class="headingClasses" class="flex justify-center items-center text-white p-2 relative">
            <slot name="heading"></slot>

            <div class="mr-4"></div>
            <svg class="absolute pin-r mr-3 flex-none text-right ml-2 inline-block w-3 h-3 fill-current transition-linear transition-fast" :class="{ 'rotate-x-180': isOpen }" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 386.257 386.257"><path d="M0 96.879l193.129 192.5 193.128-192.5z"/></svg>
        </div>

        <div v-if="isOpen">
            <slot></slot>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            name: {
                type: String,
                required: true
            },

            isOpenInitial: {
                type: Boolean,
                required: false,
                default: false
            },

            headingClasses: {
                type: String,
                required: false,
                default: ''
            }
        },

        data() {
            return {
                isOpen: this.isOpenInitial
            }
        },

        mounted() {
            window.events.$on('one-open-accordion-open', (accordionName) => {
                if (this.name != accordionName) this.isOpen = false
            })
        },

        methods: {
            toggle() {
                if (! this.isOpen) {
                    window.events.$emit('one-open-accordion-open', this.name)
                }

                this.isOpen = !this.isOpen
            }
        }
    }
</script>
