@extends('layout.contact')
@section('contact')
<div class="mt-5">
    <div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<h1>Contact us</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>



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
   <div class="contact-from-section mt-5 mb-5">
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-lg-8">
                <div class="card shadow-lg border-0 rounded-4">

                    <div class="card-body p-4">

                        <div class="form-title text-center mb-4">
                            <h3 class="fw-bold">
                                <span class="text-warning">لا تتردد بالسؤال عن</span> منتج معين
                            </h3>
                        </div>

                        <div class="contact-form">
                            <form method="POST" action="/storeaddcontact">
                                @csrf

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <input type="text" required
                                               class="form-control"
                                               placeholder="Name"
                                               name="name"
                                               value="{{ old('name') }}">
                                        @error('name')<small class="text-danger">{{ $message }}</small>@enderror
                                    </div>

                                    <div class="col-md-6">
                                        <input type="email" required
                                               class="form-control"
                                               placeholder="Email"
                                               name="email"
                                               value="{{ old('email') }}">
                                        @error('email')<small class="text-danger">{{ $message }}</small>@enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <input type="tel" required
                                               class="form-control"
                                               placeholder="Phone"
                                               name="phone"
                                               value="{{ old('phone') }}">
                                        @error('phone')<small class="text-danger">{{ $message }}</small>@enderror
                                    </div>

                                    <div class="col-md-8">
                                        <input type="text" required
                                               class="form-control"
                                               placeholder="Subject"
                                               name="subject"
                                               value="{{ old('subject') }}">
                                        @error('subject')<small class="text-danger">{{ $message }}</small>@enderror
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <input type="text" required
                                           class="form-control"
                                           placeholder="Message"
                                           name="message"
                                           value="{{ old('message') }}">
                                    @error('message')<small class="text-danger">{{ $message }}</small>@enderror
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-warning px-5 rounded-pill fw-bold">
                                        إرسال
                                    </button>
                                </div>

                            </form>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

    <div class="find-location blue-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<p> <i class="fas fa-map-marker-alt"></i> Find Our Location</p>
				</div>
			</div>
		</div>
	</div>
    <div class="map-container" style="width:100%;height:400px;">
    <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387190.279914918!2d-74.25986620778554!3d40.69714942107585!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c250b23c8f7c53%3A0x2b6465a6de6b9a87!2sNew%20York%2C%20USA!5e0!3m2!1sen!2s!4v1676551652847!5m2!1sen!2s"
        width="100%"
        height="100%"
        style="border:0;"
        allowfullscreen=""
        loading="lazy"
        referrerpolicy="no-referrer-when-downgrade">
    </iframe>
</div>

@endsection
