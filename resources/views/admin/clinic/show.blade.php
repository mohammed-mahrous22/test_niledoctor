<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200" >
                    this is clinic-{{ $clinic->name  }} view which located in {{ $clinic->address ?? '' }} and this clinic was created at {{ $clinic->created_at ?? '' }}
                </div>


            </div>


        </div>


    </div>
</x-app-layout>
