<div>
    <div class="row form-group col-span-6 sm:col-span-5">

        <div class="col-sm-6 mb-2">
            {{ __('User Has Permission. ') }}
            <div class="row ">
                <div class="col-sm-12 mb-2">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-title mb-2">User Has Permission ( {{ $permission->name }} ) - ({{ $users_has_permission->count() }})</div>
                            <ul class="list-unstyled list-unstyled-border list-unstyled-noborder mb-0">
                                @foreach ($users_has_permission as $user)
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
            {{ __('Role Has Permission. ') }}
            <div class="row">

                <div class="col-sm-12 mb-2">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-title mb-2">Role Permission List ({{ $role_has_permission->count() }})</div>
                            <ul class="list-unstyled list-unstyled-border list-unstyled-noborder mb-0">
                                @foreach ($role_has_permission as $permission)
                                <li class="media">
                                    <div class="media-body ml-3">
                                        <div class="media-title">{{ $permission->name }}</div>
                                        <div class="text-small text-muted">Added At {{ $permission->updated_at }} </i></div>
                                    </div>
                                    <a href="#" wire:click.prevent="removePermissionRole({{ $permission->id }})"> <i class="fas fa-trash-alt" ></i></a>
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
