<x-layout :user="$user">
    @forelse($cards as $card)
        <x-card :card="$card"></x-card>
    @empty
        <div class="flex items-center justify-center h-screen">
            <h1 class="flex flex-col items-center text-center text-violet-400 text-xl">There are no Cards
                <a class="px-6 py-3.5 text-base font-medium text-white bg-violet-700 hover:bg-violet-800 focus:ring-4 focus:outline-none focus:ring-violet-300 rounded-lg text-center"
                   href="/create/card">want to
                    create one
                </a>
            </h1>
        </div>
    @endforelse

    {{ $cards->links() }}
</x-layout>
