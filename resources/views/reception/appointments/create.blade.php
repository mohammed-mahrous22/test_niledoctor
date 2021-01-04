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

                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                        @if (Session::has('message'))
                        <div class="alert alert-success">
                            <p>
                                {{ Session::get('message') ?? '' }}
                            </p>
                        </div>
                        @endif
                        <form method="POST" action="{{ route('appointments.store') }}">
                            @csrf
                            <div>
                                <x-label for="patient_name" :value="__('Patient Name')" />
                                <x-input id="patient_name" class="block mt-1 w-full" type="text" name="patient_name" :value="old('patient_name')" required autofocus />
                            </div>
                            <div class="mt-4">
                                <x-label for="patient_address" :value="__('Patient Address')" />
                                <x-input id="patient_address" class="block mt-1 w-full" type="text" name="patient_address" :value="old('patient_address')" required />
                            </div>
                            <div class="mt-4">
                                <x-label for="patient_age" :value="__('Patient Age')" />
                                <x-input id="patient_age" class="block mt-1 w-full" type="text" name="patient_age" :value="old('patient_age')" required />
                            </div>
                            <div class="mt-4">
                                <x-label for="patient_phone" :value="__('Patient Phone')" />
                                <x-input id="patient_phone" class="block mt-1 w-full" type="text" name="patient_phone" :value="old('patient_phone')" required />
                            </div>
                            <div>
                                <x-label for="price" :value="__('price')" />
                                <x-input id="price" class="block mt-1 w-1/3" type="number" name="price" :value="old('price')" required />
                            </div>
                            <div class="mt-4 flex-row flex">
                                <div class='flex flex-col mt-4 w-2/4 '>
                                    <x-label for="date" :value="__('Date')" />
                                    <small class='text-gray-800 text-opacity-70 pl-4 ' > @example: 07-22-2021 </small>
                                    <x-input id="date" class="block mt-1" type="date" name="date" :value="old('date')" required />
                                </div>
                                <div class="flex flex-col mt-4 w-2/4" >
                                    <x-label for="time" :value="__('Time')" />
                                    <small class='text-gray-800 text-opacity-70 pl-4 ' > @example: 04:20 AM </small>
                                    <x-input id="time" class="block mt-1 " type="time" name="time" :value=" old('time') " required />
                                </div>
                            </div>
                            </div>
                            <div class="mt-4">
                                <x-label for="doctor_id" :value="__('doctor')" />
                                <select class=" rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full " name="doctor_id" id="doctor_id" required>
                                    <option selected value="{{ old('doctor->id') ?? 'select doctor' }}"> {{ old('doctor->name') ?? 'select doctor' }} </option>
                                    @foreach ($specs as $spec)
                                    <optgroup label="{{ $spec->sympol }}">
                                        @foreach ($spec->doctors as $doctor)
                                        <option value="{{ old($doctor->id) ?? $doctor->id }}">{{ old($doctor->name) ?? $doctor->name }}</option>
                                        @endforeach
                                      </optgroup>
                                    @endforeach
                                </select>
                            </div>
                            <div class="flex items-center justify-end mt-4">
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
