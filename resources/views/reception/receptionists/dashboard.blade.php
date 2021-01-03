<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>

                <div class="felx flex-row justify-evenly">
                    <div class="container mx-auto pl-3 bg-gray-100 rounded-md p-3  ">
                        <table class='content-between justify-items-auto flex flex-col '>
                            <tr class="flex flex-row justify-between border-solid border border-opacity-20 border-black my-auto py-2" >
                                <th scope="col" class='px-3 mx-3 pr-1' >name</th>
                                <th scope="col" class="mx-3 pr-1" >date</th>
                                <th scope="col" class="mx-3 pr-1" >time</th>
                                <th scope="col" class="mx-3 pr-1" >action</th>

                            </tr>
                            @foreach ($appointments as $appointment)
                            <tr class="flex border-solid border justify-between border-opacity-20 border-black my-auto py-2" >

                                <div class='flex-row justify-between ' >
                                    <div class= >
                                        <td class='px-3 mx-3'>  {{ $appointment->patient_name  }} </td>
                                    </div>
                                    <div class='px-3 mx-3'>
                                        <td class='px-3 mx-3'>  {{  $appointment->date  }} </td>
                                    </div>
                                    <div class='px-3 mx-3'>
                                        <td class='px-3 mx-3'>  {{  $appointment->time  }} </td>
                                    </div>
                                    <div class='px-3 mx-3'>
                                        <td >
                                            <div class='flex-row flex-auto d-flex '>
                                                <a class='bg-blue-800 p-1 text-yellow-50 hover:bg-blue-400 hover:text-yellow-50  mx-2 ' href="{{ route('appointments.show',[$appointment]) }}"> show </a>
                                                    <form action="{{ route('appointments.destroy',[$appointment]) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class='bg-red-800 p-1 hover:bg-red-400 h text-white mx-2 ' type="submit"> delete </button>
                                                    </form>


                                                <a class='bg-green-100 p-1 hover:bg-green-200 mx-2' href="{{ route('appointments.edit',[$appointment]) }}"> edit </a>

                                            </div>
                                        </td>
                                    </div>

                                </div>



                                @endforeach

                            </tr>
                            <div class="mx-2 my-2 p-2">
                                {{ $appointments->links() }}
                            </div>
                            <a class='bg-blue-600 text-yellow-50 p-1 hover:bg-blue-400 hover:text-yellow-50 mx-2 ' href="{{ route('appointments.create') }}"> new appointment </a>
                        </table>



                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
