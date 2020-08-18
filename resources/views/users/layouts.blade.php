<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/css/alertify.min.css">
    <link rel="stylesheet" href="{{ asset('css/user.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>
<body>
    <nav class="navbar navbar-expand-md navbar-light"  style="background-color: #e3f2fd;">
        <a class="navbar-brand" href="{{ route('homepage') }}"><img src="{{ asset('image/logo.png') }}" alt="Logo" style="width:100px;"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse row" id="collapsibleNavbar">
            <div class="col-8">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('homepage') }}">Trang chủ</a>
                      </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">Album</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dịch vụ</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="#">Quay phóng sự cưới</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="#">Thuê trang phục cưới</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="#">Trang điểm cô dâu</a>
                        </div>
                      </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">Bảng giá</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Giới thiệu</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">Liên hệ</a>
                    </li>

                    @if (Auth::check() && Auth::user()->isAdmin == 1)
                    <li class="nav-item">
                      <a class="nav-link" href="{{ route('admin.home') }}">Trang quản trị</a>
                  </li>
                    @endif

                  </ul>
            </div>
            <div class="col-4 row">
                    @if (Auth::check())
                        @if (Auth::user()->isAdmin == 1)
                            <div class="col-7">
                                <a href="{{ route('login') }}" class="btn btn-outline-primary">Admin {{ Auth::user()->name }}</a>
                            </div>
                            <div class="col-5">
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <input type="submit" value="Đăng xuất" class="btn btn-outline-secondary">
                                </form>

                            </div>
                        @else
                        <div class="dropdown">
                            <a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Hello {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                              <a class="dropdown-item text-success" href="javascripts:;" onclick="ObjUser.getUser({{ Auth::user()->id }})">Xem, chỉnh sửa thông tin tài khoản</a>
                              {{-- <a class="dropdown-item" href="#">Something else here</a> --}}
                            </div>
                          </div>
                        <div class="col-5">
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <input type="submit" value="Đăng xuất" class="btn btn-outline-secondary">
                            </form>

                        </div>



                        @endif

                    @else
                    <div class="col-6">
                        <a href="{{ route('login') }}" class="btn btn-outline-primary">Đăng nhập</a>
                    </div>
                    <div class="col-6">
                        <a href="{{ route('register') }}" class="btn btn-outline-secondary">Đăng kí</a>
                    </div>
                    @endif


            </div>

        </div>

        <!-- Modal -->
<div class="modal fade " id="userModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Thông tin khách hàng</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="formUser">
              <div class="row">
                    <div class="col-4">
                        <img src="{{ asset('image/noneAvt.png') }}" id="avatar" name="avatar" style="width: 200px; height: 210px;" alt="">
                        <input type="file" accept="image/*" onchange="ObjUser.uploadAvatar(this)">
                    </div>
                    <div class="col-8">
                        <input type="hidden" id="idUser" name="idUser">
                        <input type="hidden" id="id" name="id">
                        <div class="form-group">
                            <label for="" class="">Full name: </label>
                            <input class="form-control" type="text" name="name" id="name">
                        </div>
                        <div class="form-group">
                            <label for="">Day Of Birth: </label>
                            <input class="form-control" type="date" name="DOB" id="DOB">
                        </div>
                        <div class="form-group">
                            <label for="">Telephone</label>
                            <input class="form-control" type="text" name="phone" id="phone">
                        </div>
                        <div class="form-group">
                            <label for="">Address</label>
                            <input class="form-control" type="text" name="address" id="address">
                        </div>
                    </div>
              </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" onclick="ObjUser.save()">Save changes</button>
        </div>
      </div>
    </div>
  </div>

      </nav>

            @yield('content')

      <div class="footer">
        <div class="footer-left">
            <div class="footer-left1">
                <h3>GIỚI THIỆU</h3>
                <p>Wedding Studio luôn được khẳng định là một thương hiệu về dịch vụ ảnh cưới và chụp ảnh cưới trọn gói chuyên nghiệp cùng với đội ngũ thợ chụp ảnh và chuyên gia trang điểm và nhân viên trẻ, năng động, sáng tạo, tận tình, chu đáo.</p>
                    <p><i class="fas fa-home"></i>28 Nguyễn Tri Phương,Tp. Huế</p>
                    <p><i class="far fa-envelope"></i>hi@weddingstudio.com</p>
                    <p><i class="fas fa-phone-alt"></i>0702420339</p>
            </div>
            <div class="footer-left2">
                <h3>LIÊN KẾT</h3>
                <ul>
                    <li><a href="#">Trang chủ</a></li>
                    <li><a href="#">Album</a></li>
                    <li><a href="#">Dịch vụ</a></li>
                    <li><a href="#">Bảng giá</a></li>
                    <li><a href="#">Giới thiệu</a></li>
                    <li><a href="#">Liên hệ</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-right">
            <div class="footer-right1">
                <h3>ĐĂNG KÍ NHẬN TIN</h3>
                <input type="text" name="" id="" placeholder="Nhập email của bạn">
                <div class = "input"><i>Hãy nhập email của bạn vào đây để nhận tin</i></div>
                <div class = "footer-icon">
                    <button><i class="fab fa-facebook-f"></i></button>
                    <button><i class="fab fa-twitter"></i></button>
                    <button><i class="fab fa-google-plus-g"></i></button>
                    <button><i class="fab fa-youtube"></i></button>
                    <button><i class="fab fa-instagram"></i></button>
                </div>
            </div>
            <div class="footer-right2">
                <h3>KẾT NỐI VỚI CHÚNG TÔI</h3>
                <img src="" alt="">
            </div>
        </div>
    </div>

    <script src="https://kit.fontawesome.com/607b7b9d04.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/alertify.min.js"></script>
    <script src="{{ asset('js/infoUser.js') }}"></script>

</body>
</html>


