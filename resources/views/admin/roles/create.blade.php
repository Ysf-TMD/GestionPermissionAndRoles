<x-admin-layout>

    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="  overflow-hidden shadow-sm sm:rounded-lg">
                <div class="   flex  p-2 ">
                    <a href="{{route("admin.roles.index")}}" class = "px-4 my-3 bg-green-500 hover:bg-green-700 text-slate-100 py-2 rounded-md ">create.blade.php index </a>
                </div>


                    <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
                        <form method="post" action="{{route("admin.roles.store")}}">
                            @csrf
                            <div class="sm:col-span-6">
                                <label for="title" class="block text-sm font-medium text-gray-700"> Post Name </label>
                                <div class="mt-1">
                                    <input type="text" id="title"  name="name" class="block w-full  appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                </div>
                                @error("name")
                                <span class="text-red-400 text-sm">{{$message}}</span>@enderror
                            </div>
                            <div class="sm:col-span-6 py-3 ">
                                <button type="submit" class="px-4 py-2 mt-10 bg-green-500 hover:bg-green-700 rounded-md">Create</button>
                            </div>
                        </form>
                    </div>



            </div>
        </div>
    </div>
</x-admin-layout>
