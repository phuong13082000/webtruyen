<div class="container">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">

    <div class="container-fluid">

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('home')}}">Admin</a>
            </li>

            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Quản Lý Danh Mục
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="{{route('danhmuc.index')}}">Liệt Kê Danh Mục</a></li>
                <li><a class="dropdown-item" href="{{route('danhmuc.create')}}">Thêm Danh Mục</a></li>
            </ul>
            </li>

            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Quản Lý Truyện
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="{{route('truyen.index')}}">Liệt Kê Truyện</a></li>
                <li><a class="dropdown-item" href="{{route('truyen.create')}}">Thêm Truyện</a></li>
            </ul>
            </li>
        </ul>

        </div>
    </div>
    </nav>

</div>
