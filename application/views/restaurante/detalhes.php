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
</style>

<body>
    <section>
        <!-- Início Header -->
        <header class="w-full fixed z-50 bg-white">
            <nav class="grid grid-cols-8 md:grid-cols-1 border-b border-gray-200 border-opacity-50 shadow h-16 px-5 md:px-12 lg: relative">
                <div class="col-span-1 flex justify-items-center items-center">

                <?php if ($this->input->get('vendas') ) { ?>
                    <a onmouseover="hoverAtivado()" onmouseout="hoverDesativado()" class="flex space-x-3 items-center" href="<?=base_url()?>restaurante/vendas">
                 <?php } else if ($this->input->get('admin'))  {?>
                     <a onmouseover="hoverAtivado()" onmouseout="hoverDesativado()" class="flex space-x-3 items-center" href="<?=base_url()?>admin/vendas">
                <?php }  else {  ?>
                    <a onmouseover="hoverAtivado()" onmouseout="hoverDesativado()" class="flex space-x-3 items-center" href="<?=base_url()?>restaurante/pedidos">
                <?php }   ?>
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

        <main class="pt-16">
            <div class="grid grid-cols-1  xl:grid-cols-5 px-5 md:px-0">
                <div class="col-span-1"></div>

               
                <div class="col-span-1 mt-5  xl:col-span-3 bg-gray-100 grid justify-items-center">
           

                    
                        <div class=" w-full  mt-2  ">
                            <div class="grid xl:grid-cols-1" >
                                <div class=" span-col-1">
                                    <img class="w-32 h-32 mt-2 m-auto " src="<?=base_url()?>assets/images/avatars/<?=$this->perfil_model->getPerfil($pedido['pedido_usuario'])['user_imagem']?>" alt="">
                                    <h1 class="text-center text-green  uppercase mt-1 font-semibold"><?=$this->perfil_model->getPerfil($pedido['pedido_usuario'])['user_nome']?> <?=$this->perfil_model->getPerfil($pedido['pedido_usuario'])['user_sobrenome']?></h1>
                                </div>


                                <div class="grid grid-cols-2">
                                    <div class="span-col-1 p-5">
                                        <h1 class="font-semibold">DATA</h1>
                                        <p><?=$pedido['pedido_data']?> às <?=$pedido['pedido_hora']?></p>
                                        <h1 class="font-semibold" >LOCAL DE ENTREGA</h1>
                                        <p><?=$pedido['pedido_endereco']?>, <?=$pedido['pedido_cidade']?>-<?=$pedido['pedido_estado']?>  | CEP <?=$pedido['pedido_cep']?></p>
                                        <h1 class="font-semibold">TOTAL</h1>
                                        <p>R$ <?=$pedido['pedido_total']?></p>

                                        <?php if (strlen($pedido['pedido_observacoes']) > 0 ) { ?>
                                            <h1 class="font-semibold">OBSERVAÇÕES</h1>
                                            <p> <?=$pedido['pedido_observacoes']?></p>
                                        <?php } ?>
                                    </div>
                                    <div class="span-col-1 p-5">
                                        <h1 class="font-semibold">STATUS</h1>
                                        <p><?php
                                        if ($pedido['pedido_status'] == "1") {
                                            echo "<p class='text-yellow-500 font-semibold'>EM PREPARO</p>";
                                        } else if ($pedido['pedido_status'] == "2") {
                                            echo "<p class='text-yellow-500 font-semibold'>SAIU PARA ENTREGA</p>";
                                        } else if ($pedido['pedido_status'] == "3") {
                                            echo "<p class='text-red-500 font-semibold'>CANCELADO</p>";
                                        } else if ($pedido['pedido_status'] == "4") {
                                            echo "<p class='text-blue-500 font-semibold'>ENTREGUE </p>";
                                        } else if ($pedido['pedido_status'] == "5") {
                                            echo "<p class='text-green-500 font-semibold'>CONCLUÍDO</p>";
                                        }
                                        ?></p>
                                        <h1 class="font-semibold">PEDIDO</h1>
                                        <p><?=$pedido['id']?></p>

                                        <h1 class="font-semibold">FORMA DE PAGAMENTO</h1>
                                        <p class="uppercase"><?=$pedido['pedido_pagamento']?></p>

                                        <?php if (strlen($pedido['pedido_troco']) > 0 ) { ?>
                                            <h1 class="font-semibold">TROCO</h1>
                                            <p>R$ <?=$pedido['pedido_troco']?></p>
                                        <?php } ?>

                                    </div>
                                </div>
                               
                              
                            
                            </div>
                        </div>

                        <h1 class="mt-2 mb-2 uppercase text-green font-semibold">ITENS DO PEDIDO</h1>

                                         
                        <?php foreach ($produtos as $p ) { ?>
                            <?php $prod = $this->produtos_model->getProduto($p->pedido_produto)?>
                            <div class="w-full border bg-green border-gray-500 grid xl:grid-cols-2 grid-cols-1">
                                <div class="span-col-1 flex justify-center p-2 ">
                                    <img class="w-32 h-32" style="object-fit: cover;" src="<?=base_url()?>assets/images/produtos/batata.jpg" alt="">
                                </div>
                                <div class="span-col-1 xl:text-left text-center  " >
                                    <h1 class="font-semibold text-base uppercase mt-5"><?=$prod['produto_nome']?></h1>
                                    <h1 class=" text-base ">QUANTIDADE: <span class="font-semibold"><?=$p->pedido_quantidade?> unid.</span></h1>
                                    <p class="font-semibold text-base mb-2">R$ <?=$prod['produto_valor']?></p>

                                </div>
                            </div>
                            
                           
                            <?php if(count($this->pedido_model->getPedidoAcompanhamentoByProduto($p->pedido_user, $this->input->post('pedido'),  $p->pedido_produto))  > 0) { ?>
                             
                                <?php foreach($this->pedido_model->getPedidoAcompanhamentoByProduto($p->pedido_user, $this->input->post('pedido'),  $p->pedido_produto) as $c) { ?>

                                    <?php $ac = $this->pedido_model->getAcompanhamentoById($c->item_acompanhamento)?>
                                    
                                    <div class="xl:pl-60   pl-8 w-full">
                                        <div class="bg-yellow-600 border border-yellow-200">
                                            <p class="text-center font-semibold"><?=$ac['elemento_nome']?></p>
                                        </div>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                        <?php } ?>
                     



                        <!-- <div class="w-full border border-gray-500 bg-gray-100 grid xl:grid-cols-2 grid-cols-1">
                            <div class="span-col-1 flex justify-center p-5 ">
                                <img class="w-32 h-32" style="object-fit: cover;" src="<?=base_url()?>assets/images/produtos/batata.jpg" alt="">
                            </div>
                            <div class="span-col-1  xl:text-left text-center  " >
                                <h1 class="font-semibold text-base mt-5">PRODUTO</h1>
                                <h1 class=" text-base ">QUANTIDADE: <span class="font-semibold">5 unid.</span></h1>
                                <p class="font-semibold text-base mb-2">R$ 21</p>

                            </div>
                        </div> -->
                        

                    

                </div>
                
                <div class=" col-span-1"></div>


            </div>
            <br>
            <br>
        </main>
    </section>

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