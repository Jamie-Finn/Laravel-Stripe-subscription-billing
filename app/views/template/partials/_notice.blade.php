@if(Session::has('notice'))
	<div class="alert-box">
		{{ Session::get('notice') }}
	</div>
@endif