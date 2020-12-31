<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in as admin
                </div>
                @if (session()->has('delete'))
                    <div class="alert alert-success">
                        <p  >
                            {{session('delete')}}
                        </p>



                    </div>
                    @endif

            </div>

            <div class="container mx-auto pl-3 bg-gray-100 rounded-md p-3  ">
                <table class='content-between justify-items-auto flex flex-col '>
                    <tr class="flex flex-row justify-between border-solid border border-opacity-20 border-black my-auto py-2" >
                        <th scope="col" class='ml-3' >name</th>
                        <th scope="col" class="ml-3" >address</th>
                        <th scope="col" class="ml-3 justify-self-end " >action</th>

                    </tr>
                    @foreach ($clinics as $clinic)
                    <tr class="flex flex-row justify-between border-solid border border-opacity-20 border-black my-auto py-2" >

                        <td class=' ml-3 pl-2'>  {{" $clinic->name " }} </td>
                        <td class=' ml-3 pl-2'> {{ " $clinic->address " }} </td>
                        <td class=' ml-3 pl-2 justify-end'>
                        <div class='flex-row flex-auto d-flex justify-content-center justify-self-end'>
                        <a class='bg-blue-400 p-1 text-yellow-50 hover:bg-blue-300 hover:text-yellow-50  mx-2 ' href={{ route('admin.clinics.clinic.show',[$clinic->id] ) }}> show </a>
                        <form action="{{ route('admin.clinics.clinic.destroy',$clinic ) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class='bg-red-400 p-1 hover:bg-red-300 h text-white mx-2 ' type="submit"> delete </button>
                        </form>


                            <a class='bg-green-100 p-1 hover:bg-green-200 mx-2' href="{{ route('admin.clinics.clinic.edit', $clinic ) }}"> edit </a>

                        </div>
                        </td>


                        @endforeach

                    </tr>

                    {{ $clinics->onEachSide(1)->links() }}
                </table>
                <a class='bg-blue-600 text-yellow-50 p-1 hover:bg-blue-400 hover:text-yellow-50 mx-2 ' href="{{ route('admin.clinics.clinic.create') }}"> new clinic </a>
            </div>
        </div>


    </div>
</x-app-layout>
