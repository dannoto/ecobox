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


<body>
    <section>
        <!-- Início Navbar -->
        <header class="w-full fixed z-50">
            <?php $this->load->view('comp/on/user/navbar_on')?>
        </header>
        <!-- Fim Navbar -->

        <main class="pt-16">
            <!-- Início Pesquisa Localização -->
            <div class="grid grid-cols-1 md:grid-cols-6 xl:grid-cols-4 bg-green h-96 items-center justify-center"> 
                <div class="md:col-span-1"></div>
                <div class="col-span-1 md:col-span-4 xl:col-span-2 block items-center justify-center px-5 lg:px-16">
                    <p class="text-2xl lg:text-3xl text-center text-white pb-10">Se você tem <b>EcoBox</b>, você tem tudo.</p>
                    
                    <form>
                        <div class="flex">
                            <div class="absolute z-40 h-12 py-3 px-3">
                                <img class="h-6 w-6" src="<?=base_url()?>assets/images/location.svg" alt="">
                            </div>
                            
                            <input type="text" class="h-12 w-full bg-white flex justify-center py-3 pl-12 pr-3 rounded-md placeholder-gray-500 focus:outline-none" placeholder="Entregar em...">
                        </div>
                    </form>

                    <div class="flex pt-3">
                        <a class="flex space-x-2 items-center" href="">
                            <img class="h-5" src="<?=base_url()?>assets/images/my-location.svg" alt="">
                            <p class="text-base text-center text-white">Usar localização atual</p>
                        </a>
                    </div>
                </div>

                <div class="md:col-span-1"></div>
            </div>  
            <!-- Fim Pesquisa Localização -->

            <!-- Início Slide Categorias -->
            <div>
                <?php $this->load->view('comp/on/user/slideCategorias')?>
            </div>
            <!-- Fim Slide Categorias -->

            <!-- Início Slide Banners -->
            <div>
                <?php $this->load->view('comp/on/user/slideBannerHome')?>
            </div>
            <!-- Fim Slide Banners -->


            <!-- Início Restaurantes Perto de Você -->
            <div>
                <?php $this->load->view('comp/on/user/slideRestaurantesHome')?>
            </div>
            <!-- Fim Restaurantes Perto de Você -->

            <!-- Início Restaurantes -->
            <div>
                <?php $this->load->view('comp/on/user/restaurantes')?>
            </div>
            <!-- Fim Restaurantes -->
        </main>
    </section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>/assets/slider/slick/slick.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>/assets/js/slideCategorias.js"></script>
<script type="text/javascript" src="<?=base_url()?>/assets/js/slideBannerHome.js"></script>
<script type="text/javascript" src="<?=base_url()?>/assets/js/slideRestaurantesHome.js"></script>

</body>
</html>


