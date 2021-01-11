<div class="border-b border-gray-200 dark:border-gray-800 mb-3" x-data="{ theme: localStorage.theme }" x-init="$watch('theme', value => window.updateTheme())">
    <div class="max-w-4xl mx-auto px-6 py-3 flex justify-between items-center text-gray-900 dark:text-gray-400">
        <a href="/" class="font-bold">kai desu.</a>

        <div class="flex items-center text-sm">
            <a href="/" class="mr-4">posts</a>
            <a href="/projects" class="mr-4">projects</a>
            <a href="/whois" class="mr-4">whois</a>
            <a href="#" x-show="localStorage.theme === 'dark'" @click.prevent="localStorage.theme = 'light'; theme = 'light'" class="mr-4">
                <x-icon.sun class="w-5 h-5" />
            </a>

            <a href="#" x-show="localStorage.theme !== 'dark'" @click.prevent="localStorage.theme = 'dark'; theme = 'dark'" class="mr-4">
                <x-icon.moon class="w-5 h-5" />
            </a>
        </div>
    </div>
</div>