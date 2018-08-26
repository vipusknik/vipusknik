<template>
    <div>
        <select ref="select-html" class="hidden">
            <slot></slot>
        </select>

        <div class="relative">
            <input type="text"
                   v-model="query"
                   :placeholder="selectedOption ? selectedOption.text : ''"
                   @click="toggleActive"
                   class="dropdown-arrow truncate"
                   :class="inputClasses + (!active ? ' placeholder-text-black' : '')"
                   :style="inputStyles">

            <div v-show="active" class="absolute z-10 min-w-full bg-white border border-grey-dark overflow-y-auto" style="max-height: 16rem">
                <div v-for="(option, index) in displayedOptions"
                     v-html="option.innerHTML"
                     :key="index"
                     @click="onSelect(option)"
                     class="px-1 hover:bg-blue-light hover:text-white select-none"
                     :class="option.className + (option.disabled ? ' opacity-50 cursor-not-allowed pointer-events-none' : '')"
                     :style="option.styles">
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'ss-select',

        props: [ 'name', 'value' ],

        data() {
            return {
                options: [],
                active: false,
                query: '',
                inputClasses: '',
                inputStyles: ''
            }
        },

        mounted() {
            this.fillOptions()
            this.$emit('input', this.selectedOption.value)
        },

        computed: {
            selectedOption() {
                return this.options.find(option => option.selected === true) || this.options[0]
            },

            displayedOptions() {
                return this.options.filter(option => {
                    return option.text.toLowerCase().trim().includes(this.query.toLowerCase().trim())
                })
            }
        },

        methods: {
            onSelect(selectedOption) {
                this.query = ''

                if (selectedOption.disabled) return

                this.options.forEach((option, index) => {
                    this.options[index].selected = option.index == selectedOption.index
                    this.$emit('input', this.selectedOption.value)
                })
            },

            toggleActive() {
                this.active = !this.active

                setTimeout(() => {
                    document[
                        this.active ? 'addEventListener' : 'removeEventListener'
                    ]('click', this.toggleActive)
                }, 250)
            },

            fillOptions() {
                let tags = Array.from(this.$refs['select-html'].children)

                tags.forEach(tag => {
                    if (this.tagIs(tag, 'option')) {
                        this.options.push(
                            {
                                index: tag.index,
                                innerHTML: tag.innerHTML,
                                text: tag.text,
                                value: tag.value,
                                selected: tag.selected,
                                disabled: tag.disabled,
                                className: tag.className,
                                styles: this.getInlineStyles(tag)
                            }
                        )
                    }

                    if  (this.tagIs(tag, 'input')) {
                        this.inputClasses = tag.className
                        this.inputStyles = this.getInlineStyles(tag)
                    }
                })
            },

            getInlineStyles(tag) {
                return tag.attributes.style ? tag.attributes.style.value.trim() : ''
            },

            tagIs(tag, name) {
                return tag.tagName.toUpperCase() == name.toUpperCase()
            }
        }
    }
</script>

<style scoped>
    .dropdown-arrow {
        background-image: url(/img/icons/down-arrow.svg);
        background-size: 3rem .812rem;
        background-position: right;
        background-repeat: no-repeat;
    }

    .placeholder-text-black::placeholder  {
        opacity: 1;
    }
</style>
