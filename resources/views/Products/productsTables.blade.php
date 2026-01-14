
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

@extends('layout.authentication')
@section('contact')
@auth
    @if (auth()->user()->email==='aal@gmail.com')
    <div class="container">
<table id="myTable" class="display">
    <thead>
        <tr>
            <th>ID</th>
            <th>الاسم</th>
            <th>السعر</th>
            <th>العدد</th>
            <th>الوصف</th>
            <th>قسم</th>
            <th>action</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($products as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->price }}</td>
            <td>{{ $item->quantity }}</td>
            <td>{{ $item->description }}</td>
            <td>{{ $item->category->name }}</td>
            <td>
                <a href="/removeproduct/{{ $item->id }}" class="btn btn-danger btn-sm me-2"  onclick="return confirm('هل أنت متأكد من حذف هذا المنتج؟');">
                    <i class="fas fa-trash"></i>
                </a>
                <!-- زر التعديل -->
                <a href="/editeproduct/{{ $item->id }}" class="btn btn-warning btn-sm" >
                    <i class="fas fa-edit"></i>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>



    @endif
@endauth

<br/>
<br/>
<br/>


@endsection
<script>
$(document).ready(function () {
    // $('#productsTable').DataTable();
    let table=new DataTable('#myTable');
});
</script>
