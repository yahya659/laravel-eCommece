@extends('layout.authentication')
@section('contact')
    <div class="contact-from-section mt-50 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3><span class="orange-text">اضافه</span> منتج</h3>

                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-lg-12 mb-5 mb-lg-0">
                    <div id="form_status"></div>
                    <div class="contact-form">

                        <form method="POST" enctype="multipart/form-data" action="/storeproduct">
                            @csrf {{-- الحمايه--}}
                            <p>
                                <input type="text" required value="{{ old('name') }}" placeholder="Name" name="name"
                                    id="name" style="width:100%">
                                <span class="text-danger">
                                    @error('name')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </p>
                            <p style="display: flex">
                                <input type="number" required value="{{ old('quantity') }}" placeholder="Quantity"
                                    name="quantity" id="quantity" style="width: 50%">
                                <span class="text-danger">
                                    @error('quantity')
                                        {{ $message }}
                                    @enderror
                                </span>
                                <input type="number" required value="{{ old('price') }}" placeholder="price" name="price"
                                    id="price" style="width: 50%">
                                <span class="text-danger">
                                    @error('price')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </p>
                            <p><textarea required name="description" id="description" cols="30" rows="10"
                                    placeholder="description">
                                                {{ old('description') }}
                                            </textarea>
                            </p>
                            <span class="text-danger">
                                @error('description')
                                    {{ $message }}
                                @enderror
                            </span>
                            </span>
                                <input type="file"  value="{{ old('imagepath') }}" placeholder="photo" name="photo"
                                    id="photo" class="from-control" >
                                <span class="text-danger">
                                    @error('photo')
                                        {{ $message }}
                                    @enderror
                                </span>
                            <p>
                                <select class="text-danger" name="category_id" id="category_id">
                                    @foreach ($allcategry as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                    </selecte>
                            </p>
                            <p><input type="submit" value="Submit"></p>

                        </form>

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
