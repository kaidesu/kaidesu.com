@props(['title', 'value'])

<div class="bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg">
    <div class="px-4 py-5 sm:p-6">
        <dt class="text-sm font-medium text-gray-500 dark:text-gray-200 truncate">
            {{ $title }}
        </dt>

        <dd class="mt-1 text-3xl font-semibold text-gray-900 dark:text-gray-100">
            {{ $value }}
        </dd>
    </div>
</div>