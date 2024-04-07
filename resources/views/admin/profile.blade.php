<x-admin>
    <div class="w-1/2 bg-slate-300 border h-80 p-8 mx-auto my-28 relative border rounded-3xl">
        <div>
            <img src="{{$doctor->photo}}" alt="logo" class="w-48 h-48 rounded-full mx-auto absolute -top-24 right-72">
            <div class="mx-auto bg-slate-200 border border-slate-300 hover:shadow-lg w-96 h-72 absolute inset-x-0 -bottom-28 border rounded-3xl">
                <div class="p-5 text-nowrap">
                    <div class="flex px-16 mb-2">
                        <h1 class="text-xl">Name - </h1>
                        <p class="text-base px-1 flex items-center">{{$doctor->name}}</p>
                    </div>
                    <div class="flex px-16 mb-2">
                        <h1 class="text-xl">Description - </h1>
                        <p class="text-base px-1 flex items-center">{{$doctor->description}}</p>
                    </div>
                    <div class="flex px-16">
                        <h1 class="text-xl">Address - </h1>
                        <p class="text-base px-1 flex items-center">{{$doctor->address}}</p>
                    </div>
                    <div class="mt-10 flex justify-between">
                        <a href="/admin/doctors/{{$doctor->id}}/profile/edit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">Edit Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin>