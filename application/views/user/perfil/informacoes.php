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

    input[type='radio'] {
    display: none;
    }

    #generoMasculino, #generoFeminino {
        cursor: pointer;
        appearance: none;
        width: 20px;
        height: 20px;
        border-radius: 50%;
        outline: none;
        border: 2px solid #6A9F46;
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    #generoMasculino:checked:before, #generoFeminino:checked:before {
        content: '';
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: #6A9F46;
        position: absolute;
        align-items: center;
        justify-content: center;
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
                    <h1 class="font-semibold text-xl md:text-2xl text-center md:text-left text-gray-700 pb-10">Dados da Conta</h1>

                    <div class="flex justify-center">
                        <img class="h-52 mb-8 rounded-full border-solid border-4 border-green" src="<?=base_url()?>assets/images/perfil.png" alt=""/>
                    </div>

                    <form action="">
                        <div class="grid grid-cols-2 pb-5 md:pb-10">
                            <div class="col-span-2">
                                <label for="file" class="font-semibold text-gray-700">Foto de Perfil</label><br>
                                <input class="pt-2 w-full" type="file" name="file" accept="image/*"/>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 flex">
                            <div class="col-span-2 md:col-span-1 pr-0 md:pr-2.5 lg:pr-5">
                                <label for="nome" class="font-semibold text-gray-700">Nome</label>
                                <input type="text" name="nome" id="nome" maxlength="200" autocomplete="off" class="w-full h-12 p-2 mb-5 border-2 border-opacity-50 border-gray-700 rounded-md focus:outline-none">
                            </div>
                            
                            <div class="col-span-2 md:col-span-1 pl-0 md:pl-2.5 lg:pl-5">
                                <label for="sobrenome" class="font-semibold text-gray-700">Sobrenome</label>
                                <input type="text" name="sobrenome" maxlength="200" id="sobrenome" autocomplete="off" class="w-full h-12 p-2 mb-5 border-2 border-opacity-50 border-gray-700 rounded-md focus:outline-none">
                            </div>
                        </div>

                        <div class="grid grid-cols-2 flex">
                            <div class="col-span-2 lg:col-span-1 md:pr-0 lg:pr-5">
                                <label for="email" class="font-semibold text-gray-700">E-mail</label>
                                
                                <div class="w-full h-12 p-2 mb-5 border-2 border-opacity-50 border-gray-700 rounded-md flex justify-between">
                                    <h1 class="text-gray-700 text-base sm:text-lg">email@email.com</h1>
                                    <img class="w-4" src="<?=base_url()?>/assets/images/lock.svg" alt=""/>
                                </div>
                            </div>
                            
                            <div class="col-span-2 lg:col-span-1 md:pl-0 lg:pl-5">
                                <label for="telefone" class="font-semibold text-gray-700">Celular</label>
                                <input type="tel" name="telefone" id="telefone" onkeypress="mascaraTel(this)" inputmode="number" minlength="11" maxlength="15" autocomplete="off" class="w-full h-12 p-2 mb-5 border-2 border-opacity-50 border-gray-700 rounded-md focus:outline-none">
                            </div>
                        </div>

                        <div class="grid grid-cols-2 flex">
                            <div class="col-span-2 md:col-span-1 pr-0 md:pr-2.5 lg:pr-5">
                                <label for="identidade" class="font-semibold text-gray-700">Número da Identidade</label>
                                <input type="text" name="identidade" id="identidade" maxlength="7" pattern="[0-9]+$" inputmode="number" autocomplete="off" class="w-full h-12 p-2 mb-5 border-2 border-opacity-50 border-gray-700 rounded-md focus:outline-none">
                            </div>
                            
                            <div class="col-span-2 md:col-span-1 pl-0 md:pl-2.5 lg:pl-5">
                                <label for="nascimento" class="font-semibold text-gray-700">Data de Nascimento</label>
                                <input type="text" name="nascimento" maxlength="10" onkeypress="mascaraData(this)" id="nascimento" autocomplete="off" pattern="\d{1,2}/\d{1,2}/\d{4}" class="w-full h-12 p-2 mb-5 border-2 border-opacity-50 border-gray-700 rounded-md focus:outline-none">
                            </div>
                        </div>

                        <div class="grid grid-cols-2">
                            <div class="col-span-1 pr-5">
                                <h1 class="font-semibold text-gray-700">Gênero</h1>

                                <div class="block md:flex md:space-x-5 pt-3">
                                    <div class="flex items-center pb-1 md:pb-0">
                                        <input type="radio" id="generoMasculino" name="genero">
                                        <label for="generoMasculino" class="text-base text-gray-700 px-2">Masculino</label>
                                    </div>
                                    
                                    <div class="flex items-center">
                                        <input type="radio" id="generoFeminino" name="genero">
                                        <label for="generoFeminino" class="text-base text-gray-700 px-2">Feminino</label>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </form>
 
                    <div class="grid justify-center md:justify-start">
                        <button type="submit" class="w-auto h-12 px-20 mb-5 mt-14 xl:mt-10 rounded-md bg-green" >
                            <p class="font-semibold text-white text-xl">Salvar</p>
                        </button>
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