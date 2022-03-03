<?php
    require_once("ConfigPicPay.class.php");
    require_once("UpdateDataBase.class.php");
    
    class GetStatus{
        /* Informação da compra: */
        protected $refId;
        protected $x_picpay_token;
        protected $x_seller_token;
        
        /* Receberndo a Ref ID através da instância */
        public function __construct($refId){
            $this->refId = $refId;
            /* Definindo o token de callback do PicPay */
            $tokenCallback = new Config;
            $this->x_picpay_token = $tokenCallback->x_picpay_token;
            $this->x_seller_token = $tokenCallback->x_seller_token;
        }
        
        /* Função que pega o status da compra */
        public function getStatusSalePicPay($refID){
            $crl = curl_init("https://appws.picpay.com/ecommerce/public/payments/$refID/status");
            curl_setopt($crl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($crl, CURLOPT_HTTPHEADER, ['x_picpay_token: '.$this->x_picpay_token]);
            $callbackCrl = curl_exec($crl);
            curl_close($crl);
            return json_decode($callbackCrl);
        }
        
        public function updateStatus($refID,$authID){
            $status = $this->getStatusSalePicPay($refID);
            $statusUpdate;
            if(isset($status->status)){
                switch($status->status){
                    case 'created':
                        $statusUpdate = 'Aguardando';
                        break;
                    case 'expired':
                        $statusUpdate = 'Cancelado';
                        break;
                    case 'analysis':
                        $statusUpdate = 'Analise';
                        break;
                    case 'paid':
                        $statusUpdate = 'Pago';
                        break;
                    case 'completed':
                        $statusUpdate = 'Liberado';
                        break;
                    case 'refunded':
                        $statusUpdate = 'Contestada';
                        break;
                    default:
                        $statusUpdate = 'Not Identified';
                }
                
                /* Atualizando no Banco de Dados */
                $updateDB = new QuerysDB;
                /* Instânciando e passando parâmetros */
                $updateDB -> updateStatusBD($refID,$authID,$statusUpdate);
            }
        }
    }
    
    $notificationPicPay = trim(file_get_contents("php://input"));
    $notificationConverted = json_decode($notificationPicPay);
    
    if(isset($notificationConverted->referenceId)){
        $updateStatus = new GetStatus($notificationConverted->referenceId);
        $updateStatus->updateStatus($notificationConverted->referenceId,$notificationConverted->authorizationId);
        http_response_code(200);
    }else{
        http_response_code(401);
    }
?>