
<header class="bg-primary">
    <div class="header-top"></div>
    <nav class="container d-flex mx-auto align-content-center navbar mt-3">
        <div class="justify-content-start">
            <div><a class="text-decoration-none text-light" href="{{ route('home') }}">Home|</a></div>
        </div>
        {{-- tìm kiếm --}}
        <div class="justify-content-center">
            <form action="" method="post">
                <div class="">
                    <div class="align-items-center">
                        <div class="input-group input-group1 mt-2 bg-light">
                            <input type="search" class="form-control form-control1" placeholder="Nhập từ khóa cần tìm"
                                aria-label="Search" aria-describedby="button-addon2" >
                            <button class="btn btn1 btn-dark" type="button" id="button-addon2" >
                                <a class="text-decoration-none text-light" href="#"><i class="fa fa-search "></i></a>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div>
            <a href="{{ route('showcart') }}" class="btn btn-primary mt-2"><i class="fa-regular fa-cart-shopping"></i></a>
        </div>
        <div>
            @if(session('admin'))
            <div><a class="text-decoration-none text-light" href="{{route('admin.page')}}">Trang quản lý</a></div>
        @endif
        </div>
        <div class="nav justify-content-end">
            <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown"><i class="fa-regular fa-user"></i></button>
            <ul class="dropdown-menu">
                @if (session('fullname'))
                <div class="mb-2">{{ session('fullname') }}</div>
                <li><a class="text-decoration-none text-light dropdown-item" href="{{route('taikhoan.') }}">Tài khoản</a></li>
                <li><a class="text-decoration-none text-light dropdown-item" href="{{route('logout')}}">Đăng xuất</a></li>
                @else
                    <button class="btn btn1 btn-dark" type="button" id="button-addon2" >
                        <a class="text-decoration-none text-light" href="{{route('register')}}">Đăng ký</a>
                    </button>
                    <button class="btn btn1 btn-dark" type="button" id="button-addon2" >
                        <a class="text-decoration-none text-light" href="{{route('login')}}">Đăng nhập</a>
                    </button>
                @endif
                <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown"><i class="fa-regular fa-user"></i></button>
                <li class="dropdown-item"></li>
                <li class="dropdown-item"></li>
            </ul>
        </div>
    </nav>
</header>