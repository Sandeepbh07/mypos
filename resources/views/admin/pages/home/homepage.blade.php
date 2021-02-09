@extends('admin.master')
@section('title','Home')
@section('content')

      <h1>
        
        <small>Hamromart</small>
      </h1>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-money"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total purchase</span>
              <span class="info-box-number">Rs.{{$totalpurcahse}}</</span>
            </div>
</div>
</div>
<div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua">
          <i class="ion ion-ios-cart-outline"></i>
            </span>

            <div class="info-box-content">
              <span class="info-box-text">Total Sales</span>
              <span class="info-box-number">Rs.{{$totalsale}}</span>
            </div>
</div>
</div>
<div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-paper-outline"></i>
            <i class="fa fa-exclamation"></i>
        </span>

            <div class="info-box-content">
              <span class="info-box-text">Purchase due</span>
              <span class="info-box-number">Rs.{{$amounttobepaidtotal}}</span>
            </div>
</div>
</div>
<div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow">
              <i class="ion ion-ios-paper-outline"></i>
              <i class="fa fa-exclamation"></i>
            </span>

            <div class="info-box-content">
              <span class="info-box-text">Sales due</span>
              <span class="info-box-number">Rs.{{$salesdue}}</span>
            </div>
</div>
</div>
<div class="row">

            <div class="col-lg-6">
            <div class="box">
            <div class="box-header">
              <h3 class="box-title">Inventory status</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-striped">
                <tr>
                  <th style="width: 10px">S.N</th>
                  <th>Item</th>
                  <th>Inventory status</th>
                  <th style="width: 40px">Quantity</th>
                </tr>
                @foreach($inventory as $ind=>$invent)
                <tr>
                  <td>{{$ind+1}}.</td>
                  <td>{{$invent->product->name}}</td>
                  <td>
                    <div class="progress progress-xs">
                      <div class="progress-bar progress-bar-danger" style="width: {{$invent->quantity}}%"></div>
                    </div>
                  </td>
                  <td><span class="badge bg-green">{{$invent->quantity}}</span></td>
                </tr>
                @endforeach
               
              </table>
            </div>
            <!-- /.box-body -->
          </div>
</div>














<div class="col-lg-6">
            <div class="box">
            <div class="box-header">
              <h3 class="box-title">Purchse Payment Due</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-striped">
                <tr>
                  <th >S.N</th>
                  <th>Item</th>
  
                  <th >Amount</th>
                </tr>
                @foreach($remainingpurchase as $in=>$purchasedue)
             
                <tr>
                  <td>{{$in+1}}</td>
                  <td>{{$purchasedue->supplier->name}}</td>
            
                  <td><span class="badge bg-red">{{$purchasedue->sum}}</span></td>
                </tr>
                @endforeach
                
              </table>
            </div>
            <!-- /.box-body -->
          </div>
</div>
<div class="col-lg-6">
            <div class="box">
            <div class="box-header">
              <h3 class="box-title">Sales Due</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-striped">
                <tr>
                  <th style="width: 10px">S.N</th>
                  <th>Customer </th>
                  <th>Amount</th>
               
                </tr>
                @foreach($remainingsale as $i=>$saledue)
                <tr>
                  <td>{{$i+1}}</td>
                  <td>{{$saledue->customer->name}}</td>
              
                  <td><span class="badge bg-red">Rs. {{$saledue->sum}}</span></td>
                </tr>
                @endforeach
 
         
              </table>
            </div>
            <!-- /.box-body -->
          </div>
</div>
            </div>
            
@endsection
@section('scripts')

@endsection