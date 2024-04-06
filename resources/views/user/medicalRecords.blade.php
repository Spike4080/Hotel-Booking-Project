<x-user-layout>
    <div class="m-4">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

            <table class="w-full text-sm text-left rtl:text-right text-black dark:text-white-400 bg-white dark:bg-white-800">
                <thead class="text-xs text-white-700 uppercase bg-white-50 dark:bg-white-700 dark:text-white-400 border-b border-slate-300">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Treatment
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Doctor
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Patient
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Date
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($medicalRecord as $record)
                    <tr class="bg-white border-b dark:bg-white-800 dark:border-white-700 hover:bg-white-50 dark:hover:bg-white-600">
                        <td class="w-4 p-4">
                            {{$record->id}}
                        </td>
                        <td class="flex items-center px-6 py-4 text-black-900 whitespace-nowrap dark:text-black">
                            <div class="ps-3">
                                <div class="text-base font-semibold">{{$record->treatment}}</div>
                            </div>
                        </td>
                        <td class="w-4 p-4">
                            <p class="font-semibold">{{$record->doctor->name}}</p>
                        </td>
                        <td class="w-4 p-4">
                            <p class="font-semibold">{{$record->user->name}}</p>
                        </td>
                        <td class="w-4 p-4">
                            <p class="font-semibold">{{$record->date}}</p>
                        </td>
                        <td class="w-4 p-4">

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-user-layout>