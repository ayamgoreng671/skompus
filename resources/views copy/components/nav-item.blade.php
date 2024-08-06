<div class="navbar bg-base-100 p-0 dark:bg-gray-800">
  <div class="navbar-start">
    <div class="dropdown">
      <label tabindex="0" class="btn btn-ghost lg:hidden">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" /></svg>
      </label>
      <ul tabindex="0" class="menu menu-sm dropdown-content -ml-20 mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
        <li><a href="{{ route('authors.index') }}">Author</a></li>
        <li tabindex="0">
          {{-- <details>
            <summary>Parent</summary>
            <ul class="p-2">
              <li><a>Submenu 1</a></li>
              <li><a>Submenu 2</a></li>
            </ul>
          </details> --}}
        </li>
        <li><a href="{{ route('publishers.index') }}">Publisher</a></li>
        <li><a href="{{ route('books.index') }}">Book</a></li>
        <li><a href="{{ route('students.index') }}">Student</a></li>
        <li><a href="{{ route('borrows.index') }}">Borrow</a></li>
      </ul>
    </div>
 
  </div>
  <div class="navbar-center hidden lg:flex">
    <ul class="menu menu-horizontal px-1">
      <li><a href="{{ route('authors.index') }}">Author</a></li>
      <li tabindex="0">
        {{-- <details>
          <summary>Parent</summary>
          <ul class="p-2">
            <li><a>Submenu 1</a></li>
            <li><a>Submenu 2</a></li>
          </ul>
        </details> --}}
      </li>
      <li><a href="{{ route('publishers.index') }}">Publisher</a></li>
      <li><a href="{{ route('books.index') }}">Book</a></li>
      <li><a href="{{ route('students.index') }}">Student</a></li>
      <li><a href="{{ route('borrows.index') }}">Borrow</a></li>
    </ul>
  </div>

</div>