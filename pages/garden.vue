<template>
    <article>
        <h1 class="text-6xl font-bold mb-3 text-gray-900 dark:text-gray-300">
            The Digital Garden
        </h1>

        <div class="prose dark:prose-light lg:prose-lg mt-12 mb-12">
            Welcome to my digital garden 👋 This is an open collection of notes, resources, and explorations I'm currently cultivating as I continuously learn new things in the public.
        </div>

        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
            <NuxtLink v-for="note in notes" :key="note.slug" :to="{ name: 'slug', params: { slug: note.slug } }" class="bg-white rounded shadow divide-y divide-gray-200 border-t-2 border-transparent hover:border-green-300 hover:shadow-md transition-all">
                <div class="w-full flex flex-col p-4 space-y-3">
                    <h3 class="font-medium text-xl">{{ note.title }}</h3>

                    <div class="-mt-px flex justify-between items-center">
                        <span class="text-xs text-gray-400 tracking-wide">{{ formatDate(note.updatedAt) }}</span>

                        <span class="flex-shrink-0 inline-block px-2 py-0.5 text-green-800 text-xs font-medium bg-green-100 rounded">{{ note.stage }} {{ emoji(note.stage) }}</span>
                    </div>
                </div>
            </NuxtLink>
        </div>
    </article>
</template>

<script>
    export default {
        async asyncData({ $content, params }) {
            const notes = await $content('notes')
                .only(['title', 'slug', 'updatedAt', 'stage'])
                .sortBy('updatedAt', 'desc')
                .where({published: true})
                .fetch()

            return { notes }
        },

        methods: {
            emoji(stage) {
                switch (stage) {
                    case 'Seedling':
                        return '🌱'
                    case 'Budding':
                        return '🌿'
                    case 'Evergreen':
                        return '🌳'
                }
            },

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