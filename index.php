<?php
    require_once("PicPay/autoload.php");
    
    /* Intanciar a classe de postagem e enviar os parâmetros */
    $sale = new PostSaleToPicPay(/* Ref ID, Nome, Sobrenome, CPF, Email, Telefone, Produto, Preço */);
    $sale->sendInfosToPicPay();

    /* Instanciar a classe de cancelamento e enviar os parâmetros */
    $cancel = new CancelOrderPicPay(/* Ref ID, Auth ID */);
    $cancel->sendCancelToPicPay();

?>