
<header class="bg-primary">
    <div class="header-top">
        <div class="navbar d-flex container">
            <div class="url justify-content-start">
                <a class="text-decoration-none text-light m-2" href="http://">linhkien.com</a>
            </div>
            <div class="icon justify-content-end">
                <i class="text-light fa-brands fa-facebook m-2"></i>
                <i class="fa-brands fa-google text-light m-2"></i>
                <i class="fa-brands fa-twitter text-light m-2"></i>
                <i class="fa-brands fa-tiktok text-light m-2"></i>
            </div>
        </div>
    </div>
    <nav class="container d-flex align-content-center navbar">
        <!-- logo -->
        <div class="justify-content-start logo_group">
            <div class="logo">
                <a class="text-decoration-none text-ligh logo_text" href="{{ route('home') }}">
                    <img class="logo_img" src="{{asset('assets/clients/logo/Slide1.png')}}" alt="">
                </a>
            </div>
        </div>
        <!-- /tìm kiếm/ -->  
        <div class="justify-content-center search_group">
            <form action="{{route('home')}}" method="post">
                <div class="">
                    <div class="align-items-center">
                        <div class="input-group input-group1 mt-2 bg-light">
                            <input type="search" name="search" class="form-control form-control1" placeholder="Nhập từ khóa cần tìm"
                                aria-label="Search" aria-describedby="button-addon2" >
                                @csrf
                            <button class="btn btn1 btn-dark" type="submit" id="button-addon2" >
                                <a class="text-decoration-none text-light" href=""><i class="fa fa-search "></i></a>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    
        <div class="nav justify-content-end dropdown end_group">
            <!-- gio hang -->
            <div class="cart align-content-center">
                <a href="{{ route('showcart') }}" class=" btn btn-primary mt-2">
                    <i class="cart_icon fa-solid fa-cart-shopping"></i>
                    <label class="cart_text" for="">Giỏ hàng</label>
                </a>
            </div>
           
            <!-- menu nguoi dung -->
            <button class=" mt-3 btn_user btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="user_icon fa-solid fa-user"></i>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                @if (session('fullname'))
                <div class="mb-2">{{session('fullname')}}</div>
                <li><a class="text-decoration-none dropdown-item" href="{{route('taikhoan.') }}">Tài khoản</a></li>
                <li><a class="text-decoration-none dropdown-item" href="{{route('logout')}}">Đăng xuất</a></li>
                <li>
                    @if(session('admin'))
                    <a class="text-decoration-none dropdown-item" href="{{route('admin.page')}}">Trang quản lý</a>
                    @endif 
                @else
                   <li><a class="text-decoration-none dropdown-item" href="{{route('register')}}">Đăng ký</a></li>
                   <li><a class="text-decoration-none dropdown-item" href="{{route('login')}}">Đăng nhập</a></li>
                @endif
            </ul>
        </div>
    </nav>
    </header>