private $token;
$token = votre clée privée;


// stripe paiement commence
	 /**
     * Get All Data from this method.
     *
     * @return Response
     */
    function api(string $operation, array $data=null):stdClass{

      $ch = curl_init();
      curl_setopt_array($ch, [
        CURLOPT_URL         => "https://api.stripe.com/v1/$operation",
        CURLOPT_RETURNTRANSFER    => true,
        CURLOPT_USERPWD       => $this->token,
        CURLOPT_HTTPAUTH      =>  CURLAUTH_BASIC,
        CURLOPT_POSTFIELDS      =>  http_build_query($data)

      ]);

      $response = json_decode(curl_exec($ch));
      curl_close($ch);

      return $response;

    }



// stript de paiment par stripe
	 function paiment(){

      $net_apayer   = 123;
      $montant      = 100 * 100;
      $name         = 'patrona';
      $email        = 'patrona@gmail.com';
      $stripeToken  = $_POST['stripeToken'];

      $data = [
        'source'    =>  $stripeToken,
        'description' =>  $name,
        'email'     =>  $email
      ];

      // echo('nom:'.$name.' email:'.$email.' token:'.$stripeToken.' montant:'.$montant);
      
      if (filter_var($email, FILTER_VALIDATE_EMAIL) && ! empty($name)) {
        // echo('nom:'.$name.' email:'.$email.' token:'.$stripeToken);

         // echo('nom:'.$name.' email:'.$email.' token:'.$stripeToken.'
         //  montant:'.$montant.' token:'.$stripeToken);

        $customer = $this->api('customers', [
          'source'    		=>  $stripeToken,
          'description' 	=>  $name,
          'email'     		=>  $email
        ]);

        $charge = $this->api('charges', [
          'amount'  =>  $montant,
          'currency'  =>  'usd',
          'customer'  =>  $customer->id
        ]);

        // var_dump($charge);
        // die('bravo votre paiement a été bien éffectué');
        
      }
      else{
        // echo("erreur désolé!!!!");
       
      }


    }

  // fin de mes scripts de paiement stripe







// Create a Stripe client.
var stripe = Stripe('votre clée publique');

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










