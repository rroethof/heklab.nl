<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Manage new user signups
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <table class="w-full text-md bg-white shadow-md rounded mb-4">
                <tbody>
                    <tr class="border-b">
                        <th class="text-left p-3 px-5">Name</th>
                        <th class="text-left p-3 px-5">Email</th>
                        <th class="text-left p-3 px-5">Company</th>
                        <th class="text-left p-3 px-5">Date</th>
                        <th></th>
                    </tr>
@foreach($signups as $signup)
                    <tr class="border-b hover:bg-teal-100">
                        <td class="p-3 px-5"><input type="text" value="{{ $signup->name }}" class="bg-transparent"></td>
                        <td class="p-3 px-5"><input type="text" value="{{ $signup->email}}" class="bg-transparent"></td>
                        <td class="p-3 px-5"><input type="text" value="{{ $signup->company}}" class="bg-transparent"></td>
                        <td class="p-3 px-5"><input type="text" value="{{ $signup->created_at}}" class="bg-transparent"></td>
                        <td class="p-3 px-5 flex justify-end">
                            <form action="{{ route('signups.destroy',$signup->id) }}" method="POST">
                                <a class="btn btn-primary mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline"" href="{{ route('admin.signupprocess',$signup->id) }}">Process</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-sm text-bold bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Delete</button>
                            </form>
                        </td>
                    </tr>
@endforeach
                </tbody>
            </table>
        </div>
    </div>

</x-app-layout>