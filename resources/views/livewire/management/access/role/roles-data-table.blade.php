<div>
    <x-data-table :data="$data" :model="$roles">
        <x-slot name="title">
            Roles Data
        </x-slot>
        <x-slot name="components">
            {{-- <a class="btn btn-sm btn-info " href="#" wire:click="$toggle('confirmOpenCreateRoleModal')" data-toggle="tooltip" title="Create">
                <i class="fas fa-plus-square" aria-hidden="true"></i> <span class="hidden-xs hidden-sm">Create</span><span class="hidden-xs hidden-sm hidden-md"> New Role</span>
            </a> --}}
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
                <th class="{{ $class }}">Usage</th>
                <th class="{{ $class }}">Permissions</th>
                <th class="{{ $class }}">Action</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($roles as $role)
                <tr>
                    <th scope="row" {{ $class }}>{{ $loop->iteration }}</th>
                    <td class="{{ $class }}">{{ $role->name }}</td>
                    <td class="{{ $class }}">
                        <span class="badge badge-info">
                            @php
                                echo count($role->users);
                            @endphp
                            User
                        </span>
                        <span class="badge badge-secondary">
                            @php
                                echo count($role->permissions);
                            @endphp
                            Permission
                        </span>
                    </td>
                    <td class="{{ $class }}">
                        @foreach ($role->getPermissionNames() as $permission)
                            <span class="badge badge-info">{{ $permission }}</span>
                        @endforeach
                    </td>
                    <td class="{{ $class }}">
                        {{-- <a class="btn btn-sm btn-success " href="#" data-toggle="tooltip" title="Show">
                            <i class="fas fa-eye" aria-hidden="true"></i> <span class="hidden-xs hidden-sm">Show</span><span class="hidden-xs hidden-sm hidden-md"> role</span>
                        </a> --}}
                        <a class="btn btn-sm btn-info " href="{{ route('access.role.edit', $role->id) }}" data-toggle="tooltip" title="Edit role">
                            <i class="fas fa-pencil-alt" aria-hidden="true"></i> <span class="hidden-xs hidden-sm">Edit</span><span class="hidden-xs hidden-sm hidden-md"> role</span>
                        </a>
                        <a class="btn btn-danger btn-sm " href="#" wire:click="deleteRole({{$role->id}})" data-toggle="tooltip" title="Delete role">
                            <i class="fas fa-trash-alt" aria-hidden="true"></i> <span class="hidden-xs hidden-sm">Delete</span><span class="hidden-xs hidden-sm hidden-md"> role</span>
                        </a>
                    </td>
                </tr>
            @endforeach

        </x-slot>
    </x-data-table>
</div>
