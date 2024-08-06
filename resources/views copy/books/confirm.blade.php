<x-app-layout>



    <div class="card bg-base-100 my-4">
        <div class="card-body">
            <p class="flex justify-center text-white text-2xl">{{ $book->title }}</p>
            <div>
                <div class="flex justify-center">
                    <img src="/storage/{{ $book->cover }}" class="w-64 h-96" alt="duar">
                </div>
            </div>
            <ul class="list-disc">
                <li>Penulis : {{ $book->author->name }}</li>
                <li>Penerbit : {{ $book->publisher->name }}</li>
                <li>Tahun Terbit : {{ $book->year }}</li>
            </ul>
            <p class="flex text-white text-md">Peminjam</p>
            <ul class="list-disc">
                <li>Nama : {{ $student->nis }}</li>
                <li>Nama : {{ $student->name }}</li>
                <li>Email : {{ $student->email }}</li>
                <li>Phone : {{ $student->phone }}</li>
            </ul>
            <div class="card-action"><a href="{{ route("books.borrow", $book) }}"><input type="submit" value="Return" class="btn btn-warning mt-4 mr-4"></a><form class="inline" action="{{ route('books.confirm.store', [$book, $student]) }}" method="post"> @csrf <button class="btn btn-primary w-fit">Submit</button></form></div>
        </div>

        

    </div>





</x-app-layout>
