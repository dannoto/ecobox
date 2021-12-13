<!DOCTYPE html>
<html lang="p-br">

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


<body>
    <section>
        <!-- Início Navbar -->
        <!-- <header class="w-full fixed z-50">
            <?php $this->load->view('comp/on/user/navbar')?>
        </header> -->
        <!-- Fim Navbar -->

        <main class="pt-16">
            <!-- Início Pesquisa Localização -->
            <div class="grid grid-cols-4 bg-green h-96 items-center justify-center"> 
                <div class="col-span-1"></div>
                <div class="col-span-2 block items-center justify-center px-16">
                    <p class="text-3xl text-center text-white pb-10">Se você tem <b>EcoBox</b>, você tem tudo.</p>
                    
                    <form>
                        <div class="flex">
                            <div class="absolute z-40 h-12 py-3 px-3">
                                <img class="h-6 w-6" src="<?=base_url()?>assets/images/location.svg" alt="">
                            </div>
                            
                            <input type="text" class="h-12 w-full bg-white flex justify-center py-3 pl-12 pr-3 rounded-md placeholder-gray-500 focus:outline-none" placeholder="Onde você deseja receber seu pedido?">
                        </div>
                    </form>

                    <div class="flex pt-3">
                        <a class="flex space-x-2 items-center" href="">
                            <img class="h-5" src="<?=base_url()?>assets/images/my-location.svg" alt="">
                            <p class="text-base text-center text-white">Usar minha localização</p>
                        </a>
                    </div>
                </div>

                <div class="col-span-1"></div>
            </div>  
            <!-- Fim Pesquisa Localização -->

            <!-- Início Slide Categorias -->
            <div>
                <?php $this->load->view('comp/slideCategorias')?>
            </div>
            <!-- Fim Slide Categorias -->

            <!-- Início Slide Banners -->
            <div>
                <?php $this->load->view('comp/slideBannerHome')?>
            </div>
            <!-- Fim Slide Banners -->

            <div class="grid grid-cols-12 lg:grid-cols-10 pl-2 md:px-0">
                <div class="md:col-span-1"></div>

                <div class="col-span-12 md:col-span-10 lg:col-span-8 py-6">
                    <div class="grid grid-cols-4 md:grid-cols-6 lg:grid-cols-8 gap-4">
                        <div class="col-span-2">
                            <a href="">
                                <div style="background-image: url('<?=base_url()?>assets/images/burguer-king.jpeg')" class="w-full h-48 bg-cover bg-center rounded-lg"></div>
                                <p class="font-normal text-lg font-semibold text-gray-800 text-center pt-1 w-full">Burger King</p>
                            </a>
                        </div>

                        <div class="col-span-2">
                            <a href="">
                                <div style="background-image: url('<?=base_url()?>assets/images/subway.jpeg')" class="w-full h-48 bg-cover bg-center rounded-lg"></div>
                                <p class="font-normal text-lg font-semibold text-gray-800 text-center pt-1 w-full">Subway</p>
                            </a>
                        </div>

                        <div class="col-span-2">
                            <a href="">
                                <div style="background-image: url('<?=base_url()?>assets/images/domino.jpg')" class="w-full h-48 bg-cover bg-center rounded-lg"></div>
                                <p class="font-normal text-lg font-semibold text-gray-800 text-center pt-1 w-full">Domino's Pizza</p>
                            </a>
                        </div>

                        <div class="col-span-2">
                            <a href="">
                                <div style="background-image: url('<?=base_url()?>assets/images/doces.jpeg')" class="w-full h-48 bg-cover bg-center rounded-lg"></div>
                                <p class="font-normal text-lg font-semibold text-gray-800 text-center pt-1 w-full">Magnólia Doces</p>
                            </a>
                        </div>

                    </div>
                </div>

                <div class="md:col-span-1"></div>
            </div>


        </main>
    </section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>/assets/slider/slick/slick.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>/assets/js/modalMenu.js"></script>
<script type="text/javascript" src="<?=base_url()?>/assets/js/slideCategorias.js"></script>
<script type="text/javascript" src="<?=base_url()?>/assets/js/slideBannerHome.js"></script>

</body>
</html>


