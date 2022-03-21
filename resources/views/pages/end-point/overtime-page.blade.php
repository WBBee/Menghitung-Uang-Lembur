<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('EndPoint - Overtime') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a>Testing</a></div>
                <div class="breadcrumb-item"><a >End Point</a></div>
                <div class="breadcrumb-item"><a {{ route('endpoint.employees') }}>End Point - Employe</a></div>
                <div class="breadcrumb-item"><a >Employe - Overtime</a></div>
            </div>
    </x-slot>

    <div>
        <livewire:end-point.overtime :uid="$uid"/>
    </div>
</x-app-layout>
