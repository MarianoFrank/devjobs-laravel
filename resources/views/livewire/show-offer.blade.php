<div class=" mt-10">
    <div class=" space-y-5 border-b pb-10">
        <h3 class="m-0 p-0 font-bold text-2xl">
            {{ $offer->title }}
        </h3>


        <div class="grid md:grid-cols-2 gap-y-4">
            <div>
                <p class="text-gray-600">{{ __('Company') }}:
                    <span class="font-bold">{{ $offer->company }}</span>
                </p>
            </div>

            <div>
                <p class="text-gray-600">{{ __('Available until') }}:
                    <span class="font-bold">{{ $offer->expireFormated() }}</span>
                </p>
            </div>
            <div>
                <p class="text-gray-600">{{ __('Category') }}:
                    <span class="font-bold">{{ $offer->category->category }}</span>
                </p>
            </div>
            <div>
                <p class="text-gray-600">{{ __('Salary') }}:
                    <span class="font-bold">{{ $offer->salary->salary }}</span>
                </p>
            </div>
        </div>
    </div>


    <div class="mt-5 md:grid md:grid-cols-6 md:gap-5">

        <div class="md:col-span-4">
            <h2 class="mb-5 p-0 font-bold text-2xl">{{ __('Description') }}</h2>
            <p>{{ $offer->description }}</p>
        </div>


        <div x-data="{ openModalImage: false, zoom: false }" class="md:col-span-2">

            <img @click="openModalImage = true" class="mt-5 rounded-md shadow cursor-pointer"
                src="{{ asset('storage/offers') . '/' . $offer->image }}" alt="Image offer {{ $offer->title }}">

            <button
                class="flex items-center justify-center text-sm gap-2 mx-auto mt-5 py-2 px-4 bg-red-100 rounded-md text-red-500 hover:bg-red-200"
                wire:click="dowloadPdfOffer">{{ __('Download offer summary') }}
                <svg class="h-4 w-4 fill-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path
                        d="M64 464l48 0 0 48-48 0c-35.3 0-64-28.7-64-64L0 64C0 28.7 28.7 0 64 0L229.5 0c17 0 33.3 6.7 45.3 18.7l90.5 90.5c12 12 18.7 28.3 18.7 45.3L384 304l-48 0 0-144-80 0c-17.7 0-32-14.3-32-32l0-80L64 48c-8.8 0-16 7.2-16 16l0 384c0 8.8 7.2 16 16 16zM176 352l32 0c30.9 0 56 25.1 56 56s-25.1 56-56 56l-16 0 0 32c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-48 0-80c0-8.8 7.2-16 16-16zm32 80c13.3 0 24-10.7 24-24s-10.7-24-24-24l-16 0 0 48 16 0zm96-80l32 0c26.5 0 48 21.5 48 48l0 64c0 26.5-21.5 48-48 48l-32 0c-8.8 0-16-7.2-16-16l0-128c0-8.8 7.2-16 16-16zm32 128c8.8 0 16-7.2 16-16l0-64c0-8.8-7.2-16-16-16l-16 0 0 96 16 0zm80-112c0-8.8 7.2-16 16-16l48 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 32 32 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 48c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-64 0-64z" />
                </svg>
            </button>

            <div x-cloak x-show="openModalImage"
                class="fixed z-10 p-5 w-full h-full top-0 left-0 flex items-center justify-center overflow-y-auto bg-black bg-opacity-50">
                <img @click.outside="openModalImage = false" @click="zoom = !zoom"
                    class=" rounded-md md:h-full cursor-zoom-in " :class="zoom ? 'scale-150' : ''"
                    src="{{ asset('storage/offers') . '/' . $offer->image }}" alt="Image offer {{ $offer->title }}">
            </div>
        </div>

    </div>


    @guest
        <div class="mt-4 bg-slate-50 shadow rounded-md flex items-center justify-center p-4">
            <p class="text-slate-700">
                {{ __('Do you want to apply for an offer?') }}<a href="{{ route('register') }}"
                    class=" hover:border-b font-bold cursor-pointer text-blue-600">{{ __('Get an account') }}</a></p>
        </div>
    @endguest

    @auth
        {{-- Si no puede crear ofertas, significa que es desarollador --}}
        @cannot('create', App\Models\Offer::class)
            <livewire:apply-to-offer :offer="$offer" />
        @endcan
    @endauth

</div>
