
<header class="bg-primary">
        <div class="header-top"></div>
        <nav class="nav nav-bar">
            <div class="">
                <div><a class="text-decoration-none text-light" href="{{ route('home') }}">Home|</a></div>
            </div>
            <form action="" method="post">
                <div class=" position-relative search">
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
            <div class="">
                @if(session('admin'))
                    <div><a class="text-decoration-none text-light" href="{{route('admin.page')}}">Trang quản lý</a></div>
                @endif
                @if (session('fullname'))
                    <div class="mb-2">{{ session('fullname') }}</div>
                    <div><a class="text-decoration-none text-light" href="{{ route('taikhoan.') }}">Tài khoản</a></div>
                    <button class="btn btn1 btn-dark" type="button" id="button-addon2" >
                        <a class="text-decoration-none text-light" href="{{route('logout')}}">Đăng xuất</a>
                    </button>
                @else
                    <button class="btn btn1 btn-dark" type="button" id="button-addon2" >
                        <a class="text-decoration-none text-light" href="{{route('register')}}">Đăng ký</a>
                    </button>
                    <button class="btn btn1 btn-dark" type="button" id="button-addon2" >
                        <a class="text-decoration-none text-light" href="{{route('login')}}">Đăng nhập</a>
                    </button>
                @endif
            </div>
        </nav>
</header>