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

        <main class="pt-16 bg-gray-100">

        
            <div class="grid xl:grid-cols-1 py-5 md:py-14 px-5 md:px-14 lg:px-24 xl:px-32"> 
              
                    
                    <div class="w-full grid xl:grid-cols-2 grid-cols-1 xl:mb-0 mb-5"> 
                        
                        <div class="xl:col-span-1 grid-cols-2">
                            <h1  class=" text-left text-base uppercase  text-gray-700 ">Dashboard</h1>
                            <p class="pb-8 text-xl text-left">Olá <span class="font-semibold text-xl text-green">Dinner Restaurante</span>.</p>
                        </div>
                      
                    </div>   

                    <div class="grid xl:grid-cols-3">
                        <div class="pl-12 pr-12 xl:pt-0 pt-3">
                            <h1 class="font-semibold text-green text-center text-lg mb-1">PEDIDOS CONCLUÍDOS</h1>
                            <div class="border-gray-400 border bg-white">
                                <h1  style="font-size: 30px;" class="py-8 text-center font-semibold text-xl text-green ">45</h1>
                            </div>
                        </div>
                        <div class="pl-12 pr-12 xl:pt-0 pt-3">
                            <h1 class="font-semibold text-yellow-500 text-center text-lg mb-1">PEDIDOS EM ANDAMENTO</h1>
                            <div class="border-gray-400 border bg-white">
                                <h1   style="font-size: 30px;" class="py-8 text-center font-semibold  text-xl text-yellow-500">13</h1>
                            </div>
                        </div>
                        <div class="pl-12 pr-12 xl:pt-0 pt-3">
                            <h1 class="font-semibold text-blue-400 text-center text-lg mb-1">FATURAMENTO MENSAL</h1>
                            <div class="border-gray-400 border bg-white">
                                <h1 style="font-size: 30px;" class="py-8 text-center font-semibold  text-xl text-blue-400">R$ 5.6656</h1>
                            </div>
                        </div>
                    </div>
                    
                    


                <h1 class="text-smibold text-left text-xl mt-12">Ultimos Pedidos</h1>

                    <div class="border-gray-400 border mt-2  ">
                        <div class="grid xl:grid-cols-3" >
                            <div class=" ">
                                <img class="w-32 h-32 mt-2 m-auto " src="<?=base_url()?>assets/images/avatars/restaurante.png" alt="">
                                <h1 class="text-center mt-1 font-semibold">DINNER RESTAURANTE</h1>
                            </div>
                            <div class="p-5">
                                <h1 class="font-semibold">DATA</h1>
                                <p>24/11/2021 às 20:46</p>
                                <h1 class="font-semibold" >LOCAL DE ENTREGA</h1>
                                <p>Av. T-10 Setor Bueno, SP - São Paulo, Brasil</p>
                                <h1 class="font-semibold">TOTAL</h1>
                                <p>R$ 164,30</p>
                            </div>
                            <div class="p-5">
                                <h1 class="font-semibold">STATUS</h1>
                                <p>CONCLUIDO</p>
                                <h1 class="font-semibold">PEDIDO</h1>
                                <p>56757</p>
                            </div>
                           
                        </div>
                    </div>

                    
                    
    
                

                
                  

                   

            </div>  

           

        </main>
    </section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>

<script>
   function getCidades(e) {
       

        $.ajax({
        type: "POST",
        url: './getcidades',
        data: {estado:e}, // serializes the form's elements.
        success: function(data)
        {
            $('#cidades').html("")
            $('#cidades').append(data)
        }
    });
   }
</script>
</body>
</html>