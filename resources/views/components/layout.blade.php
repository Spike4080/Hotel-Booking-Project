<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <link rel="shortcut icon" href="images/s4.png" type="image/x-icon" />


    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.css" />

    <!-- fonts style -->
    <link href="/https://fonts.googleapis.com/css?family=Open+Sans:400,700|Poppins:400,600,700&display=swap" rel="stylesheet" />
    <!-- nice select -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" integrity="sha256-mLBIhmBvigTFWPSCtvdu6a76T+3Xyt+K571hupeFLg4=" crossorigin="anonymous" />
    <!-- datepicker -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" />
    <!-- Custom styles for this template -->
    <link href="/css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="/css/responsive.css" rel="stylesheet" />
</head>

<style>
    .hover li:hover {
        border-bottom: 3px solid blue;
    }
</style>

<body class="h-screen">
    <nav class="h-24 bg-slate-800 text-white">
        <div class=" mx-28 flex justify-between items-center p-2">
            <div>
                <p class="text-2xl font-bold">Medical Care</p>
            </div>
            <ul class="flex font-semibold hover">
                <li class="px-6 text-xl p-3"><a href="/">Home</a></li>
                <li class="px-6 text-xl p-3"><a href="/doctors">Doctors</a></li>
            </ul>
            <div class="flex items-center">
                <div class="px-4">
                    <ul class="flex font-bold">
                        @if(!auth()->user())
                        <li class="mx-5">
                            <a href="/register" class="hover:text-sky-800">Sign Up</a>
                        </li>
                        <li class="mx-5">
                            <a href="/login" class="hover:text-sky-800">Log In</a>
                        </li>
                        @else
                        @if(auth()->user()->role_id == 1)
                        <li class=" px-4 text-4xl grid place-items-center">
                            <a href="/admin/medicalRecords">
                                <span class="material-symbols-outlined">
                                    person
                                </span>
                            </a>
                        </li>
                        @else
                        <li class=" px-4 text-4xl grid place-items-center">
                            <a href="/users/user/profile">
                                <span class="material-symbols-outlined">
                                    person
                                </span>
                            </a>
                        </li>
                        @endif
                        <li class="px-3 text-red-800 text-4xl items-center flex justify-center">
                            <form action="/logout" method="POST">
                                @csrf
                                <button type=" submit" class="text-sm flex items-center border bg-transparent px-5 p-3 rounded-lg border-red-800 text-white hover:bg-red-800">
                                    <span class="material-symbols-outlined">
                                        logout
                                    </span>
                                    <p>LogOut</p>
                                </button>
                            </form>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <div class="container">
        {{$slot}}
    </div>



</body>

</html>