@if ($message = Session::get('success'))
<div class="alert alert-success alert-block" id="message">
	<button type="button" class="close btn btn-danger" onlick="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>	
     {{session('success')}}
</div>
@endif


@if ($message = Session::get('error'))
<div class="alert alert-danger alert-block">
	<button type="button" class="close btn btn-danger" onlick="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>	
     {{session('error')}}
</div>
@endif

<script>
 

</script>

