@extends('admin.master')
@section('content')
<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Profit and loss</h3>
            </div>
            <!-- /.box-header -->

            <div class="box-body">
<div class="table-responsive">
    <table class="table table-bordered table-hover">
<tr class="row">
    <td class="col-md-6">Total Sales:</td>
    <td class="col-md-6">{{ $totalsale }}</td>
</tr>
<tr class="row">
    <td class="col-md-6">Total Purchase</td>
    <td class="col-md-6">{{ $totalpurcahse }}</td>
</tr>
<tr class="row">
    <td class="col-md-6">Profit\Loss</td>
    <td class="col-md-6">{{ $pl }}</td>
</tr>
    </table>
    </div>
            </div>
          </div>
        </div>
      </div>
</section>
@endsection