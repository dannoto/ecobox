<!DOCTYPE html>
<html lang="pt-br">

<head> 
    <title>Ecobox</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?=base_url()?>/assets/css/main.css">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="icon" href="<?=base_url()?>/assets/images/favicon.jpg">
</head>

<style>
    body {
        font-family: 'Montserrat';
    }
    #background-banner {
        background-image: url("<?=base_url()?>/assets/images/bg-restaurante.png");
        background-size: cover;
        background-repeat: no-repeat;
        background-position: 80% 100%;
    }
    #recuperarSenha:hover {
        color: #6A9F46;
    }
</style>

<body>
    <section>
        <div class="md:grid grid-cols-2">
            <!-- Início Background Image -->
            <div id="background-banner" class="cold-span-1 sm:grid hidden bg-green h-screen"></div>
            <!-- Fim Background Image -->

            <!-- Início Formulário Login -->
            <div class="cold-span-1 h-screen">
                <div class="grid justify-items-center items-center h-screen p-5 md:px-8 lg:px-14 lg:py-8 xl:px-28 xl:py-12">
                    <div>
                        <!-- Início Logo -->
                        <!-- <div class="grid justify-items-center">
                            <img class="w-10/12 md:w-3/4 xl:w-3/5 pb-10 md:pb-6 xl:pb-16" src="<?=base_url()?>/assets/images/logo.svg" alt="">
                        </div> -->
                        <!-- Fim Logo -->

                        <!-- Início Título -->
                        <p class="font-semibold text-gray-700 text-2xl md:text-3xl text-center px-5 py-5 md:py-6 xl:pb-8">Fazer Login</p>
                        <!-- Fim Título -->

                        <div>
                            <?php if ($this->session->flashdata('login') ) { ?>
                                <p style="color:red;" class="font-regular text-center y-2"><?=$this->session->flashdata('login')?></p>
                            <?php } ?>
                        </div>
                    
                        <!-- Início Formulário -->
                        <form action="" method="POST" class="">
                            <label for="email" class="font-semibold text-gray-700">E-mail</label>
                            <input type="email" name="user_email" maxlength="200" id="email" class="w-full h-12 p-2 mb-5 border-2 border-opacity-50 border-gray-700 rounded-md focus:outline-none" required maxlength="200">

                            <label for="password" class="font-semibold text-gray-700">Senha</label>
                            <input type="password" name="user_password" minlength="6" maxlength="200" id="password" class="w-full h-12 p-2 mb-5 border-2 border-opacity-50 border-gray-700 rounded-md focus:outline-none" required maxlength="200">

                            <a class="pb-10" href="<?=base_url()?>recuperacao">
                                <p id="recuperarSenha" class="text-gray-700">Recuperar minha senha</p>
                            </a>

                            <button type="submit" class="w-full mb-5 mt-14 xl:mt-10 h-12 rounded-md bg-green" >
                                <p class="font-semibold text-white text-xl">Entrar</p>
                            </button>


                            <p class="text-gray-700">Não tem uma conta? <a href="<?=base_url()?>cadastro" class="text-green font-semibold">Cadastre-se</a></p>
                        </form>
                        <!-- Fim Formulário -->
                    </div>
                </div>
            </div>
            <!-- Fim Formulário Login -->
        </div>
    </section>
</body>

</html>
