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
            <?php $this->load->view('comp/on/restaurante/navbar_on')?>
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
                    
                    
                    <div class="grid xl:grid-cols-2 grid-cols-1 mb-5">
                        <div class="xl:grid-cols-1 grid-cols-1">
                            <label for="">Busca</label><br>
                           <form method="GET">
                             <input name="codigo" required class="border-gray-400 border p-2 w-2/3 h-12" placeholder="Buscar pedidos pelo código" type="text">
                            <button type="submit" class="h-12 px-4 text-white h-12 bg-green">Buscar</button>
                           </form>
                        </div>
                        <div class="xl:grid-cols-1 grid-cols-1 ">
                            <label for="filtro" class="">Filtro</label><br>
                            <select onchange="filtro(this.value)" name="filtro" class="h-12 p-2 w-full" id="filtro">
                                <option <?php if ($this->input->get('filtro') == "0") { echo "selected"; } ?>  value="0">TODOS</option>
                                <option <?php if ($this->input->get('filtro') == "1") { echo "selected"; } ?> value="1">EM ANDAMENTO</option>
                                <option <?php if ($this->input->get('filtro') == "3") { echo "selected"; } ?> value="3">CANCELADOS</option>
                                <option  <?php if ($this->input->get('filtro') == "4") { echo "selected"; } ?> value="4">CONCLUÍDOS</option>
                             
                            </select>
                        </div>
                    </div>

                    <!-- Pedidos -->
                    <?php if (count($pedidos) > 0 ) {  ?>

                            <?php foreach ($pedidos as $p ) { ?>
                            <div class="border-gray-400 border mt-2  ">
                                <div class="grid xl:grid-cols-4" >
                                    <div class=" ">
                                        <img class="w-32 h-32 mt-2 m-auto " src="<?=base_url()?>assets/images/avatars/<?=$this->perfil_model->getPerfil($p->pedido_usuario)['user_imagem']?>" alt="">
                                        <h1 class="text-center mt-1 font-semibold"><?=$this->perfil_model->getPerfil($p->pedido_usuario)['user_nome']?></h1>
                                      
                                        <div class="flex justify-center items-center">
                                       <form method="POST" action="<?=base_url()?>restaurante/detalhes">
                                                <input type="hidden" name="pedido" value="<?=$p->id?>">
                                                <button type="submit" class="border-green border p-2 px-3 w-36 mb-2">
                                                    <span class="text-green text-base">+</span>
                                                    <span class="text-green text-base">DETALHES </span>
                                                </button>
                                       </form>
                                        </div>

                                    </div>
                                    <div class="p-5">
                                        <h1 class="font-semibold">DATA</h1>
                                        <p><?=$p->pedido_data?> às <?=$p->pedido_hora?></p>
                                        <h1 class="font-semibold" >LOCAL DE ENTREGA</h1>
                                        <p><?=$p->pedido_endereco?>, <?=$p->pedido_cidade?>-<?=$p->pedido_estado?>  | CEP <?=$p->pedido_cep?></p>
                                        <h1 class="font-semibold">TOTAL</h1>
                                        <p>R$ <?=$this->carrinho_model->getCheckoutTotal($p->pedido_total,$p->pedido_frete,$p->pedido_desconto )?></p>
                                    </div>
                                    <div class="p-5">
                                        <h1 class="font-semibold">STATUS</h1>
                                        <p><?php
                                        
                                        if ($p->pedido_status == "1") {

                                            echo "<p class='text-yellow-500 font-semibold'>EM PREPARO</p>";

                                        } else if ($p->pedido_status == "2") {
                                            echo "<p class='text-yellow-500 font-semibold'>SAIU PARA ENTREGA</p>";
                                        } else if ($p->pedido_status == "3") {
                                            echo "<p class='text-red-500 font-semibold'>CANCELADO </p>";
                                        } else if ($p->pedido_status == "4") {
                                            echo "<p class='text-blue-500 font-semibold'>ENTREGUE </p>";
                                        } else if ($p->pedido_status == "5") {
                                            echo "<p class='text-green-500 font-semibold'>CONCLUÍDO</p>";
                                        }
                                        
                                        
                                         
                                        
                                        ?></p>
                                        <h1 class="font-semibold">PEDIDO</h1>
                                        <p>#<?=$p->id?></p>
                                    </div>
                                    <div class="p-5">

                                       
                                       <?php if ($p->pedido_status == "1") { ?> 

                                            <button onclick="updatePedido(<?=$p->pedido_restaurante?>, '2' , <?=$p->id?>)" class="border-green-500 border p-2 px-3 w-36 mb-2">
                                                <span class="text-green-500 text-base">+</span>
                                                <span class="text-green-500 text-base">SAIU PARA ENTREGA</span>
                                            </button>
                                            <button onclick="updatePedido(<?=$p->pedido_restaurante?>, '3' , <?=$p->id?>)" class="border-red-400 border p-2 px-3 w-36 mb-2">
                                                <span class="text-red-400 text-base">X</span>
                                                <span class="text-red-400 text-base">CANCELAR</span>
                                            </button>

                                    

                                            <?php  } else if ($p->pedido_status == "2") {?> 
                                            
                                            <button onclick="updatePedido(<?=$p->pedido_restaurante?>, '4' , <?=$p->id?>)" class="border-blue-500 border p-2 px-3 w-36 mb-2">
                                                <span class="text-blue-500 text-base">+</span>
                                                <span class="text-blue-500 text-base">ENTREGUE</span>
                                            </button>
                                            <?php  } ?> 
                                
                                        <!-- <button class="border-blue-500 border p-2 px-3 w-36 mb-2">
                                            <span class="text-blue-500 text-base">+</span>
                                            <span class="text-blue-500 text-base">CONCLUÍDO</span>
                                        </button>
                                        <button class="border-red-400 border p-2 px-3 w-36 mb-2">
                                            <span class="text-red-400 text-base">X</span>
                                            <span class="text-red-400 text-base">CANCELAR</span>
                                        </button> -->
                                

                                    </div>
                                </div>
                            </div>

                            <?php } ?>
                    <?php } else {  ?>
                        <div class=" ml-5 xl:ml-12 mr-5 xl:mr-12 " >
                <div class="bg-green h-32 rounded-md flex justify-center items-center">
                    <p class="text-center text-white ">Nenhum pedido encontrado.</p>
                </div>
            </div>

                        <?php } ?>

                 
                    
    
                

                
                  

                   

            </div>  

           

        </main>


                                
                           <!-- MODAL ADD PRODUTO -->
                           <div id="overlayModalDetalhes"style="overflow-y: scroll;" class="hidden bg-black bg-opacity-75 fixed inset-0 justify-center items-center z-50 pt-32">
                                <div  class="bg-white w-11/12 lg:w-4/6 xl:w-1/2 ">
                                    <div class="flex justify-between items-center py-3 p-3 ">
                                        <h1 class="text-black text-base sm:text-lg font-semibold">DETALHES DO PEDIDO</h1>
                                        <span onclick="closeDetalhesModal()" style="font-size:30px;cursor:pointer;margin-right:15px" class="font-semibold text-black ">x</span>
                                    </div>

                                    <div class="p-5">


                                    <div class="grid grid-cols-2">
                                        <div class="span-col-1">
                                            <h1 class="font-semibold text-sm">DATA</h1>
                                            <p ><?=$p->pedido_data?> às <?=$p->pedido_hora?></p>
                                            <h1 class="font-semibold text-sm" >LOCAL DE ENTREGA</h1>
                                            <p class="text-sm"><?=$p->pedido_endereco?>, <?=$p->pedido_cidade?>-<?=$p->pedido_estado?>  | CEP <?=$p->pedido_cep?></p>
                                            <h1 class="font-semibold text-sm">TOTAL</h1>
                                            <p class="text-sm">R$ <?=$p->pedido_total?></p> 
                                        </div>
                                        <div class="span-col-1">
                                            <h1 class="font-semibold text-sm">STATUS</h1>
                                            <p class="text-sm"><?php
                                            
                                            if ($p->pedido_status == "1") {

                                                echo "<p class='text-yellow-500 font-semibold'>EM PREPARO</p>";

                                            } else if ($p->pedido_status == "2") {
                                                echo "<p class='text-yellow-500 font-semibold'>SAIU PARA ENTREGA</p>";
                                            } else if ($p->pedido_status == "3") {
                                                echo "<p class='text-red-500 font-semibold'>CANCELADO</p>";
                                            } else if ($p->pedido_status == "4") {
                                                echo "<p class='text-blue-500 font-semibold'>ENTREGUE </p>";
                                            } else if ($p->pedido_status == "5") {
                                                echo "<p class='text-green-500 font-semibold'>CONCLUÍDO</p>";
                                            }
                                            
                                            
                                            
                                            
                                            ?></p>
                                            <h1 class="font-semibold text-sm">PEDIDO</h1>
                                            <p class="text-sm"><?=$p->id?></p>

                                            <h1 class="font-semibold text-sm">CLIENTE</h1>
                                            <p class="text-sm">Daniel Ribeiro</p>

                                            <h1 class="font-semibold text-sm">CONTATO DO CLIENTE</h1>
                                            <p class="text-sm" >62 9 9361-5459</p>


                                        </div>
                                    </div>


                                    
                                    <div class="grid grid-cols-1">
                                        <div class="span-col-1">

                                            <h1 class="mt-5 font-semibold uppercase">PRODUTOS E ACOMPANHAMENTOS</h1>

                                            <div class="h-60 overflow-scroll">

                                            </div>
                                        
                                        </div>
                                      
                                    </div>


                                    </div>

                                 
                                
                                        <div class="flex justify-end space-x-4 px-6 py-3">
                                            <button  onclick="closeDetalhesModal()"  class="px-4 bg-transparent p-3 rounded-lg text-red-500 hover:bg-gray-100 hover:text-red-400 mr-2">Fechar</button>
                                    
                                        </div>

                                 

                                </div>
                            </div>
                        <!-- MODAL ADD PRODUTO -->

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

<script>
     function filtro(id) {
      

        if (id == 0 ) {
            window.location.href = "<?=base_url()?>restaurante/pedidos";
        } else {
            window.location.href = "<?=base_url()?>restaurante/pedidos?filtro="+id;
        }

    }
</script>

<script>

    function updatePedido(pedido_restaurante, pedido_status, pedido_id) {
        $.ajax({
            type: "POST",
            url:'<?=base_url()?>restaurante/pedidos',
            data: {update_pedido:'.', pedido_restaurante:pedido_restaurante, pedido_status:pedido_status, pedido_id:pedido_id}, 
            success: function(data)
            {
                location.reload()
            }
        })

    }

   
</script>

<script>

    function closeDetalhesModal() {
        $('#overlayModalDetalhes').removeClass('flex')
        $('#overlayModalDetalhes').addClass('hidden')
    }
    function openDetalhesModal() {
        $('#overlayModalDetalhes').removeClass('hidden')
        $('#overlayModalDetalhes').addClass('flex')
    }
</script>
</body>
</html>