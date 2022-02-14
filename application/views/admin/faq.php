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
                            <h1  class="font-semibold text-left text-xl md:text-2xl   text-gray-700 ">Categorias</h1>
                            <p class="pb-8 text-left">Suas categorias.</p>
                        </div>
                      
                    </div>   
                    
                    
                    <div class="flex W-full ">
                        
                      
                     
                          <button onclick="openModalCategoria()" class="h-12 px-4 text-white h-12 bg-green">ADICIONAR CATEGORIA</button>
                   
                    </div>

                    
                    <?php if (count($faq) > 0 ) { ?>
                        <?php foreach ($faq as $v ) { ?>
                            
                            <div class="flex h-12 justify-between   w-2/3 border border-gray-500 mt-2">
                               
                                <div class="  ">
                                    <p class="mt-2 ml-3 font-semibold uppercase"><?=$v->categoria_nome?></p>
                                
                                   
                                </div>
                                <div>
                                    <button onclick="openModalArtigo(<?=$v->id?>)" class="bg-white px-2 py-2  ">
                                            <p class="text-xs text-green border border-green-500 py-1 px-2"> +  ADICIONAR ARTIGOS</p>
                                        </button>
                                   </div>
                                <div class=" ">
                                 
                                    <div onclick="deleteCategoria(<?=$v->id?>)" class="bg-red-500 w-full flex justify-center items-center cursor-pointer xl:w-8 h-full">
                                        <p class="font-semibold text-lg">X</p>
                                    </div>
                                </div>
                            </div>
                            <?php foreach ($this->admin_model->getArtigo($v->id) as $a ) { ?>
                                    <div class="mt-2 flex justify-between ml-12 w-2/3 h-12 bg-green ">
                                        <div>
                                            <p class="ml-2 mt-2 text-white font-semibold mt-1"><?=$a->artigo_titulo?></p>
                                        </div>
                                        <div>
                                        <div onclick="deleteArtigo(<?=$a->id?>)" class="bg-red-500 w-full flex justify-center items-center cursor-pointer xl:w-8 h-full">
                                        <p class="font-semibold text-lg">X</p>
                                    </div>
                                        </div>
                                    </div>
                            <?php }?>



                    
                    <?php }?>

                    
               <?php } else { ?>

                    <div class="   mt-5" >
                        <div class="bg-green h-32 rounded-md flex justify-center items-center">
                            <p class="text-center text-white ">Nenhum artigo encontrado.</p>
                        </div>
                    </div>

                <?php }?>
                    
    
                

                
                  

                   

            </div>  

           

        </main>
    </section>

                 <!-- MODAL ADD PRODUTO -->
                    <div id="modalCategoria" style="overflow-y: scroll;" class="hidden  bg-black bg-opacity-75 fixed inset-0 justify-center items-center z-50">
                                <div class="bg-white mt-12 xl:mt-5 w-11/12 lg:w-4/6 xl:w-1/3 ">
                                    <div class="flex justify-between items-center    py-3 p-3 ">
                                        <h1 class="text-black text-base sm:text-lg font-semibold">NOVA CATEGORIA</h1>
                                        <span onclick="closeModalCategoria()" style="font-size:30px;cursor:pointer;margin-right:15px" class="font-semibold text-black ">x</span>
                                    </div>


                                    <div class="p-5">

                                        <form action="" id="form-categoria" enctype="multipart/form-data" method="POST">
                                            <input type="hidden" name="add_categoria" value="1">
                                            <label for="">NOME DA CATEGORIA </label><br>
                                            <input class="h-12 p-2  border border-gray-300 w-full" maxlength="100" type="text" id="categoria_nome" name="categoria_nome" required>
                           
                                          
                                        </form>
                                      
                                    </div>

                                    <div class="flex justify-end space-x-4 px-6 py-3">
                                        <button  onclick="closeModalCategoria()"  class="px-4 bg-transparent p-3 rounded-lg text-red-500 hover:bg-gray-100 hover:text-red-400 mr-2">Fechar</button>
                                        <button onclick="addCategoria()" class="px-4 bg-green p-3 text-sm text-white hover:bg-green ">ADICIONAR</button>

                                        
                                    </div>

                                 

                                </div>
                            </div>
                        <!-- MODAL ADD PRODUTO -->


                             <!-- MODAL ADD PRODUTO -->
                    <div id="modalArtigo" style="overflow-y: scroll;" class="hidden  bg-black bg-opacity-75 fixed inset-0 justify-center items-center z-50">
                                <div class="bg-white mt-12 xl:mt-5 w-11/12 lg:w-4/6 xl:w-2/3 ">
                                    <div class="flex justify-between items-center    py-3 p-3 ">
                                        <h1 class="text-black text-base sm:text-lg font-semibold">NOVA CATEGORIA</h1>
                                        <span onclick="closeModalArtigo()" style="font-size:30px;cursor:pointer;margin-right:15px" class="font-semibold text-black ">x</span>
                                    </div>


                                    <div class="p-5">

                                        <form action="" id="form-artigo" enctype="multipart/form-data" method="POST">
                                            <input type="hidden" name="add_artigo" value="1">
                                            ]<input type="hidden" name="artigo_categoria" id="artigo_categoria">
                                            <label for="">TÍTULO DO ARTIGO </label><br>
                                            <input class="h-12 p-2  border border-gray-300 w-full" maxlength="100" type="text" id="artigo_titulo" name="artigo_titulo" required>
                                            <label for="">CONTEÚDO DO ARTIGO </label><br>
                                           <textarea name="artigo_conteudo" id="artigo_conteudo" class="border border-gray-300 w-full h-72 p-2"></textarea>
                                           </form>
                                    </div>

                                    <div class="flex justify-end space-x-4 px-6 py-3">
                                        <button  onclick="closeModalArtigo()"  class="px-4 bg-transparent p-3 rounded-lg text-red-500 hover:bg-gray-100 hover:text-red-400 mr-2">Fechar</button>
                                        <button onclick="addArtigo()" class="px-4 bg-green p-3 text-sm text-white hover:bg-green ">ADICIONAR</button>

                                      
                                    </div>

                                 

                                </div>
                            </div>
                        <!-- MODAL ADD PRODUTO -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js" type="text/javascript"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>

