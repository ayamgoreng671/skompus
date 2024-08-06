<x-app-layout>




    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">


        <div class="p-6 text-gray-900 dark:text-gray-100">
            <form action="{{ route('authors.update', $author->id) }}" class="form-control" method="post" enctype="multipart/form-data">
                @csrf
                @method("PUT")
                <x-input-label for="name" :value="__('Name')" />
                <input name="name" type="text" placeholder="Type here" value="{{ $author->name }}"
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

                <div class="avatar mt-4">
                    <div class="mask mask-squircle w-12 h-12">
                        <img src="/storage/{{ $author->photo }}" alt="duar">
                    </div>
                </div>

                <div>
                    <a href="{{ route('authors.index') }}"><input type="button" value="Return"
                            class="btn btn-warning mt-4"></a>
                    <input type="submit" value="Submit" class="btn btn-primary mt-4">
                </div>

            </form>


        </div>

    </div>


</x-app-layout>
