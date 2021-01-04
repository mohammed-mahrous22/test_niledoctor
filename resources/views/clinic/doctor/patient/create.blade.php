<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __(' Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class=" bg-white border-b border-gray-200" >



                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                        @if (Session::has('message'))


                        <div class="alert alert-success">
                            <p>
                                {{ Session::get('message') ?? '' }}
                            </p>
                        </div>
                        @endif
                        <form method="POST" action="{{ route('admin.clinics.receptionists.store') }}">
                            @csrf
                            <h6 class="pl-2 ml-9 mt-4 border rounded-md shadow-md border-opacity-50 bg-indigo-100 border-indigo-300 w-max p-5" >
                                Patient Information
                            </h6>
                            <x-container class='border mx-9 mb-9 mt-3 p-3'>

                                <div class=" mt-4 flex flex-row flex-wrap w-full justify-around max-w-7xl">
                                    <div>
                                        <x-label for="name" :value="__('Patient Name')" />
                                        <x-input id="name" class="block mt-1 sm:w-60 lg:w-96 " type="text" name="name" :value="{{ old('name') ?? $patient->name ?? $appointment->patient_name }}" required autofocus />

                                    </div>
                                    <div >
                                        <x-label for="address" :value="__('Patient Address')" />
                                        <x-input id="address" class="block mt-1 sm:w-60 lg:w-96 " type="text" name="address" :value="old('address')" required />

                                    </div>
                                </div>
                                <div class="flex flex-row w-full flex-wrap justify-around max-w-7xl">
                                    <div class="mt-4 ">
                                        <x-label for="age" :value="__('Patient Age')" />

                                        <x-input id="age" class="block mt-1 sm:w-60 lg:w-96" type="number" name="age" :value="old('age')" required />
                                    </div>
                                    <div class="mt-4">
                                        <x-label for="phone" :value="__('Patient Phone')" />

                                        <x-input id="phone" class="block mt-1 sm:w-60 lg:w-96" type="text" name="phone" :value="old('phone')" required />
                                    </div>
                                </div>
                                <div class="flex flex-row w-full flex-wrap justify-around max-w-7xl">
                                    <div class="mt-4 pl-0">
                                        <x-label for="Weight" :value="__('Patient Weight')" />

                                        <x-input id="Weight" class="block mt-1 sm:w-60 lg:w-96" type="text" name="Weight" :value="old('Weight')" required />
                                    </div>
                                    <div class="mt-4 mb-4 pb-4">
                                        <x-label for="BP" :value="__('Patient BP')" />

                                        <x-input id="BP" class="block mt-1 sm:w-60 lg:w-96" type="text" name="BP" :value="old('BP')" required />
                                    </div>
                                </div>

                            </x-container>
                            <h6 class="pl-2 ml-9 border rounded-md shadow-md border-opacity-50 bg-indigo-100 border-indigo-300 w-max p-5" >
                                Patient Diagnoses & Treatment
                            </h6>
                            <x-container class='border mx-9 mb-9 mt-3 p-3'>
                            <div class="flex flex-row align-middle w-full flex-wrap justify-around max-w-7xl">
                                <div class="mt-8 my-3 ">
                                    <x-label for="diagnoses" :value="__('Diagnoses')" />

                                    <x-textarea class=" sm:w-9/12  lg:w-full " name="diagnoses" id="diagnoses" cols="40" rows="10"/>
                                </div>
                                <div class="mt-8  my-3">
                                    <x-label for="treatment" :value="__('Treatment')" />

                                    <x-textarea class=" sm:w-9/12 lg:w-full" name="treatment" id="treatment" cols="40" rows="10"/>
                                </div>
                            </div>
                        </x-container>
                            <!-- Name -->


                            <!-- Email Address -->


                            {{-- <div class="mt-4">
                                <x-label for="phone" :value="__('phone')" />

                                <x-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required />
                            </div>
                            <div class="mt-4"> --}}



                            {{-- </div> --}}


                                {{-- <x-input id="clinic" class="block mt-1 w-full" type="text" name="clinic_id" :value="old('clinic_id')" required /> --}}

                            {{-- <div class="mt-4">
                                <x-input id="clinic" class="block mt-1 w-full" type='hidden' name="user_type" :value="old('clinic_id')" required />
                            </div> --}}
                            <!-- Password -->
                            {{-- <div class="mt-4">
                                <x-label for="password" :value="__('Password')" />

                                <x-input id="password" class="block mt-1 w-full"
                                                type="password"
                                                name="password"
                                                required autocomplete="new-password" />
                            </div> --}}

                            <!-- Confirm Password -->
                            {{-- <div class="mt-4">
                                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                                <x-input id="password_confirmation" class="block mt-1 w-full"
                                                type="password"
                                                name="password_confirmation" required />
                            </div> --}}

                            <div class="flex items-center justify-end mt-4">
                                {{-- <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                                    {{ __('Already registered?') }}
                                </a> --}}

                                <x-button class="ml-4">
                                    {{ __('confirm') }}
                                </x-button>
                            </div>
                        </form>





                </div>


            </div>


        </div>


    </div>
</x-app-layout>
