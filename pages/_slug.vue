<template>
    <article>
        <h1 class="text-5xl font-bold mb-3 text-gray-900 dark:text-gray-300">
            {{ page.title }}
        </h1>

        <div class="prose dark:prose-light lg:prose-lg mt-12">
            <nuxt-content :document="page" />
        </div>
    </article>
</template>

<script>
    export default {
        async asyncData({ $content, params}) {
            const page = await $content(params.slug).fetch()

            return { page }
        }
    }
</script>