<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use App\Models\Commande;
class PaydunyaController extends Controller
{

    public function index($reference)
    {

        $baseUrl = "http://127.0.0.1:8000/";

        $commande = Commande::where('reference',$reference)->first();
        
        \Paydunya\Setup::setMasterKey(env('MASTER_KEY'));
        \Paydunya\Setup::setPublicKey(env('PUBLIC_KEY_P'));
        \Paydunya\Setup::setPrivateKey(env('PRIVATE_KEY_P'));
        \Paydunya\Setup::setToken(env('TOKEN_P'));
        \Paydunya\Setup::setMode("live"); // Optionnel en mode test. Utilisez cette option pour les paiements tests.

        //Configuration des informations de votre service/entreprise
        \Paydunya\Checkout\Store::setName("Atelier Ecommerce"); // Seul le nom est requis
        \Paydunya\Checkout\Store::setTagline("Le futur c'est maintenant");
        \Paydunya\Checkout\Store::setPhoneNumber("776579763");
        \Paydunya\Checkout\Store::setPostalAddress("Dakar Plateau - Etablissement kheweul");
        \Paydunya\Checkout\Store::setWebsiteUrl("https://innovebox.com/");
        \Paydunya\Checkout\Store::setLogoUrl("https://innovebox.com/images/logoinnovebox.png");


        \Paydunya\Checkout\Store::setCancelUrl($baseUrl."annuler");

        \Paydunya\Checkout\Store::setReturnUrl($baseUrl."success");



        \Paydunya\Checkout\Store::setCallbackUrl("https://innovebox.com/");

        
        $invoice = new \Paydunya\Checkout\CheckoutInvoice();


        $nom =  "Paiement facture";

        $quantite = 1;

        $prixU = $commande->total;

        $prixTotal = $quantite * $prixU;

        

        $invoice->addItem($nom, 1, $prixU, $prixTotal);

        $invoice->setTotalAmount($prixTotal);

        $invoice->addCustomData("reference_commande", $commande->reference);
       
        $invoice->setDescription("Payez avec paydunya pour tout erreur contactez le service client au 776579763");

     
        if($invoice->create()) {

            $urlRedirection = $invoice->getInvoiceUrl();

            return Redirect::to($urlRedirection);
        }else{
            echo $invoice->response_text;
        }

    }


    public function annuler()
    {
        return "annuler";
    }


    public function success()
    {
       return "success";
    }
}



