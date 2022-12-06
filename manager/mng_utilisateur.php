<?php
// importation classe pour email
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
//////////////////////////////////

class ManagerUtilisateur extends Utilisateur{

    public function __construct(){
        
    }
    
    /*------------------------------- 
                        METHODES
            -------------------------------*/

            // fonction pour créer l'utilisateur
            public function addUser($bdd){

                try {
                    $mdp_util = $this->getMdp();
                    $pseudo_util = $this->getPseudo();
                    $nom_util = $this->getNom();
                    $prenom_util = $this->getPrenom();
                    $email_util = $this->getEmail();
                    $id_droit = $this->getDroit();
                    $valide_util = $this->getValide();
                    $token_util = $this->getToken();
                    

                    $req = $bdd->prepare('INSERT INTO utilisateur(mdp_util,pseudo_util,nom_util,prenom_util,email_util,id_droit,valide_util,token_util) 
                    VALUES(?,?,?,?,?,?,?,?)');

                    $req->bindparam(1,$mdp_util,PDO::PARAM_STR);
                    $req->bindparam(2,$pseudo_util,PDO::PARAM_STR);
                    $req->bindparam(3,$nom_util,PDO::PARAM_STR);
                    $req->bindparam(4,$prenom_util,PDO::PARAM_STR);
                    $req->bindparam(5,$email_util,PDO::PARAM_STR);
                    $req->bindparam(6,$id_droit,PDO::PARAM_INT);
                    $req->bindparam(7,$valide_util,PDO::PARAM_BOOL);
                    $req->bindparam(8,$token_util,PDO::PARAM_STR);
                    $req->execute();


                    } catch (Exception $e) {
                        die ('Erreur :' .$e->getMessage());
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
                    // fonction pour voir les informations d'un seul utilisateur
            
                public function showUser($bdd){
                    try{
                    
                        $req = $bdd->prepare('SELECT * FROM utilisateur WHERE id_util= :id_util');
                        $req->bindValue('id_util',$this->getId());
                        $req->execute();
                        $data = $req->fetchAll(PDO::FETCH_OBJ);
                        return $data;
                        
            
                    } catch (Exception $e) {
                        die ('Erreur :' .$e->getMessage());
                    }
                }
                    // fonction pour voir les utilisateurs
            
                public function showAllUser($bdd){
                    try{
                    
                        $req = $bdd->prepare('SELECT id_util,nom_util,prenom_util,email_util,pseudo_util FROM utilisateur');
                        $req->execute();
                        $data = $req->fetchAll(PDO::FETCH_OBJ);
                        return $data;
            
                    } catch (Exception $e) {
                        die ('Erreur :' .$e->getMessage());
                    }
                }


                // fonction pour vérifier le mot de passe
                public function verrifyPassword($bdd){
                    try {
                        $req = $bdd->prepare('SELECT mdp_util FROM utilisateur WHERE pseudo_util=:pseudo_util');
                        $req->bindValue('pseudo_util',$this->getPseudo());
                        $req->execute();
                        $data = $req->fetchAll(PDO::FETCH_OBJ);
                        return $data;
                        // return $data[0]->mdp_util;
            
                    } catch (Exception $e) {
                        die ('Erreur :' .$e->getMessage());
                    }
                }
            
                // fonction pour vérifier l'existance de l'utilisateur
                public function checkUser($bdd){
                    try {
                        $req = $bdd->prepare('SELECT pseudo_util, mdp_util, id_util,id_droit,valide_util FROM utilisateur WHERE pseudo_util = :pseudo_util AND mdp_util = :mdp_util');
                        $req->bindValue(':pseudo_util', $this->getPseudo());
                        $req->bindValue(':mdp_util', $this->getMdp());
                        $req->execute();
                        $data = $req->fetchAll(PDO::FETCH_OBJ);
                        return $data;
                    } catch (Exception $e) {
                        die('Erreur :' .$e->getMessage());
                    }
                }
            
                // fonction pour modifier un utilisateur
                public function modifyUser($bdd){
                    try {
                        $req = $bdd->prepare('UPDATE utilisateur 
                        SET pseudo_util=:pseudo_util,nom_util=:nom_util,prenom_util=:prenom_util 
                        WHERE id_util=:id_util');
                        $req->bindValue(':pseudo_util', $this->getPseudo());
                        $req->bindValue(':nom_util', $this->getNom());
                        $req->bindValue(':prenom_util', $this->getPrenom());
                        $req->bindValue('id_util', $this->getId());
                        $req->execute();
                        
                    } catch (Exception $e) {
                        die('Erreur :' .$e->getMessage());
                    }
                }
                // fonction pour verifier si l email est existant
                public function checkByEmail($bdd){
                    try {
                        $req = $bdd->prepare('SELECT * FROM utilisateur WHERE email_util = :email_util');
                        $req->bindValue(':email_util', $this->getEmail());
                        $req->execute();
                        $data = $req->fetchAll(PDO::FETCH_ASSOC);
                        return $data;
            
                    } catch (Exception $e) {
                        die('Erreur :' .$e->getMessage());
                    }
                }
                        //fonction active un compte
        public function activateUtil(object $bdd):void{
            try{
                $token = $this->getToken();
                //préparation de la requête
                $req = $bdd->prepare('UPDATE utilisateur SET valide_util = 1 
                WHERE token_util = ?');
                //affectation des paramètres
                $req->bindparam(1,$token, PDO::PARAM_STR);
                $req->execute();
            }
            //exception
            catch(Exception $e)
            {
                //affichage d'une exception en cas d’erreur
                die('Erreur : '.$e->getMessage());
            }
        }
        //récuper un utilisateur avec son token
        public function getUtilByToken(object $bdd):?array{
            try{
                $token = $this->getToken();
                //préparation de la requête
                $req = $bdd->prepare('SELECT id_util, nom_util, 
                prenom_util, email_util, mdp_util, id_droit, valide_util, token_util 
                FROM utilisateur WHERE token_util = ?');
                //affectation des paramètres
                $req->bindparam(1,$token, PDO::PARAM_STR);
                $req->execute();
                $data = $req->fetchAll(PDO::FETCH_ASSOC);
                return $data;
            }
            //exception
            catch(Exception $e)
            {
                //affichage d'une exception en cas d’erreur
                die('Erreur : '.$e->getMessage());
            }
            return $data;
        }

        // récupérer toutes les prévisions et opérations d'un utilisateurs
        public function getAllOperationPrevisionByUtil(object $bdd):?array{

            try {
    
                $id_util = $this->id_util;
    
                $req = $bdd->prepare("SELECT * FROM utilisateur INNER JOIN prevision ON utilisateur.id_util = prevision.id_util
                INNER JOIN operation ON utilisateur.id_util = operation.id_util WHERE utilisateur.id_util=?");
                $req->bindparam(1,$id_util,PDO::PARAM_INT);
                $req->execute();
                $data = $req->fetchAll(PDO::FETCH_OBJ);
                return $data;
            } catch (Exception $e) {
                die ('Erreur : ' .$e->getMessage());
            }
        }

        // fonction pour supprimer un utilisateur
        public function deleteUser($bdd){
            try {
                $req = $bdd->prepare('DELETE FROM UTILISATEUR WHERE id_util=:id_util');
                $req->bindValue(':id_util',$this->getId());
                $req->execute();
            } catch (Exception $e) {
                die('Erreur :' .$e->getMessage());
            }
        }

}


?>