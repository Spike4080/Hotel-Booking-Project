<x-admin>
    <div>
        <div class="overflow-x-auto p-4">
            <h1 class="text-4xl font-bold p-4">Blogs</h1>
            <table class="table-auto min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Id</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Username</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Slug</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Intro</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cols-span-2">Actions</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($blogs as $blog)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{$blog->id}}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{$blog->user->name}}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{$blog->title}}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{$blog->slug}}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{$blog->intro}}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <a type="button" class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-7 py-3.5 text-center me-2 mb-2" href="/admin/blogs/{{$blog->id}}/edit">Edit</a>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap ">
                            <form action="/admin/blogs/{{$blog->id}}/delete" method="POST">
                                @method("DELETE")
                                @csrf
                                <button type="submit" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Delete</button>

                            </form>
                        </td>


                    </tr>
                    @endforeach
                    <!-- More table rows -->
                </tbody>
            </table>
        </div>

    </div>
</x-admin>