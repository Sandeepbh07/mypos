@extends('admin.master')
@section('styles')
<style>
  #result{

    width:100%;
    border:1px solid black;
    margin-top:-50px;
  }
</style>
@endsection
@section('content')
<div class="container">
  <div class="row" style="padding-top:100px; " >
    <div class="col-md-6 " >

    <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Quick Example</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Enter Name</label>
                  <input type="text" id="searchkey" class="form-control" placeholder="Type Product Name......">
                 
                </div>
          
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
              <ul class="dropdown-menu" id="result">
              <!-- User image -->
  
              <!-- Menu Body -->
            
            </ul>

    </div>
    </div>
    <div class="col-md-6" id="userinfo">
      </div>
  </div>
  <div class="row">
    <div class="col-md-10">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Sales</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col-md-4">
            <input type="text" id="customerid" class="form-control" placeholder="Please Enter  Customer user id">
            
          </div>
          <div class="col-md-2">
              <button class="btn btn-success btn-sm" onclick="searchcustomer()">Search</button>
          </div>
     
              </div>
            <form action="{{route('addtosale')}}" method="POST" >
                {{csrf_field()}}
            <table id="example2" class="table table-bordered table-hover">
  <thead>
  <tr> 
     <th>Image</th>
     <th>Price</th>
     <th>Discount</th>  
     <th>Quantity</th> 
     <th>Total amount</th> 
     <th>Remaining</th>
     <th>Action</th>
     
  </tr>
  </thead>


  <tbody id="sale">


</tbody>
<input type="hidden" id="userid" name="user_id" >
<tr> <td  colspan="5"></td><td><input type="text"  class="grandtotal form-control" disabled>
<input type="hidden" class="grandtotal" name="total">
</td>
  
  <td><input type="text" id="amountpaid" onkeyup="calculateremaining()" name="amount_paid"  class="form-control"></td>
    <td><input type="text" class="remainingamount form-control"   disabled >
      <input  name="remaining_amount" type="hidden" class="remainingamount" name="total">
    </td>
    <td>
  <input type="submit" class="btn btn-success btn-sm"></td></tr> 



</table>
</form>
          </div>
          </div>
          </div>
  </div>
</div>

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
      
      <li class="user-header " id="search${response[i].id}">
                <img src="/images/products/${response[i].product_image}" class="img-circle img-responsive" width=100" alt="User Image">

                <p>
                ${response[i].name}
           
                </p>
                
              <div class="box-footer">
                <button type="submit" class="btn btn-primary pull-right" onclick="addtosale(${response[i].id})">Add to Sale</button>
              </div>
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
var pricearray=[];
function addtosale(id)
{

  $('#search'+id).remove();
  $.ajax({
  url:'/products/'+id,
  type:'GET',
  dataType:'JSON',
  success:function(response){
  
if($(`.sale${response.id}`).length<1)
{ 

     var list=`

     <tr class="user-header sale${response.id}" id="sale${response.id}">
  <td></td>
      <td width="20%">  <img src="/images/products/${response.product_image}" class="img-responsive" style="width:"200px;height:100px;" alt="User Image"></td>
     
      <td>  <input type="text" class="form-control" id="price${id}"  value="${response.selling_price}" disabled>
        <input type="hidden" class="form-control"  value="${response.selling_price}" name="price[]" >
       </td>
      <td> <input type="text" class="form-control" id="discount${id}"  value="${response.discount}" disabled>
        <input type="text" class="form-control"   value="${response.discount}" name="discount[]">
      
       </td>
    
      <td><input type="hidden" id="index${id}" >
      <input type="hidden" name="product_id[]" value="${response.id}">
      <input type="text" name="vat[]" value="${response.vat}">
      <input type="text" id="quantity${id}" value="1"name="quantity[]" onkeyup="changedamount(${id})"  class="form-control "></td>
      <td id="totalamount${id}"></td>
      <td> <button type="submit" class="btn btn-danger pull-right" onclick="removeproduct(${id})">Remove </button></td>  

  </tr>

      
   `
   $('#sale').append(list)
   caluclatetotal(id);

for (var j = 0; j < pricearray.length; j++) {

$("#index"+id).val(j);


}
 total=0;
for (var i = 0; i < pricearray.length; i++) {
    total += pricearray[i] << 0;
}
$('.grandtotal').val(total)

}
else{
  alert('Product already added ')
}
    


  }

  
  })
}
function removeproduct(i){
  var index=$('#index'+i).val();
  delete pricearray[index];
  console.log(pricearray) 
  $('#sale'+i).remove();

  }


function caluclatetotal(id)
{

var price=$('#price'+id).val();
var discount=$('#discount'+id).val();
var quantity=$('#quantity'+id).val();
var total=(price-((discount*price)/100))*quantity
$('#amountpaid'+id).val(0);
$('#amountremaining'+id).val(total);
$('#totalamount'+id).text(total)
pricearray.push(total)


}


function changedamount(id)
{
  var price=$('#price'+id).val();
var discount=$('#discount'+id).val();
var quantity=$('#quantity'+id).val();
var total=(price-((discount*price)/100))*quantity
$('#amountpaid'+id).val(0);
$('#amountremaining'+id).val(total);
$('#totalamount'+id).text(total);
var index=$('#index'+id).val();
pricearray[index]=total;
total=0;
for (var i = 0; i < pricearray.length; i++) {
    total += pricearray[i] << 0;
}
$('.grandtotal').val(total)
}
function calculateremaining(){
  var total=$('.grandtotal').val();
  var amountpaid=$('#amountpaid').val();
  // if(total < amountpaid)
  // {
    $('.remainingamount').val(total-amountpaid);

  // }
  // else{
    // alert('More amount paid')
  // }

}
function searchcustomer()
{
  var id=$('#customerid').val();
 
  $('#search'+id).remove();
  $.ajax({
  url:'/customer/search/'+id,
  type:'GET',
  dataType:'JSON',
  success:function(response){
    if(response.length>0)
    {
      $('#userid').val(response[0].id);
$('#userinfo').html(`<div class="panel panel-primary">
  <div class="panel-heading">Customer Info</div>
  <div class="panel-body">
      <table id="ad-table" class="footable table table-stripped toggle-arrow-tiny">
          <tr>
    <th>Customer Image:</th>
    <td><img src="/images/customer/${response[0].customer_images}" style="width:100px;"></td>
  </tr>
  <tr>
    <th>First Name:</th>
    <td>${response[0].name}</td>
  </tr>
  <tr>
    <th>Address:</th>
    <td>${response[0].address}</td>
  </tr>
  <tr>
    <th>Contact:</th>
    <td>${response[0].contact}</td>
  </tr>
  <tr>
    <th>Customer Id:</th>
    <td>${response[0].cuid}</td>
  </tr>
  </table>
  </div>
</div>`)
  }
  else{
    $('#userid').val('');
    $('#userinfo').html('<button class="btn btn-info btn-sm">Add new Customer</button>');
    alert('Customer with this id not found')
  }
  }
  })
}


      </script>
                @endsection