<?php
    //require_once("SEU BANCO DE DADOS");
    class ConfigPicPay{
//      Chave para enviar informações do e-commerce para o PicPay;
//      Pegue a sua chave em: https://painel-empresas.picpay.com/
        public $x_picpay_token = '';

//      Chave para receber informações do PicPay;
//      Pegue a sua chave em: https://painel-empresas.picpay.com/
        public $x_seller_token = '';
        
//      Url do arquivo que receberá as atualizações do Status da compra;
        public $callbackUrl = '';
        
//      Para onde a pessoa será redirecionada ao realizar a compra?
        public $returnUrl = '';
        
//      Você deseja utilizar o nosso sistema de inclusão no Banco de Dados?
//      Válido apenas para sistemas PDO;
//      'Sim' ou 'Nao'.
        public $includeBD = 'Sim';
        
//      Se você escolheu utilizar, preencha com os nomes das tabelas:
        private $tableBD = ''; // Nome da tabela onde serão registrados;
        private $cNameClient = ''; // Coluna para nome do cliente;
        private $cLastNameClient = ''; // Coluna para Sobrenome do cliente;
        private $cCpfClient = ''; // Coluna para CPF do cliente;
        private $cEmailClient = ''; // Coluna para e-mail do cliente;
        private $cPhoneClient = ''; // Coluna para telefone do cliente;
        private $cNameProduct = ''; // Coluna para nome do produto;
        private $cPriceProduct = ''; // Coluna para preço do produto;
        private $cReferenceId = ''; // Coluna para ID do pedido;
        private $cAuthorizationId = ''; // Coluna para ID de cancelamento do pedido;
        private $cStatusOrder = ''; // Coluna para status do pedido;
        
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