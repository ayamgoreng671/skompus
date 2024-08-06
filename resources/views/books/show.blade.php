@php
    use Carbon\Carbon;
@endphp

<x-app-layout>



    <div class="card my-4 bg-white shadow-2xl">
        <div class="card-body">

            <div>
                <div class="grid grid-cols-3">
                    <div>
                        <img src="/storage/{{ $book->cover }}" class="w-64 h-96 col-span-1 mb-8" alt="duar">
                        @if ($book->is_borrowed == 1)
                            <p
                                class="w-fit p-[6px_10px] rounded-[10px] bg-[#FD445E] font-bold text-xs text-white  outline-[2px] outline-offset-[4px] mr-[6px]">
                                Borrowed</p>
                        @else
                            <p
                                class="w-fit p-[6px_10px] rounded-[10px] bg-[#06BC65] font-bold text-xs text-white outline-[2px] outline-offset-[4px] mr-[6px]">
                                Available</p>
                        @endif
                    </div>
                    <div class="col-span-2">
                        <p class=" text-black text-2xl font-bold mb-4">{{ $book->title }}</p>
                        <p class=" text-black text-md mb-8">{{ $book->author->name }}</p>
                        <div class="grid grid-cols-2 my-4">
                            <div class="my-4">
                                <p class="text-black text-xl">
                                    Penerbit : {{ $book->publisher->name }}
                                </p>
                            </div>
                            <div class="my-4">
                                <p class="text-black text-xl">
                                    Penerbit : {{ $book->isbn }}
                                </p>
                            </div>
                            <div class="my-4">
                                <p class="text-black text-xl">
                                    Tahun Terbit : {{ $book->release_date }}
                                </p>
                            </div>
                            <div class="my-4">
                                <p class="text-black text-xl">
                                    Jenis Buku : {{ $book->category->name }}
                                </p>
                            </div>
                        </div>
                        <p class="text-black text-xl my-4">Deskripsi Singkat :</p>
                        <p class="text-black">{{ $book->description }}</p>
                        <div class="card-action"><a href="{{ route('books.index') }}"><input type="submit"
                                    value="Return" class="btn btn-warning mt-4 mr-4"></a>
                            @if ($book->is_borrowed == 0)
                                <a href="{{ route('books.borrow', $book) }}" class="btn btn-error bg-[#B8292D] btn-primary w-fit text-white">Borrow</a>
                        </div>
                        @endif

                    </div>
                </div>

            </div>
        </div>

        {{-- <div class="card-action"><a href="{{ route('borrows.index') }}"><input type="submit" value="Back"
                        class="btn btn-warning mt-4 mr-4"></a>
                <form action="{{ route('borrow_returns.store', $borrow) }}" method="post" class="inline">@csrf<button
                        type="submit" class="btn btn-primary mt-4">Mark as Returned</button>

            </div>
            </form> --}}
    </div>



    </div>





</x-app-layout>
