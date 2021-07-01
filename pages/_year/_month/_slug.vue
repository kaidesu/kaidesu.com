<template>
    <article>
        <h1 class="text-5xl font-bold mb-3 text-gray-900 dark:text-gray-300">
            {{ post.title }}
        </h1>

        <div class="mt-2 flex flex-col sm:flex-row sm:flex-wrap sm:mt-0 sm:space-x-6">
            <div class="mt-2 flex items-center text-sm text-gray-500">
                <!-- Heroicon name: calendar -->
                <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>

                {{ formatDate(post.publishAt) }}
            </div>

            <div class="mt-2 flex items-center text-sm text-gray-500">
                <!-- Heroicon name: book-open -->
                <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                </svg>

                {{ calculateReadingTime(post.body) }}
            </div>
        </div>

        <div v-if="isOverAYearOld(post.publishAt)" class="rounded-md bg-gray-100 dark:bg-gray-800 shadow-sm p-4 mt-12 -mb-6">
            <div class="flex">
                <div class="flex-shrink-0">
                    <!-- Heroicon name: solid/exclamation -->
                    <svg class="h-5 w-5 text-yellow-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                    </svg>
                </div>

                <div class="ml-3">
                    <h3 class="text-sm font-medium text-gray-800 dark:text-gray-300">
                        This content is over a year old
                    </h3>

                    <div class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                        <p>
                            When reading, please keep its age in mind as the information presented may be out of date with current developments, practices or personal viewpoints.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="prose dark:prose-light lg:prose-lg mt-12">
            <nuxt-content :document="post" />

            <div v-if="post.source">
                <a href="#">Continue reading</a>

                <svg class="w-5 h-5 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>

                <span class="text-gray-500 font-mono">
                    [{{ getHostname(post.source) }}]
                </span>
            </div>
        </div>
    </article>
</template>

<script>
export default {
    async asyncData({ $content, params }) {
        const post = await $content('posts', params.slug).fetch()

        return { post }
    },

    methods: {
        formatDate(date) {
            const options = { year: 'numeric', month: 'long', day: 'numeric' }
            return new Date(date).toLocaleDateString('en', options)
        },

        calculateReadingTime(text) {
            let minutes = 0

            const content = JSON.stringify(text)
            const words = content.split(" ").length

            minutes = Math.ceil(words / 200)

            return `${minutes} min read`
        },

        isOverAYearOld(date) {
            const now = new Date()
            const then = new Date(date)
            const diff = now - then
            const oneYear = 1000 * 60 * 60 * 24 * 365

            return diff > oneYear
        },

        getHostname(string) {
            const url = new URL(string)
            const host = url.hostname

            return host
        },
    }
}
</script>