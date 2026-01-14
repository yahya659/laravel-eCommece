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
@extends ('layout.master');
@section('contact')

    @if ($products->isEmpty())
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
            🚫 لاتوجد منتجات حاليا سيتم الااضافه قريبا
        </div>
    @else
        <div class="product-section mt-150 mb-150">
            <div class="container ">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2 text-center">
                        <div class="section-title">
                            <h3><span class="orange-text">جميع</span> منتجاتنا في القسم الذي اخترته</h3>
                            <p>استمتع باختيار منتجاتنا المميزة، حيث كل منتج يمنحك فرصة لتجربة شيء جديد ويبرز ذوقك وأسلوبك الخاص
                                بطريقة ممتعة وسهلة</p>
                        </div>
                    </div>
                </div>
                <div class="row">

                   @foreach ($products as $item)
    <div class="col-lg-4 col-md-6 text-center">
        <div class="single-product-item">
            <div class="product-image">
                <a href="/single/{{ $item->id }}">
                    <img src="{{ asset($item->imagepath) }}" alt=""
                         style="max-height:250px; min-height:250px">
                </a>
            </div>

            <h3>{{ $item->name }}</h3>

            <p class="product-price">
                <span>{{ $item->quantity }} الكمية</span>
                {{ $item->price }} $
            </p>

            <p class="product-price">
                <span>{{ $item->description }}</span>
            </p>

            <a href="/addproducttocart/{{ $item->id }}" class="cart-btn">
                <i class="fas fa-shopping-cart"></i> Add to Cart
            </a>

            {{-- يظهر فقط للمستخدم المسجل --}}
            @auth
            @if (auth()->user()->email==='aal@gmail.com')
            <div class="mt-2">
                    <a href="/removeproduct/{{ $item->id }}" class="btn btn-danger btn-sm me-2">
                        <i class="fas fa-trash"></i> حذف
                    </a>

                    <a href="/editeproduct/{{ $item->id }}" class="btn btn-warning btn-sm">
                        <i class="fas fa-edit"></i> تعديل
                    </a>
                </div>
            @endif
            @endauth
        </div>
    </div>
@endforeach

                    <div style="text-align: center;">
                    {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>


    @endif

@endsection

<style>
    /* خاصه بالصفحات */
    svg{
        height: 50px !important;

    }
</style>
