@props([
    'sidebar' => false,
])

@if($sidebar)
    <flux:sidebar.brand :name="config('app.name', 'Laravel')" {{ $attributes }}>
        <x-slot name="logo">
            <img
                src="{{ asset('images/logo.png') }}"
                alt="{{ config('app.name', 'Laravel') }}"
                class="size-8 object-contain"
            />
        </x-slot>
    </flux:sidebar.brand>
@else
    <flux:brand :name="config('app.name', 'Laravel')" {{ $attributes }}>
        <x-slot name="logo">
            <img
                src="{{ asset('images/logo.png') }}"
                alt="{{ config('app.name', 'Laravel') }}"
                class="size-8 object-contain"
            />
        </x-slot>
    </flux:brand>
@endif
