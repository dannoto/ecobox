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
            <div class="grid md:grid-cols-12 xl:grid-cols-10 bg-green w-full h-48 items-center px-5 md:px-0">
                <div class="md:col-span-1 lg:col-span-2"></div>

                <div class="md:col-span-10 lg:col-span-8 xl:col-span-6 w-full grid justify-items-center">
                    <h1 class="font-semibold text-white text-xl md:text-2xl text-center"><?=$artigo['artigo_titulo']?></h1>
                </div>

                <div class="md:col-span-1 lg:col-span-2"></div>
            </div>

            <!-- Início Resposta Pergunta -->
            <div class="grid md:grid-cols-12 xl:grid-cols-10 px-5 md:px-0"> 
                <div class="md:col-span-1 lg:col-span-2"></div>

                <div class="md:col-span-10 lg:col-span-8 xl:col-span-6 pt-10 md:pt-16">
                    <p class="text-gray-700 text-lg text-justify">
                    <?=$artigo['artigo_conteudo']?>
                    </p>
                   
                </div>

                <div class="md:col-span-1 lg:col-span-2"></div>
            </div>  
            <!-- Fim Resposta Pergunta -->
        </main>
    </section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</body>
</html>