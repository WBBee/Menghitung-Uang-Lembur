<div>
    @include('livewire.end-point.modal.employe.modal-create-employe')
    @if ($confirmingOpenEditEmployeModal)
        @include('livewire.end-point.modal.employe.modal-edit-employe')
    @endif
    <x-data-table :data="$data" :model="$employees">
        <x-slot name="title">
            Employees Data
        </x-slot>
        <x-slot name="components">
            <a class="btn btn-sm btn-info " href="#" wire:click="$toggle('confirmingOpenCreateEmployeModal')" data-toggle="tooltip" title="Create">
                <i class="fas fa-plus-square" aria-hidden="true"></i> <span class="hidden-xs hidden-sm">Create</span><span class="hidden-xs hidden-sm hidden-md"> New Employe</span>
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
                <th class="{{ $class }}">status id</th>
                <th class="{{ $class }}">status name</th>
                <th class="{{ $class }}"><a wire:click.prevent="sortBy('salary')" role="button" href="#">
                    salary
                    @include('components.sort-icon', ['field' => 'salary'])
                </a></th>
                <th class="{{ $class }}">Action</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($employees as $employe)
                <tr>
                    <td class="{{ $class }}">{{ $employe->id }}</td>
                    <td class="{{ $class }}">{{ $employe->name }}</td>
                    <td class="{{ $class }}">{{ $employe->reference->id }}</td>
                    <td class="{{ $class }}">{{ $employe->reference->name }}</td>
                    <td class="{{ $class }}">@php
                        echo currency_format($employe->salary);
                    @endphp </td>
                    <td class="{{ $class }} ">
                        <a class="btn btn-sm btn-success " href="{{ route('endpoint.overtimes.user', $employe->id) }}" data-toggle="tooltip" title="Show">
                            <i class="fas fa-eye" aria-hidden="true"></i> <span class="hidden-xs hidden-sm">Show</span><span class="hidden-xs hidden-sm hidden-md"> User</span>
                        </a>
                        <a class="btn btn-sm btn-info " href="#" wire:click.prevent="showModalEditEmploye({{$employe->id}})"  data-toggle="tooltip" title="Edit Employe">
                            <i class="fas fa-pencil-alt" aria-hidden="true"></i> <span class="hidden-xs hidden-sm">Edit</span><span class="hidden-xs hidden-sm hidden-md"> Employe</span>
                        </a>
                        {{-- <a class="btn btn-danger btn-sm " href="#" wire:click="showUserDeletionModal({{$employe->id}})" data-toggle="tooltip" title="Delete Employe">
                            <i class="fas fa-trash-alt" aria-hidden="true"></i> <span class="hidden-xs hidden-sm">Delete</span><span class="hidden-xs hidden-sm hidden-md"></span>
                        </a> --}}
                    </td>
                </tr>
            @endforeach

        </x-slot>
    </x-data-table>
</div>
