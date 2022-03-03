<?php
    include_once("GetStatusPicPay.class.php");
    class CancelOrder{
        /* Informações sobre a compra */
        private $refID;
        private $authID;
        
        /* Função construtora */
        public function __construct($refID, $authID){
            /* Definindo os valores recebidos na instância */
            $this->refID = $refID;
            $this->authID = $authID;
        }
        
        /* Enviar pedido de cancelamento ao PicPay */
        public function sendCancelToPicPay(){
            $config = new Config;
            $crl = curl_init("https://appws.picpay.com/ecommerce/public/payments/$this->refID/cancellations");
            curl_setopt($crl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($crl, CURLOPT_POSTFIELDS, HTTP_BUILD_QUERY([$this->authID]));
            curl_setopt($crl, CURLOPT_HTTPHEADER, ['x-picpay-token: '.$config->x_picpay_token]);
            $callbackCrl = curl_exec($crl);
            curl_close($crl);
            
            $callbackCrl = json_decode($callbackCrl);
            return $callbackCrl;
        }
    }
?>