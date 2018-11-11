<template>
    <div class="w-full">
        <div ref="tabs" class="flex flex-col sticky z-10" style="top: 58px">
            <!-- tab names -->
            <div ref="tab-names" class="flex justify-end z-10">
                <div v-for="tab in tabs" @click="select(tab)" class="flex tab text-white cursor-pointer select-none">
                    <div class="flex items-center text-white text-xs py-1 pl-6 pr-5 lg:py-3 lg:text-sm xl:text-base" :class="tab.bgClass + (tab.selected ? ' z-20': '')">
                        {{ tab.name }}
                    </div>
                    <div class="triangle w-10 h-full" :class="tab.bgClass"></div>
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
                    this.$refs['tab-names'].classList.add('order-2', 'bg-white') // Меняем местами блок с названиями вкладок и декоративную линию
                    document.querySelectorAll('.triangle').forEach(elem => elem.classList.add('triangle-down')) // Поварачиваем подложки вкладок
                } else {
                    this.$refs['tab-names'].classList.remove('order-2', 'bg-white')
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
        margin-left: -18px;
    }

    .triangle {
        -webkit-clip-path: polygon(0 0, 0% 100%, 79% 100%);
        clip-path: polygon(0 0, 0% 100%, 79% 100%);
    }

    .triangle-down {
        -webkit-clip-path: polygon(0 0, 0% 100%, 79% 0);
        clip-path: polygon(0 0, 0% 100%, 79% 0);
    }
</style>