<script>
  $(function() {
    $('#cupom_minimo').maskMoney();
    
  })
</script>
<script>
    function openModalArtigo(id) {
        $('#artigo_categoria').val(id)
        $('#modalArtigo').addClass('flex')
        $('#modalArtigo').removeClass('hidden')
    }

    function closeModalArtigo() {
        $('#modalArtigo').addClass('hidden')
        $('#modalArtigo').removeClass('flex')
    }


    function openModalCategoria() {
        $('#modalCategoria').addClass('flex')
        $('#modalCategoria').removeClass('hidden')
    }

    function closeModalCategoria() {
        $('#modalCategoria').addClass('hidden')
        $('#modalCategoria').removeClass('flex')
    }


   function addArtigo() {
    const artigo_titulo = $('#artigo_titulo').val()
    const artigo_conteudo = $('#artigo_conteudo').val()
    const artigo_categoria = $('#artigo_categoria').val()


        $.ajax({

            type: 'POST',
            data: {add_artigo:'.', artigo_titulo:artigo_titulo, artigo_conteudo:artigo_conteudo, artigo_categoria:artigo_categoria},
            success: function(response){
                location.reload()
            },
        });
       
   }

   function deleteArtigo(id) {
   
    $.ajax({

        type: 'POST',
        data: {delete_artigo:'.', artigo_id:id},
        success: function(response){
            location.reload()
        },
    });

    }

    function addCategoria() {
     
        const categoria_nome = $('#categoria_nome').val()

        $.ajax({
            type: 'POST',
            data: {add_categoria:'.',categoria_nome:categoria_nome},
            success: function(response){
                location.reload()
            },
        });

    }

    function deleteCategoria(id) {

        

        $.ajax({
            type: 'POST',
            data: {delete_categoria:'.', categoria_id:id},
            success: function(response){
                location.reload()
            },
        });

    }


//    $('#form').submit(function(e) {
//        e.preventDefault()


//        const form = $(this).serialize()

//        $.ajax({

//             type: 'POST',
//             data: form,
//             success: function(response){
//                 location.reload()
//             },
//         });

      
//    })
   

</script>
</body>
</html>