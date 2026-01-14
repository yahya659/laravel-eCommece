@extends('layout.master')
@section('contact')

    <div class="contact-from-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3><span class="orange-text">اراء</span> العملاء</h3>

                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-lg-12 mb-5 mb-lg-0">
                    <div id="form_status"></div>
                    <div class="contact-form">

                        <form method="POST" action="/storeReview">
                            @csrf {{-- الحمايه--}}
                            <p>
                                <input type="text" required value="" placeholder="Name" name="name"
                                    id="name" style="width:100%">
                                <span class="text-danger">
                                    @error('name')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </p>
                            <p style="display: flex">
                                <input type="text" required value="" placeholder="subject"
                                    name="subject" id="subject" style="width: 50%">
                                <span class="text-danger">
                                    @error('subject')
                                        {{ $message }}
                                    @enderror
                                </span>
                                <input type="text" required value="" placeholder="massage" name="massage"
                                    id="massage" style="width: 50%">
                                <span class="text-danger">
                                    @error('massage')
                                        {{ $message }}
                                    @enderror
                                </span>





                            <p><input type="submit" value="Submit"></p>

                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>




<div class="testimonail-section mt-80 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1 text-center">
					<div class="testimonial-sliders">
                        @foreach($reviews as $item)
                        <div class="single-testimonial-slider">
							<div class="client-avater">
								<img src="assets/img/avaters/avatar1.png" alt="">
							</div>
							<div class="client-meta">
								<h3>{{$item->name}} <span>{{$item->subject}}</span></h3>
								<p class="testimonial-body">
                                    {{ $item->massage }}
								</p>
								<div class="last-icon">
									<i class="fas fa-quote-right"></i>
								</div>
							</div>
						</div>

                        @endforeach

						<div class="single-testimonial-slider">
							<div class="client-avater">
								<img src="assets/img/avaters/avatar2.png" alt="">
							</div>
							<div class="client-meta">
								<h3>David Niph <span>Local shop owner</span></h3>
								<p class="testimonial-body">
									" Sed ut perspiciatis unde omnis iste natus error veritatis et  quasi architecto beatae vitae dict eaque ipsa quae ab illo inventore Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium "
								</p>
								<div class="last-icon">
									<i class="fas fa-quote-right"></i>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>

@endsection
