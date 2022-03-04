<!-- Apresentação -->
<h1 align="center">
    <img width="150px" alt="Logo-PicPay" title="API-PICPAY-PHP" src="https://cdn.discordapp.com/attachments/890042596112601120/948975116300193862/VetorLogoPicPay1.png"></img>
    <br>
    API PICPAY PARA PHP 💚
</h1>

<p align="center">🚀 Criei essa adaptação da API do PicPay para pessoas que desejam utilizar o gateway de pagamento de uma forma simples e rápida em seus sites/sistemas que utilizam PHP.</p>

<p align="center">
    <a href="#usability">Como usar</a> •
    <a href="#requirements">Requisitos</a> • 
    <a href="#installation">Instalação</a> • 
    <a href="#documentation">Documentação</a> • 
    <a href="#author">Autor</a>
</p>

<hr>

<!-- Como usar -->
<div id="usability">
    <h2 align="center">🎲 Como utilizar?</h2>
    <p>▪️ Para utilizar o projeto, você precisa <a href="#installation">baixar/clonar</a> o repositório nos arquivos do seu site/sistema;</p>
    <p>▪️ Após realizar o download/clone do repositório, realize as <a href="#documentation">configurações</a> exigidas para o funcionamento;</p>
    <p>▪️ Feito os passos anteriores, agora é hora de colocar para funcionar. Para isso, vá no arquivo que você está utilizando como base para envio das informações (fora da pasta PicPay) e inclua o autoload.php;</p> 
    <img style="width: 550px;" alt="Codigo PHP" title="Codigo Api PicPay PHP" src="https://cdn.discordapp.com/attachments/890042596112601120/949011818213429318/Code1.png"></img>
    <br>
    <br>
    <p>▪️ Com o autoload incluso, você deverá instânciar a classe de venda, passando alguns parâmetros por ela, e logo após chamar a função de envio. Caso seja enviado com sucesso, o comprador será redirecionado automaticamente;</p>
    <img style="width: 800px;" alt="Codigo PHP" title="Codigo Api PicPay PHP" src="https://cdn.discordapp.com/attachments/890042596112601120/949014156017815642/Code2.png"></img>
    <br>
    <br>
    <p>▪️ Para realizar cancelamentos de compras, você precisa instânciar a classe de cancelamento e passar alguns parâmetros para ela.</p>
    <img style="width: 550px;" alt="Codigo PHP" title="Codigo Api PicPay PHP" src="https://cdn.discordapp.com/attachments/890042596112601120/949016393574154270/Code3.png"></img>
    <br>
    <br>
    <p>*Obs: Se você preencheu todas as configurações corretamente, esses são os únicos comandos necessários!</p>
</div>

<hr>

<!-- Requisitos -->
<div id="requirements">
    <h2 align="center">⚙️ Requisitos</h2>
    <p>▪️ O sistema precisa estar hospedado na web para receber as notificações de atualização de status do PicPay;</p>
    <p>▪️ A empresa deve estar registrada no <a href="https://painel-empresas.picpay.com/">Painel de Lojistas PicPay</a>;</p>
    <p>▪️ É necessário pegar os códigos x_picpay_token e x_seller_token no Painel de Lojistas.</p>
</div>

<hr>

<!-- Instalação -->
<div id="installation">
    <h2 align="center">⌛️ Instalação</h2>
    <p>▪️ Download direto: <br> <a href="https://github.com/vitorlbarroso/api-php-picpay/archive/refs/heads/master.zip" style="color: #00BF67;">Clique para baixar</a></p>
    <p>▪️ Git Clone: <br> <span>$ git clone https://github.com/vitorlbarroso/api-php-picpay</span></p>
</div>

<hr>

