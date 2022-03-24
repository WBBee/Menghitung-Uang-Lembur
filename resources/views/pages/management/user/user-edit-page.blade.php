<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Management - Users') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a>Account</a></div>
                <div class="breadcrumb-item"><a >Management</a></div>
                <div class="breadcrumb-item"><a href="{{ route('users') }}">Management - Users</a></div>
                <div class="breadcrumb-item"><a >User - Edit</a></div>
            </div>
    </x-slot>

    <div>
        <livewire:management.users.users-edit :id="$id"/>
    </div>
</x-app-layout>
