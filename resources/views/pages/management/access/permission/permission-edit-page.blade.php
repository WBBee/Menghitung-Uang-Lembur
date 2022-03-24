<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Management - Access') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a>Account</a></div>
                <div class="breadcrumb-item"><a >Management</a></div>
                <div class="breadcrumb-item"><a href="{{ route('access') }}">Management - Access</a></div>
                <div class="breadcrumb-item"><a >Access - Edit Permission</a></div>
            </div>
    </x-slot>

    <div>
        <livewire:management.access.permission.permissions-edit :id="$id"/>
    </div>
</x-app-layout>
