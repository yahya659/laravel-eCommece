@extends('layout.authentication')
@section('contact')
    <div class="contact-from-section mt-50 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3><span class="orange-text">تعديل</span> منتج</h3>

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
                                <input type="hidden" required value="{{ $product->id }}" placeholder="" name="id" id="id"
                                    style="width:100%">
                            </p>
                            <p>
                                <input type="text" required value="{{ $product->name }}" placeholder="Name" name="name"
                                    id="name" style="width:100%">
                                <span class="text-danger">
                                    @error('name')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </p>
                            <p style="display: flex">
                                <input type="number" required value="{{ $product->quantity}}" placeholder="Quantity"
                                    name="quantity" id="quantity" style="width: 50%">
                                <span class="text-danger">
                                    @error('quantity')
                                        {{ $message }}
                                    @enderror
                                </span>
                                <input type="number" required value="{{ $product->price}}" placeholder="price" name="price"
                                    id="price" style="width: 50%">
                                <span class="text-danger">
                                    @error('price')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </p>
                            <p><textarea required name="description" id="description" cols="30" rows="10"
                                    placeholder="description">
                                                    {{ $product->description }}
                                            </textarea>
                            </p>
                            <span class="text-danger">
                                @error('description')
                                    {{ $message }}
                                @enderror
                            </span>
                            <input type="file"  placeholder="photo" name="photo" id="photo" class="form-control">
                            <span class="text-danger">
                                @error('photo')
                                    {{ $message }}
                                @enderror
                            </span>
                            <img src="{{ asset($product->imagepath) }}" width="200px" height="200px" />

                            <p>
                                <select class="form-control" name="category_id" id="category_id">
                                    @foreach ($allcategry as $item)
                                        @if($product->category_id == $item->id)
                                            <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                                        @else
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endif
                                    @endforeach
                                    </selecte>
                            </p>
                            <p><input type="submit" value="حفظ"></p>

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
    <br/>
    <br/>
@endsection
