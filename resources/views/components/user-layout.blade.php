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
                        <h1 class="text-blue-700 font-bold text-xl">User</h1>
                        <span class="font-bold text-xl ml-0.5">Account</span>
                    </div>
                </div>
                <div class="border border-black mx-5"></div>

                <div>
                    <ul class="p-4 my-9 font-semibold">
                        <a href="/users/user/profile">
                            <li class="my-5 p-3 flex">
                                <span class="material-symbols-outlined">
                                    person
                                </span>
                                <p class="ml-1">Profile</p>
                            </li>
                        </a>
                        <a href="/users/{{auth()->id()}}/records">
                            <li class="my-5 p-3 flex">
                                <span class="material-symbols-outlined"> add_circle </span>
                                <p class="ml-1">Booking Records</p>
                            </li>
                        </a>
                        <a href="/users/{{auth()->id()}}/medicalRecords">
                            <li class="my-5 p-3 flex">
                                <span class="material-symbols-outlined"> add_circle </span>
                                <p class="ml-1">Medical Records</p>
                            </li>
                        </a>
                        <a href="/">
                            <li class="my-5 p-3 flex text-red-500">
                                <span class="material-symbols-outlined"> logout </span>
                                <p class="ml-1">Go to Home Page</p>
                            </li>
                        </a>
                    </ul>
                </div>
            </div>
            <!-- left side bar -->
            <!--  -->
            <!-- Right side bar -->
            <div class="bg-slate-200 col-span-6 h-auto">
                {{$slot}}
            </div>
        </div>
</body>

</html>