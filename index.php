<?php
    require_once("PicPay/PostSaleToPicPay.class.php");
    require_once("PicPay/GetStatusPicPay.class.php");
    require_once("PicPay/UpdateDataBase.class.php");
    require_once("PicPay/CancelOrderPicPay.class.php");
    
    /* 
        Dados a serem passados na instância:
        
        - Referência ID;
        - Nome Cliente;
        - Sobrenome;
        - CPF;
        - E-mail;
        - Telefone;
        - Nome Produto;
        - Preço Produto.
    */
    
    $sale = new InfoSale(4324,"Teste","Teste",12312312312,"teste@gmail.com",55999999999,"Tenis",99);
    $sale->sendInfosToPicPay();

    $cancel = new CancelOrder(4324, 'asdasdasd342');
    $cancel->sendCancelToPicPay();

?>