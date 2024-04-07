<x-layout>
    <!-- Search Bar -->
    <div class="grid place-items-center p-8">
        <div class="flex">
            <h1 class="text-6xl text-blue-600 font-semibold">Top</h1>
            <h1 class="text-6xl px-2 font-semibold">Hospital</h1>
        </div>
        <p class="p-8 text-xl font-semibold">Hospitals operate round-the-clock to ensure patients have access to medical care at any time of the day or night. This is particularly important for emergencies and critical care situations.</p>

        <div class="flex items-center">
            <form action="">
                <input type="search" placeholder="Search" class="w-96 bg-slate-800 border text-white p-4" name="search" value="{{request('search')}}">
                <button type="submit" class="bg-slate-600 p-4 px-8 text-white rounded-xl">Search</button>
            </form>
        </div>
    </div>
    <!-- Blogs Show Pages -->
    <div>
        <div class="p-8 mx-8 h-screen">
            <div class="h-96 w-{850px} grid grid-cols-5 gap-x-6 mb-12">
                @foreach($doctors as $doctor)
                <div class="bg-white border rounded-xl hover:shadow-lg">
                    <img class="w-full h-96 border rounded-xl" src="{{$doctor->photo}}" alt="" />
                    <h1 class="text-xl font-semibold p-2">
                        {{$doctor->name}}
                    </h1>
                    <p class="text-slate-800 p-2">{{$doctor->name}}</p>

                    <div class="flex justify-evenly">
                        <div class="flex">
                            <span class="material-symbols-outlined text-yellow-400 font-bold">
                                grade
                            </span>
                            <p class="text-yellow-400">4.5</p>
                        </div>

                        <div class="flex">
                            <span class="material-symbols-outlined text-slate-500">
                                visibility
                            </span>
                            <p class="text-slate-500">106</p>
                        </div>
                    </div>

                    <div class="border border-black mx-4 my-3"></div>
                    <div class="flex p-2">
                        <a href="doctors/{{$doctor->id}}/detail"><button type="button" class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900 w-2">
                                Info
                            </button>
                        </a>
                        <a href="/doctors/{{$doctor->id}}/booking/create">
                            <button type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900 w-18 ">Appoinments</button>
                        </a>
                    </div>
                </div>
                </a>
                @endforeach
            </div>
        </div>

</x-layout>