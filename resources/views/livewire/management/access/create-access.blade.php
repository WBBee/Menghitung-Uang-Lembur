<div>
    <div class="row form-group col-span-6 sm:col-span-5">
        <div class="col-sm-6 mb-2">
            {{ __('Create New Role. ') }}
            <div class="row ">
                <div class="col-sm-8 mb-2">
                    <input type="text" wire:model.defer="role_name" class=" block mt-1 w-full form-control" autocomplete="off" id="exampleInputEmail1" placeholder="Enter role name">
                    <x-jet-input-error for="role_name" class="mt-2" />
                </div>
                <div class="col-sm-4 mb-2">
                    <div class="input-group-append">
                        <button class="btn btn-info block mt-1 w-full form-control" type="button" wire:click.prevent="createNewRole()">ADD NEW</button>
                      </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 mb-2">
            {{ __('Create New permission. ') }}
            <div class="row">
                <div class="col-sm-8 mb-2">
                    <input type="text" wire:model.defer="permission_name" class=" block mt-1 w-full form-control" autocomplete="off" id="exampleInputEmail1" placeholder="Enter permission name">
                    <x-jet-input-error for="permission_name" class="mt-2" />
                </div>
                <div class="col-sm-4 mb-2">
                    <div class="input-group-append">
                        <button class="btn btn-info block mt-1 w-full form-control" type="button" wire:click.prevent="createNewPermission()" >ADD NEW</button>
                      </div>
                </div>

            </div>
        </div>
    </div>

</div>
