<?php
session_start();
require './vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class PublicController{

    private $pubObjMod;
    private $pubCatMod;
    private $pubMod;

    public function __construct()
    {
        $this->pubObjMod = new AdminObjetModel();
        $this->pubCatMod = new AdminCategorieModel();
        $this->pubMod = new PublicModel();

    }

    public function recupPubObjets(){
        
        if(isset($_GET['id']) && !empty($_GET['id'])){
            if( isset($_POST['soumis']) && !empty($_POST['search'])){
                $search = trim(htmlspecialchars(addslashes($_POST['search'])));
                $tabCat = $this->pubCatMod->recupCategories();
                $objets = $this->pubObjMod->getObjets($search);
                require_once('./views/public/accueil.php');
            }
            $id = trim(htmlentities(addslashes($_GET['id'])));
            $obj = new Objet();
            $obj->getCategorie()->setId_cat($id);
            $tabCat = $this->pubCatMod->recupCategories();
            $objets = $this->pubMod->findObjByCat($obj);
            require_once('./views/public/objetsCat.php');
      
        }else{
            if( isset($_POST['soumis']) && !empty($_POST['search'])){
                $search = trim(htmlspecialchars(addslashes($_POST['search'])));
                $tabCat = $this->pubCatMod->recupCategories();
                $objets = $this->pubObjMod->getObjets($search);
                require_once('./views/public/accueil.php');
            }
            $tabCat = $this->pubCatMod->recupCategories();
            $objets = $this->pubObjMod->getObjets();

        require_once('./views/public/accueil.php');
        }
    }

    public function recap(){

        if(isset($_POST['envoi']) && !empty($_POST['marque']) && !empty($_POST['prix'])){

            $id = htmlspecialchars(addslashes($_POST['id']));
            $marque = htmlspecialchars(addslashes($_POST['marque']));
            $intitule = htmlspecialchars(addslashes($_POST['intitule']));
            $image = htmlspecialchars(addslashes($_POST['image']));
            $prix = htmlspecialchars(addslashes($_POST['prix']));
            $nb = htmlspecialchars(addslashes($_POST['quantite']));

            require_once('./views/public/objetItem.php');
        }
    }

    public function orderObj(){
        if(isset($_GET['id']) && !empty($_GET['id'])){
            $id = addslashes(htmlspecialchars($_GET['id']));
            require_once('./views/public/orderForm.php');
        }
    }

    public function payment(){


        \Stripe\Stripe::setApiKey('sk_test_51Id9HFAFJJA1I8csyxjFLHnWdmDKKbvVpCc7fxUAdHLD7uuFpSe8vjwYN2STU1zEwZzYQST8Xjapq2PPbaxRBza500FT9hUNK4');

        header('Content-Type: application/json');


        $checkout_session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'eur',
                    'unit_amount' => $_POST['prix']*100, 
                    'product_data' => [
                        'name' => $_POST['marque']." ".$_POST['intitule'],
                        'images' => ["https://i.imgur.com/EHyR2nP.png"], 
                    ],
                ],
                'quantity' => $_POST['quantite'], 
            ]],
            'customer_email' => $_POST['email'],
            'mode' => 'payment',
            'success_url' => 'http://localhost/php/POO/apps/deco/index.php?action=success',
            'cancel_url' => 'http://localhost/php/POO/apps/deco/index.php?action=cancel',
        ]);

        $_SESSION['pay'] = $_POST;
        echo json_encode(['id' => $checkout_session->id]);
    }

    public function confirmation(){

        $newStock = ((int)$_SESSION['pay']['nb']) - ((int)$_SESSION['pay']['quantite']); 
        $obj = new Objet();
        $obj->setId_obj($_SESSION['pay']['id']); 
        $obj->setQuantite($newStock);   // on lui passe le nouveau nombre de stock

        $nbLine = $this->pubMod->updateStock($obj);

        if($nbLine > 0 ){

            //Load Composer's autoloader
            $email = $_SESSION['pay']['email'];
            $marque= $_SESSION['pay']['marque'];
            $intitule= $_SESSION['pay']['intitule'];
            $prix= $_SESSION['pay']['prix'];


            $mail = new PHPMailer(true);

            try {
                
                $mail->SMTPDebug = SMTP::DEBUG_SERVER;    
                $mail->isSMTP();                                            
                $mail->Host       = 'smtp.laposte.net';                     
                $mail->SMTPAuth   = true;                                   
                $mail->Username   = 'DecoRe';                     
                $mail->Password   = 'Moumousse14!';                               
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         
                $mail->Port       = 465;                                    

                
                $mail->setFrom('DecoRe@laposte.net', 'DecoRe');
                $mail->addAddress("$email", 'Mr/Mme');     
                
                $mail->isHTML(true);                                  
                $mail->Subject = 'Here is the subject';
                $mail->Body    = "
                    <h2>Confirmation d'achat</h2>
                    <div>
                     <b>Marque:  </b>".$marque." 
                     <b>Modéle:  </b>".$intitule." 
                     <b>Prix:  </b>".$prix." 
                     <p>Nous vous remercions pour votre achat.</p>
                    </div>
                    ";

                $mail->send();
                echo 'Message has been sent';


            } catch (Exception $e) {

                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        }

        require_once('./views/public/confirmation.php');
    }

    public function annulation(){
        require_once('./views/public/echecPaiement.php');
    }

}