<template>
    <article>
        <div class="mb-24">
            <h1 class="text-6xl font-bold text-gray-900 dark:text-gray-300 border-b border-gray-200 pb-8 mb-3">
                {{ note.title }}
            </h1>

            <div class="flex items-start space-x-3 text-sm">
                <span class="text-green-700">{{ note.stage }}</span>
                <span>{{ emoji }}</span>
                <span class="text-gray-500">Planted {{ formatDate(note.createdAt) }} — Last Tended {{ formatDate(note.updatedAt) }}</span>
            </div>
        </div>

        <div class="flex mt-12">
            <OnThisPage :document="note" />

            <div class="prose lg:prose-lg prose-yellow max-w-2xl">
                <nuxt-content :document="note" />
            </div>
        </div>
    </article>
</template>

<script>
    export default {
        async asyncData({ $content, params}) {
            const note = await $content('notes', params.slug).fetch()

            return { note }
        },

        computed: {
            emoji() {
                switch (this.note.stage) {
                    case 'Seedling':
                        return '🌱'
                    case 'Budding':
                        return '🌿'
                    case 'Evergreen':
                        return '🌳'
                }
            }
        },

        methods: {
            formatDate(date) {
                date = new Date(date)

                const month = new Intl.DateTimeFormat('en-US', { timeZone: 'America/Los_Angeles', month: 'short' }).format(date)
                const day   = new Intl.DateTimeFormat('en-US', { timeZone: 'America/Los_Angeles', day: '2-digit' }).format(date)
                const year = new Intl.DateTimeFormat('en-US', { timeZone: 'America/Los_Angeles', year: 'numeric' }).format(date)

                return `${month} ${day}, ${year}`
            },
        }
    }
</script>