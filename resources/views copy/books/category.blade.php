<x-app-layout>
    <p class="font-bold text-4xl text-white mb-4">Data Buku</p>
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">



    </div>
    <div class="grid grid-cols-3 mb-8">
        <a href="{{ route('books.create') }}" class="btn btn-primary w-fit">Tambah Buku</a>
        {{-- <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs">
         --}}
         <form action="{{ route("books.search") }}" class="group/search-bar p-[14px_18px] bg-belibang-darker-grey ring-1 ring-[#414141] hover:ring-[#888888] max-w-[560px] w-full rounded-full transition-all duration-300">
            <div class="relative text-left">
                <button class="absolute inset-y-0 left-0 flex items-center">
                    <img src="{{ asset('/images/icons/search-normal.svg')}}" alt="icon">
                </button>
                <input type="text" name="search" id="searchInput" class=" bg-belibang-darker-grey w-full pl-[36px] focus:outline-none placeholder:text-[#595959] pr-9 border-none outline-none" style="box-shadow: none;" placeholder="Type anything to search...">
                <input type="reset" id="resetButton" class="close-button hidden w-[38px] h-[38px] flex shrink-0 bg-[url('{{ asset('/images/icons/close.svg')}}')] hover:bg-[url('{{ asset('/images/icons/close-white.svg')}}')] transition-all duration-300 appearance-none transform -translate-x-1/2 -translate-y-1/2 absolute top-1/2 -right-5" value="">
            </div>
        </form>
    </div>
    <div class="flex flex-row flex-wrap gap-8 justify-center">
        @foreach ($books as $book)
            <a href="{{ route('books.show', $book->id) }}" class="card bg-base-100 w-96 shadow-xl basis-1/5 rounded-xl ">
            

                    <img class="p-4 h-72 rounded-t-lg" src="/storage/{{ $book->cover }}" alt="Shoes" />

                    <div class="card-body mb-4">
                        <h2 class="card-title">{{ $book->title }}</h2>
                        @if ($book->is_borrowed == 1)
                        <p class="w-fit p-[6px_10px] rounded-[10px] bg-[#FD445E] font-bold text-xs text-white  outline-[2px] outline-offset-[4px] mr-[6px]">Borrowed</p>
                        @else
                        <p class="w-fit p-[6px_10px] rounded-[10px] bg-[#06BC65] font-bold text-xs text-white outline-[2px] outline-offset-[4px] mr-[6px]">Available</p>  
                        @endif
                        
                    </div>
               
            </a>
        @endforeach





    </div>


</x-app-layout>