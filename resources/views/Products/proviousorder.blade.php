@extends('layout.authentication')
@section('contact')

<div class="col-lg-8 mx-auto">
    <div class="checkout-accordion-wrap">
        <div class="accordion" id="accordionExample">

            @foreach ($orders as $index => $item)
            <div class="card single-accordion mb-3">
                <div class="card-header" id="heading{{ $index }}">
                    <h5 class="mb-0">
                        <button class="btn btn-link" type="button" data-toggle="collapse"
                                data-target="#collapse{{ $index }}" aria-expanded="true"
                                aria-controls="collapse{{ $index }}">
                            Order Number: {{ $item->id }}
                        </button>
                    </h5>
                </div>

                <div id="collapse{{ $index }}" class="collapse @if($index == 0) show @endif"
                     aria-labelledby="heading{{ $index }}" data-parent="#accordionExample">
                    <div class="card-body">


                        <form>
                            <div class="mb-3">
                                <label class="form-label">الاسم</label>
                                <input type="text" name="name" id="name{{ $index }}"
                                       class="form-control" placeholder="Name" required
                                       value="{{ $item->name }}">
                            </div>

                            <div class="mb-3">
                                <label  class="form-label">البريد الالكتروني</label>
                                <input type="email" name="email" id="email{{ $index }}"
                                       class="form-control" placeholder="Email" required
                                       value="{{ $item->email }}">
                            </div>

                            <div class="mb-3">
                                <label  class="form-label">العنوان</label>
                                <input type="text" name="address" id="address{{ $index }}"
                                       class="form-control" placeholder="Address" required
                                       value="{{ $item->address }}">
                            </div>

                            <div class="mb-3">
                                <label  class="form-label">رقم الهاتف</label>
                                <input type="tel" name="phone" id="phone{{ $index }}"
                                       class="form-control" placeholder="Phone" required
                                       value="{{ $item->phone }}">
                            </div>

                            <div class="mb-3">
                                <label  class="form-label">ملاحظات</label>
                                <textarea name="note" id="note{{ $index }}" class="form-control"
                                          cols="30" rows="5" placeholder="Say Something">{{ $item->note }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label  class="form-label">تاريخ الطلب</label>
                                <textarea name="note" id="note{{ $index }}" class="form-control"
                                          cols="30" rows="5" placeholder="Say Something">{{ $item->created_at }}</textarea>
                            </div>
                        </form>


                        <div class="table-responsive">
                            <table class="cart-table table table-bordered text-center align-middle">
                                <thead class="cart-table-head table-light">
                                    <tr class="table-head-row">
                                        <th>#</th>
                                        <th>الصوره</th>
                                        <th>اسم المنتج</th>
                                        <th>السعر</th>
                                        <th>الكمية</th>
                                        <th>المجموع</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($item->Orderditel as $detals)
                                    <tr class="table-body-row">
                                        <td>-</td>
                                        <td>

                                                <img src="{{ asset($detals->product->imagepath) }}"
                                                     alt="{{ $detals->product->name }}" width="80">

                                        </td>
                                        <td>{{ $detals->product->name ?? 'غير معروف' }}</td>
                                        <td>{{ $detals->price }} $</td>
                                        <td>{{ $detals->quantity }}</td>
                                        <td>{{ ($detals->price ) * ($detals->quantity ) }} $</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>

@endsection

