<x-user-layout>
    @foreach($bookings as $booking)
    <div class="mb-4 p-4 border rounded-lg">
        <h1 class="text-xl font-bold mb-2">{{$booking->name}}</h1>
        @if($booking->doctor->photo)
        <img src="{{$booking->doctor->photo}}" class="mb-4 rounded-lg w-96">
        @endif
        <p class="text-gray-700 mb-4">{{$booking->phone}}</p>
        <p class="text-gray-900">{{$booking->doctor->name}}</p>
        <p class="text-gray-900">{{$booking->start_time}}</p>
        @if($booking->status===0)
        <button type="button" class="text-gray-900 bg-gradient-to-r from-lime-200 via-lime-400 to-lime-500 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-lime-300 dark:focus:ring-lime-800 shadow-lg shadow-lime-500/50 dark:shadow-lg dark:shadow-lime-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Pending</button>
        @else
        <button type="button" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Booked</button>

        @endif
        <div class="mt-4">
            <a href="/users/{{auth()->id()}}/bookings/{{$booking->id}}/edit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">Edit</a>
        </div>
    </div>
    @endforeach
</x-user-layout>