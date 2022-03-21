
<form method="POST" action="{{ route('endpoint.employees.create') }}">
    @csrf

    <x-jet-dialog-modal wire:model="confirmingOpenCreateEmployeModal">
        <x-slot name="title">
            {{ __('Setting Reference') }}
        </x-slot>
        <x-slot name="content">
            <div>
                <div>
                    <x-jet-label for="name" value="{{ __('Name') }}" />
                    <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                </div>

                <div class="mt-4">
                    <x-jet-label for="status_id" value="{{ __('Update Setting Reference') }}" />
                    <select value="1" id="status_id" name="status_id" wire:model.defer="status_id" class="block mt-1 w-full form-select">
                        @foreach ($reference_key as $reference)
                        <option value="{{ $reference['id'] }}">{{ $reference['code'] }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mt-4">
                    <x-jet-label for="salary" value="{{ __('Salary') }}" />
                    <x-jet-input id="salary" class="block mt-1 w-full" type="text" name="salary" :value="old('salary')" required autofocus autocomplete="salary" />
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-danger-button class="ml-4" wire:click="$toggle('confirmingOpenCreateEmployeModal')" wire:loading.attr="disabled">
                {{ __('cancel') }}
            </x-jet-danger-button>

            <x-jet-button class="ml-4"  wire:loading.attr="disabled">
                {{ __('create') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>




    {{-- <div class="flex items-center justify-end mt-4">
        @if (Route::has('password.request'))
            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                {{ __('Forgot your password?') }}
            </a>
        @endif


    </div> --}}


</form>
