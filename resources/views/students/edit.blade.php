<x-app-layout>


    <p class="font-bold text-4xl text-white mb-4">Data student</p>

    <div class="bg-white overflow-hidden shadow-2xl sm:rounded-lg">


        <div class="p-6 text-gray-900 dark:text-gray-100">
            <form action="{{ route('students.update', $student->id) }}" class="form-control" method="post" enctype="multipart/form-data">
                @csrf
                @method("PUT")

                <div class="grid grid-cols-2 gap-4 text-black">

                    <div> <x-input-label for="nis" :value="__('Nis')" />
                        <input name="nis" type="text" placeholder="Type here"
                            class="input input-bordered @error('nis')
                        input-error
                        @enderror w-full max-w-xs bg-white  border-2 border-black " value="{{ $student->nis }}" />

                        @error('nis')
                        <br>
                            <span class="text-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div> <x-input-label for="name" :value="__('Name')" />
                        <input name="name" type="text" placeholder="Type here"
                            class="input input-bordered @error('name')
                        input-error 
                        @enderror w-full max-w-xs bg-white  border-2 border-black " value="{{ $student->name }}" />

                        @error('name')
                        <br>
                            <span class="text-error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div> <x-input-label for="email" :value="__('Email')" />
                        <input name="email" type="email" placeholder="Type here"
                            class="input input-bordered @error('email')
                        input-error 
                        @enderror w-full max-w-xs bg-white  border-2 border-black " value="{{ $student->email }}" />

                        @error('email')
                        <br>
                            <span class="text-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div> <x-input-label for="phone" :value="__('Phone')" />
                        <input name="phone" type="text" placeholder="Type here"
                            class="input input-bordered @error('phone')
                        input-error 
                        @enderror w-full max-w-xs bg-white  border-2 border-black " value="{{ $student->phone }}" />

                        @error('phone')
                        <br>
                            <span class="text-error">{{ $message }}</span>
                        @enderror
                    </div>

                </div>





                <div>
                    <a href="{{ route('books.index') }}"><input type="button" value="Back"
                            class="btn btn-warning mt-4"></a>
                    <input type="submit" value="Update" class="btn btn-error bg-[#B8292D] text-white mt-4">
                </div>

            </form>


        </div>

    </div>
    

        {{-- 
        <div class="card bg-base-100 my-4">
            <div class="card-body">
                <h3>{{ $student->name }}</h3>
                <img src="storage/{{ $student->photo }}" alt="duar">
            </div>

            <div class="card-actions p-2">
                <a href=" {{ route('students.show', $student) }} " class="link link-secondary">Komentar</a>
                <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('students.destroy', $student->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="submit" class="btn btn-sm btn-error" value="delete">
                </form>
            </div>
        </div> --}}


</x-app-layout>
