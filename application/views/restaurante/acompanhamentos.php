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
        background-image: url("<?=base_url()?>/assets/images/bg-login.jpg");
        background-size: cover;
        background-repeat: no-repeat;
        background-position: 80% 100%;
    }
    #check {
        accent-color: #6A9F46;
    }
</style>

<body>
    <section>
        <!-- Início Header -->
        <header class="w-full fixed z-50 bg-white">
            <nav class="grid grid-cols-8 md:grid-cols-1 border-b border-gray-200 border-opacity-50 shadow h-16 px-5 md:px-12 lg: relative">
                <div class="col-span-1 flex justify-items-center items-center">

             
                    <a onmouseover="hoverAtivado()" onmouseout="hoverDesativado()" class="flex space-x-3 items-center" href="<?=base_url()?>restaurante/cardapio">
              
                        <img id="img-voltar" src="<?=base_url()?>/assets/images/voltar.svg" alt="">
                        <p class="hidden md:flex text-left text-base font-semibold text-gray-700">VOLTAR</p>
                    </a>        
                </div>
                
                <div class="col-span-6 md:hidden flex justify-center items-center">
                    <div>
                        <img class="h-14 py-1" src="<?=base_url()?>assets/images/logo.png" alt="">
                    </div>
                </div>  

                <div class="col-span-1 md:hidden"></div>
            </nav>
        </header>
        <!-- Fim Header -->

        <main class="pt-16">
            <div class="grid grid-cols-1  xl:grid-cols-5 px-5 md:px-0">
                <div class="col-span-1"></div>

               
                <div class="col-span-1 mt-5  w-full xl:col-span-3 bg-gray-100 grid justify-items-center">
           
                    <h1 class="mt-4 mb-3 text-center text-green font-semibold">ACOMPANHAMENTOS DO PRODUTO</h1>
                    <div class="flex">
                            <div>
                                <img class="w-32 h-32 " style="object-fit: cover;" src="<?=base_url()?>assets/images/produtos/<?=$produto['produto_imagem']?>" alt="">
                            </div>
                            <div class="pl-5 pr-5 text-left">
                                <h1 class="font-semibold"><?=$produto['produto_nome']?></h1>
                                <p><?=$produto['produto_descricao']?></p>
                                <p><?=$produto['produto_valor']?></p>
                            </div>
                    </div>


                    <br>
                    <br>

                    <div class="grid xl:grid-cols-2 grid-cols-1">
                        <div class="span-col-1">

                            <h1 class="text-green font-semibold">LISTA DE ACOMPANHAMENTOS</h1>

                        </div>
                        <div class="span-col-1 flex justify-center">

                        <button onclick="openAddAcompanhamento()" class="border border-green px-2 py-2">
                            <p class="text-green font-semibold" >+ ADICIONAR  </p>
                        </button>

                        </div>
                    </div>


                    <div class="w-full p-5" >

                    <?php if ( count($this->cardapio_model->getAcompanhamentos($produto['id'])) > 0 ) { ?>

                        <?php foreach ($this->cardapio_model->getAcompanhamentos($produto['id']) as $a ) { ?>

                            <div class="flex   justify-between w-full  h-12 mt-2 items-center border border-black ">
                                <h1 class="text-green font-semibold xl:ml-5 ml-2"><?=$a->acompanhamento_nome?></h1>
                                <div class="xl:mr-5 mr-2">
                                    <button onclick="openAddElemento(<?=$a->id?>)" class="text-blue-400 border border-blue-400 px-1 py-1">+ADICIONAR</button>
                                    <button id="<?=$a->id?>" onclick="deleteAcompanhamento(this.id)" class="text-red-400 border border-red-400 px-1 py-1">REMOVER</button>
                                </div>
                            </div>

                            <?php foreach ($this->cardapio_model->getElementos($a->id) as $e ) { ?>
                                <div class="pl-12 pr-12">
                                    <div class="flex   justify-between w-full  h-12 mt-2 items-center border border-black ">
                                        <h1 class="text-green font-semibold xl:ml-5 ml-2"><?=$e->elemento_nome?></h1>
                                        <div class="xl:mr-5 mr-5">
                                            <button id="<?=$e->id?>" onclick="deleteElemento(this.id)" class="text-red-400 border border-red-400 px-1 py-1">REMOVER</button>
                                        </div>
                                    </div>
                                </div>

                            <?php } ?>

                        <?php } ?>



                    <?php } else {  ?>

                        <div class="w-full bg-green flex justify-center items-center">
                           <div>
                            <p class="pt-12 text-white h-32 text-sm">Nenhum acompanhamento encontrado.</p>
                           </div>
                        </div>

                    <?php } ?>
                       

                    


                    </div>

                


                </div>
                
                <div class=" col-span-1"></div>


            </div>
            <br>
            <br>
        </main>
    </section>


