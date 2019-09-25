@extends('admin.master')
@section('styles')
<style>
  	.pic-circle-corner {
		display: block;
		width: 200px;
		height: 200px;

		background-size: cover;
		background-repeat: no-repeat;
		background-position: center center;
		-webkit-border-radius: 50%;
		-moz-border-radius: 50%;
		border-radius: 50%;
		border: 5px solid #eee;
		box-shadow: 0 3px 2px rgba(0, 0, 0, 0.3);
	}
  </style>
  @endsection
@section('content')
<form role="form" method="post" action="{{ route('customers.store')  }}"  enctype="multipart/form-data">

              <div class="box-body">
              <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" class="form-control" name="name" placeholder="Enter Name" >
                </div>
                <div class="form-group">
                  <label for="contact">Contact</label>
                  <input type="tel" class="form-control" name="contact" placeholder="Enter contact" >
                </div>
                <div class="form-group">
                  <label for="address">Address</label>
                  <input type="text" class="form-control" name="address" placeholder="Enter address" >
                </div>
                <div class="form-group">
                    <label for="address">File</label>
                <input id='fileid' type='file'  name="image" style="display: none;" accept="image/*" onchange="loadFile(event)"/>
<input id='buttonid' type='button' value='Upload MB' />

<img id="output" class="pic-circle-corner"/>
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

  document.getElementById('buttonid').addEventListener('click', openDialog);

function openDialog() {
  document.getElementById('fileid').click();
}

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