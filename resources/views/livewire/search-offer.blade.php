<form class="max-w-lg mx-auto" wire:submit="emitSearch">
    <div class="flex">

        <div x-data="{ dropdown: false, nameCategory: 'All Categories'}" class="relative">
            <button id="dropdown-button" data-dropdown-toggle="dropdown" x-on:click="dropdown = !dropdown"
                @click.outside="dropdown = false"
                class="flex items-center justify-center py-2.5 px-4 text-sm font-medium  text-gray-900 bg-gray-100 border border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600"
                type="button">
                <p class=" text-nowrap" x-text="nameCategory"></p>
                <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 4 4 4-4" />
                </svg>
            </button>

            <div id="dropdown" x-show="dropdown" x-cloak
                class="z-10 absolute top-full mt-2 left-1/2 translate-x-[-50%]  bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700">
                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200 w-fit">
                    <li class="">
                        <button type="button"
                            x-on:click="$wire.selectedCategory = ''; dropdown = false; nameCategory = 'All Categories'"
                            class="text-nowrap w-full  px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">All Categories</button>
                    </li>
                    @foreach ($categories as $category)
                        <li class="">
                            <button type="button"
                                x-on:click="$wire.selectedCategory = '{{ $category->id }}'; dropdown = false; nameCategory = '{{ $category->category }}'"
                                class="text-nowrap w-full  px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{ $category->category }}</button>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div x-data="{ dropdown: false, nameSalary: 'All Salaries'}" class="relative">
            <button id="dropdown-button" data-dropdown-toggle="dropdown" x-on:click="dropdown = !dropdown"
                @click.outside="dropdown = false"
                class="flex items-center justify-center py-2.5 px-4 text-sm font-medium  text-gray-900 bg-gray-100 border-l-0 border border-gray-300  hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600"
                type="button">
                <p class=" text-nowrap" x-text="nameSalary"></p>
                <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 4 4 4-4" />
                </svg>
            </button>

            <div id="dropdown" x-show="dropdown" x-cloak
                class="z-10 absolute top-full mt-2 left-1/2 translate-x-[-50%] bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700">
                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200 ">
                    <li>
                        <button type="button"
                            x-on:click="$wire.selectedSalary = ''; dropdown = false; nameSalary = 'All Salaries'"
                            class="text-nowrap w-full  px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">All Salaries</button>
                    </li>
                    @foreach ($salaries as $salary)
                        <li>
                            <button type="button"
                                x-on:click="$wire.selectedSalary = '{{ $salary->id }}'; dropdown = false; nameSalary = '{{ $salary->salary }}'"
                                class="text-nowrap w-full  px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{ $salary->salary }}</button>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>


        <div class="relative w-full">

            <input type="text" id="query" wire:model="query"
                class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border-s-gray-50 border-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-s-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500"
                placeholder="Search any offer..." />

            <button type="submit"
                class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-white bg-blue-700 rounded-e-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">

                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>

            </button>
        </div>
    </div>
</form>
