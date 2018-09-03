<template>
    <div class="w-full">
        <div class="flex flex-col">
            <!-- tab names -->
            <div class="flex justify-end z-10">
                <div v-for="tab in tabs" @click="select(tab)" class="flex tab text-white cursor-pointer select-none">
                    <div class="block text-white py-3 pl-6 pr-5" :class="tab.bgClass + (tab.selected ? ' z-20': '')">
                        {{ tab.name }}
                    </div>
                    <div class="triangle z-10" :class="'border-' + tab.bgClass.split('bg-')[1]"></div>
                </div>
            </div>

            <!-- decoration line -->
            <div class="h-2 w-full" :class="selectedTab ? selectedTab.bgClass : ''"></div>
        </div>

        <!-- tab content -->
        <div>
            <slot></slot>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                tabs: []
            }
        },

        mounted() {
            this.tabs = this.$children
        },

        computed: {
            selectedTab() {
                return this.tabs.find(tab => tab.selected)
            }
        },

        methods: {
            select(selectedTab) {
                this.tabs.forEach(tab => {
                    tab.selected = (tab.name == selectedTab.name)
                })
            }
        }
    }
</script>

<style scoped>
    .tab:not(:first-child) {
        margin-left: -6px;
    }

    .triangle {
        border-bottom-width: 42px;
        border-bottom-style: solid;
        border-right: 18px solid transparent;
    }
</style>
