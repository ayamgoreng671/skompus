<x-app-layout>


    <p class="font-bold text-4xl text-white mb-4">Data Publisher</p>

    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">


        <div class="p-6 text-gray-900 dark:text-gray-100">
            <form action="{{ route('publishers.store') }}" class="form-control" method="post" enctype="multipart/form-data">
                @csrf
                <x-input-label for="name" :value="__('Name')" />
                <input name="name" type="text" placeholder="Type here"
                    class="input input-bordered @error('name')
                input-error 
                @enderror w-full max-w-xs" />

                @error('name')
                    <span class="text-error">{{ $message }}</span>
                @enderror
                <x-input-label for="address" :value="__('Address')" class="mt-4"/>
                <input name="address" type="text" placeholder="Type here"
                    class="input input-bordered @error('address')
                input-error 
                @enderror w-full max-w-xs" />

                @error('address')
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
                        <th>Name</th>
                        <th>Address</th>
                        <th>Action</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($publishers as $publisher)
                    <!-- row 1 -->
                    <tr>
                        <td>
                            {{ $publisher->name }}
                        </td>
                        <td>
                            {{ $publisher->address }}

                        </td>
                        <td>
                            {{-- <button class="btn btn-ghost btn-xs">details</button> --}}
                            <div>

                                <a href="{{ route('publishers.edit', $publisher->id) }}"
                                    class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('publishers.destroy', $publisher->id) }}" method="post">
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
                        <th>Name</th>
                        <th>Address</th>
                        <th>Action</th>
                        <th></th>
                    </tr>
                </tfoot>

            </table>
        </div>
        {{-- 
        <div class="card bg-base-100 my-4">
            <div class="card-body">
                <h3>{{ $publisher->name }}</h3>
                <img src="storage/{{ $publisher->Address }}" alt="duar">
            </div>

            <div class="card-actions p-2">
                <a href=" {{ route('publishers.show', $publisher) }} " class="link link-secondary">Komentar</a>
                <a href="{{ route('publishers.edit', $publisher->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('publishers.destroy', $publisher->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="submit" class="btn btn-sm btn-error" value="delete">
                </form>
            </div>
        </div> --}}


</x-app-layout>
