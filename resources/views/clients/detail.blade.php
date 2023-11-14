@extends('layouts.client')
@section('content')
    @if (!empty($product))
    <h2>Chi tiết sản phẩm</h2>
    <div class="container mt-4">
        <div id="thongbao" class="alert alert-danger d-none face" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>

        <div class="card">
            <div class="container-fliud">
                <form name="frmsanphamchitiet" id="frmsanphamchitiet" method="post"
                    action="/php/twig/frontend/giohang/themvaogiohang">
                    <div class="wrapper row">
                        <div class="col-md-6">
                            <img src="{{asset('images')}}/{{$product->images}}" style="width: 300px;">
                        </div>
                        <div class="details col-md-6">
                            <h3 class="product-title"> {{$product->product_name}}</h3>
                            <div class="rating">
                                <div class="stars">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                </div>
                            </div>
                            <h4 class="price">Giá hiện tại: <span>{{$product->price}}</span></h4>
                            <p class="vote"><strong>100%</strong> hàng <strong>Chất lượng</strong>, đảm bảo
                                <strong>Uy
                                    tín</strong>!</p>
                            <div class="action">
                                <a class="add-to-cart btn btn-primary mt-3" id="btnThemVaoGioHang" href="{{route('addcart',$product->id)}}">Thêm vào giỏ hàng</a>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
        <div class="mt-5">
            <div class="container-fluid">
                <h3>Thông tin chi tiết về Sản phẩm</h3>
                @foreach ($fill as $items)
                        @php
                            $fill=$items->fillable
                        @endphp
                        @foreach ($detail as $item)
                            @if ($item -> $fill != null)
                                <div class='row mt-2'>
                                    <h5 class='col'>{{$items->name}}:</h5>
                                    <h5 class='col'>{{$item -> $fill}}</h5> 
                                </div>
                            @endif
                        @endforeach
                @endforeach
            </div>
        </div>
    </div>
    @endif
@endsection