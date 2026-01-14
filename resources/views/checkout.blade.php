@extends('layout.authentication')
@section('contact')
<div class="container mt-5">
    <div class="col-lg-8 mx-auto">
					<div class="checkout-accordion-wrap">
						<div class="accordion" id="accordionExample">
						  <div class="card single-accordion">
						    <div class="card-header" id="headingOne">
						      <h5 class="mb-0">
						        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
						          Billing Address
						        </button>
						      </h5>
						    </div>

						    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
						      <div class="card-body">
						        <div class="billing-address-form">
						        	<form action="/sendcart" method="post">
                                        @csrf
						        		<p><input required type="text" name="name" id="name" placeholder="Name"></p>
						        		<p><input required type="email" name="email" id="email" placeholder="Email"></p>
						        		<p><input type="text" required name="address" id="address" placeholder="Address"></p>
						        		<p><input type="tel" required name="phone" id="phone" placeholder="Phone"></p>
						        		<p><textarea name="note" id="note" cols="30" rows="10" placeholder="Say Something"></textarea></p>
                                        <input  type="submit" class="btn btn-primary btn-lg" value="ارسال الطلب">
						        	</form>
						        </div>
						      </div>
						    </div>
						  </div>


						</div>

					</div>
                     <div class="card single-accordion">
						    <div class="card-header" id="headingThree">
						      <h5 class="mb-0">
						        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
						          Card Details
						        </button>
						      </h5>
						    </div>
						    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample" style="">
						      <div class="card-body">
						        <div class="card-details">

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
                    <br/>
                    <br/>
                    @endsection
