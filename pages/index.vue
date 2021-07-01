<template>
    <div>
        <nuxt-content :document="article" />
    </div>
</template>

<script>
    export default {
        async asyncData({ $content, params}) {
            const article = await $content('index').fetch()

            return { article }
        }
    }
</script>
