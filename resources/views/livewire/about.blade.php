<div>
    <p class="text-3xl font-semibold dark:text-stone-200">About Page</p>
    <a href="{{ route('welcome') }}" wire:navigate class="text-orange-300">Welcome Page</a>
    <div class="mt-4 p-3 rounded-md">
        @if ($users > 0)
            <livewire:users-table />
        @else
            <div
                class="flex flex-col items-center justify-center py-12 space-y-3 border rounded-lg border-stone-300 dark:border-stone-600">
                <i class="bi bi-x-circle text-4xl text-stone-400 dark:text-stone-500"></i>

                <p class="text-base font-medium italic text-stone-600 dark:text-stone-300">
                    No users are there.
                </p>
            </div>
        @endif
    </div>
</div>
