<div>
    <p class="text-3xl font-semibold dark:text-stone-200">About Page</p>
    <a href="{{ route('welcome') }}" wire:navigate class="text-orange-300">Welcome Page</a>
    <div class="mt-4 p-3 rounded-md">
        <livewire:users-table />
    </div>
</div>
