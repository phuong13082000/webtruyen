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

    <style>
        .switch_color {
            background: #181818;
            color: #fff;
        }

        .switch_color_light {
            background: #181818 !important;
            color: #000;
        }

        .li_search_ajax {
            padding: 15px 5px;
            list-style: none;
        }

        .li_search_ajax>a {
            text-transform: uppercase;
            color: #000;
            text-decoration: none;
        }
    </style>

    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light mb-3 mt-3 p-3">
            <a class="navbar-brand" href="#">Sách Truyện</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
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

                    <select id="switch_color">
                        <option value="trang">Bật đèn</option>
                        <option value="den">Tắt đèn</option>
                    </select>

                </ul>

                <form autocomplete="off" class="d-flex" action="{{ url('tim-kiem') }}" method="POST">
                    @csrf
                    <input class="form-control me-2" type="search" id="keywords" name="tukhoa"
                        placeholder="Tìm kiếm tác giả, truyện" aria-label="Search">
                    <div id="search_ajax"></div>

                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>

            </div>

        </nav>

        @yield('slide')

        @yield('content')

        @include('pages.footer')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"
        integrity="sha512-k2WPPrSgRFI6cTaHHhJdc8kAXaRM4JBFEDo1pPGGlYiOyv4vnA0Pp0G5XMYYxgAPmtmv/IIaQA6n5fLAyJaFMA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
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

    <!--Đổi màu web-->
    <script type="text/javascript">
        $(document).ready(function() {
            if (localStorage.getItem('switch_color') !== null) {
                const data = localStorage.getItem('switch_color');
                const data_obj = JSON.parse(data);
                $(document.body).addClass(data_obj.class_1);
                $('.album').addClass(data_obj.class_2);
                //$('div > nav').toggleClass('navbar-black bg-black');

                $("select option[value='den']").attr("selected", "selected");
            }
        });

        $("#switch_color").change(function() {
            $(document.body).toggleClass('switch_color');
            $('.album').toggleClass('switch_color_light');
            $('.noidungchuong').addClass('noidung_color');
            //$('div > nav').toggleClass('navbar-light bg-light');

            if ($(this).val() == 'den') {
                var item = {
                    'class_1': 'switch_color',
                    'class_2': 'switch_color_light'
                }
                localStorage.setItem('switch_color', JSON.stringify(item));
            } else if ($(this).val() == 'trang') {
                localStorage.removeItem('switch_color');
                $('ul.navbar > li > a').css('color', '#000');
            }
        });
    </script>

</body>

</html>
