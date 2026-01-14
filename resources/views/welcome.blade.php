@extends('layout.master')
@section('contact')

    <div class="product-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3><span class="orange-text">اقسام </span> الموقع</h3>
                        <h4>متعه التسوق عبر فروعنا</h4>
                    </div>
                </div>
            </div>

            <div class="row">
                @if ($categories->isEmpty())
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
                                !!لا توجد أقسام حاليا .. سيتم اضافه اقسام قريبا....ترقبو
                            </div>

                @else
                    @foreach ($categories as $item)
                        <div class="col-lg-4 col-md-6 text-center">
                            <div class="single-product-item">
                                <div class="product-image">
                                    <a href="{{ route('pro',['catid'=>$item->id]) }}"><img src={{ $item->imgepath }}
                                            style="max-height:250px !important;min-height:250px !important" alt=""></a>
                                </div>
                                <h3>{{ $item->name }}</h3>
                                <p>{{$item->description }}</p>
                            </div>
                        </div>
                    @endforeach

                @endif

            </div>
        </div>
    </div>
@endsection
