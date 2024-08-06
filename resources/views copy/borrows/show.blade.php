@php
    use Carbon\Carbon;
@endphp

<x-app-layout>



    <div class="card bg-base-100 my-4">
        <div class="card-body">

            <div>
                <div class="grid grid-cols-3">
                    <div>
                        <img src="/storage/{{ $borrow->book->cover }}" class="w-64 h-96 col-span-1 mb-8" alt="duar">
                        @if (Carbon::create($borrow->borrow_date)->greaterThan(Carbon::create($borrow->due_date)))
                            <p
                                class="w-fit p-[6px_10px] rounded-[10px] bg-[#FD445E] font-bold text-xs text-white  outline-[2px] outline-offset-[4px] mr-[6px]">
                                Late</p>
                        @elseif($borrow->book->is_borrowed == 0)
                            <p
                                class="w-fit p-[6px_10px] rounded-[10px] bg-[#06BC65] font-bold text-xs text-white outline-[2px] outline-offset-[4px] mr-[6px]">
                                Returned</p>
                        @else
                            <p
                                class="w-fit p-[6px_10px] rounded-[10px] bg-warning font-bold text-xs text-white outline-[2px] outline-offset-[4px] mr-[6px]">
                                Borrowed</p>
                        @endif
                    </div>
                    <div class="col-span-2">
                        <p class=" text-white text-2xl font-bold mb-4">{{ $borrow->book->title }}</p>
                        <p class=" text-white text-md mb-8">{{ $borrow->book->author->name }}</p>
                        <div class="grid grid-cols-2 my-4">
                            <div class="my-4">
                                <p class="text-white text-xl">
                                    Penerbit : {{ $borrow->book->publisher->name }}
                                </p>
                            </div>
                            <div class="my-4">
                                {{-- <p class="text-white text-xl">
                                    Penerbit : {{$borrow->book->publisher->name}}
                                </p> --}}
                            </div>
                            <div class="my-4">
                                <p class="text-white text-xl">
                                    Tahun Terbit : {{ $borrow->book->year }}
                                </p>
                            </div>
                            <div class="my-4">
                                <p class="text-white text-xl">
                                    Penerbit : {{ $borrow->book->publisher->name }}
                                </p>
                            </div>
                        </div>

                        <p class=" text-white text-2xl font-bold mt-8 mb-4">Peminjam : {{ $borrow->student->name }}</p>
                        <div class="grid grid-cols-2 ">
                            <div class="my-4">
                                <p class="text-white text-xl">
                                    NIS : {{ $borrow->student->nis }}
                                </p>
                            </div>
                            <div class="my-4">
                                <p class="text-white text-xl">
                                    Tanggal Peminjaman : {{ $borrow->borrow_date }}
                                </p>
                            </div>
                            <div class="my-4">
                                <p class="text-white text-xl">
                                    Nomor Telpon : {{ $borrow->student->phone }}
                                </p>
                            </div>
                            <div class="my-4">
                                <p class="text-white text-xl">
                                    Tenggat Pengembalian : {{ $borrow->due_date }}
                                </p>
                            </div>
                            <div class="my-4">
                                <p class="text-white text-xl">
                                    Email : {{ $borrow->student->email }}
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="card-action"><a href="{{ route('borrows.index') }}"><input type="submit" value="Back"
                        class="btn btn-warning mt-4 mr-4"></a>
                <form action="{{ route('borrow_returns.store', $borrow) }}" method="post" class="inline">@csrf<button
                        type="submit" class="btn btn-primary mt-4">Mark as Returned</button>

            </div>
            </form>
        </div>



    </div>





</x-app-layout>
