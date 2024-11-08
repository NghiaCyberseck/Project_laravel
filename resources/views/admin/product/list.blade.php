@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th style="width: 50px">ID</th>
            <th>Tên Sản Phẩm</th>
            <th>Giá Gốc</th>
            <th>Giá Khuyến Mãi</th>
            <th>Active</th>
            <th style="width: 100px">&nbsp;</th>
        </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ number_format($product->price) }} VNĐ</td>
                <td>{{ number_format($product->price_sale) }} VNĐ</td>
                
                <td>{!! \App\Helpers\Helper::active($product->active) !!}</td>
                <td>
                 @php
                 // Tách chuỗi thành mảng các URL hình ảnh
                $thumbUrls = explode(',', $product->thumb);
                $firstImage = trim($thumbUrls[0]); // Lấy hình ảnh đầu tiên và loại bỏ khoảng trắng thừa
                @endphp

                @if($firstImage)
                <a href="{{ $firstImage }}" target="_blank">
                <img src="{{ $firstImage }}" height="48px">
                </a>
                @else
                    <span>No Image</span> <!-- Nếu không có ảnh -->
                @endif
                </td>
                
                <td>
                    <a class="btn btn-primary btn-sm" href="/admin/products/edit/{{ $product->id }}">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

@endsection
