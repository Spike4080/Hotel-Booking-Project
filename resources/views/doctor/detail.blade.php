<x-layout>
    <div class="bg-gray-200 w-full p-6 pt-8 mx-28 my-10">
        <div class="max-w-xl mx-auto rounded-md p-2">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSE3L1xRQ1EeHsYHe7j8i_hPUgFZ4nfed5qcG-AVJmqVQ&s" class="w-60 h-60 object-fit" alt="">
            <div>
                <h1 class="text-2xl font-bold">{{$doctor->name}}</h1>
                <h1>{{$doctor->description}}</h1>
                <h1 class="font-semibold">{{$doctor->address}}</h1>
            </div>
        </div>
        <a href="/doctors">
            <button>Back</button>
        </a>
    </div>
</x-layout>