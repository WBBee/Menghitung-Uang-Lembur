<div>
    <div class="row form-group col-span-6 sm:col-span-5">

        <div class="col-sm-6 mb-2">
            <div class="row ">
                <div class="col-sm-12 mb-2">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-title mb-2">User Has Role ( {{ $role->name }} ) - ({{ $users_has_role->count() }})</div>
                            <ul class="list-unstyled list-unstyled-border list-unstyled-noborder mb-0">
                                @foreach ($users_has_role as $user)
                                <li class="media">
                                    <div class="media-body ml-3">
                                    <div class="media-title">{{ (String)$user->name }}</div>
                                    <div class="text-small text-muted">{{ $user->email }} </i></div>
                                    </div>
                                    <a href="#" wire:click.prevent="removeUserRole({{ $user->id }})"> <i class="fas fa-trash-alt" ></i></a>
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
                        <button class="btn btn-info block mt-1 w-full form-control" type="button" wire:click.prevent="addPermissionRole()" >ADD NEW</button>
                      </div>
                </div>

                <div class="col-sm-12 mb-2">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-title mb-2">Role Permission List ({{ $role_has_permission['count'] }})</div>
                            <ul class="list-unstyled list-unstyled-border list-unstyled-noborder mb-0">
                                @foreach ($role_has_permission['data'] as $permission)
                                <li class="media">
                                    <div class="media-body ml-3">
                                    <div class="media-title">{{ $permission['name'] }}</div>
                                    <div class="text-small text-muted">Added At {{ $permission['updated_at'] }} </i></div>
                                    </div>
                                    <a href="#" wire:click.prevent="removePermissionRole({{ $permission['id'] }})"> <i class="fas fa-trash-alt" ></i></a>
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
