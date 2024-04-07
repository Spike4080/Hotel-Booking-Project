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
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Address
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Appoinments_Time
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Schedules
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bookings as $booking)
                    <tr class="bg-white border-b dark:bg-white-800 dark:border-white-700 hover:bg-white-50 dark:hover:bg-white-600">
                        <td class="w-4 p-4">
                            {{$booking->id}}
                        </td>
                        <td class="flex items-center px-6 py-4 text-black-900 whitespace-nowrap dark:text-black">
                            <img class="w-10 h-10 rounded-full" src="{{$booking->doctor->photo}}" alt="Jese image">
                            <div class="ps-3">
                                <div class="text-base font-semibold">{{$booking->doctor->name}}</div>
                            </div>
                        </td>
                        <td class="w-4 p-4">
                            <p class="font-semibold">{{$booking->doctor->address}}</p>
                        </td>
                        <td class="w-4 p-4">

                        </td>
                        <td class="w-4 p-4">
                            {{$booking->start_time}}
                        </td>
                        <td class="w-4 p-4 flex">
                            @if($booking->status==0)
                            <form action="/admin/Booking/{{$booking->id}}/accept" method="POST">
                                @csrf
                                <button type="submit" class="p-3 bg-green-400 mx-3 rounded-xd">Accept</button>
                            </form>
                            @else
                            <form action="/admin/Booking/{{$booking->id}}/deny" method="POST">
                                @csrf

                                <button type="submit" class="p-3 bg-yellow-400 rounded-xd">Deny</button>
                            </form>
                            @endif
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-admin>