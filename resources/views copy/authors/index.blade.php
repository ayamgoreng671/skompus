<x-app-layout>


    <p class="font-bold text-4xl text-white mb-4">Data Author</p>

    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">


        <div class="p-6 text-gray-900 dark:text-gray-100">
            <form action="{{ route('authors.store') }}" class="form-control" method="post" enctype="multipart/form-data">
                @csrf
                <x-input-label for="name" :value="__('Name')" />
                <input name="name" type="text" placeholder="Type here"
                    class="input input-bordered @error('name')
                input-error 
                @enderror w-full max-w-xs" />

                @error('name')
                    <span class="text-error">{{ $message }}</span>
                @enderror
                <x-input-label for="photo" :value="__('Photo')" class="mt-4" />
                <input name="photo" type="file"
                    class="file-input file-input-bordered w-full max-w-xs @error('photo')
                file-input-error 
                @enderror " />

                @error('photo')
                    <span class="text-error">{{ $message }}</span>
                @enderror

                <div>
                    <a href="{{ route('dashboard') }}"><input type="button" value="Return"
                            class="btn btn-warning mt-4"></a>
                    <input type="submit" value="Submit" class="btn btn-primary mt-4">
                </div>

            </form>


        </div>

    </div>
    
        <div class="overflow-x-auto bg-base-100 mt-8 rounded-lg">
            <table class="table">
                <!-- head -->
                <thead>
                    <tr>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Action</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($authors as $author)
                    <!-- row 1 -->
                    <tr>
                        <td>
                            <div class="flex items-center gap-3">
                                <div class="avatar">
                                    <div class="mask mask-squircle w-12 h-12">
                                        <img src="storage/{{ $author->photo }}" alt="duar">
                                    </div>
                                </div>
                                <div>
                                    {{-- <div class="font-bold">Hart Hagerty</div>
                                    <div class="text-sm opacity-50">United States</div> --}}
                                </div>
                            </div>
                        </td>
                        <td>
                            {{ $author->name }}

                        </td>
                        <td>
                            {{-- <button class="btn btn-ghost btn-xs">details</button> --}}
                            <div>

                                <a href="{{ route('authors.edit', $author->id) }}"
                                    class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('authors.destroy', $author->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" class="btn btn-sm btn-error mt-2" value="delete">
                                </form>
                            </div>
                        </td>
                    </tr>

                    </tr>
                    @endforeach
                </tbody>
                <!-- foot -->
                <tfoot>
                    <tr>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Action</th>
                        <th></th>
                    </tr>
                </tfoot>

            </table>
        </div>
        {{-- 
        <div class="card bg-base-100 my-4">
            <div class="card-body">
                <h3>{{ $author->name }}</h3>
                <img src="storage/{{ $author->photo }}" alt="duar">
            </div>

            <div class="card-actions p-2">
                <a href=" {{ route('authors.show', $author) }} " class="link link-secondary">Komentar</a>
                <a href="{{ route('authors.edit', $author->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('authors.destroy', $author->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="submit" class="btn btn-sm btn-error" value="delete">
                </form>
            </div>
        </div> --}}


</x-app-layout>
