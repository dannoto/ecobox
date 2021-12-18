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
            <div class="cold-span-1 ">
                <div class="grid justify-items-center items-center h-screen p-5 md:px-8 lg:px-14 lg:py-8 xl:px-28 xl:py-12">
                    <div>
                      
                        <!-- Início Título -->
                        <p class="font-semibold text-black  text-4x1 lg:text-3xl md:text-5xl text-center  py-5 md:py-6 xl:pb-8"><span class="text-green">ECOBOX</span> PARA RESTAURANTES</p>
                        <!-- Fim Título -->

                       <!-- Form -->
                       <form action="" autocomplete="off" method="post">
                           <div class="grid md:grid-cols-2 grid-cols-1">
                                <div class=" md:span-col-1">
                                    <label  for="">Nome</label>
                                    <input class="focus:outline-none border mt-2 border-gray-400 p-2" type="text" maxlength="200" required name="restaurante_nome" >
                                </div>
                                <div class=" md:span-col-1">
                                    <label  for="">Sobrenome</label>
                                    <input class="focus:outline-none border mt-2 border-gray-400 p-2" type="text" maxlength="200" required name="restaurante_sobrenome">
                                </div>
                           </div>
                           <div class="grid md:grid-cols-2 grid-cols-1">
                                <div class=" md:span-col-1">
                                    <label for="telefone">Telefone</label>
                                    <input id="telefone" class="focus:outline-none border mt-2 border-gray-400 p-2" type="text" maxlength="200" required name="restaurante_telefone">
                                </div>
                                <div class=" md:span-col-1">
                                    <label  for="">Email</label>
                                    <input class=" focus:outline-none border mt-2 border-gray-400 p-2" type="email" maxlength="200" required name="restaurante_email">
                                </div>
                           </div>
                           <div class="grid md:grid-cols-2 grid-cols-1">
                                <div class=" md:span-col-1">
                                    <label  for="">Senha</label>
                                    <input class="focus:outline-none border mt-2 border-gray-400 p-2" type="password" maxlength="200" required name="restaurante_password">
                                </div>
                                <div class=" md:span-col-1">
                                    <label  for="">Confirmação de Senha</label>
                                    <input class="focus:outline-none border mt-2 border-gray-400 p-2" type="password" maxlength="200" required name="restaurante_passoword_confirm">
                                </div>
                           </div>

                           <!-- Termos -->
                           <div class="flex py-8 justify-center ">
                                <div>
                                    <input type="checkbox"  required>
                                </div>
                                <div class="ml-3">
                                    <p>Concordo com os <a href="<?=base_url()?>termos" class="font-semibold">Termos e Compromissos</a></p>
                                </div>
                           </div>
                           <!-- Fim Termos -->


                           <!-- Botao -->
                           <div class="flex justify-center ">
                               <button type="submit" class="bg-green p-3 px-8 text-lg text-white font-semibold text-center py-3">
                                   CONTINUAR
                               </button>
                           </div>
                           <!-- Fim Botao -->
                       </form>
                       <!-- Fim Form -->
                    </div>
                </div>
            </div>
            <!-- Fim Formulário Login -->
        </div>
    </section>


</body>

</html>
