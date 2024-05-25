<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('My offers') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div
                class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-900 dark:text-gray-100 flex flex-col">
                @foreach ($offers as $offer)
                    <div class="p-6 border-b border-gray-200 space-y3">
                        <a href="#" class="text-xl font-bold"> {{ $offer->title }}</a>
                        <p>{{$offer->company}}</p>
                        <p>{{__("Apply up to")}}: {{$offer->expire}}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
