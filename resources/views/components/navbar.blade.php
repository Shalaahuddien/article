<div class="navbar bg-base-300 shadow-xl ">
    <div class="navbar-start">
        <div class="dropdown">
            <label tabindex="0" class="btn btn-ghost lg:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
                </svg>
            </label>
            <ul tabindex="0" class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52">
                <li><a href="{{ route('homepage') }}">Homepage</a></li>
                <li><a href="{{ route('tag.list') }}">Daftar Tag</a></li>
            </ul>
        </div>
        <a href="{{ route('homepage') }}"class="btn btn-ghost normal-case text-xl">Task-Zone</a>
    </div>
    <div class="navbar-center hidden lg:flex">
        <ul class="menu menu-horizontal p-0">
            <li>
                <a href="{{ route('homepage') }}" @if ($pageActive === 'Task-Zone ~ Homepage') class="active" @endif>
                    Homepage
                </a>
            </li>
            <li><a href="{{ route('tag.list') }}" @if ($pageActive === 'Task-Zone ~ Daftar Tag') class="active" @endif>Daftar Tag</a>
            </li>
        </ul>
    </div>
    <div class="navbar-end">
    </div>
</div>
