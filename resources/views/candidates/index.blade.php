<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Candidates of') . ': ' . $offer->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <ul
                class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-900 dark:text-gray-100 flex flex-col">
                @forelse ($offer->candidates as $candidate)
                    <li class="flex items-center justify-between border-b p-2 last-of-type:border-none text-sm">
                        <div>
                            <p class=" font-bold">{{ $candidate->name }}</p>
                            <p>{{ $candidate->email }}</p>
                            <p>{{ $candidate->pivot->created_at->diffForHumans() }}</p>
                        </div>
                        <div>
                            <a href="{{ asset('storage/pdfs') . '/' . $candidate->pivot->cv }}"
                                target="_blank"
                                rel="noreferrer noopener"
                                class="text-md flex items-center justify-center gap-4 bg-red-100 hover:bg-red-200 text-red-500 rounded-full px-4 py-2">
                                {{ __('View CV') }}
                                <svg class="h-4 w-4 fill-red-500" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 512 512">
                                    <path
                                        d="M64 464l48 0 0 48-48 0c-35.3 0-64-28.7-64-64L0 64C0 28.7 28.7 0 64 0L229.5 0c17 0 33.3 6.7 45.3 18.7l90.5 90.5c12 12 18.7 28.3 18.7 45.3L384 304l-48 0 0-144-80 0c-17.7 0-32-14.3-32-32l0-80L64 48c-8.8 0-16 7.2-16 16l0 384c0 8.8 7.2 16 16 16zM176 352l32 0c30.9 0 56 25.1 56 56s-25.1 56-56 56l-16 0 0 32c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-48 0-80c0-8.8 7.2-16 16-16zm32 80c13.3 0 24-10.7 24-24s-10.7-24-24-24l-16 0 0 48 16 0zm96-80l32 0c26.5 0 48 21.5 48 48l0 64c0 26.5-21.5 48-48 48l-32 0c-8.8 0-16-7.2-16-16l0-128c0-8.8 7.2-16 16-16zm32 128c8.8 0 16-7.2 16-16l0-64c0-8.8-7.2-16-16-16l-16 0 0 96 16 0zm80-112c0-8.8 7.2-16 16-16l48 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 32 32 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 48c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-64 0-64z" />
                                </svg>
                            </a>
                        </div>
                    </li>
                @empty
                    <p class="text-sm text-gray-800 text-center">{{ __("You don't have candidates") }}</p>
                @endforelse
            </ul>
        </div>
    </div>
</x-app-layout>
