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

 


<body >
    <section>
        <!-- Início Navbar -->
        <header class="w-full fixed z-50">
                <?php if ($this->session->userdata('session_user')) { ?>
                    <?php $this->load->view('comp/on/user/navbar_on')?>
                <?php } else { ?>
                    <?php $this->load->view('comp/off/navbar_off')?>
                 
                <?php } ?>
       
        </header>
        <!-- Fim Navbar -->

        <main class="pt-16">
            <p class="text-xl  xl:ml-12 ml-5 mt-12">Resultados para "<?=$query?>"</p>


            <p class="text-xl  xl:ml-12 ml-5 mt-5">"<?=$query?>" em <span id="cidade" class="text-green font-semibold"></span> </p>

            <p class="text-xl font-semibold  xl:ml-12  ml-5 mt-5 ">Os mais pedidos</span> </p>

      
            <?php if (count($produtos) > 0 ) { ?>
                            
                            <div class="grid grid-cols-8 xl:gap-4  xl:p-12 p-5 ">

                                <?php foreach ($produtos as $p) { ?>
                                   
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

            <?php } else {?>
                <br>
                <div class=" ml-5 xl:ml-12 mr-5 xl:mr-12  " >
                <div class="bg-green h-32 rounded-md flex  p-2 justify-center items-center">
                    <p class="text-center text-white ">Não encontramos Produtos em <span class="font-semibold"><?=$cidade?></span>.</p>
                </div>
            </div>
        <?php } ?>

            <p class="text-xl font-semibold  ml-5 xl:ml-12 mt-5">Restaurantes</span> </p>
            <br>



        <?php if (count($restaurantes) > 0 ) { ?>
        <!-- Início Restaurantes-->
            <div class="grid grid-cols-12 lg:grid-cols-10 xl:px-0 px-5 md:px-0">
                <!-- <div class="md:col-span-1"></div> -->

                <div class="col-span-12 xl:ml-12 md:col-span-10 lg:col-span-8 pb-10">
                

                    <div class="grid grid-cols-2 md:grid-cols-6 xl:grid-cols-8 gap-5">
                        <!-- Início Restaurante 1 -->


                        <?php foreach ($restaurantes as $r) { ?>
                            <div class="col-span-2 pb-5">
                                <a href="<?=base_url()?>restaurante/perfil/<?=$r->id?>">
                                    <!-- Início Imagem Restaurante -->
                                        <div style="background-image: url('<?=base_url()?>assets/images/avatars/<?=$r->restaurante_imagem?>')" class="w-full h-48 bg-cover bg-center rounded-lg"></div>
                                    <!-- Fim Imagem Restaurante -->

                                    <!-- Início Nome Restaurante -->
                                        <p class="text-lg font-semibold text-gray-800 text-center pt-1 w-full"><?=$r->restaurante_nome?></p>
                                    <!-- Fim Imagem Restaurante -->
                                
                                    <!-- Início Nome Restaurante -->
                                    <div class="flex justify-between items-center p-1">
                                        <!-- Início Avaliação -->
                                        <!-- <div class="flex space-x-1">
                                            <img class="w-4" src="<?=base_url()?>assets/images/star.svg" alt="">
                                            <p class="text-sm text-gray-800"><?=$r->restaurante_nota?></p>
                                        </div> -->
                                        <!-- Fim Avaliação -->

                                        <!-- Início Nome Categoria -->
                                        <!-- <div>
                                            <p class="text-sm text-gray-800"><?=$this->categorias_model->getCategoria($r->restaurante_categoria)['cat_nome']?></p>
                                        </div> -->
                                        <!-- Fim Nome Categoria -->

                                        <!-- Início Km -->
                                        <div>
                                            <!-- <p class="text-sm text-gray-800">8.5 km</p> -->
                                        </div>
                                        <!-- Fim Km -->
                                    </div>
                                    <!-- Fim Informações Restaurante -->
                                </a>
                            </div>
                        <!-- Fim Restaurante 1 -->
                        <?php } ?>
                  
                    </div>
                </div>

                <!-- <div class="md:col-span-1"></div> -->
            </div>
        <?php } else { ?>
            
            <div class=" ml-5 xl:ml-12 mr-5 xl:mr-12 " >
                <div class="bg-green h-32 rounded-md flex justify-center items-center">
                    <p class="text-center text-white ">Não encontramos Restaurantes em <span class="font-semibold"><?=$cidade?></span>.</p>
                </div>
            </div>
        <?php } ?>
          

   
<!-- Fim Restaurantes-->
            
        </main>
     
    </section>




 <!-- MODAL ADD PRODUTO -->
 <div id="overlayModalProduto" style="overflow: scroll;" class="hidden bg-black bg-opacity-75 fixed inset-0 justify-center items-center z-50">
                                            <div class="bg-white w-11/12 mt-20 lg:w-4/6 xl:w-2/2 ">
                                                <div class="flex justify-between items-center    py-3 p-3 ">
                                                    <h1 class="text-black text-base sm:text-lg produto_nome pl-4 font-semibold"></h1>
                                                    <span onclick="closeAddProdutoModal()" style="font-size:30px;cursor:pointer;margin-right:15px" class="font-semibold text-black ">x</span>
                                                </div>

                                                <!-- <form action="" id="form-add-produto"> -->
                                                    <div class=" grid xl:grid-cols-2 grid-cols-1 " >
                                                        <div class=" xl:span-col-1 span-col-1 pl-5 pr-5">
                                                            <img src="" class="w-full h-60 produto_imagem" style="object-fit: cover;" alt="">
                                                        </div>
                                                        <div class="xl:span-col-1 span-col-1 ">

                                                            <div class=" xl:pl-12 pl-5 pr-5">
                                                                <div class="flex">
                                                                
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

                                                                <div style="overflow-y: scroll; overflow-x:hidden; max-height:200px;height:auto"  class="w-full  "> 
                                                                    <div  id="acompanhamento_div"  class="w-full">
                                                                    </div>
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

  function addProdutoAndPay() {

    const id = $('.produto_id_input').val()
    const restaurante = $('.produto_restaurante_input').val()
    const valor = $('.produto_valor_input').val()
    const quantidade = $('.produto_quantidade_input').val()
    const acompanhamento = $('#acompanhamentos').serialize();



    $.ajax({
        type: "POST",
        url:'./restaurante/perfil/'+restaurante,
        data: {add_produto_carrinho:'.',produto_id:id,produto_restaurante:restaurante,produto_valor:valor, produto_quantidade:quantidade, produto_acompanhamento:acompanhamento }, 
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
        const acompanhamento = $('#acompanhamentos').serialize();



        $.ajax({
            type: "POST",
            url:'./restaurante/perfil/'+restaurante,
            data: {add_produto_carrinho:'.',produto_id:id,produto_restaurante:restaurante,produto_valor:valor, produto_quantidade:quantidade, produto_acompanhamento:acompanhamento}, 
            success: function(data)
            {
            location.reload()
            }
        });
    }
                                    </script>   


                   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>

    <script>
          function setCookie(name,value,days) {
        var expires = "";
        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + (days*24*60*60*1000));
            expires = "; expires=" + date.toUTCString();
        }
        document.cookie = name + "=" + (value || "")  + expires + "; path=/";
    }

    function getCookie(name) {
        var nameEQ = name + "=";
        var ca = document.cookie.split(';');
        for(var i=0;i < ca.length;i++) {
            var c = ca[i];
            while (c.charAt(0)==' ') c = c.substring(1,c.length);
            if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
        }
        return null;
    }

    function eraseCookie(name) {   
        document.cookie = name +'=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
    }


    $(document).ready(function() {
                const endereco = getCookie('endereco')
                const cidade = getCookie('cidade')
                const estado = getCookie('estado')
                const cep = getCookie('cep')
            
                $('#cidade').html(cidade)
    });
    </script>


<script>
     function addProdutoModal(id,produto_nome, produto_descricao, produto_valor, produto_imagem, produto_restaurante) {
        
        $.ajax({
            type: "POST",
            url:'<?=base_url()?>restaurante/getAcompanhamentos',
            data: {produto_id:id}, 
            success: function(data)
            {
              $('#acompanhamento_div').html(data)
            }
        });


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


</html>


