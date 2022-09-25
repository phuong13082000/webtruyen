<!--Slider-->

<div class="slider p-3">
    <h3>Sách nên đọc</h3>
    <div class="owl-carousel owl-theme">
        @foreach ($slide_truyen as $key => $slide)
            <div class="item"><img style="height: 250px" src="{{ asset('public/uploads/truyen/' . $slide->hinhanh) }}">
                <div class="p-3">
                    <b>{{ $slide->tentruyen }}</b>
                </div>
                <div class="p-2">
                    <a class="btn btn-primary btn-sm" href="{{ url('xem-truyen/' . $slide->slug_truyen) }}">Đọc ngay</a>
                </div>
            </div>
        @endforeach
    </div>
</div>
<!--End-Slider-->
