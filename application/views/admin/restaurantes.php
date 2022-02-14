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
            <?php $this->load->view('comp/on/admin/navbar')?>
        </header>
        <!-- Fim Navbar -->

        <main class="pt-16 bg-white">

        
            <div class="grid xl:grid-cols-1 py-5 md:py-14 px-5 md:px-14 lg:px-24 xl:px-32"> 
              
                    
                    <div class="w-full grid xl:grid-cols-2 grid-cols-1 xl:mb-0 mb-5"> 
                        
                        <div class="xl:col-span-1 grid-cols-2">
                            <h1  class="font-semibold text-left text-xl md:text-2xl   text-gray-700 ">Meus Restaurantes</h1>
                            <p class="pb-8 text-left">Seus restaurantes no ecobox.</p>
                        </div>
                      
                    </div>   

                    <div>
                        <p>BUSQUE PELO PEDIDO</p>
                    </div>
                    <div>
                        <!-- <div class="xl:grid-cols-1 grid-cols-1 mb-3">
                            <label for="" class="mt">Mes</label><br>
                     
                           <select name="" class="border-gray-400 border p-2 w-2/3 h-12 " >
                               <option value="">Janeiro</option>
                           </select>
                        </div> -->
                      <form method="get" class="grid xl:grid-cols-3" action="">
                        <div class="span-col-1">
                            <label for="">ESTADO</label><br>
                          
                            <select onchange="getCidades(this.value)" name="estado"  class="border-gray-400 border p-2 w-2/3 h-12" name="" >
                            <option value="">SELECIONAR</option>
                                <?php foreach($estados as $e) { ?>
                                    <option value="<?=$e->Uf?>"><?=$e->Nome?></option>
                                <?php } ?>
                            </select>
                            
                        </div>
                        <div class="span-col-1">
                            <label for="">CIDADE</label><br>
                            <select  id="cidades"  class="border-gray-400 border p-2 w-2/3 h-12" name="cidades" >
                                
                            </select>
                        </div>
                         
                          <div class="span-col-1">
                              <br>
                          
                            <input class="border-gray-400 border p-2 w-2/3 h-12" name="nome"  type="text">
                            <button class="h-12 px-4 text-white h-12 bg-green">Buscar</button><br>
                          </div>
                      </form>
                      
                       
                      
                    </div>
                    
                    
                    <div class="flex W-2/3 ">
                        <!-- <div class="xl:grid-cols-1 grid-cols-1 mb-3">
                            <label for="" class="mt">Mes</label><br>
                     
                           <select name="" class="border-gray-400 border p-2 w-2/3 h-12 " >
                               <option value="">Janeiro</option>
                           </select>
                        </div> -->
                      <!-- <form method="get" action="">
                          <input  name="pedido" required type="text" class="border-gray-400 border p-2 w-2/3 h-12" >
                          <button class="h-12 px-4 text-white h-12 bg-green">Buscar</button>
                      </form> -->
                      
                       
                      
                    </div>

                    <!-- Pedidos -->
                    <?php if (count($restaurantes) > 0 ) { ?>
                        <?php foreach ($restaurantes as $v ) { ?>

                        <!-- <div class="border-gray-400 flex border mt-2 xl:w-2/3  ">
                            <div>
                                <img class="w-32 h-32" src="<?=base_url()?>assets/images/avatars/<?=$v->restaurante_imagem?>" alt="">
                            </div>
                            <div>
                                <h1 class="p-3 font-semibold"><?=$v->restaurante_nome?></h1>

                                <p class="pl-3"><?=$v->restaurante_email?></p>
                                <p class="pl-3"><?=$v->restaurante_telefone?></p>

                                <div >
                                    <button>VER PERFIL</button>
                                </div>

                            </div>
                            <div>
                                <button></button>

                            </div>
                        </div>  -->

                        <div class="grid xl:grid-cols-3 mt-2 border border-gray-500 grid-cols-1">
                            <div class="span-col-1">
                                <img class="w-32 mt-2 h-32 m-auto" src="<?=base_url()?>assets/images/avatars/<?=$v->restaurante_imagem?>" alt="">
                                <h1 class="p-3 text-center uppercase font-semibold"><?=$v->restaurante_nome?></h1>
                            </div>
                            <div class="span-col-1 mt-8 flex">
                                <div class="m-3">
                                    <p class=""> CONCLUIDOS </p>
                                    <p class="font-semibold">  <?=$this->restaurante_model->getPedidosConcluidos($v->id);?></p>
                                    <p class=""> EM ANDAMENTO</p>
                                    <p  class="font-semibold">  <?=$this->restaurante_model->getPedidosAndamento($v->id);?></p>

                                </div>
                                <div class="m-3">
                                    <p class=""> CANCELADOS </p>
                                    <p  class="font-semibold">  <?=$this->restaurante_model->getPedidosCancelados($v->id);?></p>
                                    <p class="">VENDAS </p>
                                    <p  class="font-semibold">R$ <?=$this->restaurante_model->getPedidosGanhos($v->id);?></p>
                                </div>

                              
                            
                            </div>
                            <div class="span-col-1">
                                <br>
                                <?php if ($v->restaurante_status != '6' ) { ?>
                                    <button onclick="aprovar(<?=$v->id?>)" class="px-2 py-2 bg-blue-500 mt-1 text-white h-12">APROVAR INSCRIÇÃO</button><br>
                                <?php }?>
                                <button onclick="openAddRestauranteModal<?=$v->id?>()" class="px-2 py-2 bg-green mt-1 text-white h-12">DETALHES DO RESTAURANTE</button>
                            </div>
                        </div>



                          <!-- MODAL ADD PRODUTO -->
                             <div id="modalRestaurante-<?=$v->id?>" style="overflow-y: scroll;" class="hidden   bg-black bg-opacity-75 fixed inset-0 justify-center items-center z-50">
                                <div class="bg-white xl:mt-60 mt-80 w-11/12 lg:w-4/6 xl:w-1/2 p-3 ">
                                    <div class="flex justify-between items-center    py-3 p-3 ">
                                        <h1 class="text-green uppercase text-base sm:text-lg font-semibold" ><?=$v->restaurante_nome?></h1>
                                        <span onclick="closeAddRestauranteModal<?=$v->id?>()" style="font-size:30px;cursor:pointer;margin-right:15px" class="font-semibold text-black ">x</span>
                                    </div>


                                <h1 class="text-green font-semibold">ESTATÍSTICAS DO RESTAURANTE</h1>
                                    <div class="w-full grid xl:grid-cols-2 grid-cols-2">
                                        <div class="m-3 span-col-1">
                                            <p class=""> CONCLUIDOS </p>
                                            <p class="font-semibold">  <?=$this->restaurante_model->getPedidosConcluidos($v->id);?></p>
                                            <p class=""> EM ANDAMENTO</p>
                                            <p  class="font-semibold">  <?=$this->restaurante_model->getPedidosAndamento($v->id);?></p>

                                        </div>
                                        <div class="m-3 span-col-1">
                                            <p class=""> CANCELADOS </p>
                                            <p  class="font-semibold">  <?=$this->restaurante_model->getPedidosCancelados($v->id);?></p>
                                            <p class="">VENDAS </p>
                                            <p  class="font-semibold">R$ <?=$this->restaurante_model->getPedidosGanhos($v->id);?></p>
                                        </div>
                                    </div>

                                    <h1 class="text-green font-semibold">DADOS DO REPRESENTANTE</h1>
                                    <div class="w-full grid xl:grid-cols-2 grid-cols-2">
                                        <div class="m-3 span-col-1">
                                            <p class=""> REPRESENTANTE LEGAL </p>
                                            <p class="font-semibold">  <?=$v->restaurante_representante_nome?>  <?=$v->restaurante_representante_sobrenome?></p>
                                            <p class=""> CPF DO REPRESENTANTE</p>
                                            <p  class="font-semibold">   <?=$v->restaurante_representante_cpf?></p>

                                        </div>
                                        <div class="m-3 span-col-1">
                                            <p class=""> TELEFONE </p>
                                            <p  class="font-semibold">  <?=$v->restaurante_telefone?></p>
                                          
                                        </div>
                                    </div>

                                    <h1 class="text-green font-semibold">DADOS DO RESTAURANTE</h1>
                                    <div class="w-full grid xl:grid-cols-2 grid-cols-2">
                                        <div class="m-3 span-col-1">
                                            <p class=""> RAZÃO SOCIAL </p>
                                            <p class="font-semibold">  <?=$v->restaurante_razao_social?> </p>
                                            <p class=""> CNPJ </p>
                                            <p  class="font-semibold">   <?=$v->restaurante_cnpj?></p>

                                        </div>
                                        <div class="m-3 span-col-1">
                                            <p class=""> ENDEREÇO </p>
                                            <p  class="font-semibold">  <?=$v->restaurante_endereco?></p>
                                          
                                        </div>
                                    </div>

                                    <h1 class="text-green font-semibold">DOCUMENTOS DO RESTAURANTE</h1>
                                    <div class="w-full grid xl:grid-cols-2 grid-cols-2">
                                        <div class="m-3 span-col-1">
                                            
                                            <a class=" " target="_blank" href="<?=base_url()?>assets/images/documentos/<?=$v->	restaurante_contrato_social?>">
                                                <p class="bg-green h-10 text-white p-2 pl-12"> CONTRATO SOCIAL </p>
                                            </a>

                                            <a class=" " target="_blank" href="<?=base_url()?>assets/images/documentos/<?=$v->	restaurante_alvara_bombeiro?>">
                                                <p class="bg-green mt-2 h-10 text-white p-2 pl-12"> ALVARÁ BOMBEIRO </p>
                                            </a>

                                            <a class=" " target="_blank" href="<?=base_url()?>assets/images/documentos/<?=$v->	restaurante_alvara_bombeiro?>">
                                                <p class="bg-green mt-2 h-10 text-white p-2 pl-12"> ALVARÁ SANITÁRIO </p>
                                            </a>

                                       
                                   

                                        </div>
                                        <!-- <div class="m-3 span-col-1">
                                            <p class=""> ALVARÁ SANITÁRIO </p>
                                            <p  class="font-semibold">  <?=$v->	restaurante_alvara_bombeiro?></p>
                                          
                                        </div> -->
                                    </div>

                                
                                        <div class="flex justify-end space-x-4 px-6 py-3">
                                            <button  onclick="closeAddRestauranteModal<?=$v->id?>()"  class="px-4 bg-transparent p-3 rounded-lg text-red-500 hover:bg-gray-100 hover:text-red-400 mr-2">Fechar</button>
                                            
                                        </div>

                                 

                                </div>
                            </div>
                        <!-- MODAL ADD PRODUTO -->

                        <script>
                            function closeAddRestauranteModal<?=$v->id?> () {
                                $('#modalRestaurante-<?=$v->id?>').addClass('hidden')
                                $('#modalRestaurante-<?=$v->id?>').removeClass('flex')
                            }

                            function openAddRestauranteModal<?=$v->id?> () {
                                $('#modalRestaurante-<?=$v->id?>').addClass('flex')
                                $('#modalRestaurante-<?=$v->id?>').removeClass('hidden')
                            }
                        </script>


                    <?php }?>
               <?php } else { ?>

                    <div class="   mt-5" >
                        <div class="bg-green h-32 rounded-md flex justify-center items-center">
                            <p class="text-center text-white ">Nenhum usuário encontrado.</p>
                        </div>
                    </div>

                <?php }?>
                    
    
                

                
                  

                   

            </div>  

           

        </main>
    </section>


       

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>

<script>
   function getCidades(e) {
       

        $.ajax({
        type: "POST",
        url: '../restaurante/getcidades',
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
    function aprovar(id) {
    $.ajax({
        type: "POST",
        data: {aprovar_restaurante:'.', restaurante_id:id}, // serializes the form's elements.
        success: function(data)
        {
           location.reload()
        }
      
   })

}
</script>



</body>
</html>