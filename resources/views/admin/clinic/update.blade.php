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

                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    @if (Session::has('message'))


                    <div class="alert alert-success">
                        <p>
                            {{ Session::get('message') ?? '' }}
                        </p>
                    </div>
                    @endif
                    <form method="POST" action="{{ route('admin.clinics.clinic.update',[$clinic]) }}">
                        @csrf

                        <!-- Name -->
                        <div>
                            <x-label for="name" :value="__('Name')" />

                            <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value=" old('name', $clinic->name ) " required autofocus />
                        </div>

                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-label for="email" :value="__('Email')" />

                            <x-input id="email" class="block mt-1 w-full" type="text" name="address" :value="old('email', $clinic->address)" required />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            {{-- <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                                {{ __('Already registered?') }}
                            </a> --}}

                            <x-button class="ml-4">
                                {{ __('update clinic') }}
                            </x-button>
                        </div>
                    </form>



                </div>


            </div>


        </div>


    </div>
</x-app-layout>
