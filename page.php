<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">



    <title>stripe paiement</title>
  </head>
  <body>


  <nav class="navbar navbar-expand-lg navbar-light bg-warning">
	  <a class="navbar-brand" href="#">formation stripe</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarNav">
	    <ul class="navbar-nav">
	      <li class="nav-item active">
	        <a class="nav-link" href="#">Accueil <span class="sr-only">(current)</span></a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="#">blog</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="#">plus de formations</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link disabled" href="#">paramètres</a>
	      </li>
	    </ul>
	  </div>
	</nav>



    <div class="col-md-12 mb-4" style="margin-top: 20px;">

		<div class="row">

				
			<div class="col-md-8">

					<div class="col-12 col-sm-12 col-md-12 mx-auto">
				    
				    
					
					</div>
		   </div>
				
           <div class="col-md-4">

                    <div class="col-12 col-sm-12 col-md-12 mx-auto">
                    
                    
                    <div id="pay-invoice" class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <h2 class="text-center">Payer sa commande</h2>
                            </div>
                            <hr>
                            <form action="payment.php" method="post" id="payment-form" >
                                <div class="form-group text-center">
                                    <ul class="list-inline">
                                        <li class="list-inline-item"><i class="text-muted fa fa-cc-visa fa-2x"></i></li>
                                        <li class="list-inline-item"><i class="fa fa-cc-mastercard fa-2x"></i></li>
                                        <li class="list-inline-item"><i class="fa fa-cc-amex fa-2x"></i></li>
                                        <li class="list-inline-item"><i class="fa fa-cc-discover fa-2x"></i></li>
                                    </ul>
                                </div>
                                <div class="col-md-12 row">

                                    <div class="form-group col-md-12">
                                        <input type="text" name="name" id="name" class="form-control mb3 StripeElement StripeElement--empty" placeholder="Entrer votre nom" required=""> 
                                    </div>

                                    <div class="form-group col-md-12">
                                        <input type="email" name="email" id="email" class="form-control mb3 StripeElement StripeElement--empty" placeholder="Votre adresse email" required="">
                                    </div>
                                    <br>
                                    <div class="form-group col-md-12">
                                        <div id="card-element" class="form-control">
                                          <!-- A Stripe Element will be inserted here. -->
                                        </div>
                                    </div>

                                    <!-- Used to display form errors. -->
                                    <div id="card-errors" role="alert"></div>
                                </div>

                                <button><i class="fa fa-money"></i> Valider le paiement</button>

                            </form></div>

                        </div>
                    </div>
                </div>
			</div>
		</div>
	</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- //permet d'interagir avec l'api  -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"> </script>

    <!-- script js de stripe -->
	<script src="https://js.stripe.com/v3/"></script>
	<!-- <script src="stripe.js"></script> -->

	<script type="text/javascript">

				// Create a Stripe client.
				var stripe = Stripe('pk_test_51HbnvfGNfLRFWRYTIm33nUrJ6E5LZqHuxnZEw5dzhZtbjGAxWaR0r8WLxR3zrluP9woxju5sP037yZmMoVjCMsRd00C462a0hA');

				// Create an instance of Elements.
				var elements = stripe.elements();

				// Custom styling can be passed to options when creating an Element.
				// (Note that this demo uses a wider set of styles than the guide below.)
				var style = {
				  base: {
				    color: '#32325d',
				    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
				    fontSmoothing: 'antialiased',
				    fontSize: '16px',
				    '::placeholder': {
				      color: '#aab7c4'
				    }
				  },
				  invalid: {
				    color: '#fa755a',
				    iconColor: '#fa755a'
				  }
				};

				// style du button
				document.querySelector('#payment-form button').classList='btn btn-info btn-block mt-4';

				// Create an instance of the card Element.
				var card = elements.create('card', {style: style});

				// Add an instance of the card Element into the `card-element` <div>.
				card.mount('#card-element');

				// Handle real-time validation errors from the card Element.
				card.on('change', function(event) {
				  var displayError = document.getElementById('card-errors');
				  if (event.error) {
				    displayError.textContent = event.error.message;
				  } else {
				    displayError.textContent = '';
				  }
				});

				// Handle form submission.
				var form = document.getElementById('payment-form');
				form.addEventListener('submit', function(event) {
				  event.preventDefault();

				  stripe.createToken(card).then(function(result) {
				    if (result.error) {
				      // Inform the user if there was an error.
				      var errorElement = document.getElementById('card-errors');
				      errorElement.textContent = result.error.message;
				    } else {
				      // Send the token to your server.
				      stripeTokenHandler(result.token);
				    }
				  });
				});

				// Submit the form with the token ID.
				function stripeTokenHandler(token) {
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




  </body>
</html>
