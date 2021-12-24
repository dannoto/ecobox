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
                        <img class="lg:h-44 xl:h-52 rounded-full" src="<?=base_url()?>assets/images/perfilRestaurante.png" alt=""/>
                        <h1 class="font-semibold lg:text-lg xl:text-xl text-center text-gray-700 pt-5 pb-2">DINNER RESTAURANTE</h1>
                        
                        <div class="flex items-center">
                            <img class="w-5 mr-1" src="<?=base_url()?>assets/images/star.svg" alt="">
                            <p class="font-semibold text-lg text-gray-800 mt-1">4.5</p>
                        </div>
                    </div>

                    <div class="flex space-x-2 px-5 items-center pb-2">
                        <img class="h-5" src="<?=base_url()?>assets/images/time.svg" alt=""/>
                        <p class="font-semibold text-sm text-gray-700">TEMPO DE ENTREGA <b class="font-semibold text-sm text-green">30 min</b></p>
                    </div>

                    <div class="flex space-x-2 px-5 items-center pb-2">
                        <img class="h-5" src="<?=base_url()?>assets/images/taxaEntrega.svg" alt=""/>
                        <p class="font-semibold text-sm text-gray-700">PEDIDO MÍNIMO <b class="font-semibold text-sm text-green">R$ 15,00</b></p>
                    </div>

                    <div >
                        <a class="flex space-x-2 px-5 items-center pb-2" href="">
                            <img class="h-5" src="<?=base_url()?>assets/images/info.svg" alt=""/>
                            <p id="info" class="font-semibold text-sm text-gray-700">MAIS INFORMAÇÕES</p>
                        </a>
                    </div>

                    <div class="border-t border-gray-200 border-opacity-75 mt-10 flex justify-center items-center space-x-2">
                        <img class="h-5 mt-5 mb-5" src="<?=base_url()?>assets/images/cardapio.svg" alt=""/>
                        <h1 class="text-gray-700 lg:text-lg xl:text-xl font-semibold mt-5 mb-5">CARDÁPIO</h1>
                    </div>
                    
                    <div class="px-5 items-center py-3 border-b border-gray-200 border-opacity-50">
                        <a href="#box1">
                            <div class="flex items-center justify-between">
                                <h1 class="font-semibold lg:text-base xl:text-lg text-gray-700">COMBOS</h1>
                                <img  class="h-5" src="<?=base_url()?>assets/images/seta.svg" alt=""/> 
                            </div>
                        </a>   
                    </div>

                    <div class="px-5 items-center py-3 border-b border-gray-200 border-opacity-50">
                        <a href="#box2">
                            <div class="flex items-center justify-between">
                                <h1 class="font-semibold lg:text-base xl:text-lg text-gray-700">ENTRADAS</h1>
                                <img  class="h-5" src="<?=base_url()?>assets/images/seta.svg" alt=""/> 
                            </div>
                        </a>   
                    </div>

                    <div class="px-5 items-center py-3 border-b border-gray-200 border-opacity-50">
                        <a href="#box3">
                            <div class="flex items-center justify-between">
                                <h1 class="font-semibold lg:text-base xl:text-lg text-gray-700">BEBIDAS</h1>
                                <img  class="h-5" src="<?=base_url()?>assets/images/seta.svg" alt=""/> 
                            </div>
                        </a>   
                    </div>
                </div>


                <div class="lg:col-span-9 xl:col-span-6">
                    <div id="box1" class="bg-white lg:p-5 xl:p-8 lg:m-5 xl:m-10">
                        <h1 class="font-semibold text-xl xl:text-2xl text-left text-gray-700 pb-5">COMBOS</h1>
                        
                        <div class="grid grid-cols-8 gap-4">
                            <div class="col-span-4 rounded-lg border-2 border-gray-200 border-opacity-75 p-5">
                                <div style="background-image: url('<?=base_url()?>assets/images/combo.jpg')" class="lg:h-32 xl:h-44 md:w-full bg-cover bg-center rounded-lg"></div>
                            
                                <div class="lg:w-full">
                                    <div class="flex justify-between lg:pt-3 pb-3">
                                        <h1 class="titulo font-semibold text-lg text-gray-700">Pizza Calabresa + Coca-Cola ggggggggggggggggggggggggggggg</h1>
                                        <a href=""><img class="h-10 xl:h-8 pl-2" src="<?=base_url()?>assets/images/plus.svg" alt=""/></a>
                                    </div>
                                    
                                    <div class="pr-2">
                                        <p class="descricao md:text-sm xl:text-base text-gray-700">Molho, Calabresa em rodelas, Parmesão gratinado, Cebola, Manjericão, Azeitonas e Orégano aaaaaaaaaa aaaaaaaaa aa aaaaaaaaaaa  aaa aaaaa aaaaaaa aaaaaaaaaaaa.</p>
                                        <p class="font-semibold text-lg text-gray-700 pt-2">R$ 60,00</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-span-4 flex rounded-lg border-2 border-gray-200 border-opacity-75 p-5">
                                <div style="background-image: url('<?=base_url()?>assets/images/combo.jpg')" class="h-32 w-4/12 bg-cover bg-center rounded-lg"></div>
                            
                                <div class="pl-4 w-8/12">
                                    <div class="flex justify-between pb-3">
                                        <h1 class="titulo font-semibold text-lg text-gray-700">Pizza Calabresa + Coca-Cola</h1>
                                        <a href=""><img class="h-7 pl-2" src="<?=base_url()?>assets/images/plus.svg" alt=""/></a>
                                    </div>
                                    
                                    <div class="pr-2">
                                        <p class="descricao text-sm text-gray-700">Molho, Calabresa em rodelas, Parmesão gratinado, Cebola, Manjericão, Azeitonas e Orégano.</p>
                                        <p class="font-semibold text-lg text-gray-700 pt-1">R$ 60,00</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 


                    <div id="box2" class="bg-white lg:p-5 xl:p-8 lg:m-5 xl:m-10">
                        <h1 class="font-semibold text-xl xl:text-2xl text-left text-gray-700 pb-5">ENTRADAS</h1>
                        
                        <div class="grid grid-cols-8 gap-4">
                            <div class="col-span-4 flex rounded-lg border-2 border-gray-200 border-opacity-75 p-5">
                                <div style="background-image: url('<?=base_url()?>assets/images/pizza-calabresa.jpg')" class="h-32 w-4/12 bg-cover bg-center rounded-lg"></div>
                            
                                <div class="pl-4 w-8/12">
                                    <div class="flex justify-between pb-3">
                                        <h1 class="titulo font-semibold text-lg text-gray-700">Pizza Calabresa</h1>
                                        <a href=""><img class="h-7 pl-2" src="<?=base_url()?>assets/images/plus.svg" alt=""/></a>
                                    </div>
                                    
                                    <div class="pr-2">
                                        <p class="descricao text-sm text-gray-700">Molho, Calabresa em rodelas, Parmesão gratinado, Cebola, Manjericão, Azeitonas e Orégano.</p>
                                        <p class="font-semibold text-lg text-gray-700 pt-1">R$ 50,00</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-span-4 flex rounded-lg border-2 border-gray-200 border-opacity-75 p-5">
                                <div style="background-image: url('<?=base_url()?>assets/images/pizza-calabresa.jpg')" class="h-32 w-4/12 bg-cover bg-center rounded-lg"></div>
                            
                                <div class="pl-4 w-8/12">
                                    <div class="flex justify-between pb-3">
                                        <h1 class="titulo font-semibold text-lg text-gray-700">Pizza Calabresa</h1>
                                        <a href=""><img class="h-7 pl-2" src="<?=base_url()?>assets/images/plus.svg" alt=""/></a>
                                    </div>
                                    
                                    <div class="pr-2">
                                        <p class="descricao text-sm text-gray-700">Molho, Calabresa em rodelas, Parmesão gratinado, Cebola, Manjericão, Azeitonas e Orégano.</p>
                                        <p class="font-semibold text-lg text-gray-700 pt-1">R$ 50,00</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 


                    <div id="box3" class="bg-white lg:p-5 xl:p-8 lg:m-5 xl:m-10">
                        <h1 class="font-semibold text-xl xl:text-2xl text-left text-gray-700 pb-5">BEBIDAS</h1>
                        
                        <div class="grid grid-cols-8 gap-4">
                            <div class="col-span-4 flex rounded-lg border-2 border-gray-200 border-opacity-75 p-5">
                                <div style="background-image: url('<?=base_url()?>assets/images/coca.jpg')" class="h-32 w-4/12 bg-cover bg-center rounded-lg"></div>
                            
                                <div class="pl-4 w-8/12">
                                    <div class="flex justify-between pb-3">
                                        <h1 class="titulo font-semibold text-lg text-gray-700">COCA-COLA LATA</h1>
                                        <a href=""><img class="h-7 pl-2" src="<?=base_url()?>assets/images/plus.svg" alt=""/></a>
                                    </div>
                                    
                                    <div class="pr-2">
                                        <p class="descricao text-sm text-gray-700">Coca-Cola Lata 350ml.</p>
                                        <p class="font-semibold text-lg text-gray-700 pt-1">R$ 5,00</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-span-4 flex rounded-lg border-2 border-gray-200 border-opacity-75 p-5">
                                <div style="background-image: url('<?=base_url()?>assets/images/coca.jpg')" class="h-32 w-4/12 bg-cover bg-center rounded-lg"></div>
                            
                                <div class="pl-4 w-8/12">
                                    <div class="flex justify-between pb-3">
                                        <h1 class="titulo font-semibold text-lg text-gray-700">COCA-COLA LATA</h1>
                                        <a href=""><img class="h-7 pl-2" src="<?=base_url()?>assets/images/plus.svg" alt=""/></a>
                                    </div>
                                    
                                    <div class="pr-2">
                                        <p class="descricao text-sm text-gray-700">Coca-Cola Lata 350ml.</p>
                                        <p class="font-semibold text-lg text-gray-700 pt-1">R$ 5,00</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
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

</body>
</html>