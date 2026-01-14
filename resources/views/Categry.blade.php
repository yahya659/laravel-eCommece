@if(session('success'))
    <div style="
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
            font-weight: bold;
            text-align: center;
        ">
        {{ session('success') }}
    </div>
@endif
@extends('layout.master')
@section('contact')
    <div class="product-section mt-150 mb-150">
        <div class="container">


            <div class="row">
                <div class="col-md-12">
                    <div class="product-filters">
                        <ul>


                            @foreach ($categry as $item)
                                <li data-filter="._{{ $item->id }}">{{$item->name}}</li>
                            @endforeach
                            <li class="active" data-filter="*">الكل</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row product-lists">
                @if ($product->isEmpty())
                    <div style="
                                        text-align: center;
                                        padding: 15px;
                                        background-color: #fff3cd;
                                        color: #856404;
                                        border-radius: 5px;
                                        font-weight: bold;
                                        margin: 20px auto;
                                        width: 50%;
                                    ">
                         لاتوجد منتجات حاليا سيتم الااضافه قريبا
                    </div>
                @else
                    @foreach ($product as $item)
                        <div class="col-lg-4 col-md-6 text-center _{{ $item->category_id }}">
                            <div class="single-product-item" >
                                <div class="product-image" style="max-height: 250px; min-height: 250px !important;">
                                    <a href="/single/{{ $item->id }}"><img src={{ $item->imagepath}}
                                            style="max-height: 250px; min-height: 250px !important;" alt=""></a>
                                </div>

                                <p class="product-price"><span>  {{ $item->quantity }}</span> {{$item->price}}$ </p>
                                <h3>{{$item->name}}</h3>
                                <p class="product-price"><span> {{ $item->description }}</span></p>
                                @if (auth()->user()->email=='aal@gmail.com')
                                    <a href="/removeproduct/{{ $item->id }}" class="btn btn-danger btn-sm me-2">
                                    <i class="fas fa-trash"></i> حذف
                                </a>

                                <a href="/editeproduct/{{ $item->id }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i> تعديل
                                </a>

                                @endif

                                <a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>


                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="pagination-wrap">
                        <ul>
                            <li><a href="#">Prev</a></li>
                            <li><a href="#">1</a></li>
                            <li><a class="active" href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">Next</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
