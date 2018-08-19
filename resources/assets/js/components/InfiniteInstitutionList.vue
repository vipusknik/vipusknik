<script>
    import qs from 'qs'
    import _ from 'lodash'

    export default {
        props: {
            offsetInitial: {
                type: Number,
                required: false,
                default: 0
            },

            institutionType: {}
        },

        data() {
            return {
                list: [],
                listComplete: false,
                fetching: false
            }
        },

        mounted() {
            window.addEventListener('scroll', () => this.fetch())
        },

        computed: {
            offset() {
                return this.offsetInitial + this.list.length
            }
        },

        methods: {
            fetch: _.debounce(function () {
                if (this.listComplete || this.fetching) return

                this.fetching = true

                let queryParams = qs.parse(location.search.slice(1)) // Получаем параметры из URL

                axios.get(`/institutions/${this.institutionType}/infinite-scroll`, {
                        params: {
                            offset: this.offset,
                            ...queryParams
                        }
                    })
                    .then(response => {
                        if (response.data.length) {
                            this.list.push(...response.data)
                        } else {
                            this.listComplete = true
                        }

                        this.fetching = false
                    })
                    .catch(() => {
                        alert('Ошибка при получении данных')
                        this.fetching = false
                    })
            }, 100)
        }
    }
</script>
