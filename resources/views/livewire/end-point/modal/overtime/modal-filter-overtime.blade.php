<x-jet-dialog-modal wire:model="confirmingOpenFilterOvertimeModal">
    <x-slot name="title">
        {{ __('Edit Signal') }}
    </x-slot>

    <x-slot name="content">
        <div class="row form-group col-span-6 sm:col-span-5">
            <div class="col-sm-6">
                {{ __('Date Start.') }}
                <x-jet-input type="date" class="mt-1 block w-full form-control shadow-none" wire:model.defer="date_start" />
                <x-jet-input-error for="date_start" class="mt-2" />
            </div>
            <div class="col-sm-6">
                {{ __('Date Ended.') }}
                <x-jet-input type="date" class="mt-1 block w-full form-control shadow-none" wire:model.defer="date_ended" />
                <x-jet-input-error for="date_ended" class="mt-2" />
            </div>

        </div>
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$toggle('confirmingOpenFilterOvertimeModal')" wire:loading.attr="disabled">
            {{ __('Cancel') }}
        </x-jet-secondary-button>

        <x-jet-danger-button class="ml-2" wire:click="$toggle('confirmingOpenFilterOvertimeModal')" wire:loading.attr="disabled">
            {{ __('Save Settings') }}
        </x-jet-danger-button>
    </x-slot>
</x-jet-dialog-modal>
