<template>
    <div class="relative bg-white" @click="open = !open">
        <!-- Selected option -->
        <template v-if="!open">
            <div v-if="selectedOption" class="select-none truncate">
                {{ selectedOption.text }}
            </div>
        </template>

        <div v-show="open">
            <input type="text"
                   v-model="query"
                   ref="input-element"
                   autofocus="true"
                  :placeholder="selectedOption ? selectedOption.text : ''"
                   @click.stop
                   class="block w-full">
        </div>

        <!-- Input -->

        <!-- Select list -->
        <div v-show="open" class="absolute z-10 pin mt-12 w-full bg-white border border-grey overflow-y-auto" style="height: 300px">
            <div v-for="option in displayedOptions" @click="onSelect(option)" class="select-none hover:bg-blue hover:text-white cursor-default" :class="option.className">
                {{ option.text }}
            </div>
        </div>

        <!-- Let's hide this guy since he cannot do much -->
        <select ref="option-tags" class="hidden">
            <slot></slot>
        </select>
    </div>
</template>

<script>
    export default {
        props: {
            name: {
                type: String,
                required: true
            }
        },

        data() {
            return {
                options: [],
                open: false,
                query: ''
            }
        },

        mounted() {
            this.fillOptions()
        },

        computed: {
            selectedOption() {
                return this.options.find(option => option.selected == true) || this.options[0]
            },

            displayedOptions() {
                return this.options.filter(option => {
                    return option.text.toLowerCase().trim().includes(this.query.toLowerCase().trim())
                })
            }
        },

        watch: {
            open() {
                if (this.open) {
                    this.$refs['input-element'].focus()
                }
            }
        },

        methods: {
            fillOptions() {
                let options = Array.from(
                    this.$refs['option-tags'].children
                )

                options.forEach(option => {
                    this.options.push(
                        {
                            index: option.index,
                            text: option.text,
                            value: option.value,
                            selected: option.selected,
                            className: option.className
                        }
                    )
                })
            },

            onSelect(selectedOption) {
                this.options.forEach((option, index) => {
                    this.options[index].selected = option.index == selectedOption.index
                })

                this.query = ''
            }
        }
    }
</script>
