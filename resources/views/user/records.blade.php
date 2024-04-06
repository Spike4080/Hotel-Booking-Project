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
        <p class="text-gray-900">Pending</p>
        @else
        <p class="text-gray-900">Approved</p>
        @endif
        <div class="mt-4">
            <a href="/users/{{auth()->id()}}/bookings/{{$booking->id}}/edit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">Edit</a>
            <form action="" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
            </form>
        </div>
    </div>
    @endforeach
</x-user-layout>