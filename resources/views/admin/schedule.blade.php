<x-admin>
    <div class="m-4">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

            <table class="w-full text-sm text-left rtl:text-right text-black dark:text-white-400 bg-white dark:bg-white-800">
                <thead class="text-xs text-white-700 uppercase bg-white-50 dark:bg-white-700 dark:text-white-400 border-b border-slate-300">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Doctor Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Schedule Time
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($schedules as $schedule)
                    <tr class="bg-white border-b dark:bg-white-800 dark:border-white-700 hover:bg-white-50 dark:hover:bg-white-600">
                        <td class="w-4 p-4">
                            {{$schedule->id}}
                        </td>
                        <td class="w-4 p-4">
                            <p class="font-semibold">{{$schedule->doctor->name}}</p>
                        </td>
                        <td class="w-4 p-4">
                            <p class="font-semibold">
                                {{ \Carbon\Carbon::parse($schedule->book_time)->format('d-n-Y h:i A') }}
                            </p>

                        </td>
                        <td class="w-4 p-4 flex">
                            <a href="/admin/Schedules/{{$schedule->id}}/edit">
                                <button class="p-3 bg-green-400 mx-3 rounded-xd">Edit</button>
                            </a>
                            <form action="/admin/Schedules/{{$schedule->id}}/delete" method="POST">
                                @method('DELETE')
                                @csrf
                                <a href="">
                                    <button class="p-3 bg-yellow-400 rounded-xd">Delete</button>
                                </a>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-admin>