<form method="POST" action="{{ route('endpoint.employees.update',['id' => $employe_id]) }}">
    @csrf
    @method('patch')

    <x-jet-dialog-modal wire:model="confirmingOpenEditEmployeModal">
        <x-slot name="title">
            {{ __('Setting Reference') }}
        </x-slot>
        <x-slot name="content">
            <div>
                <div class="mt-4">
                    <x-jet-label for="name" value="{{ __('Update Name') }}" />
                    <x-jet-input wire:model.defer="employe.name" id="name" class="block mt-1 w-full" type="text" placeholder="your name" name="name" required autocomplete="off"  />
                </div>

                <div class="mt-4">
                    <x-jet-label for="salary" value="{{ __('Update Salary') }}" />
                    <x-jet-input wire:model.defer="employe.salary" id="salary" class="block mt-1 w-full" placeholder="2000000" type="number" name="salary" required autocomplete="off" />
                </div>

                <div class="mt-4">
                    <x-jet-label for="status_id" value="{{ __('Update Setting Reference') }}" />
                    <select required id="status_id" name="status_id" wire:model.defer="status_id" class="block mt-1 w-full form-select">
                        @foreach ($reference_key as $reference)
                        <option value="{{ $reference['id'] }}">{{ $reference['code'] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-danger-button class="ml-4" wire:click="$toggle('confirmingOpenEditEmployeModal')" wire:loading.attr="disabled">
                {{ __('cancel') }}
            </x-jet-danger-button>

            <x-jet-button class="ml-4"  wire:loading.attr="disabled">
                {{ __('update') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>

</form>
