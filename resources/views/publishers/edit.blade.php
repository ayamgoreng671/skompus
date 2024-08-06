<x-app-layout>




    <div class="bg-white overflow-hidden shadow-2xl sm:rounded-lg">


        <div class="p-6 text-black">
            <form action="{{ route('publishers.update', $publisher->id) }}" class="form-control" method="post" enctype="multipart/form-data">
                @csrf
                @method("PUT")
                <x-input-label for="name" :value="__('Name')" />
                <input name="name" type="text" placeholder="Type here" value="{{ $publisher->name }}"
                    class="input input-bordered @error('name')
                input-error 
                @enderror w-full max-w-xs bg-white border-black border-2" />

                @error('name')
                    <span class="text-error">{{ $message }}</span>
                @enderror
                <x-input-label for="address" :value="__('Address')" />
                <input name="address" type="text" value="{{ $publisher->address }}" placeholder="Type here"
                    class="input input-bordered @error('address')
                input-error 
                @enderror w-full max-w-xs bg-white border-black border-2" />

                @error('address')
                    <span class="text-error">{{ $message }}</span>
                @enderror


                <div>
                    <a href="{{ route('publishers.index') }}"><input type="button" value="Return"
                            class="btn btn-warning mt-4"></a>
                    <input type="submit" value="Submit" class="btn btn-error text-white  mt-4 bg-[#B8292D]">
                </div>

            </form>


        </div>

    </div>


</x-app-layout>
