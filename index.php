<?php
    require_once("PicPay/PostSaleToPicPay.class.php");
    require_once("PicPay/GetStatusPicPay.class.php");
    require_once("PicPay/UpdateDataBase.class.php");
    
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
    
    $sale = new InfoSale(440289221211,"Teste","Teste",12312312312,"teste@gmail.com",55999999999,"Tenis",99);
    $sale->sendInfosToPicPay();

?>