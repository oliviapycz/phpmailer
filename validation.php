<?php

/*
0) installer phpmailer avec composer : composer require phpmailer/phpmailer
1) faire un require_once de vendor/phpmailer/phpmailer/PHPMailerAutoload.php
2) faire un contrôle de saisie (est-ce que le formulaire est soumis. Si oui est-ce qu'il est rempli)
3) s'il est validé et correctement rempli (expression régulière pour le format du mail), créer une nouvelle instance de classe (new PHPMailer)
4) préciser l'encodage du mail
5) le destinataire
6) l'expéditeur
7) pouvoir répondre à l'utilisateur
8) l'objet du mail
9) le corps du message
10) le message de confirmation en cas d'échec => <div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert">&times;</button><strong></strong>Votre mail n\'a pas pu être envoyé ! Veuillez réessayer s\'il vous plaît !</div>
11) et de réussite de l'envoi du mail => <div class="alert alert-success alert-dismissable"> <button type="button" class="close" data-dismiss="alert">&times;</button><strong></strong>Votre mail a bien été envoyé !</div>
12) si le formulaire est mal rempli ou incomplet => <div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert">&times;</button><strong></strong>Tous les champs sont obligatoires !</div>
*/

require_once 'vendor/phpmailer/phpmailer/PHPMailerAutoload.php';

if (isset($_POST['submit'])){
	if(isset($_POST['message'],$_POST['mail'],$_POST['name'])){
		$name = htmlspecialchars($_POST['name']);
		$message = htmlspecialchars($_POST['message']);
		$mail = htmlspecialchars($_POST['mail']);

		if(!empty($name) && preg_match('#^[\w.-]+@[\w.-]+\.[a-z]{2,6}$#i', $mail) && !empty($mail) && !empty($message)){
			$send_mail_success = new PHPMailer();
			$send_mail_success -> CharSet = 'UTF-8'; 		
			$send_mail_success -> addAddress('oliviapenycoblentz@gmail.com');
			$send_mail_success -> setFrom($mail, 'formulaire@mariage.com');
			$send_mail_success -> Subject = 'Message venant de '.$name;
			$send_mail_success -> Body = $message;
			$send_mail_success -> AltBody = $message;

			if (!$send_mail_success -> send()) {
				echo '<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert">&times;</button><strong></strong>Votre mail n\'a pas pu être envoyé ! Veuillez réessayer s\'il vous plaît !</div>';
				echo 'Mail error: ' .$send_mail_success -> ErrorInfo;
			
		} else {
				echo '<div class="alert alert-success alert-dismissable"> <button type="button" class="close" data-dismiss="alert">&times;</button><strong></strong>Votre mail a bien été envoyé !</div>';
		}
		
		} else {
			echo '<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert">&times;</button><strong></strong>Tous les champs sont obligatoires !</div>';
		}
	}
}