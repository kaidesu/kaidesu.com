<div wire:poll.30s>
    <dl class="grid grid-cols-2 gap-5 lg:grid-cols-4 pb-5">
        <x-stat title="Level" :value="$level"/>
        <x-stat title="Lessons" :value="$lessons"/>
        <x-stat title="Reviews" :value="$reviews"/>
    </dl>

    <dl class="grid grid-cols-2 gap-5 lg:grid-cols-4">
        <x-stat title="Radicals" :value="$radicals"/>
        <x-stat title="Kanji" :value="$kanji"/>
        <x-stat title="Vocabulary" :value="$vocabulary"/>
    </dl>
</div>