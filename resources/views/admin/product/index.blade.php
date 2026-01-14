@extends('layouts.admin')
@section('title','Admin Panel')

@section('content')
@if(session('flash'))
   <div class="message auto-hide">{{ session('flash') }}</div>
@endif

<section>
<form action="{{ route('admin.products.store') }}" method="post" enctype="multipart/form-data" class="add-product-form">
   @csrf
   <h3>Add a New Product</h3>
   <input type="text" name="nama_menu" placeholder="Enter the product name" class="box" required>
   <input type="text" name="desc_menu" placeholder="Enter the product description" class="box" required>
   <input type="number" name="harga_menu" min="0" placeholder="Enter the product price" class="box" required>
   <input type="file" class="box" name="product_img" accept="image/png, image/jpg, image/jpeg" required>
   <input type="submit" value="Add the product" class="btn">
</form>
</section>

<section class="display-product-table">
   <table>
      <thead>
         <th>Product Image</th>
         <th>Name</th>
         <th>Description</th>
         <th>Price</th>
         <th>Action</th>
      </thead>
      <tbody>
         @forelse($products as $product)
         <tr>
            <td>
                <img src="{{ Storage::url($product->product_img) }}" height="100">
            </td>
            <td>{{ $product->nama_menu }}</td>
            <td>{{ $product->desc_menu }}</td>
            <td>Rp {{ $product->harga_menu }}</td>
            <td>
               <form action="{{ route('admin.products.destroy',$product->id_menu) }}" method="post" style="display:inline">
                  @csrf @method('DELETE')
                  <button type="submit" class="delete-btn" onclick="return confirm('Delete this product?')">Delete</button>
               </form>
               <a href="{{ route('admin.products.edit',$product->id_menu) }}" class="option-btn">Update</a>
            </td>
         </tr>
         @empty
         <tr><td colspan="5">No product added</td></tr>
         @endforelse
      </tbody>
   </table>
</section>
@endsection