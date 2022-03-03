<?php
    //require_once("SEU BANCO DE DADOS");
    class ConfigPicPay{
//      Chave para enviar informações do e-commerce para o PicPay;
//      Pegue a sua chave em: https://painel-empresas.picpay.com/
        public $x_picpay_token = '55dd3fa0-c449-437f-a844-f2c1c370dd8d';

//      Chave para receber informações do PicPay;
//      Pegue a sua chave em: https://painel-empresas.picpay.com/
        public $x_seller_token = '7a67fe4b-01a2-42f4-9c36-afe611679384';
        
//      Url do arquivo que receberá as atualizações do Status da compra;
        public $callbackUrl = 'http://localhost/ProjetosPessoais/APIPicPay/PicPay/GetStatusPicPay.class.php/';
        
//      Para onde a pessoa será redirecionada ao realizar a compra?
        public $returnUrl = 'http://localhost/ProjetosPessoais/APIPicPay/';
        
//      Você deseja utilizar o nosso sistema de inclusão no Banco de Dados?
//      Válido apenas para sistemas PDO;
//      'Sim' ou 'Nao'.
        public $includeBD = 'Sim';
        
//      Se você escolheu utilizar, preencha com os nomes das tabelas:
        private $tableBD = 'sales_picpay'; // Nome da tabela onde serão registrados;
        private $cNameClient = 'nameClient'; // Coluna para nome do cliente;
        private $cLastNameClient = 'lastnameClient'; // Coluna para Sobrenome do cliente;
        private $cCpfClient = 'cpfClient'; // Coluna para CPF do cliente;
        private $cEmailClient = 'emailClient'; // Coluna para e-mail do cliente;
        private $cPhoneClient = 'phoneClient'; // Coluna para telefone do cliente;
        private $cNameProduct = 'nameProduct'; // Coluna para nome do produto;
        private $cPriceProduct = 'priceProduct'; // Coluna para preço do produto;
        private $cReferenceId = 'referenceId'; // Coluna para ID do pedido;
        private $cAuthorizationId = 'authorizationID	'; // Coluna para ID de cancelamento do pedido;
        private $cStatusOrder = 'statusOrder'; // Coluna para status do pedido;
        
//      Função que retorna as informações referentes ao Banco de Dados
        public function getData(){
            return [
            'tableBD' => $this->tableBD,
            'cNameClient' => $this->cNameClient,
            'cLastNameClient' => $this->cLastNameClient,
            'cCpfClient' => $this->cCpfClient,
            'cEmailClient' => $this->cEmailClient,
            'cPhoneClient' => $this->cPhoneClient,
            'cNameProduct' => $this->cNameProduct,
            'cPriceProduct' => $this->cPriceProduct,
            'cReferenceId' => $this->cReferenceId,
            'cAuthorizationId' => $this->cAuthorizationId,
            'cStatusOrder' => $this->cStatusOrder
            ];
        }
    }
?>