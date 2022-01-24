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
</style>


<body class="bg-gray-100">
    <section>
        <!-- Início Navbar -->
        <header class="w-full fixed z-50">
            <?php $this->load->view('comp/on/user/navbar_on')?>
        </header>
        <!-- Fim Navbar -->

        <main class="pt-16 pb-14">
            <div class="grid md:grid-cols-12 lg:grid-cols-9 xl:grid-cols-7 bg-green w-full h-52 items-center px-5 md:px-0">
                <div class="md:col-span-2"></div>

                <div class="md:col-span-8 lg:col-span-5 xl:col-span-3 w-full grid justify-items-center">
                    <h1 class="font-semibold text-white text-2xl md:text-3xl text-center">CENTRAL DE AJUDA</h1>
                    <p class="text-white text-lg md:text-xl text-center pt-2">Nossa central de ajuda aos usuários</p>

                    <!-- Início Barra Pesquisa -->
                    <!-- <div class="flex justify-center items-center w-full pt-10">
                        <input class="w-full h-14 px-3 bg-white placeholder-gray-500 focus:outline-none text-lg" type="text" placeholder="Qual sua dúvida?">
                        <button class="w-14 h-14 px-2 flex justify-center items-center bg-green border-2 border-white">
                            <img class="h-5" src="<?=base_url()?>/assets/images/search.svg" alt="">
                        </button>
                    </div> -->
                    <!-- Fim Barra Pesquisa -->
                </div>

                <div class="md:col-span-2"></div>
            </div>

            <!-- Início Box Perguntas 1 -->

                <?php  foreach ($categorias as $c) {   ?>
                        <div class="grid md:grid-cols-12 xl:grid-cols-10 px-5 md:px-0"> 
                        <div class="md:col-span-1 lg:col-span-2"></div>

                            <div class="md:col-span-10 lg:col-span-8 xl:col-span-6 pt-16">
                                <h1 class="font-semibold text-gray-700 text-xl md:text-2xl"><?=$c->categoria_nome?></h1>

                                <?php  foreach ($this->ajuda_model->getArtigosByCategoria($c->id) as $a) {   ?>
                                    <div class="py-4 px-5 my-4 bg-white items-center border-b border-gray-200 border-opacity-50 shadow">
                                        <a href="<?=base_url()?>faq/<?=$a->id?>">
                                            <div class="flex items-center justify-between">
                                                <h1 class="text-lg text-gray-700"><?=$a->artigo_titulo?></h1>
                                                <img  class="h-5" src="<?=base_url()?>assets/images/seta.svg" alt=""/> 
                                            </div>
                                        </a>   
                                    </div>
                                <?php  }  ?>

                            </div>
                        <div class="md:col-span-1 lg:col-span-2"></div>
                        </div>  
                 <?php  }   ?>
              


            <!-- Início Box Perguntas 2 -->
            <!-- <div class="grid md:grid-cols-12 xl:grid-cols-10 px-5 md:px-0"> 
                <div class="md:col-span-1 lg:col-span-2"></div>

                <div class="md:col-span-10 lg:col-span-8 xl:col-span-6 pt-16">
                    <h1 class="font-semibold text-gray-700 text-xl md:text-2xl">DESCONTOS</h1>

                    <div class="py-4 px-5 my-4 bg-white items-center border-b border-gray-200 border-opacity-50 shadow">
                        <a href="<?=base_url()?>faq_artigo">
                            <div class="flex items-center justify-between">
                                <h1 class="text-lg text-gray-700">Lorem Ipsum is simply dummy text of the printing</h1>
                                <img  class="h-5" src="<?=base_url()?>assets/images/seta.svg" alt=""/> 
                            </div>
                        </a>   
                    </div>

                    <div class="py-4 px-5 my-4 bg-white items-center border-b border-gray-200 border-opacity-50 shadow">
                        <a href="<?=base_url()?>faq_artigo">
                            <div class="flex items-center justify-between">
                                <h1 class="text-lg text-gray-700">Lorem Ipsum is simply dummy text of the printing</h1>
                                <img  class="h-5" src="<?=base_url()?>assets/images/seta.svg" alt=""/> 
                            </div>
                        </a>   
                    </div>

                    <div class="py-4 px-5 my-4 bg-white items-center border-b border-gray-200 border-opacity-50 shadow">
                        <a href="<?=base_url()?>faq_artigo">
                            <div class="flex items-center justify-between">
                                <h1 class="text-lg text-gray-700">Lorem Ipsum is simply dummy text of the printing</h1>
                                <img  class="h-5" src="<?=base_url()?>assets/images/seta.svg" alt=""/> 
                            </div>
                        </a>   
                    </div>
                </div>

                <div class="md:col-span-1 lg:col-span-2"></div>
            </div>   -->
            <!-- Fim Box Perguntas 2 -->
        </main>
    </section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</body>
</html>