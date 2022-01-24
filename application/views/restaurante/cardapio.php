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
    .modal {
      transition: opacity 0.25s ease;
    }
    body.modal-active {
      overflow-x: hidden;
      overflow-y: visible !important;
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
                            <h1  class="font-semibold text-left text-xl md:text-2xl   text-gray-700 ">Crie seu Cardápio</h1>
                            <p class="pb-8 text-left">Insira as informações do seu restaurante</p>
                        </div>
                        <div class="xl:col-span-1 grid-cols-2 flex justify-end">
                            <button style="border:1px solid green" class="modal-open  py-1 px-3 h-12  bg-white text-green">
                             <span style="font-size: 20px;">+</span> Nova Categoria
                            </button>
                        </div>
                    </div>    
                    
                     <!-- Categoria do Cardápio -->

                     <?php if (count($this->cardapio_model->getCardapios($this->session->userdata('session_restaurante')['id'])) == 0) { ?>
                        <div class="flex border border-gray-200 justify-center xl:pl-12 xl:pr-12 mb-2 bg-white">
                                    <div class="xl:col-span-2 col-span-1 p-2">
                                        <h1 class="text-lg  uppercase items-center xl:mb-0 mb-3">Nenhuma Categoria encontrada.</h1>
                                    </div>
                        </div>
                    <?php } ?>

                    <?php foreach($this->cardapio_model->getCardapios($this->session->userdata('session_restaurante')['id']) as $c) {  ?>
                          
                       
                        <div class="flex justify-center xl:pl-12 xl:pr-12 mb-2 bg-white">
                                <div class="border  w-full border-gray-400 h-17 grid xl:grid-cols-4 grid-cols-1 py-3 px-3 ">
                                    <div class="xl:col-span-2 col-span-1 p-2">
                                        <h1 class="text-lg uppercase font-semibold items-center xl:mb-0 mb-3"><?=$c->cardapio_nome?></h1>
                                    </div>
                                    <div class="xl:col-span-2 col-span-1">
                                        <button id="<?=$c->id?>" onclick="deleteCategoria(this.id)" class="border-red-500 border p-2 px-3 ml-2">
                                            <span class="text-red-500 text-base">X</span>
                                            <span class="text-red-500 text-base">REMOVER</span>
                                        </button>
                                        <!-- <button class="border-blue-500 border p-2 px-3 ml-2">
                                            <span class="text-blue-500 text-base">+</span>
                                            <span class="text-blue-500 text-base">PROMOÇÃO</span>
                                        </button> -->
                                        <button id="<?=$c->id?>" onclick="addProdutoModal(this.id)" class="modal-open-add-produto border-green border p-2 px-3 ml-2">
                                            <span class="text-green text-base">+</span>
                                            <span class="text-green text-base">NOVO PRODUTO</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                     
                           
                      

                        <?php foreach($this->produtos_model->getProdutosByCategoria($c->id) as $p) { ?>
                            <div class="flex justify-center bg-white xl:p-0 p-5 mb-1">
                                    <div class="border-gray-400 border xl:w-2/3  grid xl:grid-cols-4 grid-cols-1 bg-white ">
                                            <div class="xl:col-span-1 col-span-1 p-5">
                                                <img class="h-32 w-32 cover" src="<?=base_url()?>assets/images/produtos/<?=$p->produto_imagem?>" >
                                            </div>
                                            <div class="xl:col-span-2 col-span-1 p-5">
                                                <h1 class="text-lg font-semibold"><?=$p->produto_nome?></h1>
                                                <p><?=$p->produto_descricao?></p>
                                                <p class="font-semibold pt-2">R$ <?=$p->produto_valor?></p>
                                            </div>
                                            <div class="xl:col-span-1  col-span-1 p-5  space-y-1">
                                                <button class=" w-36 border-red-500 border p-1  px-1 ml-2">
                                                    <span class="text-red-500 text-lg">+</span>
                                                    <span class="text-red-500 text-base">EDITAR</span>
                                                </button>
                                                <button onclick="deleteProduto(this.value)" value="<?=$p->id?>" class=" w-36 border-blue-500 border p-1  px-1 ml-2">
                                                    <span class="text-blue-500 text-base">X</span>
                                                    <span class="text-blue-500 text-base">REMOVER</span>
                                                </button>
                                                <button class="w-36 border-green border p-1  px-1 ml-2">
                                                    <span class="text-green text-lg">+</span>
                                                    <span class="text-green text-base">PROMOÇÃO</span>
                                                </button>
                                            </div>

                                    </div>
                            </div>
                        <?php } ?>

                  
                    <?php } ?>

                    

                 
                  

                   

                  
                    
                                

            </div>  


                <!-- MODAIS -->



                            <!--MODAL ADD CATEGORIAS-->
                            <div class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
                                <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>
                                
                                <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
                                
                                <div class="modal-close absolute top-0 right-0 cursor-pointer flex flex-col items-center mt-4 mr-4 text-white text-sm z-50">
                                    <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                                    <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                                    </svg>
                                    <span class="text-sm">(Esc)</span>
                                </div>

                                <div class="modal-content py-4 text-left px-6">

                                    <div class="flex justify-between items-center pb-3">
                                    <p class="text-2xl font-bold">Nova Categoria</p>
                                    <div class="modal-close cursor-pointer z-50">
                                        <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                                        <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                                        </svg>
                                    </div>
                                    </div>


                                
                                    <!-- <form action=""> -->
                                        <label for="cardapio_nome">Nome da Categoria</label><br>
                                        <input id="cardapio_nome" maxlength="200" class="h-12 border-gray-400 border p-2 w-full" placeholder="Digite o nome da Categoria" type="text">
                                        <div class="flex justify-end pt-2 mt-5">
                                        <button class="modal-close px-4 bg-transparent p-3 rounded-lg text-red-500 hover:bg-gray-100 hover:text-red-400 mr-2">Fechar</button>
                                        <button onclick="addCategoria()" class=" px-4 bg-green p-3 rounded-lg text-white hover:bg-green ">ADICIONAR</button>
                                        </div>
                                    <!-- </form> -->


                            
                                    
                                </div>
                                </div>
                            </div>
                            <!-- MODAL ADD CATEGORIAS -->


 
                           <!-- MODAL ADD PRODUTO -->
                           <div id="overlayModalProduto" class="hidden bg-black bg-opacity-75 fixed inset-0 justify-center items-center z-50">
                                <div class="bg-white w-11/12 lg:w-4/6 xl:w-1/2 ">
                                    <div class="flex justify-between items-center    py-3 p-3 ">
                                        <h1 class="text-black text-base sm:text-lg font-semibold">NOVO PRODUTO</h1>
                                        <span onclick="closeAddProdutoModal()" style="font-size:30px;cursor:pointer;margin-right:15px" class="font-semibold text-black ">x</span>
                                    </div>

                                    <form action="" id="form-add-produto">
                                        <div class="px-6 py-4 border-solid border border-light-blue-500">
                                            <div  class="grid xl:grid-cols-2 grid-cols-1 ">
                                                <div class="col-span-1 p-3">
                                                    <label for="produto_nome">Nome do Produto</label><br>
                                                    <input class="w-full border border-gray-400 h-12 p-2" type="text" required name="produto_nome" id="produto_nome" maxlength="200"> 
                                                        <br><br>
                                                    <label for="produto_descricao">Descrição do Produto</label><br>
                                                    <textarea class=" w-full border border-gray-400 h-32 p-2"  required name="produto_descricao" id="produto_descricao" maxlength="200" ></textarea> <br>
                                                    <br>
                                                    <label for="produto_valor">Valor do Produto (R$)</label><br>
                                                    <input class="w-2/3 border border-gray-400 h-12 p-2" type="text" required name="produto_valor" id="produto_valor" maxlength="200">

                                                    <input class="w-2/3 border border-gray-400 h-12 p-2 hidden" required type="text" name="produto_categoria" id="produto_categoria" maxlength="200">
                                                    <input class="w-2/3 border border-gray-400 h-12 p-2 hidden" required value="<?=$this->session->userdata('session_restaurante')['id']?>" type="text" name="produto_restaurante" id="produto_restaurante" maxlength="200">
                                                </div>
                                                <div class="col-span-1 p-3">
                                                    <label for="">Foto do Produto</label><br>
                                                    <input class="   h-12 p-2" type="file" id="produto_imagem" name="produto_imagem" >

                                                    <img class="w-36 h-32 cover" src="<?=base_url()?>assets/images/upload.png" alt="">
                                                    <br>
                                                    <label for="produto_desconto_habilitado">Habilitar Desconto</label><br>
                                                    <select class="w-2/3 border border-gray-400 h-12 p-2"  required name="produto_desconto_habilitado" id="produto_desconto_habilitado">
                                                        <option value="1">Sim</option>
                                                        <option value="0">Não</option>
                                                    </select>

                                                    <br><br>
                                                    <label for="produto_desconto">Procentagem do Desconto (%)</label><br>
                                                    <input class="w-1/3 border border-gray-400 h-12 p-2" type="number" max="100" min="0" maxlength="2"  required name="produto_desconto" id="produto_desconto">
                                                

                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                
                                        <div class="flex justify-end space-x-4 px-6 py-3">
                                            <button  onclick="closeAddProdutoModal()"  class="px-4 bg-transparent p-3 rounded-lg text-red-500 hover:bg-gray-100 hover:text-red-400 mr-2">Fechar</button>
                                            <button onclick="addProduto()" class="px-4 bg-green p-3 rounded-lg text-white hover:bg-green ">ADICIONAR</button>
                                        </div>

                                 

                                </div>
                            </div>
                        <!-- MODAL ADD PRODUTO -->




           

        </main>
    </section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
<!-- Mascara -->
<script>
  $(function() {
    $('#produto_valor').maskMoney();
    
  })
</script>


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

    function deleteCategoria(e) {
        $.ajax({
            type: "POST",
            url: '',
            data: {delete_categoria: e},
            success: function(data)
            {
                location.reload()
            }
         });
    }

    function addCategoria() {

        let nome = $('#cardapio_nome').val()

        if (nome.length > 0 ) {
            
            $.ajax({
                type: "POST",
                url: '',
                data: {cardapio_nome: nome},
                success: function(data)
                {

                    //Limpando
                    $('#cardapio_nome').val("")
                    location.reload()
                }
            });
        }
    }









    function closeAddProdutoModal() {

        $('#overlayModalProduto').addClass('hidden');
        $('#overlayModalProduto').removeClass('flex');
    }

    function addProdutoModal(id) {
    
        const produto_categoria = id
        $('#produto_categoria').val(id)
        $('#overlayModalProduto').removeClass('hidden');
        $('#overlayModalProduto').addClass('flex');

    }

    function deleteProduto(id){
        const restaurante_id = $('#produto_restaurante').val()
     
        $.ajax({
            type: "POST",
            url: '',
            data: {
                delete_produto:'.',
                restaurante_id: restaurante_id,
                produto_id:id,    
            },
            success: function(data)
            {
                location.reload()
                // console.log(data)
            }
        });
    }

    function getBase64(file) {
        var reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onload = function () {
            console.log(reader.result);
        };
        reader.onerror = function (error) {
            console.log('Error: ', error);
        };
    }

    function addProduto() {
     
        const produto_nome = $('#produto_nome').val()
        const produto_descricao = $('#produto_descricao').val()
        const produto_restaurante = $('#produto_restaurante').val()
        const produto_valor = $('#produto_valor').val()
        const produto_desconto_tipo = 'porcentagem'
        const produto_imagem =  $('#produto_imagem')[0].files[0]
        const produto_categoria = $('#produto_categoria').val()
        const produto_desconto = $('#produto_desconto').val()
        const produto_desconto_habilitado = $('#produto_desconto_habilitado').val()

        const data = new FormData();
 
        data.append('add_produto', '.')
        data.append('produto_nome', produto_nome)
        data.append('produto_descricao', produto_descricao)
        data.append('produto_restaurante', produto_restaurante)
        data.append('produto_valor', produto_valor)
        data.append('produto_imagem', produto_imagem)
        data.append('produto_categoria', produto_categoria)
        data.append('produto_desconto', produto_desconto)
        data.append('produto_desconto_tipo', produto_desconto_tipo)
        data.append('produto_desconto_habilitado', produto_desconto_habilitado)

        $.ajax({
            type: "POST",
            url: '',

            data: {
                add_produto:'.',
                produto_nome:produto_nome,
                produto_descricao:produto_descricao,
                produto_restaurante:produto_restaurante,
                produto_valor:produto_valor,
                produto_imagem:produto_imagem,
                produto_categoria:produto_categoria,
                produto_desconto:produto_desconto,
                produto_desconto_tipo:produto_desconto_tipo,
                produto_desconto_habilitado:produto_desconto_habilitado },
            success: function(data)
            {
                location.reload()
                // console.log(data)
            }
        });
    }



    
    
</script>






<!-- ADD CATEGORIAS SCRIPT -->
    <script>
        var openmodal = document.querySelectorAll('.modal-open')


        for (var i = 0; i < openmodal.length; i++) {
        openmodal[i].addEventListener('click', function(event){
            event.preventDefault()
            toggleModal()
        })
        }
        
        const overlay = document.querySelector('.modal-overlay')
        overlay.addEventListener('click', toggleModal)
        
        var closemodal = document.querySelectorAll('.modal-close')
        for (var i = 0; i < closemodal.length; i++) {
        closemodal[i].addEventListener('click', toggleModal)
        }
        
        document.onkeydown = function(evt) {
        evt = evt || window.event
        var isEscape = false
        if ("key" in evt) {
            isEscape = (evt.key === "Escape" || evt.key === "Esc")
        } else {
            isEscape = (evt.keyCode === 27)
        }
        if (isEscape && document.body.classList.contains('modal-active')) {
            toggleModal()
        }
        };
        
        
        function toggleModal () {
            const body = document.querySelector('body')
            const modal = document.querySelector('.modal')
            modal.classList.toggle('opacity-0')
            modal.classList.toggle('pointer-events-none')
            body.classList.toggle('modal-active')
        }

        //Modal add Produto

      

        
  </script>
<!-- ADD CATEGORIAS SCRIPT -->


</body>
</html>