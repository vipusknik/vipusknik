<template>
    <div class="w-full">
        <!-- tab names -->
        <div class="flex justify-end">
            <div v-for="tab in tabs" @click="select(tab)" class="flex tab text-white cursor-pointer select-none">
                <a :href="tab.href" class="block text-white no-underline py-3 pl-6 pr-5" :class="tab.bgClass + (tab.selected ? ' z-20': '')">
                    {{ tab.name }}
                </a>
                <div class="triangle z-10" :class="'border-' + tab.bgClass.split('bg-')[1]"></div>
            </div>
        </div>

        <!-- decoration line -->
        <div class="h-2 w-full" :class="selectedTab ? selectedTab.bgClass : ''"></div>

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
                    tab.selected = (tab.href == selectedTab.href)
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
