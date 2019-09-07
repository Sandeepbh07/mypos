@extends('admin.master')
@section('content')
<form role="form" method="post" action="{{ route('products.store')}}" enctype="multipart/form-data">

              <div class="box-body">
              <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" class="form-control" name="name" placeholder="Name" >
                </div>
                <div class="form-group">
                <label>Categories</label>
                <select class="form-control select2"  style="width: 100%;" name="categories_id" id="categ" >
                  <option selected="selected">Select Category</option>
                  @foreach($category as $cat)
                  <option value="{{$cat->id }}" >{{ $cat->name }}</option>
                  @endforeach
                 
                </select>
                </div>
                @foreach($category as $cat)

                <div class="form-group subcate" id="sub{{$cat->id}}" style="display:none;">
                  
                <label>Subcategories</label>
                <select class="form-control subcategorychoosen"  style="width: 100%;" name="subcategories_id">
                <option selected="selected">Select</option>
                @foreach($cat->subcategories as $sub)
                  <option value="{{$sub->id}}">{{$sub->name}}</option>
                @endforeach
                 
                </select>
                </div>
                @endforeach
                <div id="subcategorydiv">


                </div>
                <div class="form-group">
                  <label for="purchase_price">Purchase price</label>
                  <input type="number" class="form-control" name="purchase_price" placeholder="Enter Purchase price" >
                </div>
                <div class="form-group">
                  <label for="selling_price">Selling Price</label>
                  <input type="number" class="form-control" name="selling_price" placeholder="Enter sellingprice" >
                </div>
                <div class="form-group">
                  <label for="discount">Discount</label>
                  <input type="number" class="form-control" name="discount" placeholder="Enter discount" >
                </div>
                </div>
                <div class="form-group">
                  <label for="VAT">VAT</label>
                  <input type="number" class="form-control" name="vat" placeholder="Enter vat" >
                </div>
                <div class="form-group">
                  <label for="quantity ">Quantity</label>
                  <input type="number" class="form-control" name="quantity" placeholder="Enter Quantity" >
                </div>
                <div class="form-group">
                  <label for="units ">Unit</label>
                  <input type="text" class="form-control" name="units" placeholder="Enter unit" >
                </div>
                <div class="form-group">
                  <label for="product_image ">Image</label>
                  <input type="file" class="form-control" name="product_images" placeholder="Upload image" >
                </div>
                <div class="form-group">
                 <button type="submit" class="btn btn-success">Submit</button>
                </div>
</div>
{{ csrf_field() }}
                </form>
                @endsection
                @section('scripts')

                <script>
                
$('#categ').change(function(){
  $('.subcate').hide();
var id=$(this).val();
$('#sub'+id).show();
})
$('.subcategorychoosen').change(function(){
  var selected=$(this).val();
$('#subcategorydiv').html(`<input type="hidden" value="${selected}" name="subcategories_id">`)

})
// $(".select2").select2({
//   maximumSelectionLength: 1
// });

                </script>
                @endsection