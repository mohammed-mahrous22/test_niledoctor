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

                <div class="felx flex-row">
                    <div class="container mx-auto pl-3 bg-gray-100 rounded-md p-3  ">
                        <table class='content-between justify-items-auto flex flex-col '>
                            <tr class="flex flex-row justify-between border-solid border border-opacity-20 border-black my-auto py-2" >
                                <th scope="col" class='px-3 mx-3 pr-1' >name</th>
                                <th scope="col" class="mx-3 pr-10" >date</th>
                                <th scope="col" class="mx-3 pr-10" >time</th>
                                <th scope="col" class="mx-3 pr-10" >status</th>
                                <th scope="col" class="mx-3 pr-10" >delayed to</th>
                                <th scope="col" class="mx-3 pr-5" >action</th>

                            </tr>
                            @foreach ($appointments as $appointment)
                            <tr class="flex border-solid border justify-between align-bottom border-opacity-20 border-black my-auto py-2" >

                                <div class='flex-row ' >
                                    <div class= >
                                        <td class=''>  {{$appointment->patient_name}} </td>
                                    </div>
                                    <div class=''>
                                        <td class='px-3 mx-3'>  {{$appointment->date}} </td>
                                    </div>
                                    <div class=''>
                                        <td class='px-3 mx-3'>  {{$appointment->time}} </td>
                                    </div>
                                    <div class=''>
                                        <td class='px-3 mx-3'>  {{$appointment->status}} </td>
                                    </div>
                                    <div class=''>
                                        <td class='px-3 mx-3'>  {{  $appointment->delayed_to ?? "not delayed"  }} </td>
                                    </div>
                                    <div class=''>
                                        <td >
                                            <div class='flex-col flex '>
                                                <form action="{{ route('appointment.postpone',$appointment)}}" method= "POST">
                                                    <div class="flex flex-row  ">
                                                        <button class=' p-0 m-2 bg-green-400  hover:bg-green-600 hover:text-gray-100 ' type="submit" > postpone </button>
                                                        <div class="flex flex-col ">
                                                            <small class="p-0 ml-4" >days</small>
                                                           <input id="days" class="inline w-16 h-8 p-2  m-2" type="number" name="days" required />
                                                        </div>
                                                    </div>
                                                </form>
                                                <div class="flex flex-row">
                                                    <a class='bg-blue-600 p-3 m-2 text-yellow-50 hover:bg-blue-800 hover:text-yellow-50  ' href="{{ route('appointment.start',$appointment) }}"> start </a>
                                                    <form action="{{ route('appointment.cancel',$appointment) }}" method="POST">
                                                        @csrf
                                                        <button class=' p-3 m-2 bg-red-600  hover:bg-red-900  text-white ' type="submit"> cancel </button>
                                                    </form>
                                                </div>



                                                {{-- <button class='bg-red-400 p-1 hover:bg-red-300 h text-white mx-2 ' type="submit"> postpone </button> --}}

                                            </div>
                                        </td>
                                    </div>

                                </div>



                                @endforeach

                            </tr>
                            <div class="mx-2 my-2 p-2">
                                {{ $appointments->links() }}
                            </div>
                            {{-- <a class='bg-blue-600 text-yellow-50 p-1 hover:bg-blue-400 hover:text-yellow-50 mx-2 ' href="{{ route('appointments.create') }}"> new appointment </a> --}}
                        </table>



                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
