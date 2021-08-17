<template>
    <div class="hidden xl:text-sm xl:block flex-none w-40 mr-6">
        <div class="flex flex-col justify-between overflow-y-auto sticky max-h-(screen-18) pt-10 pb-6 top-18 divide-y divide-gray-200">
            <div class="mb-8">
                <h5 class="text-gray-900 uppercase tracking-wide font-semibold mb-3 text-sm lg:text-xs">On this page</h5>

                <ul class="on-this-page overflow-x-hidden text-gray-500 font-medium list-none">
                    <li v-for="link of document.toc" :key="link.id">
                        <NuxtLink
                            :to="`#${link.id}`"
                            class="block transform transition-colors duration-200 py-2 hover:text-gray-900"
                            :class="{ 'py-2': link.depth === 2, 'ml-4 pb-2': link.depth === 3 }"
                        >
                            {{ link.text }}
                        </NuxtLink>
                    </li>
                </ul>
            </div>

            <div class="space-y-8 py-8">
                <!-- Previous -->
                <div v-if="prev">
                    <h2 class="text-xs leading-5 tracking-wide uppercase text-gray-500">Previous</h2>
                    <div class="text-indigo-600 hover:text-indigo-700">
                        <NuxtLink :to="{ name: 'docs-version-slug', params: { version: 'nightly', slug: prev.slug } }">{{ prev.title }}</NuxtLink>
                    </div>
                </div>

                <!-- Next -->
                <div v-if="next">
                    <h2 class="text-xs leading-5 tracking-wide uppercase text-gray-500">Next</h2>
                    <div class="text-indigo-600 hover:text-indigo-700">
                        <NuxtLink :to="{ name: 'docs-version-slug', params: { version: 'nightly', slug: next.slug } }">{{ next.title }}</NuxtLink>
                    </div>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
    export default {
        props: ['document', 'prev', 'next'],
    }
</script>