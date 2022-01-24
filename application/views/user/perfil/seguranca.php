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
            <div class="grid grid-cols-1 py-5 md:py-14 px-5 md:px-14 lg:px-24 xl:px-32"> 
                <div class="col-span-1 bg-white px-5 py-5 md:px-8 lg:px-14 md:py-8 lg:py-10 h-auto">
                    <h1 class="font-semibold text-xl md:text-2xl text-center md:text-left text-gray-700 pb-10">Informações de Segurança</h1>

                    <h2 class="font-semibold text-lg text-gray-700 pb-5">Alterar Senha</h2>

                    <form action="" method="POST">
                        <div class="grid grid-cols-2 flex">
                            <div class="col-span-2 md:col-span-1 md:col-span-1">
                                <label for="senhaAtual" class="font-semibold text-gray-700">Senha Atual</label>
                                <input type="password" name="user_current_password" required minlength="6" maxlength="200" id="password" class="w-full h-12 p-2 mb-5 border-2 border-opacity-50 border-gray-700 rounded-md focus:outline-none">
                            </div>
                        </div>

                        <div class="grid grid-cols-2 flex">
                            <div class="col-span-2 md:col-span-1 md:col-span-1">
                                <label for="novaSenha" class="font-semibold text-gray-700">Nova Senha</label>
                                <input type="password" name="user_new_password" required minlength="6" maxlength="200" id="password" class="w-full h-12 p-2 mb-5 border-2 border-opacity-50 border-gray-700 rounded-md focus:outline-none">
                            </div>
                        </div>
                            
                        <div class="grid grid-cols-2 flex">
                            <div class="col-span-2 md:col-span-1 md:col-span-1">
                                <label for="sobrenome" class="font-semibold text-gray-700">Confirmar Nova Senha</label>
                                <input type="password" name="user_confirm_password" required minlength="6" maxlength="200" id="password" class="w-full h-12 p-2 mb-5 border-2 border-opacity-50 border-gray-700 rounded-md focus:outline-none">
                            </div>
                        </div>
                        <div class="grid justify-center md:justify-start">
                        
                            <?php if ($this->session->flashdata('response')) { ?>
                                <p class="text-red-500 font-smibold text-center"><?=$this->session->flashdata('response')?></p>
                                
                            <?php } ?>
                            <button type="submit" class="w-auto h-12 px-20 mb-5 mt-5 rounded-md bg-green" >
                                <p class="font-semibold text-white text-xl">Salvar</p>
                            </button>
                        </div>

                       
                    </form>
 

                </div>
            </div>  
        </main>
    </section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</body>
</html>