<!--Card input form where the user enters their card details for their chosen subscription plan-->

<div class="stripe-errors panel hide"></div>

<label>
	Card number
	<input type="text" data-stripe="number">
</label>

<div class="row">
	<div class="large-4 columns">
		<label>
			Expiry month
			<input type="text" data-stripe="exp-month">
		</label>
	</div>

	<div class="large-4 columns">
		<label>
			Expiry year
			<input type="text" data-stripe="exp-year">
		</label>
	</div>

	<div class="large-4 columns">
		<label>
			CVC
			<input type="text" data-stripe="cvc">
		</label>
	</div>
</div>