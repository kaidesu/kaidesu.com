<template>
    <article>
        <h1 class="text-5xl font-bold mb-3 text-gray-900 dark:text-gray-300">
            {{ note.title }}
        </h1>

        <div class="prose dark:prose-light lg:prose-lg mt-12">
            <nuxt-content :document="note" />
        </div>
    </article>
</template>

<script>
    export default {
        async asyncData({ $content, params}) {
            const note = await $content('notes', params.slug).fetch()

            return { note }
        }
    }
</script>