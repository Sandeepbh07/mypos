@extends('admin.master')
@section('content')
<form role="form" method="post" action="{{ route('products.update',$products->id)}}">
<input type="hidden" class="form-control" name="_method" placeholder="Name" value=" PUT" >
              <div class="box-body">
                <div class="row">
              <div class="form-group col-lg-6">
                  <label for="name">Name</label>
                  <input type="text" class="form-control" name="name" placeholder="Name" value="{{ $products->name }}" >
                </div>
                <div class="form-group col-lg-6">
                  <label for="selling_price">Selling Price</label>
                  <input type="number" class="form-control" name="selling_price" placeholder="Enter sellingprice" value="{{$products->selling_price}}">
                </div>
                <div class="form-group col-lg-6">
                  <label for="discount">Discount</label>
                  <input type="number" class="form-control" name="discount" placeholder="Enter discount" value="{{$products->discount}}">
                </div>
                <div class="form-group col-lg-6">
                  <label for="VAT">VAT</label>
                  <input type="number" class="form-control" name="vat" placeholder="Enter vat" value="{{$products->vat}}">
                </div>
                <div class="form-group col-lg-6">
                <label>Categories</label>
                <select class="form-control " style="width: 100%;" name="categories_id" id="categ">
                  <option >Select Category</option>
                  @foreach($category as $cat)
                  <option value="{{$cat->id }}" {{$cat->id==$products->categories_id?'selected':''}} >{{ $cat->name }}</option>
                  @endforeach
                </select>
                </div>
                @foreach($category as $cat)

                <div class="form-group col-lg-6 subcate" id="sub{{$cat->id}}" >
                  
                <label>Subcategories</label>
                <select class="form-control subcategorychoosen"  style="width: 100%;" name="subcategories_id">
           
                @foreach($cat->subcategories as $sub)
                  <option value="{{$sub->id}}" {{$sub->id==$products->subcategories_id?'selected':''}}>{{$sub->name}}</option>
                @endforeach
                 
                </select>
                </div>
                @endforeach
                
              
               
                <div class="form-group col-lg-6">
                  <label for="units ">Unit</label>
                  <input type="text" class="form-control" name="units" placeholder="Enter unit" value="{{ $products->units}}" >
                </div>
                    <div class="col-md-6">
                  <img id="output" class="pic-circle-corner" src="/images/products/{{ $products->product_image }}" style="width:100px; height:100px;object-fit:cover;"/>
                    </div>
              </div>
              <div class="row">
                    <div class="form-group col-lg-12 text-center ">
                 <button type="submit" class="btn btn-success btn-lg d-block mx-auto text-center" style="margin-top:100px;">Submit</button>
                    </div>
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
                choosesubcategory();
                function choosesubcategory()
                {

                  $('.subcate').hide();
                var id='{{$products->categories_id}}'
                $('#sub'+id).show();
                }
                $('.subcategorychoosen').change(function(){
                  var selected=$(this).val();
                $('#subcategorydiv').html(`<input type="hidden" value="${selected}" name="subcategories_id">`)
                
                })
                var loadFile = function(event) {
                    var reader = new FileReader();
                    reader.onload = function(){
                      var output = document.getElementById('output');
                      output.src = reader.result;
                    };
                    reader.readAsDataURL(event.target.files[0]);
                  };
                                </script>
                @endsection 