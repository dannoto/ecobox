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
                        <p class="font-semibold text-green  text-4x1 lg:text-5xl md:text-5xl text-center  py-5 md:py-6 xl:pb-8">ECOBOX DELIVERY</p>
                        <!-- Fim Título -->

                        <div class="p-5">
                            <p  class="text-2xl font-semibold " >COMECE A VENDER</p>
                            <p class="text-2xl font-semibold ml-5">SEJA NOSSO PARCEIRO</p>
                        </div>
                    
                        <div class="grid justify-items-center mt-12" >
                           <a href="<?=base_url()?>restaurante/registro">
                                <button class="bg-green p-5 font-semibold text-white text-base ">REGISTRAR MEU RESTAURANTE</button>
                           </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Fim Formulário Login -->
        </div>
    </section>

    <section>

        <div class=" py-12 grid justify-items-center">
            <img class="w-2/6" src="<?=base_url()?>assets/images/logo.svg" alt="">

        </div>

        <div class="grid lg:grid-cols-3 md:grid-cols-3 grid-cols-1 py-12 ">
            <div class="col-span-1 grid justify-items-center">
                <div class="h-20 bg-green p-5 py-4 w-3/6">
                    <h1 class="text-4xl text-center text-white font-semibold">1</h1> 
                </div>
                <p class="font-semibold text-lg mt-2">CADASTRE SEU RESTAURANTE</p>
            </div>
            <div class="col-span-1 grid justify-items-center">
                <div class="h-20 bg-green p-5 py-4 w-3/6">
                    <h1 class="text-4xl text-center text-white font-semibold">2</h1> 
                </div>
                <p class="font-semibold text-lg mt-2">CONFIGURE SUA CONTA</p>
            </div>
            <div class="col-span-1 grid justify-items-center">
                <div class="h-20 bg-green p-5 py-4 w-3/6">
                    <h1 class="text-4xl text-center text-white font-semibold">3</h1> 
                </div>
                <p class="font-semibold text-lg mt-2">COMECE A VENDER</p>
            </div>
        
        </div>

    </section>

</body>

</html>
