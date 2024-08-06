@php
    use Carbon\Carbon;
@endphp

<x-app-layout>
    <div class="overflow-x-auto bg-base-100 mt-8 rounded-lg">
        <table class="table">
            <!-- head -->
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Title</th>
                    <th>Borrow Date</th>
                    <th>Due Date</th>
                    <th>Status</th>
                    <th>Action</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($borrows as $borrow)
                    <!-- row 1 -->
                    <tr>
                        <td>
                            {{ $borrow->student->name }}
                        </td>
                        <td>
                            {{ $borrow->book->title }}

                        </td>
                        <td>{{ $borrow->borrow_date }}</td>
                        <td>{{ $borrow->due_date }}</td>
                        <td>
                            @if (Carbon::create($borrow->borrow_date)->greaterThan(Carbon::create($borrow->due_date)))
                                <p
                                    class="w-fit p-[6px_10px] rounded-[10px] bg-[#FD445E] font-bold text-xs text-white  outline-[2px] outline-offset-[4px] mr-[6px]">
                                    Late</p>
                            @elseif(App\Models\BorrowReturn::where("borrow_id", $borrow->id)->exists())
                                <p
                                    class="w-fit p-[6px_10px] rounded-[10px] bg-[#06BC65] font-bold text-xs text-white outline-[2px] outline-offset-[4px] mr-[6px]">
                                    Returned</p>
                            @else
                                <p
                                    class="w-fit p-[6px_10px] rounded-[10px] bg-warning font-bold text-xs text-white outline-[2px] outline-offset-[4px] mr-[6px]">
                                    Borrowed</p>
                            @endif
                        </td>
                        <td>
                            {{-- <button class="btn btn-ghost btn-xs">details</button> --}}
                            <div>

                                {{-- <a href="{{ route('borrows.edit', $borrow->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('borrows.destroy', $borrow->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" class="btn btn-sm btn-error mt-2" value="delete">
                                </form> --}}
                                <a href="{{ route('borrows.show', $borrow) }}"
                                    class="btn btn-primary btn-sm w-fit">Details</a>
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
                    <th>Title</th>
                    <th>Borrow Date</th>
                    <th>Due Date</th>
                    <th>Status</th>
                    <th>Action</th>
                    <th></th>
                </tr>
            </tfoot>

        </table>
    </div>
</x-app-layout>
