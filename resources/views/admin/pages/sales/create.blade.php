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

  <div class="row" style="padding-top:100px; padding-left:50px;" >
    <div class="col-md-6 " >

    <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Quick Example</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
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
    <div class="col-md-6" >
<div id="test">


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
function addtosale(id)
{
  
var sale=$('#search'+id).clone();
  $('#test').html(sale)
}





      </script>
                @endsection