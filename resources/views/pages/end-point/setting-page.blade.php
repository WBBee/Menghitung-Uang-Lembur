<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('EndPoint - Setting') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a>Testing</a></div>
                <div class="breadcrumb-item"><a >End Point</a></div>
                <div class="breadcrumb-item"><a href="{{ route('endpoint.settings') }}">EndPoint - Setting</a></div>
            </div>
    </x-slot>

    <div>

        <livewire:end-point.setting/>
    </div>
</x-app-layout>
