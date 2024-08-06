<x-app-layout>


    <p class="font-bold text-4xl text-white mb-4">Select student</p>

    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">



    </div>
    
        <div class="overflow-x-auto bg-white shadow-2xl mt-8 rounded-lg">
            <table class="table text-black">
                <!-- head -->
                <thead>
                    <tr>
                        <th>Nis</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Action</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                    <!-- row 1 -->
                    <tr>
                        <td>
                            {{ $student->nis }}
                        </td>
                        <td>
                            {{ $student->name }}

                        </td>
                        <td>
                            {{ $student->email }}

                        </td>
                        <td>
                            {{ $student->phone }}

                        </td>
                        <td>
                            {{-- <button class="btn btn-ghost btn-xs">details</button> --}}
                            <div>

                                <a href="{{ route('books.confirm', [$book , $student]) }}"
                                    class="btn btn-error bg-[#B8292D] text-white btn-sm">Select</a>

                            </div>
                        </td>
                    </tr>

                    </tr>
                    @endforeach
                </tbody>
                <!-- foot -->
                <tfoot>
                    <tr>
                        <th>Nis</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Action</th>
                        <th></th>
                    </tr>
                </tfoot>

            </table>
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
