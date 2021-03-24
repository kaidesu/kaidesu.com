<div class="mb-12" x-data="{ theme: localStorage.theme }" x-init="$watch('theme', value => window.updateTheme())">
    <div class="max-w-4xl mx-auto px-6 py-3 flex justify-between items-center text-gray-900 dark:text-gray-400">
        <a href="/" class="font-bold bg-gray-900 text-white dark:bg-gray-100 dark:text-gray-900 rounded py-1 px-2">kai desu.</a>

        <div class="flex items-center text-sm">
            <a href="/articles" class="mr-3 hover:bg-gray-900 hover:text-gray-100 dark:hover:bg-gray-100 dark:hover:text-gray-900 py-1 px-2 rounded">Articles</a>
            <a href="/projects" class="mr-3 hover:bg-gray-900 hover:text-gray-100 dark:hover:bg-gray-100 dark:hover:text-gray-900 py-1 px-2 rounded">Projects</a>
            {{-- <a href="/wiki" class="mr-3 hover:bg-gray-900 hover:text-gray-100 dark:hover:bg-gray-100 dark:hover:text-gray-900 py-1 px-2 rounded">Wiki</a> --}}
            <a href="/experience" class="mr-3 hover:bg-gray-900 hover:text-gray-100 dark:hover:bg-gray-100 dark:hover:text-gray-900 py-1 px-2 rounded">Experience</a>
            <a href="#" x-show="localStorage.theme === 'dark'" @click.prevent="localStorage.theme = 'light'; theme = 'light'" class="mr-3 hover:bg-gray-900 hover:text-gray-100 dark:hover:bg-gray-100 dark:hover:text-gray-900 p-1 rounded">
                <x-icon.sun class="w-5 h-5" />
            </a>

            <a href="#" x-show="localStorage.theme !== 'dark'" @click.prevent="localStorage.theme = 'dark'; theme = 'dark'" class="mr-3 hover:bg-gray-900 hover:text-gray-100 dark:hover:bg-gray-100 dark:hover:text-gray-900 p-1 rounded">
                <x-icon.moon class="w-5 h-5" />
            </a>
        </div>
    </div>
</div>