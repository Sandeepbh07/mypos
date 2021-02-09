@extends('admin.master')
@section('content')
<form role="form" method="post" action="{{ route('stocks.update',$stock->id)  }}">
    {{ method_field('patch')  }}

              <div class="box-body">
                <div class="form-group">
                  <label for="product">Product</label>
                  <input type="text" class="form-control" name="product_id"  value="{{ $stock->product->name }}">
                  <input type="hidden" class="form-control" name="product_id"  value="{{ $stock->product_id }}">
                </div>
                <div class="form-group">
                <label for="quantity">Quantity</label>
                  <input type="number" class="form-control" name="quantity" placeholder="Enter quantity" value="{{ $stock->quantity }}">
                </div>
                <div class="form-group">
                 <button type="submit" class="btn btn-success">Submit</button>
                </div>
</div>
{{ csrf_field() }}
                </form>

@endsection