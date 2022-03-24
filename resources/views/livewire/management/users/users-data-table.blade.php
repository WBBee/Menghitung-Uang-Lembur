<div>
    {{-- @include('livewire.management.modal.user.modal-create-user') --}}
    {{-- @include('livewire.management.modal.user.modal-edit-user') --}}
    <x-data-table :data="$data" :model="$users">
        <x-slot name="title">
            Users Data
        </x-slot>
        <x-slot name="components">
            <a class="btn btn-sm btn-info " href="#" wire:click="$toggle('confirmingOpenCreateuserModal')" data-toggle="tooltip" title="Create">
                <i class="fas fa-plus-square" aria-hidden="true"></i> <span class="hidden-xs hidden-sm">Create</span><span class="hidden-xs hidden-sm hidden-md"> New User</span>
            </a>
        </x-slot>
        <x-slot name="head">
            <tr>
                <th class="{{ $class }}"><a wire:click.prevent="sortBy('id')" role="button" href="#">
                    ID
                    @include('components.sort-icon', ['field' => 'id'])
                </a></th>
                <th class="{{ $class }}"><a wire:click.prevent="sortBy('name')" role="button" href="#">
                    Name
                    @include('components.sort-icon', ['field' => 'name'])
                </a></th>
                <th class="{{ $class }}">Roles</th>
                <th class="{{ $class }}">Permissions</th>
                <th class="{{ $class }}">Action</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($users as $user)
                <tr>
                    <th scope="row" {{ $class }}>{{ $loop->iteration }}</th>
                    <td class="{{ $class }}">{{ $user->name }}</td>
                    <td class="text-center">
                        @foreach ($user->getRoleNames() as $role)
                            @if ($role == "admin")
                                <span class="badge badge-warning m-1">{{ $role }}</span>
                            @elseif ($role == "seller")
                                <span class="badge badge-info m-1">{{ $role }}</span>
                            @elseif ($role == "super-admin")
                                <span class="badge badge-danger m-1">{{ $role }}</span>
                            @endif
                        @endforeach
                    </td>
                    <td class="text-center">
                        @foreach ($user->getPermissionNames() as $permission)
                            <span class="badge badge-primary m-1">{{ $permission }}</span>
                        @endforeach
                    </td>
                    <td class="{{ $class }}">
                        <a class="btn btn-sm btn-success " href="#" data-toggle="tooltip" title="Show">
                            <i class="fas fa-eye" aria-hidden="true"></i> <span class="hidden-xs hidden-sm">Show</span><span class="hidden-xs hidden-sm hidden-md"> User</span>
                        </a>
                        @can('edit users')
                        <a class="btn btn-sm btn-info " href="{{ route('users.edit', $user->id ) }}" data-toggle="tooltip" title="Edit user">
                            <i class="fas fa-pencil-alt" aria-hidden="true"></i> <span class="hidden-xs hidden-sm">Edit</span><span class="hidden-xs hidden-sm hidden-md"> user</span>
                        </a>
                        @endcan
                        {{-- <a class="btn btn-danger btn-sm " href="#" wire:click="showUserDeletionModal({{$user->id}})" data-toggle="tooltip" title="Delete user">
                            <i class="fas fa-trash-alt" aria-hidden="true"></i> <span class="hidden-xs hidden-sm">Delete</span><span class="hidden-xs hidden-sm hidden-md"></span>
                        </a> --}}
                    </td>
                </tr>
            @endforeach

        </x-slot>
    </x-data-table>
</div>
