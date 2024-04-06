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
                            Roles
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr class="bg-white border-b dark:bg-white-800 dark:border-white-700 hover:bg-white-50 dark:hover:bg-white-600">
                        <td class="w-4 p-4">
                            {{$user->id}}
                        </td>
                        <td class="flex items-center px-6 py-4 text-black-900 whitespace-nowrap dark:text-black">
                            <img class="w-10 h-10 rounded-full" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSE3L1xRQ1EeHsYHe7j8i_hPUgFZ4nfed5qcG-AVJmqVQ&s" alt="Jese image">
                            <div class="ps-3">
                                <div class="text-base font-semibold">{{$user->name}}</div>
                                <div class="font-normal text-white-500">{{$user->email}}</div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            @if($user->role->id == 1)
                            <button type="button" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">{{$user->role->name}}</button>
                            @elseif($user->role->id == 2)
                            <button type="button" class="text-white bg-gradient-to-r from-cyan-400 via-cyan-500 to-cyan-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">{{$user->role->name}}</button>
                            @else
                            <button type="button" class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">{{$user->role->name}}</button>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <form action="/admin/users/roles/edit" method="POST">
                                @csrf
                                @method('patch')
                                <select name="id">
                                    @foreach($roles as $role)
                                    <option value="{{ $role->id }}" name="id">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                                <button type="submit">Change Role</button>
                            </form>

                        </td>
                        <td class="px-6 py-4">
                            @can('delete',$user)
                            <button class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">Ban User</button>
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-admin>