<x-user-layout>
    <div class="w-1/2 bg-slate-300 border h-80 p-8 mx-auto my-28 relative border rounded-3xl">
        <div>
            <img src="{{$user->photo}}" alt="logo" class="w-48 h-48 rounded-full mx-auto absolute -top-24 right-72">
            <div class="mx-auto bg-slate-200 border border-slate-300 hover:shadow-lg w-96 h-72 absolute inset-x-0 -bottom-28 border rounded-3xl">
                <div class="p-5 text-nowrap">
                    <div class="flex px-16 mb-2">
                        <h1 class="text-xl">Email - </h1>
                        <p class="text-base px-1 flex items-center">{{$user->email}}</p>
                    </div>
                    <div class="flex px-16 mb-2">
                        <h1 class="text-xl">Name - </h1>
                        <p class="text-base px-1 flex items-center">{{$user->name}}</p>
                    </div>
                    <div class="flex px-16">
                        <h1 class="text-xl">Username - </h1>
                        <p class="text-base px-1 flex items-center">{{$user->username}}</p>
                        <p>{{$user->role_id}}</p>
                    </div>
                    <div class="mt-10 flex justify-between">
                        <a href="/users/user/{{auth()->user()->id}}/profile/edit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">Edit Profile</a>
                        <form action="/users/user/{{auth()->user()->id}}/profile/delete" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete Account</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-user-layout>