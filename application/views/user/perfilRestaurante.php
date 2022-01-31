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
    #info:hover {
        color: #6A9F46;
    }
</style>


<body class="bg-gray-100">
    <section>
        <!-- Início Navbar -->
        <header class="w-full fixed z-50">
            <?php $this->load->view('comp/on/user/navbar_on')?>
        </header>
        <!-- Fim Navbar -->

        <main class="pt-16">
            <div class="grid lg:grid-cols-12 xl:grid-cols-8"> 
                <div class="lg:col-span-3 xl:col-span-2 bg-white h-full pt-10 pb-14">
                    <div class="grid justify-items-center mb-5">
                        <img class="lg:h-44 xl:w-52 lg:w-44 xl:h-52 h-44 w-44  rounded-full" style="object-fit: cover;" src="<?=base_url()?>assets/images/avatars/<?=$rest['restaurante_imagem']?>" alt=""/>
                        <h1 class="font-semibold lg:text-lg xl:text-xl text-center text-gray-700 pt-5 pb-2"><?=$rest['restaurante_nome']?></h1>
                        
                        <!-- <div class="flex items-center">
                            <img class="w-5 mr-1" src="<?=base_url()?>assets/images/star.svg" alt="">
                            <p class="font-semibold text-lg text-gray-800 mt-1">4.5</p>
                        </div> -->
                    </div>

                    <div class="flex space-x-2 px-5 items-center pb-2">
                        <img class="h-5" src="<?=base_url()?>assets/images/time.svg" alt=""/>
                        <p class="font-semibold text-sm text-gray-700">TEMPO DE PREPARO  <b class="font-semibold text-sm text-green"><?=$rest['restaurante_preparo_medio']?> min</b></p>
                    </div>

                    <div class="flex space-x-2 px-5 items-center pb-2">
                        <img class="h-5" src="<?=base_url()?>assets/images/taxaEntrega.svg" alt=""/>
                        <p class="font-semibold text-sm text-gray-700">PEDIDO MÍNIMO <b class="font-semibold text-sm text-green">R$ 15,00</b></p>
                    </div>

                    <!-- <div >
                        <a class="flex space-x-2 px-5 items-center pb-2" href="">
                            <img class="h-5" src="<?=base_url()?>assets/images/info.svg" alt=""/>
                            <p id="info" class="font-semibold text-sm text-gray-700">MAIS INFORMAÇÕES</p>
                        </a>
                    </div> -->

                    <div class="border-t border-gray-200 border-opacity-75 mt-10 flex justify-center items-center space-x-2">
                        <img class="h-5 mt-5 mb-5" src="<?=base_url()?>assets/images/cardapio.svg" alt=""/>
                        <h1 class="text-gray-700 lg:text-lg xl:text-xl font-semibold mt-5 mb-5">CARDÁPIO</h1>
                    </div>
                    


                    <?php foreach ($cardapios as $c) { ?>
                    <div class="px-5 items-center py-3 border-b border-gray-200 border-opacity-50">
                        <a href="#<?=$c->id?>">
                            <div class="flex items-center justify-between">
                                <h1 class="font-semibold lg:text-base xl:text-lg text-gray-700"><?=$c->cardapio_nome?></h1>
                                <img  class="h-5" src="<?=base_url()?>assets/images/seta.svg" alt=""/> 
                            </div>
                        </a>   
                    </div>
                    <?php } ?>

                 
                </div>

                <?php foreach ($cardapios as $c) { ?>
                    <div id="<?=$c->id?>" class="lg:col-span-9 xl:col-span-6">
                        <div id="box1" class="bg-white lg:p-5 xl:p-8 lg:m-5 xl:m-10">
                            <h1 class="font-semibold text-xl xl:text-2xl pl-2 text-left text-gray-700 pb-5"><?=$c->cardapio_nome?></h1>
                            
                            <div class="grid grid-cols-8 xl:gap-4  p-2">

                                <?php foreach ($this->produtos_model->getProdutosByCategoria($c->id) as $p) { ?>
                                   
                                    <div class="xl:col-span-4 col-span-8 flex  xl:mb-0 mb-4 pt-2 ">
                                        <div  style="object-fit:cover; background-image: url('<?=base_url()?>assets/images/produtos/<?=$p->produto_imagem?>" class="lg:h-32 xl:h-32 h-32 cover bg-cover bg-center xl:w-1/3 w-2/3 rounded-lg"></div>

                                        <div class="w-full pl-5 pr-5 ">
                                            <div class="flex justify-between  pb-1">
                                                <h1 class="titulo font-semibold text-lg text-gray-700"><?=$p->produto_nome?></h1>
                                               
                                                <?php if ($this->session->userdata('session_user')) { ?>
                                                    <span style="cursor:pointer" onclick="addProdutoModal('<?=$p->id?>','<?=$p->produto_nome?>','<?=$p->produto_descricao?>','<?=$p->produto_valor?>','<?=$p->produto_imagem?>','<?=$p->produto_restaurante?>')"  >
                                                        <img class="h-7 pointer pl-2" src="<?=base_url()?>assets/images/plus.svg" alt=""/>
                                                    </span>

                                                <?php } else { ?>
                                                    <a href="<?=base_url()?>login">
                                                        <span  style="cursor:pointer;" >
                                                            <img class="h-7 pointer pl-2" src="<?=base_url()?>assets/images/plus.svg" alt=""/>
                                                        </span>
                                                    </a>
                                                <?php  } ?>
                                            </div>
                                            
                                            <div class="pr-2">
                                                <p class="descricao md:text-sm xl:text-sm text-gray-700"><?=$p->produto_descricao?></p>
                                                <p class="font-semibold  text-base text-gray-700 pt-2">R$ <?=$p->produto_valor?></p>
                                            </div>
                                        </div>
                                    
                                    </div>

                                  

                                <?php } ?>

                                
                            </div>
                        </div> 
                    <?php } ?>

                </div>
                    
            </div>  
        </main>
    </section>


                                        <!-- MODAL ADD PRODUTO -->
                                        <div id="overlayModalProduto" style="overflow: scroll;" class="hidden bg-black bg-opacity-75 fixed inset-0 justify-center items-center z-50">
                                            <div class="bg-white w-11/12 lg:w-4/6 xl:w-2/2 ">
                                                <div class="flex justify-between items-center    py-3 p-3 ">
                                                    <h1 class="text-black text-base sm:text-lg produto_nome pl-4 font-semibold"></h1>
                                                    <span onclick="closeAddProdutoModal()" style="font-size:30px;cursor:pointer;margin-right:15px" class="font-semibold text-black ">x</span>
                                                </div>

                                                <!-- <form action="" id="form-add-produto"> -->
                                                    <div class=" grid grid-cols-2 " >
                                                        <div class=" col-span-2 xl:col-span-1 pl-5 pr-5">
                                                            <img src="" class="w-full h-60 produto_imagem" style="object-fit: cover;" alt="">
                                                        </div>
                                                        <div>

                                                        <div class="col-span-2 xl:col-span-1 w-full xl:pt-0 pt-3 xl:pl-0 pl-5 ">
                                                            <div>
                                                            
                                                                <input type="hidden" class="produto_id_input" >
                                                                <input type="hidden" class="produto_restaurante_input">
                                                                <input type="hidden" class="produto_valor_input">
                                                                
                                                                
                                                                <button onclick="addMinus()" class="px-5 py-2 border border-gray-400 text-semibold">-</button>
                                                                <input disabled  class=" py-2 w-16 text-center border border-gray-400 produto_quantidade_input"  maxlength="3"  type="text" value="1">
                                                                <button onclick="addPlus()" class="px-5 py-2 border border-gray-400 text-semibold">+</button>
                                                            </div>
                                                            

                                                            <div class=" w-full">
                                                               
                                                                <p class="text-green font-semibold text-sm pt-3">DESCRIÇÃO</p>
                                                                <p class="text-sm pt-2 w-2/2 pt-3 produto_descricao"></p>
                                                            </div>
                                                        </div>


                                                        </div>
                                                    </div>
                                                    <div class="xl:flex online-block  justify-between p-5 items-center gap-2  ">
                                                        <h2 class="text-semibold pb-3 xl:pb-0">SUBTOTAL: <span class="font-semibold text-xl"> R$ <span class="produto_valor"></span></span></h2>
                                                        <button onclick="addProdutoAndClose()" class="text-sm text-green pb-5 xl:pb-0 ">ADICIONAR E CONTINUAR COMPRANDO</button>
                                                        <button onclick="addProdutoAndPay()" class="px-3 py-3 bg-green font-base uppercase text-white">ADICIONAR E PAGAR</button>
                                                    </div>
                                                
                                                <!-- </form> -->
                                            
                                            </div>
                                        </div>
                                    <!-- MODAL ADD PRODUTO -->

                                    <script>
                                        function addPlus() {

                                            let quantidade =  $('.produto_quantidade_input').val()
                                            let preco = $('.produto_valor_input').val()

                                            
                                  
                                            let y = ++quantidade
                                            let total = y * preco
                                            // alert(preco)

                                            

                                            
                                        
                                           if (quantidade < 51) {
                                             
                                                $('.produto_quantidade_input').val(y)
                                                $('.produto_valor').html(total.toFixed(2))
                                            
                                           }
                                        }

                                        function addMinus() {

                                            let quantidade = $('.produto_quantidade_input').val()
                                            let preco = $('.produto_valor_input').val()

                                            var y = 1
                                            if (quantidade == 1) {
                                                var y = 1
                                            } else {
                                                var y = quantidade-1
                                            }

                                       

                                           
                                            let total = y * preco

                                            

                                            $('.produto_quantidade_input').val(y)
                                            $('.produto_valor').html(total.toFixed(2))
                                       

                                        }
                                    </script>                      

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
$(document).ready(function ()
   { $(".descricao").each(function(i){
        var len=$(this).text().trim().length;
        if(len>146)
        {
            $(this).text($(this).text().substr(0,146)+'...');
        }
    });
 });
