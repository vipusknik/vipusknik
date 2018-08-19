<template>
    <div class="flex mb-6">
        <div class="w-12 flex-no-shrink mr-2 p-1">
            <a v-if="logo" :href="`/institutions/${institutionType}/${institution.slug}`" class="block">
                <img :src="logoLink" :alt="institution.title" class="block w-full">
            </a>
        </div>

        <div class="flex-1 min-w-0 flex flex-col justify-center px-2 border-orange-light" style="border-left-width: 1.3px">
            <div class="mb-1">
                <a :href="`/institutions/${institutionType}/${institution.slug}`" class="text-blue-dark no-underline hover:underline">
                    {{ institution.title }}
                </a>
            </div>
            <div class="text-sm text-grey-dark">
                {{ institution.city.title }}
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: [ 'institution', 'institutionType' ],

        computed: {
            logo() {
                return this.institution.media.find(institution => {
                    return institution.collection_name === 'logo'
                })
            },

            logoLink() {
                if (! this.logo) return '';

                return 'http://mustim09.beget.tech/storage/' + this.logo.id + '/' + this.logo.file_name
            }
        }
    }
</script>
