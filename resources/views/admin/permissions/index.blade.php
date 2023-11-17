<x-admin-layout>

    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="  overflow-hidden shadow-sm sm:rounded-lg">
                <div class="   flex justify-end p-2 ">
                    <a href="{{route("admin.permissions.create")}}" class = "px-4 my-3 bg-green-500 hover:bg-green-700 rounded py-2 rounded-md ">Create Permission</a>
                </div>
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg  ">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-white ">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-white ">
                        <tr>
                            <th scope="col" class="px-6 py-5">
                                Name
                            </th>
                            <th>

                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($permissions as $permission )
                            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{$permission->name}}
                                </td>
                                <td>
                                    <div class="flex justify-end p-2">
                                        <div class="flex space-x-4">
                                            <a href="{{route("admin.permissions.edit",$permission->id)}}" class="px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white rounded-md">Edit</a>
                                            <form  action="{{route("admin.permissions.destroy",$permission->id)}}" method="POST" onsubmit="return confirm('Are You Sure ?');">
                                                @csrf
                                                @method("DELETE")
                                                <button class="px-4 py-2 bg-red-500 hover:bg-red-700 text-white rounded-md" type="submit">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-admin-layout>
