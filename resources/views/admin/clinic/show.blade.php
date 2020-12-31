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
                    this is clinic-{{ $clinic->name ?? ''  }} view which located in {{ $clinic->address ?? '' }} and this clinic was created at {{ $clinic->created_at ?? '' }}


                </div>

                <div class=" flex flex-row justify-center justify-items-stretch">
                    <div class="felx flex-row justify-evenly">
                        <div class="container mx-auto pl-3 bg-gray-100 rounded-md p-3  ">
                            <table class='content-between justify-items-auto flex flex-col '>
                                <tr class="flex flex-row justify-evenly border-solid border border-opacity-20 border-black my-auto py-2" >
                                    <th scope="col" class='ml-3' >name</th>
                                    <th scope="col" class="ml-3" >speciality</th>
                                    <th scope="col" class="ml-3 pr-1" >action</th>

                                </tr>
                                @foreach ($doctors as $doctor)
                                <tr class="flex border-solid border justify-between border-opacity-20 border-black my-auto py-2" >

                                    <div class='flex-row justify-between ' >
                                        <div class="ml-3 pl-0 justify-self-start" >
                                            <td>  {{ $doctor->name  }} </td>
                                        </div>
                                        <div class=' ml-3 pl-0 justify-self-center'>
                                            <td>  {{  $doctor->speciality->sympol  }} </td>
                                        </div>
                                        <div class=' ml-3 pl-0 justify-self-end'>
                                            <td >
                                                <div class='flex-row flex-auto d-flex '>
                                                    <a class='bg-blue-400 p-1 text-yellow-50 hover:bg-blue-300 hover:text-yellow-50  mx-2 ' href="{{ route('admin.clinics.doctors.show',[$doctor]) }}"> show </a>
                                                        <form action="{{ route('admin.clinics.doctors.destroy',[$doctor]) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class='bg-red-400 p-1 hover:bg-red-300 h text-white mx-2 ' type="submit"> delete </button>
                                                        </form>


                                                    <a class='bg-green-100 p-1 hover:bg-green-200 mx-2' href="{{ route('admin.clinics.doctors.edit',[$doctor]) }}"> edit </a>

                                                </div>
                                            </td>
                                        </div>

                                    </div>



                                    @endforeach

                                </tr>

                                <a class='bg-blue-600 text-yellow-50 p-1 hover:bg-blue-400 hover:text-yellow-50 mx-2 ' href="{{ route('admin.clinics.doctors.create') }}"> new doctor </a>
                            </table>
                            <div class="mx-2 my-2 p-2">
                                {{ $doctors->links() }}
                            </div>


                        </div>
                    </div>
                    <div class="felx flex-row justify-around">
                        <div class="container mx-auto pl-3 bg-gray-100 rounded-md p-3  ">
                            <table class='content-between justify-items-auto flex flex-col '>
                                <tr class="flex flex-row justify-between border-solid border border-opacity-20 border-black my-auto py-2" >
                                    <th scope="col" class='ml-3' >name</th>
                                    <th scope="col" class="ml-3" >phone</th>
                                    <th scope="col" class="ml-3 pr-1" >action</th>

                                </tr>
                                @foreach ($receptionists as $receptionist)
                                <tr class="flex border-solid border justify-between border-opacity-20 border-black my-auto py-2" >

                                    <div class='flex-row justify-between ' >
                                        <div class="ml-3 pl-0 justify-self-start" >
                                            <td>  {{ $receptionist->name  }} </td>
                                        </div>
                                        <div class=' ml-3 pl-0 justify-self-center'>
                                            <td>  {{  $receptionist->phone_number  }} </td>
                                        </div>
                                        <div class=' ml-3 pl-0 justify-self-end'>
                                            <td >
                                                <div class='flex-row flex-auto d-flex '>
                                                    <a class='bg-blue-400 p-1 text-yellow-50 hover:bg-blue-300 hover:text-yellow-50  mx-2 ' href="{{ route('admin.clinics.receptionists.show',[$receptionist]) }}"> show </a>
                                                        <form action="{{ route('admin.clinics.receptionists.destroy',[$receptionist]) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class='bg-red-400 p-1 hover:bg-red-300 h text-white mx-2 ' type="submit"> delete </button>
                                                        </form>


                                                    <a class='bg-green-100 p-1 hover:bg-green-200 mx-2' href="{{ route('admin.clinics.receptionists.edit',[$receptionist]) }}"> edit </a>

                                                </div>
                                            </td>
                                        </div>

                                    </div>



                                    @endforeach

                                </tr>

                                <a class='bg-blue-600 text-yellow-50 p-1 hover:bg-blue-400 hover:text-yellow-50 mx-2 ' href="{{ route('admin.clinics.receptionists.create') }}"> new receptionist </a>
                            </table>

                            <div class="mx-2 my-2 p-2">
                                {{ $receptionists->links() }}
                            </div>


                        </div>
                    </div>
                </div>
            </div>


        </div>


    </div>
</x-app-layout>
