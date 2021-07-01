<template>
    <div>
        <h1 class="text-5xl font-bold text-gray-900">
            Posts
        </h1>

        <div class="mt-12">
            <div v-for="post in posts" :key="post.slug" class="flex justify-center md:justfy-between items-center mb-2">
                <NuxtLink :to="{ name: 'year-month-slug', params: { year: getYear(post), month: getMonth(post), slug: post.slug } }" class="text-sm md:text-base truncate">{{ post.title }}</NuxtLink>

                <hr class="hidden md:block h-px border-t border-gray-400 mx-4 flex-1 border-dotted">

                <time :datetime="post.publishAt" class="font-mono tracking-wide text-sm hidden md:block">
                    {{ formatDate(post.publishAt) }}
                </time>

                <time :datetime="post.publishAt" class="font-mono ml-auto tracking-wide text-xs block md:hidden">
                    {{ formatDate(post.publishAt) }}
                </time>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        async asyncData({ $content, params }) {
            const posts = await $content('posts')
                .only(['title', 'slug', 'publishAt'])
                .sortBy('publishAt', 'desc')
                .fetch()

            return { posts }
        },

        methods: {
            formatDate(date) {
                date = new Date(date)

                const month = new Intl.DateTimeFormat('en-US', { month: 'short' }).format(date)
                const year = new Intl.DateTimeFormat('en-US', { year: '2-digit' }).format(date)

                return `${month} '${year}`
            },

            getYear(post) {
                const date = new Date(post.publishAt)

                return new Intl.DateTimeFormat('en-US', { year: 'numeric' }).format(date)
            },

            getMonth(post) {
                const date = new Date(post.publishAt)

                return new Intl.DateTimeFormat('en-US', { month: '2-digit' }).format(date)
            }
        }
    }
</script>