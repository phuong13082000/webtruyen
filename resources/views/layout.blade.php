<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Truyện</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.theme.default.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light mb-3 mt-3">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Sách Truyện</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Trang Chủ</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Danh mục
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @foreach ($danhmuc as $key => $dm)
                                    <li><a class="dropdown-item"
                                            href="{{ url('danh-muc/' . $dm->slug) }}">{{ $dm->tendanhmuc }}</a></li>
                                @endforeach
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Thể Loại
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @foreach ($theloai as $key => $tl)
                                    <li><a class="dropdown-item"
                                            href="{{ url('the-loai/' . $tl->slug) }}">{{ $tl->tentheloai }}</a></li>
                                @endforeach
                            </ul>
                        </li>

                    </ul>

                </div>
            </div>
        </nav>

        <div class="container">
            <div class="row">
                <div class="col-lg-10">
                    <form autocomplete="off" class="form-inline my-2 my-lg-0" action="{{ url('tim-kiem') }}" method="POST">
                        @csrf
                        <input class="form-control mr-sm-2" type="search" id="keywords" name="tukhoa"
                            placeholder="Tìm kiếm tác giả, truyện" aria-label="Search">
                        <div id="search_ajax"></div>
                </div>
                <div class="col-lg-2">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </div>

        @yield('slide')

        @yield('content')

        @include('pages.footer')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"
        integrity="sha512-k2WPPrSgRFI6cTaHHhJdc8kAXaRM4JBFEDo1pPGGlYiOyv4vnA0Pp0G5XMYYxgAPmtmv/IIaQA6n5fLAyJaFMA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('js/owl.carousel.js') }}"></script>

    <!--script-owl-carousel-slider-->
    <script>
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            //nav: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 5
                }
            }
        })
    </script>

    <!--script-chọn-chương-chapter-->
    <script type="text/javascript">
        $('.select-chapter').on('change', function() {
            var url = $(this).val();

            if (url) {
                window.location = url;
            }
            return false;
        });

        current_chapter();

        function current_chapter() {
            var url = window.location.href;
            $('.select-chapter').find('option[value="' + url + '"]').attr("selected", true);
        }
    </script>

    <!--Tìm kiếm nâng cao(ajax)-->
    <script type="text/javascript">
        $('#keywords').keyup(function() {
            var keywords = $(this).val();
            if (keywords != '') {
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "{{ url('/timkiem-ajax') }}",
                    method: "POST",
                    data: {
                        keywords: keywords,
                        _token: _token
                    },
                    success: function(data) {
                        $('#search_ajax').fadeIn();
                        $('#search_ajax').html(data);
                    }
                });
            } else {
                $('#search_ajax').fadeOut();
            }
        });

        $(document).on('click', '.li_search_ajax', function() {
            $('#keywords').val($(this).text());
            $('#search_ajax').fadeOut();
        });
    </script>


</body>

</html>
