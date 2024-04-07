<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
</head>

<body>
    <div class="h-screen w-{800px}">
        <div class="grid grid-cols-7 h-screen">
            <!-- left side bar -->
            <div class="bg-white">
                <div class="flex items-center p-4">
                    <div>
                        <img class="w-16" src="/book.svg" alt="book" />
                    </div>
                    <div class="flex ml-1">
                        @if(auth()->user()->role_id==1)
                        <h1 class="text-blue-700 font-bold text-xl">Admin</h1>
                        <span class="font-bold text-xl ml-0.5">Panel</span>
                        @elseif(auth()->user()->role_id==2)
                        <h1 class="text-blue-700 font-bold text-xl">Doctor</h1>
                        <span class="font-bold text-xl ml-0.5">Panel</span>
                        @endif
                    </div>
                </div>
                <div class="border border-black mx-5"></div>

                <div>
                    <ul class="p-4 my-9 font-semibold">
                        <a href="/admin/doctors/{{auth()->id()}}/profile/show">
                            <li class="my-5 p-3 flex">
                                <span class="material-symbols-outlined"> group </span>
                                <p class="ml-1">Profile</p>
                            </li>
                        </a>
                        <a href="/admin/medicalRecords">
                            <li class="my-5 p-3 flex">
                                <span class="material-symbols-outlined"> group </span>
                                <p class="ml-1">Medical Reocrd</p>
                            </li>
                        </a>
                        <a href="/admin/Bookings/booking">
                            <li class="my-5 p-3 flex">
                                <span class="material-symbols-outlined"> group </span>
                                <p class="ml-1">Booking List</p>
                            </li>
                        </a>
                        <a href="/admin/Schedule">
                            <li class="my-5 p-3 flex">
                                <span class="material-symbols-outlined"> group </span>
                                <p class="ml-1">Schedule</p>
                            </li>
                        </a>
                        <a href="/admin/medicalRecords/{{auth()->id()}}/create">
                            <li class="my-5 p-3 flex">
                                <span class="material-symbols-outlined"> group </span>
                                <p class="ml-1">Create Medical Record</p>
                            </li>
                        </a>
                        <a href="/admin/schedules/{{auth()->id()}}/create">
                            <li class="my-5 p-3 flex">
                                <span class="material-symbols-outlined"> group </span>
                                <p class="ml-1">Create Schedule</p>
                            </li>
                        </a>
                        <a href="/">
                            <li class="my-5 p-3 flex text-red-500">
                                <span class="material-symbols-outlined"> logout </span>
                                <p class="ml-1">logout</p>
                            </li>
                        </a>
                </div>
            </div>
            <!-- left side bar -->
            <!--  -->
            <!-- Right side bar -->
            <div class="bg-slate-200 col-span-6">
                {{$slot}}
            </div>
        </div>
</body>

</html>