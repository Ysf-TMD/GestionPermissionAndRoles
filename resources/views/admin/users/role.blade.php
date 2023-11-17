<x-admin-layout>

    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="  overflow-hidden shadow-sm sm:rounded-lg bg-slate-100  rounded-md p-3">
                <div class="   flex  p-2  ">
                    <a href="{{route("admin.users.index")}}" class = "px-4 my-3 bg-green-500 hover:bg-green-700 font-medium py-2 rounded-md ">Users Home </a>
                </div>
               <div>User Name :  {{$user->name}}</div>
               <div>User Email : {{$user->email}}</div>
            </div>


            <div class="mt-6 p-2 bg-slate-100 rounded-md">
                <h2 class="text-2xl font-medium">
                    Roles
                </h2>
                <div class="mt-4 p-2 flex space-x-2">
                    @if($user->roles)
                        @foreach($user->roles as $user_role)
                            <form  action="{{route("admin.users.roles.remove",[$user->id,$user_role->id])}}"
                                   method="POST" onsubmit="return confirm('Are You Sure ?');">
                                @csrf
                                @method("DELETE")
                                <button class="px-4 py-2 bg-red-500 hover:bg-red-700 text-white rounded-md" type="submit">
                                    {{$user_role->name}}</button>
                            </form>
                        @endforeach
                    @endif
                </div>






                <div class="max-w-xl">
                    <form method="post" action="{{route("admin.users.roles",$user->id)}}">
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



            <div class="mt-6 p-2 bg-slate-100 rounded-md">
                <h2 class="text-2xl ">
                    Permissions
                </h2>
                <div class="mt-4 p-2 flex space-x-2">
                    @if($user->permissions)
                        @foreach($user->permissions as $user_permission)
                            <form  action="{{route("admin.roles.permissions.revoke",[$user->id,$user_permission->id])}}"
                                   method="POST" onsubmit="return confirm('Are You Sure ?');">
                                @csrf
                                @method("DELETE")
                                <button class="px-4 py-2 bg-red-500 hover:bg-red-700 text-white rounded-md" type="submit">
                                    {{$user_permission->name}}</button>
                            </form>
                        @endforeach
                    @endif
                </div>






                <div class="max-w-xl">
                    <form method="post" action="{{route("admin.users.permissions",$user->id)}}">
                        @csrf
                        <div class="sm:col-span-6 mt-6">
                            <label for="" class="block text-sm font-medium text-gray-700">Permission</label>
                            <select id="" name="permission" autocomplete="" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">

                                @foreach($permissions as $permission)
                                    <option value="{{$permission->name}}">{{$permission->name}}</option>
                                @endforeach
                            </select>
                            @error("name")
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
</x-admin-layout>
