<template>
    <div v-show="selected">
        <slot></slot>
    </div>
</template>

<script>
    export default {
        props: {
            name: {
                required: true
            },

            selectedInitial: {
                type: Boolean,
                required: false,
                default: false
            },

            bgClass: { required: false }
        },

        data() {
            return {
                selected: this.selectedInitial
            }
        },

        computed: {
            href() {
                return '#' + this.name.toLowerCase().replace(/ /g, '-');
            }
        }
    }
</script>
