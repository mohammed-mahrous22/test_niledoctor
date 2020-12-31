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

                    @if (session()->has('message'))
                    <div class="alert alert-success">
                        <p >
                            {{session('message')}}
                        </p>



                    </div>
                    @endif

                    <div class="container bg-blue-100">

                        <div class=" my-auto mx-auto py-2 px-2">this is a create form for clinics </div>

                        <form  class="row g-3" action="{{ route('admin.clinics.clinic.store') }}" method="post">
                         @csrf
                            <div class="col-auto max-w-md">
                              <label for="name" class="">name</label>
                              <input type="text"  class="form-control" id="name" name="name" value="{{ old('clinic->name') }}">
                            </div>
                            <div class="col-auto max-w-xl">
                              <label for="address" class="">address</label>
                              <input type="text" class="form-control" name="address" id="address" value="{{ old('clinic->address') }}">
                            </div>
                            <div class="col-auto mb-0 p-0 mt-5">
                              <button type="submit" class="mx-2 my-0 p-1 bg-blue-900 text-yellow-50 hover:bg-indigo-500  ">Confirm</button>
                            </div>
                        </form>
                    </div>





                </div>


            </div>


        </div>


    </div>
</x-app-layout>
