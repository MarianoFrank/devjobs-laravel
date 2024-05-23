<form wire:submit='save' class="md:w-1/2">
    <div class="my-2">
        <x-input-label for="title" :value="__('Title')" />
        <x-text-input id="title" class="block mt-2 w-full" type="text" wire:model.blur="title" />
        <x-input-error :messages="$errors->get('title')" class="mt-1" />
    </div>

    <div class="my-2">
        <x-input-label for="salary" :value="__('Monthly salary')" />
        <select wire:model.blur="salary" id="salary"
            class="block mt-2 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
            <option value="" selected disabled>{{ __('--Choose--') }}</option>
            @foreach ($salaries as $salary)
                <option value="{{ $salary->id }}">{{ $salary->salary }}</option>
            @endforeach
        </select>
        <x-input-error :messages="$errors->get('salary')" class="mt-1" />
    </div>


    <div class="my-2">
        <x-input-label for="category" :value="__('Category')" />
        <select wire:model.blur="category" id="category"
            class="block mt-2 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
            <option value="" selected disabled>{{ __('--Choose--') }}</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->category }}</option>
            @endforeach
        </select>
        <x-input-error :messages="$errors->get('category')" class="mt-1" />
    </div>


    <div class="my-2">
        <x-input-label for="company" :value="__('Company')" />
        <x-text-input id="company" class="block mt-2 w-full" type="text" wire:model.blur="company" />
        <x-input-error :messages="$errors->get('company')" class="mt-1" />
    </div>


    <div class="my-2">
        <x-input-label for="expire" :value="__('Last day to apply')" />
        <x-text-input id="expire" class="block mt-2 w-full" type="date" wire:model.blur="expire" />
        <x-input-error :messages="$errors->get('expire')" class="mt-1" />
    </div>

    <div class="my-2">
        <x-input-label for="description" :value="__('Description')" />
        <textarea wire:model.blur="description" id="description"
            class="block mt-2 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm resize-none h-[200px]"></textarea>
        <x-input-error :messages="$errors->get('description')" class="mt-1" />
    </div>

    <div class="my-2">
        <x-input-label for="image" :value="__('Image')" />
        <input id="image" class="block mt-2 w-full" type="file" wire:model.live="image" accept="image/*" />
        <x-input-error :messages="$errors->get('image')" class="mt-1" />
    </div>

    @if ($image)
        <img src="{{ $image->temporaryUrl() }}">
    @endif
    <x-primary-button>
        {{ __('Create offer') }}
    </x-primary-button>
</form>
