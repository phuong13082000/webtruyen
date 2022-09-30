<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    @role('admin')
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{route('user.index')}}">Admin</a>
                    </li>
                    @endrole

                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{route('danhmuc.index')}}">Danh Mục</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            Thể Loại
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{route('theloai.index')}}">Liệt Kê Thể Loại</a></li>
                            <li><a class="dropdown-item" href="{{route('theloai.create')}}">Thêm Thể Loại</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            Truyện
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{route('truyen.index')}}">Liệt Kê Truyện</a></li>
                            <li><a class="dropdown-item" href="{{route('truyen.create')}}">Thêm Truyện</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            Chapter
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{route('chapter.index')}}">Liệt Kê Chapter</a></li>
                            <li><a class="dropdown-item" href="{{route('chapter.create')}}">Thêm Chapter</a></li>
                        </ul>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
</div>

