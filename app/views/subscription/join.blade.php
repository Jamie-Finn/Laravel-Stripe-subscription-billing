<!--Form that allows a user to join a subscription plan-->

@extends('template.default')

@section('content')
	<form action="{{ URL::action('subscription-join') }}" method="post" id="subscription-form">
		<div class="row">
			<div class="large-6 columns">
				<label>
					Chosen plan:
					<select name="plan">
						<option value="small">Small ($5/month)</option>
						<option value="large">Large ($10/month)</option>
					</select>
				</label>
			</div>
			<div class="large-6 columns">
				
				@include('subscription.partials._card')

				<button class="button">Make payment</button>

			</div>
		</div>
		{{ Form::token() }}
	</form>
@stop

@section('scripts')
	<script src="https://js.stripe.com/v2/"></script>
	<script src="{{ asset('js/stripe.js') }}"></script>
@stop