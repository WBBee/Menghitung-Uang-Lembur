<div>
    <div class="row form-group col-span-6 sm:col-span-5">

        <div class="col-sm-6 mb-2">
            {{ __('Available Roles. ') }}
            <div class="row ">
                <div class="col-sm-8 mb-2">
                    <select required id="role_list" name="role_list" wire:model.defer="role_list" class="block mt-1 w-full form-control">
                        <option >CHOOSE ONE</option>
                        @foreach ($array_roles as $role)
                        <option value="{{ $role['name'] }}">{{ $role['name'] }}</option>
                        @endforeach
                    </select>
                    <x-jet-input-error for="role_list" class="mt-2" />
                </div>
                <div class="col-sm-4 mb-2">
                    <div class="input-group-append">
                        <button class="btn btn-info block mt-1 w-full form-control" type="button" wire:click.prevent="addRoleUser()">ADD NEW</button>
                      </div>
                </div>

                <div class="col-sm-12 mb-2">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-title mb-2">User Role List ({{ $self_roles['count'] }})</div>
                            <ul class="list-unstyled list-unstyled-border list-unstyled-noborder mb-0">
                                @foreach ($self_roles['data'] as $role)
                                <li class="media">
                                    <div class="media-body ml-3">
                                    <div class="media-title">{{ $role['name'] }}</div>
                                    <div class="text-small text-muted">Added At {{ $role['updated_at'] }} </i></div>
                                    </div>
                                    <a href="#" wire:click.prevent="removeRoleUser({{ $role['id'] }})"> <i class="fas fa-trash-alt" ></i></a>
                                </li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 mb-2">
            {{ __('Available Permissions. ') }}
            <div class="row">
                <div class="col-sm-8 mb-2">
                    <select required id="permission_list" name="permission_list" wire:model.defer="permission_list" class="block mt-1 w-full form-control">
                        <option >CHOOSE ONE</option>
                        @foreach ($array_permissions as $permission)
                        <option value="{{ $permission['name'] }}">{{ $permission['name'] }}</option>
                        @endforeach
                    </select>
                    <x-jet-input-error for="permission_list" class="mt-2" />
                </div>
                <div class="col-sm-4 mb-2">
                    <div class="input-group-append">
                        <button class="btn btn-info block mt-1 w-full form-control" type="button" wire:click.prevent="addPermissionUser()" >ADD NEW</button>
                      </div>
                </div>

                <div class="col-sm-12 mb-2">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-title mb-2">User Permission List ({{ $self_permissions['count'] }})</div>
                            <ul class="list-unstyled list-unstyled-border list-unstyled-noborder mb-0">
                                @foreach ($self_permissions['data'] as $permission)
                                <li class="media">
                                    <div class="media-body ml-3">
                                    <div class="media-title">{{ $permission['name'] }}</div>
                                    <div class="text-small text-muted">Added At {{ $permission['updated_at'] }} </i></div>
                                    </div>
                                    <a href="#" wire:click.prevent="removePermissionUser({{ $permission['id'] }})"> <i class="fas fa-trash-alt" ></i></a>
                                </li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