<!-- MODAL ADD -->



    <div id="overlayModalAcompanhamento" style="overflow-y: scroll;" class="hidden  bg-black bg-opacity-75 fixed inset-0 justify-center items-center z-50">
                                <div class="bg-white mt-24 xl:mt-5 w-11/12 lg:w-4/6 xl:w-1/2 ">
                                    <div class="flex justify-between items-center    py-3 p-3 ">
                                        <h1 class="text-black text-base sm:text-lg font-semibold">NOVO ACOMPANHAMENTO</h1>
                                        <span onclick="closeModalAddAcompanhamento()" style="font-size:30px;cursor:pointer;margin-right:15px" class="font-semibold text-black ">x</span>
                                    </div>

                               

                                    <div class="p-5">
                                        <label class="w-full" for="">Título do Acompanhamento</label><br>
                                        <input maxlength="200" class="border w-full border-gray-400 h-10 p-2" id="acompanhamento_nome"  type="text">

                                        <input maxlength="200" value="<?=$produto['id']?>" class="border w-full border-gray-400 h-10 p-2" id="acompanhamento_produto"  type="hidden">

                                        <input maxlength="200"  value="<?=$produto['produto_restaurante']?>" class="border w-full border-gray-400 h-10 p-2" id="acompanhamento_restaurante"  type="hidden">
                                    </div>
                                  

                                  
                               
                                
                                        <div class="flex justify-end space-x-4 px-6 py-3">
                                            <button  onclick="closeModalAddAcompanhamento()"  class="px-4 bg-transparent p-3 rounded-lg text-red-500 hover:bg-gray-100 hover:text-red-400 mr-2">Fechar</button>
                                            <button onclick="AddAcompanhamento()" class="px-4 bg-green p-3 text-sm text-white hover:bg-green ">ADICIONAR</button>
                                        </div>

                                       
                                </div>
                            </div>

                            <!-- MODAL add -->


                            <!-- MODAL ADD -->



    <div id="overlayModalElemento" style="overflow-y: scroll;" class="hidden  bg-black bg-opacity-75 fixed inset-0 justify-center items-center z-50">
                                <div class="bg-white mt-24 xl:mt-5 w-11/12 lg:w-4/6 xl:w-1/2 ">
                                    <div class="flex justify-between items-center    py-3 p-3 ">
                                        <h1 class="text-black text-base sm:text-lg font-semibold">NOVO ELEMENTO</h1>
                                        <span onclick="closeModalAddElemento()" style="font-size:30px;cursor:pointer;margin-right:15px" class="font-semibold text-black ">x</span>
                                    </div>

                               

                                    <div class="p-5">
                                        <label class="w-full" for="">Título do Elemento</label><br>
                                        <input maxlength="200" class="border w-full border-gray-400 h-10 p-2" id="elemento_nome"  type="text">

                                        <input maxlength="200" value="<?=$produto['id']?>" class="border w-full border-gray-400 h-10 p-2" id="elemento_produto"  type="hidden">
                                        <input maxlength="200"  class="border w-full border-gray-400 h-10 p-2" id="elemento_acompanhamento"  type="hidden">
                                        <input maxlength="200"  value="<?=$produto['produto_restaurante']?>" class="border w-full border-gray-400 h-10 p-2" id="elemento_restaurante"  type="hidden">
                                    </div>
                                  

                                  
                               
                                
                                        <div class="flex justify-end space-x-4 px-6 py-3">
                                            <button  onclick="closeModalAddElemento()"  class="px-4 bg-transparent p-3 rounded-lg text-red-500 hover:bg-gray-100 hover:text-red-400 mr-2">Fechar</button>
                                            <button onclick="AddElemento()" class="px-4 bg-green p-3 text-sm text-white hover:bg-green ">ADICIONAR</button>
                                        </div>

                                       
                                </div>
                            </div>

                            <!-- MODAL add -->


                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>/assets/js/mascaraCelular.js"></script>
