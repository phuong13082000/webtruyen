<!--Slider-->

<div class="p-3">
    <h3>Sách nên đọc</h3><br><br>
    <div class="owl-carousel owl-theme">
        @foreach ($slide_truyen as $key => $slide)
            <div class="item"><img src="{{ asset('public/uploads/truyen/' . $slide->hinhanh) }}">
                <div class="p-3">
                    <b>{{ $slide->tentruyen }}</b>
                    <div class="row">
                        <p><i class="fas fa-eye"><span class="m-2"> </span></i></p>
                        <a class="btn btn-primary btn-sm" href="{{ url('xem-truyen/' . $slide->slug_truyen) }}">Đọc
                            ngay</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
<!--End-Slider-->
