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


<body class="bg-white">
    <section>
        <!-- Início Navbar -->
        <header class="w-full fixed z-50">
            <?php $this->load->view('comp/on/restaurante/navbar_pendente')?>
        </header>
        <!-- Fim Navbar -->

        <main class="pt-16 bg-white">

        
            <div class="grid xl:grid-cols-1 py-5 md:py-14 px-5 md:px-14 lg:px-24 xl:px-32"> 
              
                    
                    <div class="w-full grid xl:grid-cols-2 grid-cols-1 xl:mb-0 mb-5"> 
                        
                        <div class="xl:col-span-1 grid-cols-2">
                            <h1  class="font-semibold text-left text-xl md:text-2xl   text-gray-700 ">Meus Pedidos</h1>
                            <p class="pb-8 text-left">Configure o cardápio do seu restaurante.</p>
                        </div>
                      
                    </div>   
                    
                    
                    <div class="grid xl:grid-cols-3 grid-cols-1 mb-5">
                        <div class="xl:grid-cols-1 grid-cols-1 mb-3">
                            <label for="" class="mt">Mes</label><br>
                     
                           <select name="" class="border-gray-400 border p-2 w-2/3 h-12 " >
                               <option value="">Janeiro</option>
                           </select>
                        </div>
                        <div class="xl:grid-cols-1 grid-cols-1 mb-3 ">
                            <label for="" class="mt-2" >Ano</label><br>
                     
                            <select name="" class="border-gray-400 border p-2 w-2/3 h-12 " >
                                <option value="">Janeiro</option>
                            </select>
                        </div>
                        <div class="xl:grid-cols-1 grid-cols-1 pt-5">
                        <button class="h-12 px-4 text-white h-12 bg-green">Buscar</button>
                        </div>
                    </div>

                    <!-- Pedidos -->

                    <div class="border-gray-400 border mt-2  ">
                        <div class="grid xl:grid-cols-4" >
                            <!-- <div class="p-5">
                                <h1 class="font-semibold">DATA DO PEDIDO</h1>
                                <p>24/11/2021 às 20:46</p>
                           
                            </div> -->
                            <div class="p-5">
                                <h1 class="font-semibold">DATA DO PEDIDO</h1>
                                <p>24/11/2021 às 20:46</p>
                                
                          
                                
                            </div>
                            <div class="p-5">
                                <h1 class="font-semibold" >LOCAL DE ENTREGA</h1>
                                <p>Av. T-10 Setor Bueno, SP - São Paulo, Brasil</p>
                            </div>
                            <div class="p-5">
                                <h1 class="font-semibold">VALOR DO PEDIDO</h1>
                                <p>R$ 164,30</p>
                               
                            </div>
                            
                            <div class="p-5">
                           
                                <button class="border-green border p-2 px-3 w-36 mb-2">
                                    <span class="text-green text-base">+</span>
                                    <span class="text-green text-base">DETALHES</span>
                                </button>
                                
                           

                            </div>
                        </div>
                    </div>

                    <div class="border-gray-400 border mt-2  ">
                        <div class="grid xl:grid-cols-4" >
                            <!-- <div class="p-5">
                                <h1 class="font-semibold">DATA DO PEDIDO</h1>
                                <p>24/11/2021 às 20:46</p>
                           
                            </div> -->
                            <div class="p-5">
                                <h1 class="font-semibold">DATA DO PEDIDO</h1>
                                <p>24/11/2021 às 20:46</p>
                                
                          
                                
                            </div>
                            <div class="p-5">
                                <h1 class="font-semibold" >LOCAL DE ENTREGA</h1>
                                <p>Av. T-10 Setor Bueno, SP - São Paulo, Brasil</p>
                            </div>
                            <div class="p-5">
                                <h1 class="font-semibold">VALOR DO PEDIDO</h1>
                                <p>R$ 164,30</p>
                               
                            </div>
                            
                            <div class="p-5">
                           
                                <button class="border-green border p-2 px-3 w-36 mb-2">
                                    <span class="text-green text-base">+</span>
                                    <span class="text-green text-base">DETALHES</span>
                                </button>
                                
                           

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