</body>

</html>

<!-- Hover Voltar -->
<script>
    function hoverAtivado() {
        document.getElementById("img-voltar").src = '<?=base_url()?>/assets/images/voltar-green.svg';
    }

    function hoverDesativado() {
        document.getElementById("img-voltar").src = '<?=base_url()?>/assets/images/voltar.svg';
    }
</script>


<script>



    function closeModalAddAcompanhamento() {
        $('#overlayModalAcompanhamento').removeClass('flex')
        $('#overlayModalAcompanhamento').addClass('hidden')
    }



    function closeModalAddElemento() {
        $('#overlayModalElemento').removeClass('flex')
        $('#overlayModalElemento').addClass('hidden')
    }


    function openAddAcompanhamento() {
        $('#overlayModalAcompanhamento').addClass('flex')
        $('#overlayModalAcompanhamento').removeClass('hidden')
    }

    function openAddElemento(v) {
        $('#overlayModalElemento').addClass('flex')
        $('#overlayModalElemento').removeClass('hidden')

        $('#elemento_acompanhamento').val(v)
    }

    function deleteAcompanhamento(id) {

            $.ajax({
                type: "POST",
                data: {delete_acompanhamento: '.',acompanhamento_id:id},
                success: function(data)
                {
             
                    location.reload()
                }
            });
   
    }

    function deleteElemento(id) {

        $.ajax({
            type: "POST",
            data: {delete_elemento: '.',elemento_id:id},
            success: function(data)
            {
        
                location.reload()
            }
        });

        }

    function AddAcompanhamento() {
        
        if ( $('#acompanhamento_nome').val() == 0 ) {
            alert('Preencha o título do acompanhamento.')

        } else {

            
            const acompanhamento_nome = $('#acompanhamento_nome').val()
            const acompanhamento_produto = $('#acompanhamento_produto').val()
            const acompanhamento_restaurante = $('#acompanhamento_restaurante').val()



            $.ajax({
                type: "POST",
                data: {add_acompanhamento: '.',acompanhamento_nome:acompanhamento_nome, acompanhamento_produto:acompanhamento_produto,acompanhamento_restaurante:acompanhamento_restaurante},
                success: function(data)
                {
             
                    location.reload()
                }
            });

        }
    }


    function AddElemento() {
        
        if ( $('#elemento_nome').val() == 0 ) {
            alert('Preencha o título do elemento.')

        } else {

            
            const elemento_nome = $('#elemento_nome').val()
            const elemento_produto = $('#elemento_produto').val()
            const elemento_restaurante = $('#elemento_restaurante').val()
            const elemento_acompanhamento = $('#elemento_acompanhamento').val() 


            $.ajax({
                type: "POST",
                data: {add_elemento: '.',elemento_nome:elemento_nome, elemento_produto:elemento_produto,elemento_restaurante:elemento_restaurante,elemento_acompanhamento:elemento_acompanhamento},
                success: function(data)
                {
             
                    location.reload()
                }
            });

        }
    }
</script>