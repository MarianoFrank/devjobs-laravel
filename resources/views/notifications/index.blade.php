<x-app-layout>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-10 text-gray-900 dark:text-gray-100 flex md:justify-center  flex-col ">

                    @forelse ($notifications as $notification)
                        <div
                            class="mb-5 border-b py-5 last-of-type:m-0 last-of-type:border-none md:flex justify-between">
                            <div>
                                <p>{{ __('New candidate for') . ': ' }}
                                    <span class=" font-bold">{{ $notification->data['offer_title'] }}</span>
                                </p>
                                <p>
                                    <span class=" font-bold">{{ $notification->created_at->diffForHumans() }}</span>
                                </p>
                            </div>
                            <div>
                                <a href="{{ route('candidates.index', $notification->data['offer_id']) }}"
                                    class="mt-2 md:mt-0 justify-center flex gap-2 items-center font-bold py-1 px-5 text-sm text-gray-500 bg-gray-200 rounded-lg">{{ __('See candidates') }}
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                                    </svg>

                                </a>
                            </div>
                        </div>
                    @empty
                        <p class="text-sm text-gray-800 text-center">{{ __("You don't have notifications") }}</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
