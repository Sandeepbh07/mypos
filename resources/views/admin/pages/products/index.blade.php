@extends('admin.master')
@section('content')
<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Products</h3>
            </div>
            <!-- /.box-header -->
            <a class="btn btn-primary" href="{{ route('products.create')  }}">Add new Product</a>
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
              <thead>
    <tr>
    <th>Product Image</th>
       <th>Product Name</th> 
       <th>Selling price</th>
       <th>Discount</th>
       <th>VAT</th>
       <th>Categories</th>
       <th>Subcategories</th>
       <th>Edit</th>
       <th>Delete</th>
       </th>
    </tr>
    </thead>
    @foreach($products as $product)
    <tbody>
    <tr>
    <td width="20%">  <img src="/images/products/{{ $product->product_image }}" class="img-responsive" style="width:100px;height:100px;" alt="Product Image"></td> 
    <td>{{ $product->name }}</td>
        <td>{{ $product->selling_price }}</td>
        <td>{{ $product->discount }}%</td>
        <td>{{ $product->vat }}%</td>
        <td>{{  $product->subcategory->category->name  }}</td> 
        <td>{{  $product->subcategory->name  }}</td> 
        <td><a href="{{ route('products.edit',$product->id)}} " class="btn btn-primary"><i class="fa fa-edit"></i>Edit</a></td>
       <td><form action="{{ route('products.destroy',$product->id)  }}" method="post">
         @method('delete')
         @csrf
         <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i>Delete</button>
       </form>
       </td>
    </tr>
@endforeach
</tbody>
</table>
            </div>
            </div>
            </div>
            </div>
</section>
@endsection
@section('scripts')
<script>
     $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : false,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    })
  })
</script>
@endsection