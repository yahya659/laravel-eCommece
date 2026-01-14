@extends('layout.authentication')
@section('contact')
<div class="single-product mt-150 mb-150">
		<div class="container">
        <div class="row">
				<div class="col-md-5">
					<div class="single-product-img">
						<img src="{{asset( $single->imagepath)}}" alt="">
					</div>
				</div>
				<div class="col-md-7">
					<div class="single-product-content">
						<h3>{{ $single->name}}</h3>
						<p class="single-product-pricing"> {{ $single->price}} $</p>
						<p>{{ $single->description }}.</p>
						<div class="single-product-form">

							<a href="/addproducttocart/{{ $single->id }}" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>

						</div>

					</div>
				</div>
			</div>

		</div>
	</div>
    <br/>
    <br/>
    <br/>
    <br/>
@endsection
