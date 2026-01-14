@extends('layout.authentication')

@section('contact')
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

<div class="cart-section mt-100 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-12">
					<div class="cart-table-wrap">




    <table class="cart-table">
        <thead class="cart-table-head">
            <tr class="table-head-row">
                <th class="product-remove"></th>
                <th class="product-image">Product Image</th>
                <th class="product-name">Name</th>
                <th class="product-price">Price</th>
                <th class="product-quantity">Quantity</th>
                <th class="product-total">Total</th>
            </tr>
        </thead>

    <tbody>
        @foreach ($cartproduct as $item)
            <tr class="table-body-row">

                <td class="product-remove">
                    <a href="/removecart/{{ $item->id }}"><i class="far fa-window-close"></i></a>
                </td>

                <td class="product-image">
                    @if(! $item->product->imagepath==null)
                        <img
                            src="{{  $item->product->imagepath}}"
                            alt="{{ $item->product->name }}"
                            width="80">
                    @else
                        No Image
                    @endif
                </td>

                <td class="product-name">

                        {{ $item->product->name }}

                </td>

                <td class="product-price">
                    {{ $item->product->price }} $
                </td>

                <td class="product-quantity">
                    {{ $item->quantity }}
                </td>

                <td class="product-total">
                    {{ ($item->product->price ?? 0) * $item->quantity }} $
                </td>

            </tr>
        @endforeach
    </tbody>
</table>


					</div>
				</div>

				<div class="col-lg-4">
					<div class="total-section">
                        @php
    $totalPrice = 0;
    foreach ($cartproduct as $item) {
        $totalPrice += ($item->product->price ?? 0) * $item->quantity;
    }
@endphp

					<table class="total-table">
    <thead class="total-table-head">
        <tr class="table-total-row">
            <th>Total</th>
            <th>Price</th>
        </tr>
    </thead>
    <tbody>
        <tr class="total-data">
            <td><strong>Total:</strong></td>
            <td>${{ number_format($totalPrice, 2) }}</td>
        </tr>
    </tbody>
</table>

						<div class="cart-buttons">

							<a href="/checkout" class="boxed-btn black">Check Out</a>
							<a href="/proviousorder" class="boxed-btn black">الطلبات السابقه</a>
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

