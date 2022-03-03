<?php
    require_once("PicPay/autoload.php");
    
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
    
    $sale = new PostSaleToPicPay(999768,"Teste","Teste",12312312312,"teste@gmail.com",55999999999,"Tenis",99);
    $sale->sendInfosToPicPay();

    $cancel = new CancelOrderPicPay(999768, 'asdasdasd342');
    $cancel->sendCancelToPicPay();

?>