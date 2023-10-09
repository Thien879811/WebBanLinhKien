@extends('layouts.client')
@section('content')
    @if (!empty($product))
        <section class="container mx-auto row mt-5">
            <div class="col-7">
                <h2>
                    {{$product->product_name}}
                </h2>
                <div>
                    <img src="{{asset('images')}}/{{$product->images}}" alt="">
                </div>
            </div>
            <div class="col-4">
                <div class="mx-auto">
                    <h4>Thông số kĩ thuật</h4>
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
        </section>
        <section class="row">
            <div class="col">{{$product->price}}</div>
            <div class="col">
                <button class="btn">Mua ngay</button>
            </div>
        </section>
    @endif
@endsection