<!-- Documentação -->
<div id="documentation">
    <h2 align="center">🧩 Documentação</h2>
    <p>▪️ Ao baixar/clonar o repositório, você precisa fazer algumas configurações para que possa enviar os dados para o PicPay;</p>
    <p>▪️ Para preencher as informações necessárias, você precisa estar com os códigos x_picpay_token e x_seller_token em mãos. Ambos podem ser pegos no <a href="https://painel-empresas.picpay.com/">Painel de Lojistas PicPay</a>;</p>
    <br>
    <p>▪️ Já com o repositório aberto em seu editor de códigos, abra os arquivos ConfigPicPay.class.php e UpdateDataBase.class.php, localizados na pasta PicPay;</p>
    <p>▪️ Preencha as informações seguindo a documentação:</p>
    <hr>
    <h3>🔺 ConfigPicPay.class.php</h3>
    <br>
    <p>- Chaves PicPay:</p>
    <p>1. Chave para enviar informações do e-commerce ao PicPay;</p>
    <p>2. Chave para receber os callbacks do PicPay</p>
    <img style="width: 550px;" alt="Codigo PHP" title="Codigo Api PicPay PHP" src="https://cdn.discordapp.com/attachments/890042596112601120/949044900081565716/Code4.png"></img>
    <br>
    <br>
    <p>- Links do site/sistema:</p>
    <p>1. Link que recebe a notificação - https://SEUSITE.COM/DIRETORIO/PicPay/GetStatusPicPay.class.php;</p>
    <p>2. Link para onde onde será redirecionado ao finalir a compra - https://SEUSITE.COM/;</p>
    <img style="width: 700px;" alt="Codigo PHP" title="Codigo Api PicPay PHP" src="https://cdn.discordapp.com/attachments/890042596112601120/949048260503420969/Code5.png"></img>
    <br>
    <br>
    <p>- Nosso método de inclusão:</p>
    <p>1. Sim - Continue configurando;</p>
    <p>2. Nao - Pule para a configuração do UpdateDataBase.class.php;</p>
    <p>Obs: Esse método só é válido para quem utiliza o PDO.</p;>
    <img style="width: 700px;" alt="Codigo PHP" title="Codigo Api PicPay PHP" src="https://cdn.discordapp.com/attachments/890042596112601120/949050887014342666/Code6.png"></img>
    <br>
    <br>
    <p>- Se escolheu nosso método:</p>
    <p>1. Crie uma tabela no seu B.D com as colunas abaixo citadas;</p>
    <p>2. Preencha de acordo com o nome das colunas da sua tabela:</p>
    <img style="width: 800px;" alt="Codigo PHP" title="Codigo Api PicPay PHP" src="https://cdn.discordapp.com/attachments/890042596112601120/949052074501488710/Code7.png"></img>
    <br>
    <hr>
    <h3>🔺 UpdateDataBase.class.php</h3>
    <br>
    <p>- Incluir o seu B.D:</p>
    <p>1. Linha #11;</p>
    <p>2. Linha #60;</p>
    <img style="width: 700px;" alt="Codigo PHP" title="Codigo Api PicPay PHP" src="https://cdn.discordapp.com/attachments/890042596112601120/949055582592184440/Code8.png"></img>
    <br>
    <br>
    <p>- Criar suas querys:</p>
    <p>1. Linha #51</span></p>
    <p>2. Linha #79</span></p>
    <p>Obs: Só siga esses passos se você estiver utilizando o método de inclusão próprio!</p>
    <img style="width: 850px;" alt="Codigo PHP" title="Codigo Api PicPay PHP" src="https://cdn.discordapp.com/attachments/890042596112601120/949057062866923530/Code9.png"></img>
    <br>
    <br>
    <hr>
    <h3>🔺 Arquivo de Instância</h3>
    <br>
    <p>▪️ Inclua o arquivo autoload e instancie a classe de venda, passando os parâmetros solicitados;</p>
    <img style="width: 800px;" alt="Codigo PHP" title="Codigo Api PicPay PHP" src="https://cdn.discordapp.com/attachments/890042596112601120/949014156017815642/Code2.png"></img>
    <br>
    <br>
    <p>▪️ Para realizar cancelamentos de compras, você precisa instânciar a classe de cancelamento e passar alguns parâmetros para ela.</p>
    <img style="width: 550px;" alt="Codigo PHP" title="Codigo Api PicPay PHP" src="https://cdn.discordapp.com/attachments/890042596112601120/949016393574154270/Code3.png"></img>
    <br>
    <br>
    <hr>
    <br>
</div>

<div id="author">
    <h1 align="center">
        <img width="150px" alt="Foto-Autor-Vitor-Barroso" style="padding-bottom: 20px; border-radius: 100%;" title="Vitor-Barroso" src="https://cdn.discordapp.com/attachments/890042596112601120/949060715954712646/Eu.jpeg"></img>
        <br>
        Vitor Barroso 👻
    </h1>
    <p align="center">Desenvolvedor Web - Apaixonado por programação 🤓</p>
    <div align="center"> 
        <a href="https://www.youtube.com/c/HalZz" target="_blank"><img src="https://img.shields.io/badge/YouTube-FF0000?style=for-the-badge&logo=youtube&logoColor=white" target="_blank"></a>
        <a href="https://www.instagram.com/vitorlbarroso/" target="_blank"><img src="https://img.shields.io/badge/-Instagram-%23E4405F?style=for-the-badge&logo=instagram&logoColor=white" target="_blank"></a>
        <a href="https://www.linkedin.com/in/vitorlbarroso2004/" target="_blank"><img src="https://camo.githubusercontent.com/c00f87aeebbec37f3ee0857cc4c20b21fefde8a96caf4744383ebfe44a47fe3f/68747470733a2f2f696d672e736869656c64732e696f2f62616467652f2d4c696e6b6564496e2d2532333030373742353f7374796c653d666f722d7468652d6261646765266c6f676f3d6c696e6b6564696e266c6f676f436f6c6f723d7768697465" target="_blank"></a>
    </div>
</div>
