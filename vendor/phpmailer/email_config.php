<?php
use PHPMailer\PHPMailer\PHPMailer;

require 'vendor/autoload.php'; // Inclure l'autoloader de Composer

function getMailer() {
    $mail = new PHPMailer(true);

    try {
        // Configuration du serveur SMTP
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';   // Remplacez par votre serveur SMTP
        $mail->SMTPAuth   = true;
        $mail->Username   = 'projetlprsgroupesks@gmail.com'; // Remplacez par votre email
        $mail->Password   = 'projetlprs123456789';      // Remplacez par votre mot de passe
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        $mail->setFrom('projetlprsgroupesks@gmail.com', 'Nom Expéditeur');
    } catch (Exception $e) {
        echo "Erreur dans la configuration de PHPMailer : {$mail->ErrorInfo}";
    }

    return $mail;
}
