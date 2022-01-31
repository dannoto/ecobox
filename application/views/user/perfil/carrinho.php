<!DOCTYPE html>
<html lang="pt-br">

<head> 
    <title>Ecobox</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?=base_url()?>/assets/css/main.css">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="icon" href="<?=base_url()?>/assets/images/favicon.jpg">
</head>

<style>
    body {
        font-family: 'Montserrat';
    }
    #background-banner {
        background-image: url("<?=base_url()?>/assets/images/bg-login.jpg");
        background-size: cover;
        background-repeat: no-repeat;
        background-position: 80% 100%;
    }
    #check {
        accent-color: #6A9F46;
    }


    .checkbox-round {
    width: 1.8em;
    height: 1.8em;
    background-color: white;
    border-radius: 50%;
    vertical-align: middle;
    border: 1px solid #ddd;
    appearance: none;
    -webkit-appearance: none;
    outline: none;
    cursor: pointer;
}

.checkbox-round:checked {
    background-color: #6a9f46;
}
</style>

<body style="background-color:#F7F8F9">
    <section>
        <!-- Início Header -->
        <header class="w-full fixed z-50 bg-white">
        <nav class="grid grid-cols-8 md:grid-cols-1 border-b border-gray-200 border-opacity-50 shadow h-16 px-5 md:px-12 lg: relative">
                <div class="col-span-1 flex justify-items-center items-center">
                    <a onmouseover="hoverAtivado()" onmouseout="hoverDesativado()" class="flex space-x-3 items-center" href="<?=base_url()?>">
                        <img id="img-voltar" src="<?=base_url()?>/assets/images/voltar.svg" alt="">
                        <p class="hidden md:flex text-left text-base font-semibold text-gray-700">VOLTAR</p>
                    </a>        
                </div>
                
                <div class="col-span-6 md:hidden flex justify-center items-center">
                    <div>
                        <img class="h-14 py-1" src="<?=base_url()?>assets/images/logo.png" alt="">
                    </div>
                </div>  

                <div class="col-span-1 md:hidden"></div>
            </nav>
        </header>
        <!-- Fim Header -->

        <main class="pt-24">
            <div class="">
             
                <p class="font-semibold text-gray-700 text-2xl md:text-3xl text-left md:pb-5 pl-5 xl:pl-12 pt-12 ">Detalhes do Pedido</p>
               
            </div>

            <!-- <div class="grid grid-cols-1 md:grid-cols-5 xl:grid-cols-3 px-5 md:px-0">
                
            </div> -->

         
            <?php foreach($this->carrinho_model->getCarrinhoRestaurante($this->session->userdata('session_user')['id']) as $r) { ?>

                <div class="grid xl:grid-cols-5 grid-cols-1">
   
<div class="xl:col-span-3 xl:pl-12 xl:pr-12 p-5">
    <div class="bg-white flex pt-3 pl-8">
        <div>
            <img class="w-12 h-12 mr-3 " style="object-fit: cover;" src="<?=base_url()?>assets/images/avatars/<?=$this->restaurante_model->getRestaurante($r->carrinho_restaurante)['restaurante_imagem']?>" alt="">
        </div>
        <div class="mb-3">
           <small class="mb-0">RESTAURANTE</small>
           <p class="text-lg font-semibold mt-0"><?=$this->restaurante_model->getRestaurante($r->carrinho_restaurante)['restaurante_nome']?></p>
        </div>
    </div>
    <hr>

    <div class="bg-white pt-3 xl:pl-8 xl:pr-16 space-y-5 mb-3">

    <!-- Produto -->
    <?php foreach($this->carrinho_model->getCarrinhoByRestaurante($r->carrinho_restaurante) as $p  ) { ?>
    <!-- Pegando Dados do Produto -->


        <div class="flex">
            <div>
                <img class="w-24 h-24" style="object-fit: cover;" src="<?=base_url()?>assets/images/produtos/<?=$this->produtos_model->getProduto($p->carrinho_produto)['produto_imagem']?>" alt="">
            </div>
            <div class="xl:w-5/6 w-5/6  ml-5">
                <h1 class="font-semibold text-base "><?=$this->produtos_model->getProduto($p->carrinho_produto)['produto_nome']?></h1>
                <small class="uppercase">Quantidade: <?=$this->carrinho_model->getProdutoQuantidade($p->carrinho_produto)?></small>
                <p>R$ <?=$this->produtos_model->getProduto($p->carrinho_produto)['produto_valor']?></p>
                
            </div>
            <div onclick="removeProduto(<?=$this->produtos_model->getProduto($p->carrinho_produto)['id']?>)" class="bg-red-500 text-white flex justify-center items-center cursor-pointer w-12">
               <p> X</p>
            </div>
        </div>

    <?php } ?>
     <!-- Produto -->
     <div>
        <hr class="mb-5">
     </div class="flex bg-white pb-5">
       
            <span class="font-semibold text-xl mb-5">SUBTOTAL </span>
        
            <span class=" text-xl">   R$ <?=$this->carrinho_model->getTotalByRestaurante($r->carrinho_restaurante)?></span>
       
            <br>
    </div>
  
    <div class="pt-3">

    <form action="./checkout" method="POST">
        <input type="hidden" name="carrinho_restaurante" value="<?=$r->carrinho_restaurante?>">
        <input type="hidden" name="restaurante_pedido" value="<?=$r->carrinho_restaurante?>">
        <div >
            <button type="submit" class="py-3 cursor-pointer bg-green text-white text-center rounded-md font-semibold w-full" >CONCLUIR PEDIDO</button>
         </div>
    </form>
    </div>
    <br>
   
</div>  


<div class="xl:col-span-1 col-span-1 xl:p-12 p-5">

</div>

</div>
            <?php } ?>
        


           
            
        </main>
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script type="text/javascript" src="<?=base_url()?>/assets/js/mascaraCelular.js"></script>
</body>

</html>

<!-- Hover Voltar -->
<script>
    function hoverAtivado() {
        document.getElementById("img-voltar").src = '<?=base_url()?>/assets/images/voltar-green.svg';
    }

    function hoverDesativado() {
        document.getElementById("img-voltar").src = '<?=base_url()?>/assets/images/voltar.svg';
    }
</script>
<script>
    function removeProduto(id) {

        $.ajax({
            type: "POST",
            data: {delete_carrinho_produto:'.',carrinho_produto:id}, 
            success: function(data)
            {
              location.reload()
            }
        });
    }
</script>