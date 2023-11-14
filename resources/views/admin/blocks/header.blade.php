<h1 class='justify-content-center'>Trang Quản lý</h1>
<header class="border-bottom border-dark">
    <ul class="nav justify-content-center mt-3">
        <li class="nav-item">
            <a class="nav-link active" href="{{route('admin.page')}}" aria-current="page">Sản phẩm</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="{{route('admin.addproduct')}}" aria-current="page">Thêm sản phẩm</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.order')}}">Đơn hàng</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.user')}}">Tài khoản người dùng</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('home')}}">Thoát</a>
        </li>
    </ul>
</header>