</script>

<script>
$(document).ready(function ()
   { $(".titulo").each(function(i){
        var len=$(this).text().trim().length;
        if(len>38)
        {
            $(this).text($(this).text().substr(0,38)+'...');
        }
    });
 });
</script>


<script>

    function closeAddProdutoModal() {
      
        $(".produto_imagem").attr("src", '');
        $('.produto_nome').html('')
        $('.produto_quantidade').val('1')
        $('.produto_descricao').html('')
        $('.produto_valor').html('')

        const element = '#overlayModalProduto'

        $(element).addClass('hidden');
        $(element).removeClass('flex');
    }

  

    function addProdutoModal(id,produto_nome, produto_descricao, produto_valor, produto_imagem, produto_restaurante) {
        

        const url = "<?=base_url()?>assets/images/produtos/"+produto_imagem
     
        $(".produto_imagem").attr("src",url);
        $('.produto_nome').html(produto_nome)
        $('.produto_descricao').html(produto_descricao)
        $('.produto_valor').html(produto_valor)
        


        $('.produto_id_input').val(id)
        $('.produto_valor_input').val(produto_valor)
        $('.produto_restaurante_input').val(produto_restaurante)
        $('.produto_quantidade_input').val('1')
   

        const element = '#overlayModalProduto'
       
   
        $(element).removeClass('hidden');
        $(element).addClass('flex');
    }

</script>


<script>

    function addProdutoAndPay() {

        const id = $('.produto_id_input').val()
        const restaurante = $('.produto_restaurante_input').val()
        const valor = $('.produto_valor_input').val()
        const quantidade = $('.produto_quantidade_input').val()

    
 
        $.ajax({
            type: "POST",
            data: {add_produto_carrinho:'.',produto_id:id,produto_restaurante:restaurante,produto_valor:valor, produto_quantidade:quantidade}, 
            success: function(data)
            {
               window.location.href = "<?=base_url()?>carrinho"
            }
        });


    }

    function addProdutoAndClose() {

        const id = $('.produto_id_input').val()
        const restaurante = $('.produto_restaurante_input').val()
        const valor = $('.produto_valor_input').val()
        const quantidade = $('.produto_quantidade_input').val()

    
 
        $.ajax({
            type: "POST",
            data: {add_produto_carrinho:'.',produto_id:id,produto_restaurante:restaurante,produto_valor:valor, produto_quantidade:quantidade}, 
            success: function(data)
            {
              location.reload()
            }
        });
    }
</script>
</body>
</html>