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
            <div class="grid grid-cols-1 bg-gray-100 py-10 px-32 h-screen"> 
                <div class="col-span-1 bg-white rounded-md p-14 h-auto">
                    <h1 class="font-semibold text-xl md:text-xl text-gray-700 pb-10">Informações da Conta</h1>

                    <div class="flex justify-center">
                        <img class="h-40 mb-8 rounded-full border-solid border-4 border-green" src="<?=base_url()?>assets/images/perfil.png" alt=""/>
                    </div>

                    <div class="grid grid-cols-2 pb-10">
                        <div class="col-span-2">
                            <label for="file" class="font-semibold text-gray-700">Foto de Perfil</label><br>
                            <input class="pt-2" type="file" name="file" accept="image/*"/>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 flex">
                        <div class="col-span-1 pr-5">
                            <label for="nome" class="font-semibold text-gray-700">Nome</label>
                            <input type="text" name="nome" id="nome" maxlength="200" autocomplete="off" class="w-full h-12 p-2 mb-5 border-2 border-opacity-50 border-gray-700 rounded-md focus:outline-none">
                        </div>
                        
                        <div class="col-span-1 pl-5">
                            <label for="sobrenome" class="font-semibold text-gray-700">Sobrenome</label>
                            <input type="text" name="sobrenome" maxlength="200" id="sobrenome" autocomplete="off" class="w-full h-12 p-2 mb-5 border-2 border-opacity-50 border-gray-700 rounded-md focus:outline-none">
                        </div>
                    </div>

                    <div class="grid grid-cols-2 flex">
                        <div class="col-span-1 pr-5">
                            <label for="email" class="font-semibold text-gray-700">E-mail</label>
                            <input type="email" name="email" id="email" autocomplete="off" maxlength="200" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" class="w-full h-12 p-2 mb-5 border-2 border-opacity-50 border-gray-700 rounded-md focus:outline-none">
                        </div>
                        
                        <div class="col-span-1 pl-5">
                            <label for="telefone" class="font-semibold text-gray-700">Celular</label>
                            <input type="tel" name="telefone" required id="telefone" onkeypress="mascaraTel(this)" inputmode="number" minlength="11" maxlength="15" autocomplete="off" class="w-full h-12 p-2 mb-5 border-2 border-opacity-50 border-gray-700 rounded-md focus:outline-none">
                        </div>
                    </div>

                    <div class="grid grid-cols-2 flex">
                        <div class="col-span-1 pr-5">
                            <label for="identidade" class="font-semibold text-gray-700">Número da Identidade</label>
                            <input type="text" name="identidade" id="identidade" maxlength="7" pattern="[0-9]+$" inputmode="number" autocomplete="off" class="w-full h-12 p-2 mb-5 border-2 border-opacity-50 border-gray-700 rounded-md focus:outline-none">
                        </div>
                        
                        <div class="col-span-1 pl-5">
                            <label for="nascimento" class="font-semibold text-gray-700">Data de Nascimento</label>
                            <input type="text" name="nascimento" maxlength="10" onkeypress="mascaraData(this)" id="nascimento" autocomplete="off" pattern="\d{1,2}/\d{1,2}/\d{4}" class="w-full h-12 p-2 mb-5 border-2 border-opacity-50 border-gray-700 rounded-md focus:outline-none">
                        </div>
                    </div>

                </div>
            </div>  
        </main>
    </section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>/assets/js/mascaraCelular.js"></script>
<script type="text/javascript" src="<?=base_url()?>/assets/js/mascaraData.js"></script>

</body>
</html>