<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.2/semantic.min.css">
	<style>
		.main.container{
			padding-top: 50px; 
		}
	</style>
</head>
<body>
 <div class="ui inverted fixed menu">
 <div class="header item">Tutoriel</div> 	
 </div>

 <div class="ui main  container"> 
  <!-- <form action="payment.php" class="ui form" id="payment_form"> -->
    <form action="payment.php" class="ui form" id="payment_form" method="post">
  
   <div class="field">
   	 <input type="text" name="name" value="Ben benji"  required="" placeholder="Votre nom">
   </div>
   	<div class="field">
   		<input type="email" value="ekyakaboben@gmail.com" name="email" required="" placeholder="Votre @email.fr">
   	</div>
   		
   	<div class="field">
   	<input type="text" value="4242 4242 4242 4242" placeholder="Votre code de carte  bleu" name="">
   		
   	</div>
   	<div class="field">
   	<input type="text" value="10" placeholder="Votre MM" data-stripe="exp_month" name="">
   		
   	</div>
   	<div class="field">
   	<input type="text" value="18" placeholder="Votre YY" data-stripe="exp_year" name="">
   		
   	</div><div class="field">
   	<input type="text" value="123" placeholder="Votre CVC" data-stripe=cvc" name="">
   		
   	</div> 
   	<p>
   		<button class="ui button" type="submit"> Acheter </button>
   	</p>
   </form>
 </div>
 	
 </div>
 <!-- //permet d'interagir avec l'api  -->
  <script type="text/javascript" src="https://js.stripe.com/v2/">  </script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"> </script>
  <script >
  	Stripe.setPublishableKey('pk_test_51HbnvfGNfLRFWRYTIm33nUrJ6E5LZqHuxnZEw5dzhZtbjGAxWaR0r8WLxR3zrluP9woxju5sP037yZmMoVjCMsRd00C462a0hA')
  	var $form= $('#payment_form')
  	
  	$form.submit(function (e)
  	{  
  	    e.preventDefaul()
  		$form.find('.button').attr('disabled',true)
  		Stripe.card.createToken({$form},function (status,response)
  			{ 

             if(response.error)
             {
             	$form.find('.message').remove();
             	$form.prepend('<div class="ui negative message"><p>'+response.error.message + '</p></div>');
             }
             else
             { 
             	var token=response.id 
             	$form.append($('<input type="hidden" name="stripeToken">').val(token))
             	$form.get(0).submit()
             }
  			})
  	})

  </script>

</body>
</html>