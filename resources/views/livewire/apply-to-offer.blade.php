<div class="mt-10 py-5 border-t flex items-center flex-col">
    @if ($already_applied)
        <p class=" text-emerald-600 bg-emerald-100 py-2 px-4 rounded-md">{{__("Your application has been successfully submitted!")}} ✔</p>

        @else
        <h3 class="text-xl font-bold mb-5">{{ __('Apply to offer') }}</h3>
        <form wire:submit="save" class="max-w-md flex items-center flex-col ">
    
            <div class="my-2 flex items-center flex-col">
                <x-input-label for="cv" :value="__('Apply by sending us your resume') . ' (PDF)'" />
    
                <input id="cv" type="file" wire:model.live="cv" accept="application/pdf"
                    class="mt-5 border block rounded-md w-full text-sm text-slate-500
                file:mr-4 file:py-2 file:px-4 file:rounded-md
                 file:text-sm file:font-semibold
                file:bg-blue-100 file:text-blue-700 file:border-none
                hover:file:bg-blue-200 file:cursor-pointer cursor-pointer" />
    
                <x-input-error :messages="$errors->get('cv')" class="mt-1" />
            </div>
    
            <x-primary-button class="mt-5">
                {{ __('Send') }}
            </x-primary-button>
        </form>
    @endif
   
</div>
