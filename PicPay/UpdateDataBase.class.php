<?php
    
    
    /* Incluindo a classe de Config do PicPay */
    require_once("ConfigPicPay.class.php");
    
    class UpdateDataBase{
        /* Função de incluir no Banco de Dados */
        public function IncludeDB($refID,$nameClient,$lastnameClient,$cpfClient,$emailClient,$phoneClient,$nameProduct,$priceProduct){
        
            // ---- INCLUA O SEU B.D ABAIXO: ---- //
            
            /* $pdo = new PDO('mysql:host=localhost;dbname=apipicpay','root',''); */
            $configPicPay = new ConfigPicPay;
            
            /* Incluir se estiver utilizando a nossa função de inclusão */
            if(($configPicPay->includeBD == 'Sim') || ($configPicPay->includeBD == 'sim')){
                $infosBD = $configPicPay->getData();
                
                /* Colunas BD */
                $tableBD = $infosBD['tableBD']; // Nome da tabela onde serão registrados;
                $cNameClient = $infosBD['cNameClient']; // Coluna para nome do cliente;
                $cLastNameClient = $infosBD['cLastNameClient']; // Coluna para Sobrenome do 
                $cCpfClient = $infosBD['cCpfClient']; // Coluna para CPF do cliente;
                $cEmailClient = $infosBD['cEmailClient']; // Coluna para e-mail do cliente;
                $cPhoneClient = $infosBD['cPhoneClient']; // Coluna para telefone do cliente;
                $cNameProduct = $infosBD['cNameProduct']; // Coluna para nome do produto;
                $cPriceProduct = $infosBD['cPriceProduct']; // Coluna para preço do produto;
                $cReferenceId = $infosBD['cReferenceId']; // Coluna para ID do pedido;
                $cAuthorizationId = $infosBD['cAuthorizationId']; // Coluna para ID de cancelamento do pedido;
                $cStatusOrder = $infosBD['cStatusOrder']; // Coluna para status do pedido;
                
                /* Dados recebidos pela intância */
                $nameClient = $nameClient;
                $lastnameClient = $lastnameClient;
                $cpfClient = $cpfClient;
                $emailClient = $emailClient;
                $phoneClient = $phoneClient;
                $nameProduct = $nameProduct;
                $priceProduct = $priceProduct;
                $refID = $refID;
                
                /* Preparando a query */
                $query = $pdo -> prepare("INSERT INTO {$tableBD} ($cNameClient,$cLastNameClient,$cCpfClient,$cEmailClient,$cPhoneClient,$cNameProduct,$cPriceProduct,$cReferenceId) VALUES (?,?,?,?,?,?,?,?)");
                /* Executanto a query passando os atributos */
                $query -> execute([$nameClient,$lastnameClient,$cpfClient,$emailClient,$phoneClient,$nameProduct,$priceProduct,$refID]);
            }
            
            /* Incluir se não estiver utilizando a nossa função de inclusão */
            if(($configPicPay->includeBD == 'Nao') || ($configPicPay->includeBD == 'nao') || ($configPicPay->includeBD == '')){
            
                /* COLOQUE A SUA QUERY DE INCLUSÃO DE DADOS */
                
            }
        }
        
        /* Função que atualiza o Status no Banco de Dados */
        public function updateStatusBD($refID,$authID,$status){
            /* Inclua seu banco de dados abaixo */
            $pdo = new PDO('mysql:host=localhost;dbname=apipicpay','root','');
            $configPicPay = new ConfigPicPay;
            
            /* Atualizar se estiver utilizando nossa função de inclusão */
            if(($configPicPay->includeBD == 'Sim') || ($configPicPay->includeBD == 'sim')){
                $infosBD = $configPicPay->getData();
                
                /* Colunas BD */
                $tableBD = $infosBD['tableBD']; // Nome da tabela onde serão registrados;
                $cReferenceId = $infosBD['cReferenceId']; // Coluna para ID do pedido;
                $cAuthorizationId = $infosBD['cAuthorizationId']; // Coluna para ID de cancelamento do pedido;
                $cStatusOrder = $infosBD['cStatusOrder']; // Coluna para status do pedido;
                
                $query = $pdo -> prepare("UPDATE {$tableBD} SET {$cAuthorizationId} = ?, {$cStatusOrder} = ? WHERE {$cReferenceId} = {$refID}");
                $query -> execute([$authID,$status]);
            }
            
            if(($configPicPay->includeBD == 'Nao') || ($configPicPay->includeBD == 'nao') || ($configPicPay->includeBD == '')){
            
                /* COLOQUE A SUA QUERY DE ATUALIZAÇÃO DE STATUS */
                
            }
        }
        
    }
    
?>