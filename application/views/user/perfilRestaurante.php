<!DOCTYPE html>
<html lang="pt-br">

<head> 
    <title>Ecobox</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="<?=base_url()?>/assets/images/favicon.png" rel="icon" type="image/png">
    <link rel="stylesheet" href="<?=base_url()?>/assets/css/main.css">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>/assets/slider/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>/assets/slider/slick/slick-theme.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="icon" href="<?=base_url()?>/assets/images/favicon.jpg">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/2.8.0/alpine.js"></script>
</head>

<style>
    body {
        font-family: 'Montserrat';
    }
    .menuItens:hover {
        color: #6A9F46;
    }
    #info:hover {
        color: #6A9F46;
    }
</style>


<body class="bg-gray-100">
    <section>
        <!-- Início Navbar -->
        <header class="w-full fixed z-50">
            <?php $this->load->view('comp/on/user/navbar_on')?>
        </header>
        <!-- Fim Navbar -->

        <main class="pt-16">
            <div class="grid lg:grid-cols-12 xl:grid-cols-8"> 
                <div class="lg:col-span-3 xl:col-span-2 bg-white h-full pt-10 pb-14">
                    <div class="grid justify-items-center mb-5">
                        <img class="lg:h-44 xl:w-52 lg:w-44 xl:h-52 h-44 w-44  rounded-full" style="object-fit: cover;" src="<?=base_url()?>assets/images/avatars/<?=$rest['restaurante_imagem']?>" alt=""/>
                        <h1 class="font-semibold lg:text-lg xl:text-xl text-center text-gray-700 pt-5 pb-2"><?=$rest['restaurante_nome']?></h1>
                        
                        <!-- <div class="flex items-center">
                            <img class="w-5 mr-1" src="<?=base_url()?>assets/images/star.svg" alt="">
                            <p class="font-semibold text-lg text-gray-800 mt-1">4.5</p>
                        </div> -->
                    </div>

                    <div class="flex space-x-2 px-5 items-center pb-2">
                        <img class="h-5" src="<?=base_url()?>assets/images/time.svg" alt=""/>
                        <p class="font-semibold text-sm text-gray-700">TEMPO DE PREPARO  <b class="font-semibold text-sm text-green"><?=$rest['restaurante_preparo_medio']?> min</b></p>
                    </div>

                    <div class="flex space-x-2 px-5 items-center pb-2">
                        <img class="h-5" src="<?=base_url()?>assets/images/taxaEntrega.svg" alt=""/>
                        <p class="font-semibold text-sm text-gray-700">PEDIDO MÍNIMO <b class="font-semibold text-sm text-green">R$ 15,00</b></p>
                    </div>

                    <!-- <div >
                        <a class="flex space-x-2 px-5 items-center pb-2" href="">
                            <img class="h-5" src="<?=base_url()?>assets/images/info.svg" alt=""/>
                            <p id="info" class="font-semibold text-sm text-gray-700">MAIS INFORMAÇÕES</p>
                        </a>
                    </div> -->

                    <div class="border-t border-gray-200 border-opacity-75 mt-10 flex justify-center items-center space-x-2">
                        <img class="h-5 mt-5 mb-5" src="<?=base_url()?>assets/images/cardapio.svg" alt=""/>
                        <h1 class="text-gray-700 lg:text-lg xl:text-xl font-semibold mt-5 mb-5">CARDÁPIO</h1>
                    </div>
                    


                    <?php foreach ($cardapios as $c) { ?>
                    <div class="px-5 items-center py-3 border-b border-gray-200 border-opacity-50">
                        <a href="#<?=$c->id?>">
                            <div class="flex items-center justify-between">
                                <h1 class="font-semibold lg:text-base xl:text-lg text-gray-700"><?=$c->cardapio_nome?></h1>
                                <img  class="h-5" src="<?=base_url()?>assets/images/seta.svg" alt=""/> 
                            </div>
                        </a>   
                    </div>
                    <?php } ?>

                 
                </div>

                <?php foreach ($cardapios as $c) { ?>
                    <div id="<?=$c->id?>" class="lg:col-span-9 xl:col-span-6">
                        <div id="box1" class="bg-white lg:p-5 xl:p-8 lg:m-5 xl:m-10">
                            <h1 class="font-semibold text-xl xl:text-2xl pl-2 text-left text-gray-700 pb-5"><?=$c->cardapio_nome?></h1>
                            
                            <div class="grid grid-cols-8 xl:gap-4  p-2">

                                <?php foreach ($this->produtos_model->getProdutosByCategoria($c->id) as $p) { ?>
                                   
                                    <div class="xl:col-span-4 col-span-8 flex  xl:mb-0 mb-4 pt-2 ">
                                        <div  style="object-fit:cover; background-image: url('<?=base_url()?>assets/images/produtos/<?=$p->produto_imagem?>" class="lg:h-32 xl:h-32 h-32 cover bg-cover bg-center xl:w-1/3 w-2/3 rounded-lg"></div>

                                        <div class="w-full pl-5 pr-5 ">
                                            <div class="flex justify-between  pb-1">
                                                <h1 class="titulo font-semibold text-lg text-gray-700"><?=$p->produto_nome?></h1>
                                               
                                                <span onclick="addProdutoModal(<?=$p->id?>)" style="cursor:pointer;" >
                                                    <img class="h-7 pointer pl-2" src="<?=base_url()?>assets/images/plus.svg" alt=""/>
                                                </span>
                                            </div>
                                            
                                            <div class="pr-2">
                                                <p class="descricao md:text-sm xl:text-sm text-gray-700"><?=$p->produto_descricao?></p>
                                                <p class="font-semibold  text-base text-gray-700 pt-2">R$ <?=$p->produto_valor?></p>
                                            </div>
                                        </div>
                                    
                                    </div>

                                     <!-- MODAL ADD PRODUTO -->
                                        <div id="overlayModalProduto-<?=$p->id?>" style="overflow: scroll;" class="hidden bg-black bg-opacity-75 fixed inset-0 justify-center items-center z-50">
                                            <div class="bg-white w-11/12 lg:w-4/6 xl:w-2/2 ">
                                                <div class="flex justify-between items-center    py-3 p-3 ">
                                                    <h1 class="text-black text-base sm:text-lg pl-4 font-semibold"><?=$p->produto_nome?></h1>
                                                    <span onclick="closeAddProdutoModal(<?=$p->id?>)" style="font-size:30px;cursor:pointer;margin-right:15px" class="font-semibold text-black ">x</span>
                                                </div>

                                                <!-- <form action="" id="form-add-produto"> -->
                                                    <div class=" grid grid-cols-2 " >
                                                        <div class=" col-span-2 xl:col-span-1 pl-5 pr-5">
                                                            <img src="<?=base_url()?>assets/images/produtos/<?=$p->produto_imagem?>" class="w-full h-60" style="object-fit: cover;" alt="">
                                                        </div>
                                                        <div>

                                                        <div class="col-span-2 xl:col-span-1 w-full xl:pt-0 pt-3 xl:pl-0 pl-5 ">
                                                            <div>
                                                            <button class="px-3 py-2 border border-gray-400 text-semibold">-</button>
                                                            <input  class=" py-2 w-16 text-center border border-gray-400" maxlength="3" type="text" value="1">
                                                            <button class="px-3 py-2 border border-gray-400 text-semibold">+</button>
                                                            </div>
                                                            

                                                            <div class=" w-full">
                                                                <p class="text-green font-semibold text-sm pt-3">DESCRIÇÃO</p>
                                                                <p class="text-sm pt-2 w-2/2 pt-3"><?=$p->produto_descricao?></p>
                                                            </div>
                                                        </div>


                                                        </div>
                                                    </div>
                                                    <div class="xl:flex online-block  justify-between p-5 items-center gap-2  ">
                                                        <h2 class="text-semibold pb-3 xl:pb-0">SUBTOTAL: <span class="font-semibold text-xl"> R$ <?=$p->produto_valor?></span></h2>
                                                        <button class="text-sm text-green pb-5 xl:pb-0 ">ADICIONAR E CONTINUAR COMPRANDO</button>
                                                        <button class="px-3 py-3 bg-green font-base uppercase text-white">ADICIONAR E PAGAR</button>
                                                    </div>
                                                
                                                <!-- </form> -->
                                            
                                            </div>
                                        </div>
                                    <!-- MODAL ADD PRODUTO -->

                                <?php } ?>

                                
                            </div>
                        </div> 
                    <?php } ?>

                </div>
                    
            </div>  
        </main>
    </section>


                           

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
$(document).ready(function ()
   { $(".descricao").each(function(i){
        var len=$(this).text().trim().length;
        if(len>146)
        {
            $(this).text($(this).text().substr(0,146)+'...');
        }
    });
 });
</script>

<script>
$(document).ready(function ()
   { $(".titulo").each(function(i){
        var len=$(this).text().trim().length;
        if(len>38)
        {
            $(this).text($(this).text().substr(0,38)+'...');
        }
    });
 });
</script>


<script>

    function closeAddProdutoModal(id) {

        const element = '#overlayModalProduto-'+id

        $(element).addClass('hidden');
        $(element).removeClass('flex');
    }

    function addProdutoModal(id) {


        const element = '#overlayModalProduto-'+id
       
   
        $(element).removeClass('hidden');
        $(element).addClass('flex');
    }

</script>

</body>
</html>