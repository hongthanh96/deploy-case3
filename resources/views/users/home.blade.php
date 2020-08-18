@extends('users.layouts')
@section('content')
<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="{{ asset('image/bg-1.png') }}" class="d-block w-100" style="height: 700px" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h1 class="text-center">Wedding Studio</h1>
          <h3 class="text-center">Dịch vụ chụp ảnh cưới chuyên nghiệp</h3>
        </div>
      </div>
      <div class="carousel-item">
        <img src="{{ asset('image/bg-2.jpg') }}" class="d-block w-100" style="height: 700px" alt="...">
        <div class="carousel-caption d-none d-md-block">
            <h1 class="text-center">Wedding Studio</h1>
          <h3 class="text-center">Dịch vụ chụp ảnh cưới chuyên nghiệp</h3>
        </div>
      </div>
      <div class="carousel-item">
        <img src="{{ asset('image/bg-3.jpg') }}" class="d-block w-100" style="height: 700px" alt="...">
        <div class="carousel-caption d-none d-md-block">
            <h1 class="text-center">Wedding Studio</h1>
            <h3 class="text-center">Dịch vụ chụp ảnh cưới chuyên nghiệp</h3>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  <div class="mt-5">
    <div>
        <h1 class="text-center">CÁC DỊCH VỤ CHÍNH</h1>
        <p class="text-center">Dịch vụ chuyên nghiệp với Wedding Studio – hãy liên hệ sớm với chúng tôi để nhận được nhiều ưu đãi!</p>
    </div>
    <div class="row">
        @if (isset($services))
            @forelse ($services as $service)
            <div class="col-4 d-flex justify-content-center">
                <div class="card" style="width: 18rem;">
                    <img src="{{ asset('image/service_1.png') }}" class="rounded mx-auto d-block" style="width: 70px; height: 70px" alt="...">
                    <div class="card-body">
                        <h2 class="text-center">{{ $service->name }}</h2>
                      <p class="card-text">{{ $service->description }}</p>
                    </div>
                  </div>
            </div>
            @empty
                <div>.</div>
            @endforelse
        @endif

    </div>
  </div>

  <div class="mt-5">
      <div>
          <h1 class="text-center">ALBUM TIÊU BIỂU</h1>
          <p class="text-center">Những Album tiêu biểu mà chúng tôi đã thực hiện được</p>
      </div>
      <div class="row">
          @if (isset($albumHots))
              @foreach ($albumHots as $albumHot)
                <div class="col-4 mt-3 d-flex justify-content-center">
                    <div class="card" style="width: 18rem; height: 22rem;">
                        <img src="upload/{{ $albumHot->image }}" class="card-img-top rounded mx-auto d-block" alt="..." style="height:250px;">
                        <div class="card-body mb-2">
                            <h5 class="text-center">{{ $albumHot->title }}</h5>
                        </div>
                        <a href='{{ route("home.showAlbum", $albumHot->id) }}' class="text-center btn btn-primary">Xem chi tiết</a>
                      </div>
                </div>
              @endforeach
          @endif

      </div>

  </div>

  <div class="mt-5">
      <div>
          <h1 class="text-center">BẢNG GIÁ</h1>
          <p class="text-center">Chúng tôi cung cấp nhiều gói dịch vụ cho quý khách lựa chọn</p>
      </div>
      <div class="row">
          @if (isset($packDetails))
              @foreach ($packDetails as $packDetail)
              <div class="col-4 mt-3 d-flex justify-content-center">
                <div class="card" style="width: 18rem;">
                    <h4 class="text-center text-danger">{{ $packDetail->name }}</h4>
                    <h4 class="text-center text-secondary">  {{ $packDetail->price }} VND</h4>
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item text-center">{{ $packDetail->service1 }}</li>
                      <li class="list-group-item text-center">{{ $packDetail->service2 }}</li>
                      <li class="list-group-item text-center">{{ $packDetail->service3 }}</li>
                      @if ($packDetail->service4 != null)
                      <li class="list-group-item text-center">{{ $packDetail->service4 }}</li>
                      @else
                      <li class="list-group-item text-center">Không có</li>
                      @endif
                      @if ($packDetail->service5 != null)
                      <li class="list-group-item text-center">{{ $packDetail->service5 }}</li>
                      @else
                      <li class="list-group-item text-center">Không có</li>
                      @endif
                    </ul>
                  </div>
            </div>
              @endforeach
          @endif

      </div>

  </div>




@endsection
