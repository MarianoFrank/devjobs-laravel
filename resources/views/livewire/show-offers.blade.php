<div>
    @forelse ($offers as $offer)
        <div wire:key="{{ $offer->id }}"
            class="flex md:justify-between items-center border-b last:border-none py-6 flex-col md:flex-row">
            <div>
                <a href="#" class="text-xl font-bold"> {{ $offer->title }}</a>
                <p class="text-sm">{{ $offer->company }}</p>
                <p class="mt-3 text-sm text-gray-500">{{ __('Apply up to') }}: {{ $offer->expire }}</p>
            </div>

            <div class="flex gap-5 h-fit pt-6 flex-col md:flex-row md:gap-3">
                <a href="#"
                    class=" justify-center flex gap-2 items-center font-bold py-1 px-5 text-sm text-blue-500 bg-blue-200 rounded-lg">{{ __('Candidates') }}
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-4">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                    </svg>

                </a>
                <a href="#"
                    class=" justify-center  flex gap-2 items-center font-bold py-1 px-4 text-sm text-slate-500 bg-slate-200 rounded-lg">{{ __('Edit') }}
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-4">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                    </svg>
                </a>
                <a href="#"
                    class=" justify-center  flex gap-2 items-center font-bold py-1 px-4 text-sm text-red-500 bg-red-200 rounded-lg">{{ __('Delete') }}
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-4">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                    </svg>

                </a>
            </div>
        </div>

    @empty
        <p class="text-center p-3">{{ __('You have not published offers yet') }}</p>
    @endforelse




    <div x-data="{ loading: $wire.loading }" x-intersect.full="
    if($wire.hasMore){
        $wire.loadMore()
    }">
        <div x-if="loading">
           cargando
        </div>


    </div>

</div>