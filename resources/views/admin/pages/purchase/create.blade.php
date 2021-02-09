@extends('admin.master')
@section('content')
<form role="form" method="POST" action="{{ route('purchases.store')}}">
  
@csrf
                <div class="form-group ">
                  <label for="product">Enter Product</label>
                  <input type="text" id="searchkey" class="form-control" name="product_id" placeholder="Enter product"  >
                  <input type="hidden" class="form-control" id="product_id" name="product_id" placeholder="Enter product"  >
                </div>

                <div  id="result"> </div>
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
                  <label for="purchase_price">Purchase price</label>
                  <input type="number" class="form-control" id="purchaseprice" name="purchase_price" placeholder="Enter purchase price" >
                </div>

                <div class="form-group">
                  <label for="quantity">Quantity</label>
                  <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Enter quantity" >
                </div>

                <div class="form-group">
                  <label for="total_amount">Total Amount</label>
                  <input type="number" class="form-control" id="total" name="total_amount" placeholder="Enter total" >
                </div>

                <div class="form-group">
                  <label for="amount_paid">Amount paid</label>
                  <input type="text" class="form-control" id="amtpaid"name="amount_paid" placeholder="Enter Paid Amount" >
                </div>

                <div class="form-group">
                  <label for="remaining_amount">Remaining Amount</label>
                  <input type="text" class="form-control" id="remamt" name="remaining_amount" placeholder="Enter Remaining Amount" >
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
                $('#searchkey').keyup(function(event){                    
  var searched=$(this).val();
if(searched!="")
{
$('#result').show()
$.ajax({
  url:'/product/search',
  type:'POST',
  data:{searched},                      
  dataType:'JSON',
  success:function(response){
    let arraytest=[];
    for(var i=0;i<response.length;i++)   
    {
      arraytest.push(`
      
      <li class="user-header " id="selectproduct" onclick="changedamount(${response[i].id},'${response[i].name}')">
                <img src="/images/products/${response[i].product_image}" class="img-circle img-responsive" width=100" alt="User Image">

                <p>
                ${response[i].name}
                </p>
              </li>
      
   `)
    }
    $('#result').html(arraytest)

  }
})
}
else{
  $('#result').hide()
}
}) 
function changedamount(id,name)  
{
$('#searchkey').val(name);
var pid=$('#product_id').val(id);
$('#result').hide();
}           
                
          $('#quantity').keyup(function(event){
            var qty=$(this).val();
            var pp=$('#purchaseprice').val();
            var total=qty*pp;
            $('#total').val(total);
          })
          
          $('#amtpaid').keyup(function(event){
            var amtpd=$(this).val();
            var total=$('#total').val();
            var remamt=total-amtpd;
            $('#remamt').val(remamt);
          })


                
                
                
                </script>
                @endsection