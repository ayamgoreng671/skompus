<x-app-layout>
    <p class="font-bold text-4xl text-white mb-4">Data Buku</p>
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">


        <div class="p-6 text-gray-900 dark:text-gray-100">

            <form action="{{ route('books.store') }}" class="form-control" method="post" enctype="multipart/form-data">
                @csrf

                <div class="grid grid-cols-2 gap-4">

                    <div><x-input-label for="author" :value="__('Author')" /><select name="author"
                            class="select select-bordered w-full max-w-xs @error('author')
                            select-error 
                            @enderror">
                            <option disabled selected>Masukkan nama author</option>
                            @foreach ($authors as $author)
                                <option value="{{ $author->id }}">{{ $author->name }}</option>
                            @endforeach

                        </select>
                        @error('author')
                        <br>
                            <span class="text-error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div><x-input-label for="publisher" :value="__('Publisher')" /><select name="publisher"
                            class="select select-bordered w-full max-w-xs @error('publisher')
                            select-error 
                            @enderror">
                            <option disabled selected>Masukkan nama publisher</option>
                            @foreach ($publishers as $publisher)
                                <option value="{{ $publisher->id }}">{{ $publisher->name }}</option>
                            @endforeach

                        </select>
                        @error('publisher')
                        <br>
                            <span class="text-error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div><x-input-label for="category" :value="__('Category')" /><select name="category"
                        class="select select-bordered w-full max-w-xs @error('category')
                        select-error 
                        @enderror">
                        <option disabled selected>Masukkan nama kategori</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach

                    </select>
                    @error('category')
                    <br>
                        <span class="text-error">{{ $message }}</span>
                    @enderror
                </div>
                    <div> <x-input-label for="title" :value="__('Title')" />
                        <input name="title" type="text" placeholder="Type here"
                            class="input input-bordered @error('title')
                        input-error 
                        @enderror w-full max-w-xs" />

                        @error('title')
                        <br>
                            <span class="text-error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div> <x-input-label for="isbn" :value="__('ISBN')" />
                        <input name="isbn" type="text" placeholder="Type here"
                            class="input input-bordered @error('isbn')
                        input-error 
                        @enderror w-full max-w-xs" />

                        @error('isbn')
                        <br>
                            <span class="text-error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div> <x-input-label for="cover" :value="__('Cover')" class="" />
                        <input name="cover" type="file"
                            class="file-input file-input-bordered w-full max-w-xs @error('cover')
                        file-input-error 
                        @enderror " />

                        @error('cover')
                        <br>
                            <span class="text-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div> <x-input-label for="release_date" :value="__('Release Date')" />
                        <input name="release_date" type="date" placeholder="Type here"
                            class="input input-bordered @error('release_date')
                        input-error 
                        @enderror w-full max-w-xs" />

                        @error('release_date')
                        <br>
                            <span class="text-error">{{ $message }}</span>
                        @enderror
                    </div>

                </div>
                <x-input-label for="description" :value="__('Description')" class="mt-4" />
                <textarea name="description" id="" cols="30" rows="3"
                    class="textarea textarea-bordered mb-2 @error('description')
                        textarea-error 
                        @enderror"
                    placeholder="Type here"></textarea>

                @error('description')
                    <span class="text-error">{{ $message }}</span>
                @enderror



                <div>
                    <a href="{{ route('books.index') }}"><input type="button" value="Return"
                            class="btn btn-warning mt-4"></a>
                    <input type="submit" value="Submit" class="btn btn-primary mt-4">
                </div>

            </form>




        </div>


    </div>




</x-app-layout>

