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

        <main class="pt-16">
            <div class="grid md:grid-cols-12 lg:grid-cols-9 xl:grid-cols-7 bg-green w-full h-72 items-center px-5 md:px-0">
                <div class="md:col-span-2"></div>

                <div class="md:col-span-8 lg:col-span-5 xl:col-span-3 w-full grid justify-items-center">
                    <h1 class="font-semibold text-white text-2xl md:text-3xl text-center">CENTRAL DE AJUDA</h1>
                    <p class="text-white text-lg md:text-xl text-center pt-2">Dúvidas? Visite nossa FAQ</p>

                    <!-- Início Barra Pesquisa -->
                    <div class="flex justify-center items-center w-full pt-10">
                        <input class="w-full h-14 px-3 bg-white placeholder-gray-500 focus:outline-none text-lg" type="text" placeholder="Qual sua dúvida?">
                        <button class="w-14 h-14 px-2 flex justify-center items-center bg-green border-2 border-white">
                            <img class="h-5" src="<?=base_url()?>/assets/images/search.svg" alt="">
                        </button>
                    </div>
                    <!-- Fim Barra Pesquisa -->
                </div>

                <div class="md:col-span-2"></div>
            </div>

            <div class="grid grid-cols-1 py-5 md:py-14 px-5 md:px-14 lg:px-24 xl:px-32"> 
                <div class="col-span-1 bg-white px-5 py-5 md:px-8 lg:px-14 md:py-8 lg:py-10 h-auto"> 
                    <h1 class="text-xl text-gray-700 pb-5">Selecione o <b class="text-green font-semibold">pedido</b> que você precisa de ajuda</h1>
                </div>
            </div>  
        </main>
    </section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</body>
</html>