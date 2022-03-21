
<form method="POST" action="{{ route('endpoint.settings.update') }}">
    @csrf
    @method('patch')

    <x-jet-dialog-modal wire:model="confirmingOpenSettingModal">
        <x-slot name="title">
            {{ __('Setting Reference') }}
        </x-slot>
        <x-slot name="content">

            <div>
                <x-jet-label for="key" value="{{ __('Update Setting Reference') }}" />

                <select required id="key" name="key" wire:model.defer="key" class="block mt-1 w-full form-select">
                    @foreach ($reference_key as $reference)
                    <option value="{{ $reference['id'] }}">{{ $reference['code'] }}</option>
                    @endforeach
                </select>
            </div>

        </x-slot>

        <x-slot name="footer">
            <x-jet-danger-button class="ml-4" wire:click="$toggle('confirmingOpenSettingModal')" wire:loading.attr="disabled">
                {{ __('cancel') }}
            </x-jet-danger-button>
            <x-jet-button class="ml-4" wire:click="$toggle('confirmingOpenSettingModal')" wire:loading.attr="disabled">
                {{ __('update') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>

</form>
