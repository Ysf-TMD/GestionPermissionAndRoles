<x-admin-layout>

    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="  overflow-hidden shadow-sm sm:rounded-lg">
                <div class="   flex  p-2 ">
                    <a href="{{route("admin.permissions.index")}}" class = "px-4 my-3 bg-green-500 hover:bg-green-700 font-medium py-2 rounded-md ">Permissions Home </a>
                </div>


                <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
                    <form method="post" action="{{route("admin.permissions.update",$permission )}}">
                        @csrf
                        @method("PUT")
                        <div class="sm:col-span-6">
                            <label for="title" class="block text-sm font-medium text-gray-700"> Permission Name </label>
                            <div class="mt-1">
                                <input type="text"
                                       value="{{$permission->name}}"
                                       id="title"
                                       name="name"
                                       class="block w-full  appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                            </div>
                            @error("name")
                            <span class="text-red-400 text-sm">{{$message}}</span>@enderror
                        </div>
                        <div class="sm:col-span-6 py-3 ">
                            <button type="submit" class="px-4 py-2 mt-10 bg-green-500 hover:bg-green-700 rounded-md">Update</button>
                        </div>
                    </form>
                </div>


                <div class="mt-6 p-2 bg-slate-100 rounded-md">
                    <h2 class="text-2xl font-medium">
                        Roles
                    </h2>
                    <div class="mt-4 p-2 flex space-x-2">
                        @if($permission->roles)
                            @foreach($permission->roles as $permission_role)
                                <form  action="{{route("admin.permissions.roles.remove",[$permission->id,$permission_role->id])}}"
                                       method="POST" onsubmit="return confirm('Are You Sure ?');">
                                    @csrf
                                    @method("DELETE")
                                    <button class="px-4 py-2 bg-red-500 hover:bg-red-700 text-white rounded-md" type="submit">
                                        {{$permission_role->name}}</button>
                                </form>
                            @endforeach
                        @endif
                    </div>






                    <div class="max-w-xl">
                        <form method="post" action="{{route("admin.permissions.roles",$permission->id)}}">
                            @csrf
                            <div class="sm:col-span-6 mt-6">
                                <label for="" class="block text-sm font-medium text-gray-700">Roles</label>
                                <select id="" name="role" autocomplete="" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">

                                    @foreach($roles as $role)
                                        <option value="{{$role->name}}">{{$role->name}}</option>
                                    @endforeach
                                </select>
                                @error("role")
                                <span class="text-red-400 text-sm">{{$message}}</span>@enderror
                            </div>
                            <div class="sm:col-span-6 py-3 ">
                                <button type="submit" class="px-4 font-medium py-2 mt-10 bg-blue-500 hover:bg-green-700 rounded-md">Assign</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-admin-layout>
