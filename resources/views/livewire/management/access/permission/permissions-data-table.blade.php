<div>
    <x-data-table :data="$data" :model="$permissions">
        <x-slot name="title">
            Permissions Data
        </x-slot>
        <x-slot name="components">
            {{-- <a class="btn btn-sm btn-info " href="#" wire:click="$toggle('confirmingOpenCreatepermissionModal')" data-toggle="tooltip" title="Create">
                <i class="fas fa-plus-square" aria-hidden="true"></i> <span class="hidden-xs hidden-sm">Create</span><span class="hidden-xs hidden-sm hidden-md"> New Permission</span>
            </a> --}}
        </x-slot>
        <x-slot name="head">
            <tr>
                <th class="{{ $class }}"><a wire:click.prevent="sortBy('id')" permission="button" href="#">
                    ID
                    @include('components.sort-icon', ['field' => 'id'])
                </a></th>
                <th class="{{ $class }}"><a wire:click.prevent="sortBy('name')" permission="button" href="#">
                    Name
                    @include('components.sort-icon', ['field' => 'name'])
                </a></th>
                <th class="{{ $class }}"><a permission="button" >
                    Usage
                </a></th>
                <th class="{{ $class }}"><a wire:click.prevent="sortBy('guard_name')" permission="button" href="#">
                    Guard name
                    @include('components.sort-icon', ['field' => 'guard_name'])
                </a></th>
                <th class="{{ $class }}">Action</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($permissions as $permission)
                <tr>
                    <th scope="row" {{ $class }}>{{ $loop->iteration }}</th>
                    <td class="{{ $class }}">
                        <span class="badge badge-info">{{ $permission->name }}</span>
                    </td>
                    <td class="{{ $class }}">
                        <span class="badge badge-info">
                            @php
                                echo count($permission->users);
                            @endphp
                            User
                        </span>
                        <span class="badge badge-secondary">
                            @php
                                echo count($permission->roles);
                            @endphp
                            Role
                        </span>
                    </td>
                    <td class="{{ $class }}">{{ $permission->guard_name }}</td>
                    <td class="{{ $class }}">
                        {{-- <a class="btn btn-sm btn-success " href="#" data-toggle="tooltip" title="Show">
                            <i class="fas fa-eye" aria-hidden="true"></i> <span class="hidden-xs hidden-sm">Show</span><span class="hidden-xs hidden-sm hidden-md"> permission</span>
                        </a> --}}
                        <a class="btn btn-sm btn-info " href="{{ route('access.permission.edit', $permission->id) }}"  data-toggle="tooltip" title="Edit permission">
                            <i class="fas fa-pencil-alt" aria-hidden="true"></i> <span class="hidden-xs hidden-sm">Edit</span><span class="hidden-xs hidden-sm hidden-md"> permission</span>
                        </a>
                        <a class="btn btn-danger btn-sm " href="#" wire:click="deletePermission({{$permission->id}})" data-toggle="tooltip" title="Delete permission">
                            <i class="fas fa-trash-alt" aria-hidden="true"></i> <span class="hidden-xs hidden-sm">Delete</span><span class="hidden-xs hidden-sm hidden-md"> permission</span>
                        </a>
                    </td>
                </tr>
            @endforeach

        </x-slot>
    </x-data-table>
</div>
