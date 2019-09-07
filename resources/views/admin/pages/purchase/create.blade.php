@extends('admin.master')
@section('content')
<form role="form" method="post" action="{{ route('purchases.store')}}">

              <div class="box-body">
              <div class="form-group">
                  <label for="date">Date</label>
                  <input type="date" class="form-control" name="date" placeholder="Name" 
                </div>
                <div class="form-group">
                <label>Supplier</label>
                <select class="form-control " style="width: 100%;" name="supplier_id">
                  <option selected="selected">Select Supplier</option>
                  @foreach($suppliers as $supplier)
                  <option value="{{ $supplier->id  }}" >{{ $supplier->name }}</option>
                  @endforeach
                </select>
                </div>
                <div class="form-group">
                  <label for="total">Total Amount</label>
                  <input type="text" class="form-control" name="total" placeholder="Enter total" >
                </div>
                <div class="form-group">
                  <label for="amount_paid">Amount paid</label>
                  <input type="text" class="form-control" name="amount_paid" placeholder="Enter Paid Amount" >
                </div>
                <div class="form-group">
                  <label for="remaining_amount">Remaining Amount</label>
                  <input type="text" class="form-control" name="remaining_amount" placeholder="Enter Remaining Amount" >
                </div>
                <div class="form-group">
                 <button type="submit" class="btn btn-success">Submit</button>
                </div>
</div>
{{ csrf_field() }}
                </form>
                @endsection