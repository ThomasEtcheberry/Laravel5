@extends('layouts.layout')

<style>
/**
 * The CSS shown here will not be introduced in the Quickstart guide, but shows
 * how you can use CSS to style your Element's container.
 */
.StripeElement {
  background-color: white;
  height: 40px;
  padding: 10px 12px;
  border-radius: 4px;
  border: 1px solid transparent;
  box-shadow: 0 1px 3px 0 #e6ebf1;
  -webkit-transition: box-shadow 150ms ease;
  transition: box-shadow 150ms ease;
}

.StripeElement--focus {
  box-shadow: 0 1px 3px 0 #cfd7df;
}

.StripeElement--invalid {
  border-color: #fa755a;
}

.StripeElement--webkit-autofill {
  background-color: #fefde5 !important;
}
</style>

@section('content')
<div class="row">
	<form action="/charge" method="post" id="payment-form">
		<div class="form-row">
			<label for="card-element">
			Credit or debit card
			</label>
			<div id="card-element">
			<!-- a Stripe Element will be inserted here. -->
			</div>

			<!-- Used to display form errors -->
			<div id="card-errors" role="alert"></div>
		</div>
		<br>
		<button class="btn btn-info">Soumettre le paiement</button>
	</form>
</div>

<script>
	var stripe = Stripe('pk_test_wGUTSy21VTDgh94NuSEHJttQ');
	var elements = stripe.elements();
	// Custom styling can be passed to options when creating an Element.
	var style = {
	base: {
		// Add your base input styles here. For example:
		fontSize: '16px',
		color: "#32325d",
	}
	};

	// Create an instance of the card Element
	var card = elements.create('card', {style: style});

	// Add an instance of the card Element into the `card-element` <div>
	card.mount('#card-element');
	card.addEventListener('change', function(event) {
	var displayError = document.getElementById('card-errors');
	if (event.error) {
		displayError.textContent = event.error.message;
	} else {
		displayError.textContent = '';
	}
	});

	// Create a token or display an error when the form is submitted.
	var form = document.getElementById('payment-form');
	form.addEventListener('submit', function(event) {
	event.preventDefault();

	stripe.createToken(card).then(function(result) {
		if (result.error) {
		// Inform the customer that there was an error
		var errorElement = document.getElementById('card-errors');
		errorElement.textContent = result.error.message;
		} else {
		// Send the token to your server
		stripeTokenHandler(result.token);
		}
	});
	});

	function stripeTokenHandler(token) {
		console.log(token);
		// Insert the token ID into the form so it gets submitted to the server
		var form = document.getElementById('payment-form');
		var hiddenInput = document.createElement('input');
		hiddenInput.setAttribute('type', 'hidden');
		hiddenInput.setAttribute('name', 'stripeToken');
		hiddenInput.setAttribute('value', token.id);
		form.appendChild(hiddenInput);

		// Submit the form
		form.submit();
	}
</script>

@endsection