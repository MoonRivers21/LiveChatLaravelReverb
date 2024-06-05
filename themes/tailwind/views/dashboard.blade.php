<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="bg-white  rounded-lg p-8 max-w-2xl w-full">
                        <h1 class="text-2xl font-bold mb-6 text-center">User List</h1>
                        <ul class="divide-y divide-gray-200">
                            @foreach($users as $user)
                                <li class="py-4 flex items-center">
                                    <i class="iconoir-user text-2xl text-gray-700"></i>
                                    <div class="ml-4">
                                        <p class="font-bold text-gray-900">{{ $user->name }}</p>
                                        <p class="text-sm text-gray-600">{{ $user->email }}</p>
                                        <p class=""><a href="{{ route('chat', $user) }}" class="bg-blue-500 hover:bg-blue-700 text-white  py-1 px-1 rounded text-sm ">Chat</a></p>
                                    </div>
                                </li>
                            @endforeach


                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
