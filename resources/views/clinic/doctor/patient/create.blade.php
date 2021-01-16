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
                        <form method="POST" action="{{ route('patients.store') }}">
                            @csrf
                            <h6 class="pl-2 ml-9 mt-4 border rounded-md shadow-md border-opacity-50 bg-indigo-100 border-indigo-300 w-max p-5" >
                                Patient Information
                            </h6>
                            <x-container class='border mx-9 mb-9 mt-3 p-3'>

                                <div class=" mt-4 flex flex-row flex-wrap w-full justify-around max-w-7xl">
                                    <div>
                                        <x-label for="name" :value="__('Patient Name')" />
                                        <x-input id="name" class="block mt-1  readonly: bg-gray-200 sm:w-60 lg:w-96 " type="text" name="name" :value=" old('name', $patient->name ??  $appointment->patient_name ) " required readonly />

                                    </div>
                                    <div >
                                        <x-label for="address" :value="__('Patient Address')" />
                                        <x-input id="address" class="block mt-1 readonly: border-transparent readonly: bg-gray-200 sm:w-60 lg:w-96 " type="text" name="address" :value=" old('address', $patient->address ??  $appointment->patient_address) " readonly required />

                                    </div>
                                </div>
                                <div class="flex flex-row w-full flex-wrap justify-around max-w-7xl">
                                    <div class="mt-4 ">
                                        <x-label for="age" :value="__('Patient Age')" />

                                        <x-input id="age" class="block mt-1 readonly: bg-gray-200 sm:w-60 lg:w-96" type="number" name="age" :value=" old('age', $patient->age ??  $appointment->patient_age ) " readonly required />
                                    </div>
                                    <div class="mt-4">
                                        <x-label for="phone" :value="__('Patient Phone')" />

                                        <x-input id="phone" class="block mt-1 readonly: bg-gray-200 sm:w-60 lg:w-96" type="text" name="phone" :value=" old('phone', $patient->phone ??  $appointment->patient_phone ) " readonly required />
                                    </div>
                                </div>
                                <div class="flex flex-row w-full flex-wrap justify-around max-w-7xl">
                                    <div class="mt-4 pl-0">
                                        <x-label for="weight" :value="__('Patient Weight')" />

                                        <x-input id="weight" class="block mt-1 sm:w-60 lg:w-96" type="text" name="weight" :value=" old('weight', $patient->weight ?? '') " required />
                                    </div>
                                    <div class="mt-4 mb-4 pb-4">
                                        <x-label for="BP" :value="__('Patient B-P')" />

                                        <x-input id="BP" class="block mt-1 sm:w-60 lg:w-96" type="text" name="BP" :value=" old('BP')?? $patient->BP ?? '' " required />
                                    </div>
                                </div>

                            </x-container>

                            <h6 class="pl-2 ml-9 border rounded-md shadow-md border-opacity-50 bg-indigo-100 border-indigo-300 w-max p-5" >
                                Patient lab-values
                            </h6>

                            <x-container class=' flex flex-row flex-wrap justify-between border mx-9 mb-9 mt-3 p-3'>
                                <x-container class=' bg-gray-400 flex flex-col flex-wrap justify-around border mx-9 mb-9 mt-3 p-3'>
                                    <p class='font-semibold text-black'>
                                        Complete Blood Count
                                    </p>
                                    <br>
                                    <p class='font-semibold text-black'>
                                        Data Lab Drawn :
                                    </p>
                                    <div class="mt-1 mb-1 pb-2 px-2">
                                        <x-label for="HG" :value="__('Homoglobin (g/di)')" />

                                        <x-input id="HG" class="block mt-1 sm:w-60 lg:w-60" type="text" name="HG" :value=" old('HG', $patient->HG ?? '') "  />
                                    </div>
                                    <div class="mt-1 mb-1 pb-2 px-2">
                                        <x-label for="HC" :value="__('Hematocrit (%)')" />

                                        <x-input id="HC" class="block mt-1 sm:w-60 lg:w-60" type="text" name="HC" :value=" old('HC', $patient->HC ?? '') "  />
                                    </div>
                                    <div class="mt-1 mb-1 pb-2 px-2">
                                        <x-label for="platelet" :value="__('Platelet count (/cmm)')" />

                                        <x-input id="platelet" class="block mt-1 sm:w-60 lg:w-60" type="text" name="platelet" :value=" old('platelet', $patient->platelet ?? '') "  />
                                    </div>

                                </x-container>
                                <x-container class=' bg-gray-400 flex flex-col flex-wrap justify-around border mx-9 mb-9 mt-3 p-3'>
                                    <p class='font-semibold text-black'>
                                        Diabetes
                                    </p>
                                    <br>
                                    <p class='font-semibold text-black'>
                                        Data Lab Drawn :
                                    </p>
                                    <div class="mt-1 mb-1 pb-2 px-2">
                                        <x-label for="FPG" :value="__('FPG( mg/di )')" />

                                        <x-input id="FPG" class="block mt-1 sm:w-60 lg:w-60" type="text" name="FPG" :value=" old('FPG', $patient->FPG ?? '') "  />
                                    </div>
                                    <div class="mt-1 mb-1 pb-2 px-2">
                                        <x-label for="PPG" :value="__('PPG( mg/di)')" />

                                        <x-input id="PPG" class="block mt-1 sm:w-60 lg:w-60" type="text" name="PPG" :value=" old('PPG', $patient->PPG ?? '') "  />
                                    </div>
                                    <div class="mt-1 mb-1 pb-2 px-2">
                                        <x-label for="HbA" :value="__('HbA (%)')" />

                                        <x-input id="HbA" class="block mt-1 sm:w-60 lg:w-60" type="text" name="HbA" :value=" old('HbA', $patient->HbA ?? '') "  />
                                    </div>
                                </x-container>
                                <x-container class=' bg-gray-400 flex flex-col flex-wrap justify-around border mx-9 mb-9 mt-3 p-3'>
                                    <p class='font-semibold text-black'>
                                        Lipid Profile
                                    </p>
                                    <br>
                                    <p class='font-semibold text-black'>
                                        Data Lab Drawn :
                                    </p>
                                    <div class="mt-1 mb-1 pb-2 px-2">
                                        <x-label for="TC" :value="__('TC( mg/di )')" />

                                        <x-input id="TC" class="block mt-1 sm:w-60 lg:w-60" type="text" name="TC" :value=" old('TC', $patient->TC ?? '' ) "  />
                                    </div>
                                    <div class="mt-1 mb-1 pb-2 px-2">
                                        <x-label for="LDL" :value="__('LDL( mg/di )')" />

                                        <x-input id="LDL" class="block mt-1 sm:w-60 lg:w-60" type="text" name="LDL" :value=" old('LDL', $patient->LDL ?? '' ) "  />
                                    </div>
                                    <div class="mt-1 mb-1 pb-2 px-2">
                                        <x-label for="HDL" :value="__('HDL( mg/di )')" />

                                        <x-input id="HDL" class="block mt-1 sm:w-60 lg:w-60" type="text" name="HDL" :value=" old('HDL', $patient->HDL ?? '' ) "  />
                                    </div>
                                    <div class="mt-1 mb-1 pb-2 px-2">
                                        <x-label for="TG" :value="__('TG( mg/di )')" />

                                        <x-input id="TG" class="block mt-1 sm:w-60 lg:w-60" type="text" name="TG" :value=" old('TG', $patient->TG ?? '' ) "  />
                                    </div>
                                </x-container>
                            </x-container>

                            <h6 class="pl-2 ml-9 border rounded-md shadow-md border-opacity-50 bg-indigo-100 border-indigo-300 w-max p-5" >
                                Patient Medical History
                            </h6>

                            <x-container class='border mx-9 mb-9 mt-3 p-3' >
                                <div class="mt-8  my-3">
                                    <x-label for="history" :value="__('Medical History')" />

                                    <x-textarea class=" sm:w-9/12 lg:w-full" name="medical_history" id="medical_history" cols="40" rows="10" >
                                        {{ old('medical_history')?? $patient->medical_history ?? "" }}
                                    </x-textarea>
                                </div>
                            </x-container>

                            <h6 class="pl-2 ml-9 border rounded-md shadow-md border-opacity-50 bg-indigo-100 border-indigo-300 w-max p-5" >
                                Patient Diagnoses & Treatment
                            </h6>
                            <x-container class='border mx-9 mb-9 mt-3 p-3'>
                            <div class="flex flex-row align-middle w-full flex-wrap justify-around max-w-7xl">
                                <div class="mt-8 my-3 ">
                                    <x-label for="diagnoses" :value="__('Diagnoses')" />

                                    <x-textarea class=" sm:w-9/12  lg:w-full " name="diagnoses" id="diagnoses" cols="40" rows="10" >
                                        {{ old('diagnoses')?? $patient->diagnoses ?? "" }}
                                    </x-textarea>
                                </div>
                                <div class="mt-8  my-3">
                                    <x-label for="treatment" :value="__('Treatment')" />

                                    <x-textarea class=" sm:w-9/12 lg:w-full" name="treatment" id="treatment" cols="40" rows="10" >
                                        {{old('treatment')??$patient->treatment?? "" }}
                                    </x-textarea>
                                </div>
                            </div>
                        </x-container>

                                <x-button class="ml-4">
                                    <input type="hidden" name="appoint_id" value={{ $appointment->id }}>
                                    {{ __('confirm') }}
                                </x-button>
                            </div>
                        </form>





                </div>


            </div>


        </div>


    </div>
</x-app-layout>
