<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Management - Access') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a>Account</a></div>
                <div class="breadcrumb-item"><a >Management</a></div>
                <div class="breadcrumb-item"><a href="{{ route('access') }}">Management - Access</a></div>
            </div>
    </x-slot>

    <div>
        <div class="row">
            <div class="col-12">
                <livewire:management.access.create-access />
            </div>
            <div class="col-12">
                <livewire:management.access.role.roles-data-table name="roles" :model="$roles"/>
            </div>
            <div class="col-12">
                <livewire:management.access.permission.permissions-data-table name="permissions" :model="$permissions"/>

            </div>
        </div>
    </div>
</x-app-layout>
