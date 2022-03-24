<div>
    <!-- Status Membership Confirmation Modal -->
    <x-jet-dialog-modal wire:model="confirmOpenCreateRoleModal">
        <x-slot name="title">
            {{ __('Create Role') }}
        </x-slot>

        <x-slot name="content">
            <div class="row form-group col-span-6 sm:col-span-5">
                <div class="col-sm-8 mb-2">
                    <input type="text" wire:model.defer="role_name" class=" block mt-1 w-full form-control" autocomplete="off" id="exampleInputEmail1" placeholder="Enter role name">
                    <x-jet-input-error for="role_name" class="mt-2" />
                </div>
                <div class="col-sm-4 mb-2">
                    <div class="input-group-append">
                        <button class="btn btn-info block mt-1 w-full form-control" type="button" wire:click.prevent="addRoleUser()">ADD NEW</button>
                      </div>
                </div>

            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('confirmOpenCreateRoleModal')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-2" wire:click.prevent="saveCreateRole()" wire:loading.attr="disabled">
                {{ __('Save Settings') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
