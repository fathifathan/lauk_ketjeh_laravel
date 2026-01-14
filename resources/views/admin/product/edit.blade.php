@extends('layouts.admin')

@section('content')
<div class="edit-form-container">
    <form action="{{ route('admin.products.update', $product->id_menu) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        <img src="data:image/jpeg;base64,{{ base64_encode($product->product_img) }}" height="100">
        <input type="text" name="update_nama_menu" value="{{ $product->nama_menu }}" class="box" required>
        <input type="text" name="update_desc_menu" value="{{ $product->desc_menu }}" class="box" required>
        <input type="number" name="update_harga_menu" value="{{ $product->harga_menu }}" class="box" required>
        <input type="file" name="update_product_img" class="box" accept="image/png,image/jpg,image/jpeg">

        <button type="submit" class="btn">Update Product</button>
        <a href="{{ route('admin.products.index') }}" class="option-btn">Cancel</a>
    </form>
</div>
@endsection