<!--Gives user option to update card via a button-->

@extends('template.default')

@section('content')
	<form action="{{ URL::action('subscription-card') }}" method="post" id="subscription-form">
		<div class="row">

			<div class="large-6 columns">				
				@include('subscription.partials._card')

				<button class="button">Update card</button>
			</div>
		</div>
		{{ Form::token() }}
	</form>
@stop

@section('scripts')
	<script src="https://js.stripe.com/v2/"></script>
	<script src="{{ asset('js/stripe.js') }}"></script>
@stop