$(document).ready(function() {
	Stripe.setPublishableKey('pk_test_uWBAMeYQjXzrI4U8J39F0F3W');

	$('#subscription-form button').on('click', function() {
		var form        			= $('#subscription-form');
		var submit					= form.find('button');
		var submitInitialText 		= submit.text();

		submit.attr('disabled', 'disabled').text('Just one moment...');

		Stripe.card.createToken(form, function(status, response) {
			var token;

			if(response.error) {
				form.find('.stripe-errors').text(response.error.message).show('.panel');
				submit.removeAttr('disabled');
				submit.text(submitInitialText);
			} else {
				token = response.id;
				form.append($('<input type="hidden" name="token">').val(token));
				form.submit();
			}
		});
	});
});
