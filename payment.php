<?php

 $token =$_POST['stripeToken'];
 $email =$_POST['email'];
 $name=$_POST['name'];
 $montant= 100;

 if (filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($name) && !empty($token))
 {
 	require('Stripe.php');
 	$stripe=new Stripe('sk_test_51HbnvfGNfLRFWRYT6yx00pXoRG0oDjRQkx2jCxmhbXyADaUAIeIbjELeOCRxsZeNdV3A9wZIUNlkPKDOIclCvQ0w00FMF4gmHH');
 	$customer=$stripe->api('customers',[
 	'source' => $token,
 	'description'=>$name,
 	'email'=> $email 
 	] );
 	
 	 $charge=$stripe->api('charges',[
 	 	'amount'=> $montant * 100,
 	 	'currency'=> 'eur',
 	 	'customer'=> $customer->id
 	 	]);
 	
 	 die('Bravo! votre pqiement a été bien enregistré');
 }

 ?>