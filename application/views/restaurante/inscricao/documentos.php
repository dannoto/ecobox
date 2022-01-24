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
            <?php $this->load->view('comp/on/restaurante/navbar_pendente')?>
        </header>
        <!-- Fim Navbar -->

        <main class="pt-16">
            <div class="grid grid-cols-1 py-5 md:py-14 px-5 md:px-14 lg:px-24 xl:px-32"> 
                <div class="col-span-1 bg-white px-5 py-5 md:px-8 lg:px-14 md:py-8 lg:py-10 h-auto">
                    <h1 class="font-semibold text-xl md:text-2xl text-center md:text-left text-gray-700 ">Documentos Obrigatórios</h1>

                    <form action=""  method="post" enctype="multipart/form-data">

                        <div class="pt-8 cursor-pointer">
                            <label for="" class="font-semibold text-lg mb-3">Contrato Social</label>
                            <div  class="mt-3">
                            <input  accept="application/pdf" name="restaurante_contrato_social" required  type="file">
                            </div>
                          
                        </div>

                        <div class="pt-8 cursor-pointer">
                            <label for="" class="font-semibold text-lg mb-3">Alvará dos Bombeiros</label>
                            <div  class="mt-3">
                                <input  accept="application/pdf" name="restaurante_alvara_bombeiros" required  type="file">
                            </div>
                        </div>

                        <div class="pt-8 cursor-pointer">
                            <label for="" class="font-semibold text-lg mb-3">Alvará da Vigilância Sanitária</label>
                           <div class="mt-3">
                                <input  accept="application/pdf" name="restaurante_alvara_sanitaria" required  type="file">
                           </div>
                        </div>


                        <div class="grid justify-center md:justify-center">
                        <button type="submit" class="w-auto h-12 px-20 mb-5 mt-14 xl:mt-10 rounded-md bg-green" >
                            <p class="font-semibold text-white text-xl">CONTINUAR</p>
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