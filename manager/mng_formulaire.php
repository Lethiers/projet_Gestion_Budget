<?php
// importation classe pour email
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


class ManagerFormulaire extends Formulaire{


    public function __construct(){

    }

    // méthode récupérer tout les formulaires
    public function seeAllFormulaire($bdd):array{
        try {
            $req=$bdd->prepare('SELECT * FROM formulaire WHERE isLu=0;');
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_OBJ);
            return $data;
        } catch (Exception $e) {
            die('Erreur :' .$e->getMessage());
        }
    }


    // méthode récupérer tout les formulaires
    public function addFormulaire($bdd):void{
        try {
            $req=$bdd->prepare('INSERT INTO formulaire (id_type_demande,nom_formulaire,email_formulaire,sujet_formulaire,objet_formulaire,isLu,date_formulaire)
            VALUES(:id_type_demande,:nom_formulaire,:email_formulaire,:sujet_formulaire,:objet_formulaire,:isLu,:date_formulaire)');
            $req->bindValue(':id_type_demande',$this->getIdTypeDemande());
            $req->bindValue(':nom_formulaire',$this->getNomFormulaire());
            $req->bindValue(':email_formulaire',$this->getEmailFormulaire());
            $req->bindValue(':sujet_formulaire',$this->getSujetFormulaire());
            $req->bindValue(':objet_formulaire',$this->getObjetFormulaire());
            $req->bindValue(':isLu',$this->getisLu());
            $req->bindValue(':date_formulaire',$this->getDateFormulaire());
            $req->execute();
        } catch (Exception $e) {
            die('Erreur :' .$e->getMessage());
        }
    }


    // fonciton pour envoyer un email
    public function sendMail(?string $userMail,?string $subject,?string $emailMessage,?string $loginSmtp,?string $mdpSmtp){
        require './vendor/autoload.php';
            
        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = 0; //SMTP::DEBUG_SERVER mettre afficher tout les messages /2 pour une trace / 0 pour désactiver les messages //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.office365.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = $loginSmtp;                     //SMTP username
            $mail->Password   = $mdpSmtp;                               //SMTP password
            $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
            $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom($loginSmtp, utf8_decode('Clémence'));
            $mail->addAddress($userMail);     //Add a recipient
            // $mail->addReplyTo('info@example.com', 'Information');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments POUR LES PJ
            // $mail->addAttachment('./asset/image/licorneSeriously.png', 'new.jpg');    //Optional name
        
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = $emailMessage;
            // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients'; pour mettre du string

            $mail->send();
            // echo 'Le message à était envoyé';
        } catch (Exception $e) {
            // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }


    }     

    public function setLuForm($bdd):void{
        try {
            $req=$bdd->prepare('UPDATE formulaire SET isLu =:isLu WHERE id_formulaire = :id_formulaire');
            $req->bindValue(':isLu',$this->getisLu());
            $req->bindValue(':id_formulaire',$this->getIdFormulaire());
            $req->execute();
        } catch (Exception $e) {
            die('Erreur :' .$e->getMessage());
        }
    }


    public function returnMail($bdd):array{
        try {
            $req=$bdd->prepare('SELECT * FROM formulaire WHERE id_formulaire = :id_formulaire');
            $req->bindValue(':id_formulaire',$this->getIdFormulaire());
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_OBJ);
            return $data;
        } catch (Exception $e) {
            die('Erreur :' .$e->getMessage());
        }
    }







}

?>