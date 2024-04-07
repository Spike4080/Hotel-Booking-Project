<x-layout>
    <div class="bg-gray-200 w-full p-6 pt-8 mx-28 my-10">
        <div class="max-w-xl mx-auto rounded-md p-2">
            <img src="{{$doctor->photo}}" class="w-60 h-60 object-fit" alt="">
            <div>
                <h1 class="text-2xl font-bold">Name : {{$doctor->name}}</h1>
                <h1>Description : {{$doctor->description}}</h1>
                <h1 class="font-semibold">Address : {{$doctor->address}}</h1>
            </div>
        </div>
        <a href="/doctors">
            <button class="bg-red-300 p-2 px-3 rounded-xd border">Back</button>
        </a>
    </div>
</x-layout>