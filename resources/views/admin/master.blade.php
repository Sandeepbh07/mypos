<!DOCTYPE html>
<html>
<meta name="csrf-token" content="{{ csrf_token() }}" />
    @include('admin.assets.header')

    <body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper" id="app">
    @include('admin.includes.topbar')
    @include('admin.includes.sidebar')
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @yield('content')
</div>
@include('admin.assets.scripts')
<script type="text/javascript">
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
</script>
@yield('scripts')
<script src="{{asset('js/app.js')}}"></script>
</body>
</html>