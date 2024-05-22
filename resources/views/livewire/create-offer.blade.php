
<form class="md:w-1/2" wire:submit="save">

 
        <input type="text" wire:model.blur="title" wire:dirty.class="border-red">
       

   


    <button type="submit">enviar</button>
    {{-- <div class="mt-4">
        <x-input-label for="title" :value="__('Title')" />
        <x-text-input id="title" class="block mt-1 w-full" type="text" wire:model="title" />
        @error('title')
            hay error
        @enderror
    </div>

    <div class="mt-4">
        <div class="mt-4">
            <x-input-label for="salary" :value="__('Monthly salary')" />
            <select wire:model="salary" id="salary"
                class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                <option value="" selected>{{ __('--Choose--') }}</option>
                @foreach ($salaries as $salary)
                    <option value="{{ $salary->id }}">{{ $salary->salary }}</option>
                @endforeach
            </select>
        </div>
    </div>


    <div class="mt-4">
        <div class="mt-4">
            <x-input-label for="category" :value="__('Category')" />
            <select wire:model="category" id="category"
                class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                <option value="" selected>{{ __('--Choose--') }}</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->category }}</option>
                @endforeach
            </select>
        </div>
    </div>


    <div class="mt-4">
        <x-input-label for="company" :value="__('Company name')" />
        <x-text-input id="company" class="block mt-1 w-full" type="text" wire:model="company" />
    </div>

    <div class="mt-4">
        <x-input-label for="expiration" :value="__('Last day to apply')" />
        <x-text-input id="expiration" class="block mt-1 w-full" type="date" wire:model="expiration" />
    </div>


    <div class="mt-4">
        <x-input-label for="description" :value="__('Description')" />
        <textarea id="description" type="text" wire:model="description"
            class="resize-none h-[200px] block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"></textarea>
    </div>

    <div class="mt-4">
        <x-input-label for="image" :value="__('Image')" />
        <input id="image" class="block my-5 w-full" type="file" wire:model="image" />
    </div>

    <x-primary-button>
        {{ __('Create offer') }}
    </x-primary-button> --}}

</form>
