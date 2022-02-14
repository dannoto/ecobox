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
                    
                    
                    <div class="flex W-2/3 ">
                        
                      
                     
                          <button onclick="openModal()" class="h-12 px-4 text-white h-12 bg-green">CRIAR CATEGORIA</button>
                   
                    </div>

                    
                    <?php if (count($categorias) > 0 ) { ?>
                        <?php foreach ($categorias as $v ) { ?>
                            
                            <div class="grid xl:grid-cols-5  grid-cols-1 w-full border border-gray-100 mt-2">
                                <div class="span-col-1">
                                 <img class="xl:w-32 h-32 w-full" style="object-fit: cover;" src="<?=base_url()?>assets/images/categorias/<?=$v->cat_imagem?>" alt="">
                                </div>
                                <div class="span-col-3 ">
                                    <p class="mt-2 font-semibold uppercase"><?=$v->cat_nome?></p>
                                </div>
                                <div class="span-col-1 ">
                                    <div onclick="deleteCategoria(<?=$v->id?>)" class="bg-red-500 w-full flex justify-center items-center cursor-pointer xl:w-8 h-full">
                                        <p class="font-semibold text-lg">X</p>
                                    </div>
                                </div>
                            </div>

                        <!-- <div class="border-gray-400 grid xl:grid-cols-4 border mt-2 ">
                            <div class="span-col-1">
                                <img class="w-32 h-32" style="object-fit: cover;" src="<?=base_url()?>assets/images/categorias/<?=$v->cat_imagem?>" alt="">
                            </div>
                            <div class="span-col-2">
                                <h1 class="p-3  uppercase font-semibold"><?=$v->cat_nome?></h1> 
                            </div>
                            <div class="span-col-1 flex justify-center items-center bg-red-500">
                               <p class="text-xl font-semibold">X</p>
                            </div>
                        </div>  -->
                    <?php }?>

                    
               <?php } else { ?>

                    <div class="   mt-5" >
                        <div class="bg-green h-32 rounded-md flex justify-center items-center">
                            <p class="text-center text-white ">Nenhuma categoria encontrada.</p>
                        </div>
                    </div>

                <?php }?>
                    
    
                

                
                  

                   

            </div>  

           

        </main>
    </section>

                 <!-- MODAL ADD PRODUTO -->
                    <div id="modal" style="overflow-y: scroll;" class="hidden  bg-black bg-opacity-75 fixed inset-0 justify-center items-center z-50">
                                <div class="bg-white mt-12 xl:mt-5 w-11/12 lg:w-4/6 xl:w-1/3 ">
                                    <div class="flex justify-between items-center    py-3 p-3 ">
                                        <h1 class="text-black text-base sm:text-lg font-semibold">NOVA CATEGORIA</h1>
                                        <span onclick="closeModal()" style="font-size:30px;cursor:pointer;margin-right:15px" class="font-semibold text-black ">x</span>
                                    </div>


                                    <div class="p-5">

                                     
                                            <input type="hidden" name="add_categoria" value="1">
                                            <label for="">Nome da Categoria</label><br>
                                            <input class="h-12 p-2  border border-gray-300 w-full" maxlength="100" type="text" id="categoria_nome" name="categoria_nome" required>
                                                <br><br>
                                            <label  for="">Imagem da Categoria</label><br>
                                            <input onchange="upload(this.value)"  class="h-12  w-full" type="file" accept="image/*" id="categoria_imagem" name="categoria_imagem" required >
                                           
                                            <input type="hidden" value="" id="imagem_nome">
                                         
                                            <br>
                                          
                                      
                                    </div>

                                    <div class="flex justify-end space-x-4 px-6 py-3">
                                        <button  onclick="closeModal()"  class="px-4 bg-transparent p-3 rounded-lg text-red-500 hover:bg-gray-100 hover:text-red-400 mr-2">Fechar</button>
                                        <button onclick="addCategoria()"  class="px-4 bg-green p-3 text-sm text-white hover:bg-green ">ADICIONAR</button>

                                       
                                    </div>

                                 

                                </div>
                            </div>
                        <!-- MODAL ADD PRODUTO -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>

<script>
        $('#reset').trigger("click");
        
</script>
<script>


function upload (v) {
            var fd = new FormData();
            var files = $('#categoria_imagem')[0].files;


          
            // Check file selected or not
            if(files.length > 0 ){
            fd.append('categoria_imagem',files[0]);
            fd.append('add_imagem','.');
            $.ajax({
                url: '<?=base_url()?>/admin/categorias',
                type: 'post',
                data: fd,
                contentType: false,
                processData: false,
                success: function(response){

                    // $('#categoria_imagem').val(files[0].name);
                    // alert(files[0].name)
                    $('#imagem_nome').val(files[0].name);
                 
                   
                },
            });
            }else{
                alert("Please select a file.");
            }

}
function addCategoria() {



        const categoria_nome = $('#categoria_nome').val()
        const categoria_imagem =$('#imagem_nome').val()
        



        // const categoria_imagem = categoria_imagem.replace('C:\fakepath\', "")

        if (categoria_nome.length == 0) {
            alert('Preencha o nome do produto.')
        }  else if (categoria_imagem.length == 0) {
            alert('Preencha a imagem do produto.')
        } else {

                   
                    $.ajax({
                        type: "POST",
                        url: '',
                        data: {
                            add_categoria:'.',
                            categoria_nome:categoria_nome,
                            categoria_imagem:categoria_imagem,
                        },
                        success: function(data)
                        {
                            location.reload()
                            // console.log(data)
                        }
                    });
        }


        }

    function openModal() {
        $('#modal').addClass('flex')
        $('#modal').removeClass('hidden')
    }

    function closeModal() {
        $('#modal').addClass('hidden')
        $('#modal').removeClass('flex')
    }


   function deleteCategoria(id) {
 
    $('#reset').trigger("click");
    
    $.ajax({

        type: 'POST',
        data: {delete_categoria:'1', categoria_id:id},
        success: function(response){
             location.reload()
          
        },
    });
       
   }


</script>
</body>
</html>