<?php
    date_default_timezone_set("America/Sao_Paulo");
    require_once('ConfigPicPay.class.php');
    require_once('UpdateDataBase.class.php');
    
    /* Classe que recebe informações do produto e cliente */
    class InfoSale{
        /* Informações Cliente */
        protected $referenceId;
        protected $nameClient;
        protected $lastNameClient;
        protected $cpfClient;
        protected $emailClient;
        protected $phoneClient;
        
        /* Informações Produto */
        protected $nameProduct;
        protected $priceProduct;
        
        /* Recebendo e definindo os valores do Produto e Cliente */
        public function __construct($ref, string $nameC, string $lNameC, int $cpfC, string $emailC, int $phoneC, string $nameP, int $priceP){
            $this->referenceId = $ref;
            $this->nameClient = $nameC;
            $this->lastNameClient = $lNameC;
            $this->cpfClient = $cpfC;
            $this->emailClient = $emailC;
            $this->phoneClient = $phoneC;
            $this->nameProduct = $nameP;
            $this->priceProduct = $priceP;
            
        }
        
        /* Função que prepara as informações para o PicPay */
        public function prepareInfosToPicPay(){
            $config = new Config;
            $date = date('Y-m-d H:i:s', strtotime("+1 day "));
            return $infos = [
                'referenceId' => $this->referenceId,
                'callbackUrl' => $config->callbackUrl,
                'returnUrl' => $config->returnUrl,
                'value' => $this->priceProduct,
                'expiresAt' => $date, // Data que expira o QR CODE (24 horas após)
                'buyer' => [
                    'firstName' => $this->nameClient,
                    'lastName' => $this->lastNameClient,
                    'document' => $this->cpfClient,
                    'email' => $this->emailClient,
                    'phone' => $this->phoneClient
                ]
            ];
        }
        
        /* Função que envia as informações para o PicPay */
        public function sendInfosToPicPay(){
            $config = new Config;
            $crl = curl_init("https://appws.picpay.com/ecommerce/public/payments/");
            curl_setopt($crl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($crl, CURLOPT_POSTFIELDS, HTTP_BUILD_QUERY($this->prepareInfosToPicPay()));
            curl_setopt($crl, CURLOPT_HTTPHEADER, ['x-picpay-token: '.$config->x_picpay_token]);
            $callbackCrl = curl_exec($crl);
            curl_close($crl);
            $callbackCrl = json_decode($callbackCrl);
            if(isset($callbackCrl->paymentUrl)){
                $queryDB = new QuerysDB;
                $queryDB->IncludeDB($this->referenceId,$this->nameClient,$this->lastNameClient,$this->cpfClient,$this->emailClient,$this->phoneClient,$this->nameProduct,$this->priceProduct);
            }
        }
    }
    
?>