<!--Home page with options for the authorized user to update their details, cancel or resume their subscription based on their current status-->

@extends('template.default')

@section('content')
	@if($user->subscribed())
		<p>You are subscribed. Thanks!</p>

		@if($user->cancelled())
			<p>Your subscription will end on {{ $user->subscription_ends_at->format('D d M Y') }}</p>
		@endif

		<ul>
			@if(!$user->cancelled())
				<li><a href="{{ URL::action('subscription-cancel') }}?_token={{ csrf_token() }}">Cancel my subscription</a></li>
			@else
				<li><a href="{{ URL::action('subscription-resume') }}?_token={{ csrf_token() }}">Resume subscription</a></li>
			@endif

			@if($user->subscribed())
				<li><a href="{{ URL::action('subscription-card') }}">Update card</a></li>
			@endif
		</ul>

	@else
		<p>Looks like you're not subscribed. <a href="{{ URL::action('subscription-join') }}">Join now</a></p>
	@endif
@stop