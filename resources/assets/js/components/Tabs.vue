<template>
    <div class="w-full">
        <div ref="tabs" class="flex flex-col sticky z-10" style="top: 58px">
            <!-- tab names -->
            <div ref="tab-names" class="flex justify-end z-10">
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

            let originalOffsetTop = this.$refs['tabs'].offsetTop - 58

            window.addEventListener('scroll', () => {
                if (window.scrollY >= originalOffsetTop) {
                    this.$refs['tab-names'].classList.add('order-2') // Меняем местами блок с названиями вкладок и декоративную линию
                    document.querySelectorAll('.triangle').forEach(elem => elem.classList.add('triangle-down')) // Поварачиваем подложки вкладок
                } else {
                    this.$refs['tab-names'].classList.remove('order-2')
                    document.querySelectorAll('.triangle').forEach(elem => elem.classList.remove('triangle-down'))
                }
            })
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
        border-right: 18px solid transparent;
    }

    .triangle-down {
        border-bottom-width: 0;
        border-top-width: 42px;
    }
</style>
