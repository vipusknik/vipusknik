<template>
    <div class="w-full">
        <!-- tab names -->
        <div class="flex">
            <div v-for="tab in tabs" @click="select(tab)" :class="tab.bgClass" class="text-white py-3 pl-5 pr-8 cursor-pointer select-none">
                <a :href="tab.href" class="block text-white no-underline">{{ tab.name }}</a>
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
