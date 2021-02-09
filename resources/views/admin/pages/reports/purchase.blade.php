
@extends('admin.master')
@section('content')
<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Purchase</h3>
            </div>
            <!-- /.box-header -->

            <div class="box-body">
<div class="table-responsive">
    <table class="table table-bordered table-hover">
        <tr>
            <td>Total products purchased</td>
            <td>{{$totalquantity}}</td>
        </tr>
        <tr>
            <td>Total amount</td>
            <td>{{ $totalpurchase }}</td>
        </tr>
        <tr>
            <td>Total amount paid</td>
            <td>{{ $amtpaid }}</td>
        </tr>
        <tr>
            <td>Total amount remaining</td>
            <td>{{ $remamt  }}</td>
        </tr>
    </table>
    </div>
            </div>
          </div>
        </div>
      </div>
</section>
@endsection