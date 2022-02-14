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


    .checkbox-round {
    width: 1.8em;
    height: 1.8em;
    background-color: white;
    border-radius: 50%;
    vertical-align: middle;
    border: 1px solid #ddd;
    appearance: none;
    -webkit-appearance: none;
    outline: none;
    cursor: pointer;
}

.checkbox-round:checked {
    background-color: #6a9f46;
}
</style>

<body style="background-color:#F7F8F9">
    <section>
        <!-- Início Header -->
        <header class="w-full fixed z-50 bg-white">
            <nav class="grid grid-cols-8 md:grid-cols-1 border-b border-gray-200 border-opacity-50 shadow h-16 px-5 md:px-12 lg: relative">
                <div class="col-span-1 flex justify-items-center items-center">
                    <a onmouseover="hoverAtivado()" onmouseout="hoverDesativado()" class="flex space-x-3 items-center" href="<?=base_url()?>carrinho">
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
            <div class="">
             
                <p class="font-semibold text-gray-700 text-2xl md:text-3xl text-left md:pb-5 pl-5 xl:pl-12 pt-12 ">Concluir Pedido</p>
               
            </div>

            <div class="grid grid-cols-1 md:grid-cols-5 xl:grid-cols-3 px-5 md:px-0">
                
            </div>

            <!-- <form action="" id="form-pagamento" method="post"> -->

            <!--  -->
            <input type="hidden" id="pedido_user" value="<?=$this->session->userdata('session_user')['id']?>">
            <input type="hidden" id="pedido_restaurante" value="<?=$this->input->post('restaurante_pedido')?>" >

            <div class="grid xl:grid-cols-3 grid-cols-1">

                <div class="xl:col-span-2 col-span-1 xl:p-12 p-5">
                    <!-- Endereço de Entrega -->
                    <div class="bg-white pt-3 pl-8">
                        <h1 class="text-lg font-semibold py-3">Endereço de Entrega</h1>
                    </div>
                    <hr>
                    <div class="bg-white  xl:pt-3 pt-1  pl-8 pr-16 space-y-5 pb-5">
                        <div class="xl:flex  inline-block justify-between pb-3 pt-5 ">
                            <p id="pedido_endereco_view"><?=$_COOKIE['endereco']?> <br> <?=$_COOKIE['cidade']?>/<?=$_COOKIE['estado']?> <br>  <small>CEP: <?=$_COOKIE['cep']?></small></p>
                            <input type="hidden" value="<?=$_COOKIE['endereco']?>"  id="pedido_endereco" maxlength="200">
                            <input type="hidden"  id="pedido_cidade" value="<?=$_COOKIE['cidade']?>" maxlength="200">
                            <input type="hidden"   id="pedido_estado" value="<?=$_COOKIE['estado']?>"  maxlength="200">
                            <input type="hidden"   id="pedido_cep" value="<?=$_COOKIE['cep']?>"  maxlength="200">
                            <button onclick="trocarEnderecoModal()" class="text-green xl:mt-0 mt-3 ">Trocar Endereço</button>
                        </div>
                        <div>
                            <p>Observações para Entrega (Opcional)</p>
                            <textarea class="mt-3 xl:h-20 h-24 xl:w-2/3 w-full border xl:p-3 p-2 rounded-md border-gray-400" maxlength="200" id="pedido_observacoes"  ></textarea>
                        </div>
                    </div>

                    <!-- Forma de Pagamento -->
                    <div class="bg-white  mt-5 pt-3 pl-8">
                        <h1 class="text-lg font-semibold pt-3">Forma de Pagamento</h1>
                        <p class="text-sm">Todos os pedidos são pagos em domicílio.</p>
                    </div>
                    <hr>
                    <!-- Troco -->
                    
                    <!-- Troco Fim -->
                    <div class="bg-white  pt-3  xl:pl-8 xl:pr-16 pr-3 pl-3 space-y-5 pb-5">

                    <input type="hidden" class="text-sm ml-3" id="pedido_pagamento" value="cartao_credito" >
                        
                        <div class="flex pl-8 pr-8 h-16 p-4" style="border:1px solid #6a9f46; border-radius:10px">
                            <input type="checkbox"  onchange="setPagamento(this.value)" value="dinheiro"   class="w-7  checkbox-round bg-green text-green h-7 " style="color:#6a9f46;border-radius:100px">
                            <p class="font-semibold ml-5  xl:text-xl text-sm uppercase">DINHEIRO</p>
                           
                            <input type="hidden" value="" class="text-sm ml-3" id="pedido_troco" >
                        </div>
                        <div class="flex pl-8 pr-8 h-16 p-4" style="border:1px solid #6a9f46; border-radius:10px">
                            <input type="checkbox"  onchange="setPagamento(this.value)" checked value="cartao_credito" class="w-7  checkbox-round bg-green text-green h-7 " style="color:#6a9f46;border-radius:100px">
                            <p class="font-semibold ml-5  xl:text-xl text-sm uppercase">CARTÃO DE CRÉDITO</p>
                        </div>
                        <div class="flex pl-8 pr-8 h-16 p-4" style="border:1px solid #6a9f46; border-radius:10px">
                            <input type="checkbox"  onchange="setPagamento(this.value)" value="cartao_debito" class="w-7  checkbox-round bg-green text-green h-7 " style="color:#6a9f46;border-radius:100px">
                            <p class="font-semibold ml-5  xl:text-xl text-sm uppercase">CARTÃO DE DÉBITO</p>
                        </div>
                    </div>

                    
                    <!-- Cupom de Desconto -->
                    <div class="bg-white h-14 mt-5 pl-8  flex justify-between ">
                        <h1 class="text-lg font-semibold py-3  h-12">Cupom de Desconto</h1>
                        
                        <div class="flex justify-center items-center">
                            <a href="<?=base_url()?>cupons" class="bg-green py-4 text-white rounded-xl text-xl  font-semibold px-5 ">
                                <button class="text-xl" >+</button>
                            </a>
                        </div>
                    </div>
                    <hr>
                    <?php if (isset($_COOKIE['cupom'])) { ?>
                        
                        <?php if ($this->cupom_model->existeCupom($_COOKIE['cupom']) > 0 && $this->cupom_model->limiteCupom($_COOKIE['cupom']) > 0 ) { ?>
                        
                            <?php if ($this->cupom_model->minimoCupom($_COOKIE['cupom'],$this->carrinho_model->getTotalByRestaurante($this->input->post("restaurante_pedido")))) { ?>
                       
                            <?php $c = $this->cupom_model->getCupom($_COOKIE['cupom']);  ?>

                            <input type="hidden" id="pedido_desconto" value="<?=$c['cupom_desconto']?>">
                            <input type="hidden" id="pedido_cupom" value="<?=$c['id']?>">
                            <div style=" width: 100%;" class="h-40 flex mr-2 p-2 bg-yellow-100 rounded-lg">
                                        
                                        <div class="bg-yellow-100 flex  w-full">
                                            <div class="w-1/2">
                                            <center>
                                            <img style="object-fit: cover;" src="<?=base_url()?>assets/images/cupom.png" alt="">
                                            </center>
                                            </div>
                                            <div class="ml-5 w-1/2   mb-2">
                                                <br>
                                                <h1 class="text-base font-semibold text-green"> PARABÉNS!</h1>
                                                <h1 class="text-base font-semibold text-green"> <?=$c['cupom_desconto']?>% DE DESCONTO</h1>
                                                <br>
                                            
                                            </div>
                                        </div>
                            </div>
                             <?php } ?>
                        <?php } ?>
                    <?php } ?>
                    <!-- <div class="bg-white  pt-3  pl-8 pr-16 space-y-5 pb-5">
                        <div class="flex justify-between pb-3 pt-5">
                            <p>Av. T-10 Setor Bueno, SP - São Paulo, Brasil</p>
                            <button class="text-green ">Trocar Endereço</button>
                        </div>
                        <div>
                            <p>Observações para Entrega (Opcional)</p>
                            <textarea class="mt-3 h-20 w-2/3 border p-3 rounded-md border-gray-400" name="pedido_observacoes" ></textarea>
                        </div>
                    </div> -->
                    <!-- Forma da Pagamento -->

                </div>
                <div class="col-span-1 xl:p-12 p-5">
                    <div class="bg-white pt-3 pl-8">
                        <h1 class="text-lg font-semibold py-3">Detalhes do Pedido</h1>
                    </div>
                    <hr>
                    <div class="bg-white pt-3 pl-8 pr-16 space-y-5 mb-3">
                        <div class="flex justify-between ">
                            <p>Total Pedidos</p>
                            <p>R$ <span> <?=$this->carrinho_model->getTotalByRestaurante($this->input->post("restaurante_pedido"))?> </span></p>
                           
                        </div>
                        <div class="flex justify-between">
                            <p>Taxa de Entrega</p>
                            <p>R$ <span><?=$this->carrinho_model->getRestauranteFrete($this->input->post("restaurante_pedido"))?></span></p>
                            <input type="hidden" id="pedido_frete" value="<?=$this->carrinho_model->getRestauranteFrete($this->input->post("restaurante_pedido"))?>">
                        </div>

                        <?php if (isset($_COOKIE['cupom'])) { ?>
                            <?php if ($this->cupom_model->existeCupom($_COOKIE['cupom']) > 0 && $this->cupom_model->limiteCupom($_COOKIE['cupom']) > 0 ) { ?>
                                <?php if ($this->cupom_model->minimoCupom($_COOKIE['cupom'],$this->carrinho_model->getTotalByRestaurante($this->input->post("restaurante_pedido")))) { ?>
                                    <?php $c = $this->cupom_model->getCupom($_COOKIE['cupom']);  ?>
                                    <div class="flex justify-between">
                                        <p>Desconto</p>
                                        <p> <?=$c['cupom_desconto']?> %</p>
                                    </div>
                             <?php } ?>
                            <?php } ?>
                        <?php } ?>
                        <hr>

                     <?php if (isset($_COOKIE['cupom'])) { ?>
                        <?php if ($this->cupom_model->existeCupom($_COOKIE['cupom']) > 0 && $this->cupom_model->limiteCupom($_COOKIE['cupom']) > 0 ) { ?>
                            <?php if ($this->cupom_model->minimoCupom($_COOKIE['cupom'],$this->carrinho_model->getTotalByRestaurante($this->input->post("restaurante_pedido")))) { ?>
                                <!-- COM DESCONTO -->
                                <?php $c = $this->cupom_model->getCupom($_COOKIE['cupom']);  ?>

                                <div class="flex justify-between pb-5">
                                    <p class="font-semibold">TOTAL</p>
                                    <p class="font-semibold">R$ <span><?=$this->carrinho_model->getCheckoutTotal(
                                        $this->carrinho_model->getTotalByRestaurante($this->input->post("restaurante_pedido")),
                                        $this->carrinho_model->getRestauranteFrete($this->input->post("restaurante_pedido")),
                                        $c['cupom_desconto']

                                    )?></span></p>
                                    <input type="hidden" id="pedido_total" value="<?=$this->carrinho_model->getCheckoutTotal(
                                        $this->carrinho_model->getTotalByRestaurante($this->input->post("restaurante_pedido")),
                                        $this->carrinho_model->getRestauranteFrete($this->input->post("restaurante_pedido")),
                                        $c['cupom_desconto']
                                        )?>">
                                </div>
                                <!-- COM DESCONTO -->
                          
                             <?php } else { ?>

                                <div class="flex justify-between pb-5">
                                    <p class="font-semibold">TOTAL</p>
                                    <p class="font-semibold">R$ <span><?=$this->carrinho_model->getCheckoutTotal(
                                        $this->carrinho_model->getTotalByRestaurante($this->input->post("restaurante_pedido")),
                                        $this->carrinho_model->getRestauranteFrete($this->input->post("restaurante_pedido")),
                                        0

                                    )?></span></p>
                                    <input type="hidden" id="pedido_total" value="<?=$this->carrinho_model->getCheckoutTotal(
                                        $this->carrinho_model->getTotalByRestaurante($this->input->post("restaurante_pedido")),
                                        $this->carrinho_model->getRestauranteFrete($this->input->post("restaurante_pedido")),
                                        0)?>">
                                </div>

                             <?php } ?>
                        <?php } else {  ?>
                            <div class="flex justify-between pb-5">
                                <p class="font-semibold">TOTAL</p>
                                <p class="font-semibold">R$ <span><?=$this->carrinho_model->getCheckoutTotal(
                                    $this->carrinho_model->getTotalByRestaurante($this->input->post("restaurante_pedido")),
                                    $this->carrinho_model->getRestauranteFrete($this->input->post("restaurante_pedido")),
                                    0

                                )?></span></p>
                                <input type="hidden" id="pedido_total" value="<?=$this->carrinho_model->getCheckoutTotal(
                                    $this->carrinho_model->getTotalByRestaurante($this->input->post("restaurante_pedido")),
                                    $this->carrinho_model->getRestauranteFrete($this->input->post("restaurante_pedido")),
                                    0)?>">
                            </div>
                        <?php } ?>
                    <?php } else { ?>
                        <div class="flex justify-between pb-5">
                            <p class="font-semibold">TOTAL</p>
                            <p class="font-semibold">R$ <span><?=$this->carrinho_model->getCheckoutTotal(
                                $this->carrinho_model->getTotalByRestaurante($this->input->post("restaurante_pedido")),
                                $this->carrinho_model->getRestauranteFrete($this->input->post("restaurante_pedido")),
                                0

                            )?></span></p>
                             <input type="hidden" id="pedido_total" value="<?=$this->carrinho_model->getCheckoutTotal(
                                $this->carrinho_model->getTotalByRestaurante($this->input->post("restaurante_pedido")),
                                $this->carrinho_model->getRestauranteFrete($this->input->post("restaurante_pedido")),
                                0)?>">
                        </div>
                    <?php } ?>
                       
                    </div>
                  
                    <div class="pt-3">
                        <div onclick="addPedido()" class="py-3 cursor-pointer bg-green text-white text-center rounded-md font-semibold w-full">FAZER O PEDIDO</div>
                    </div>
                   
                </div>  
                <!-- </form> -->

            </div>
            
        </main>
    </section>


    
                           <!-- MODAL ADD PRODUTO -->
                           <div id="overlayModalTroco" class="hidden bg-black bg-opacity-75 fixed inset-0 justify-center items-center z-50">
                                <div class="bg-white w-11/12 lg:w-4/6 xl:w-1/2 ">
                                    <div class="flex justify-between items-center    py-3 p-3 ">
                                        <h1 class="text-black text-base sm:text-lg font-semibold">DETALHES DO TROCO</h1>
                                        <span onclick="closeTroco()" style="font-size:30px;cursor:pointer;margin-right:15px" class="font-semibold text-black ">x</span>
                                    </div>

                                    <div class="pl-5 pr-5 pt-2">
                                        <p class="mb-2">Precisa de troco para quantos R$?</p>
                                        <input type="text" id="pedido_troco_modal" class="border border-gray-500 h-12 p-2">
                                    </div>
                                
                                        <div class="flex justify-end space-x-4 px-6 py-3">
                                            <button  onclick="closeTroco()"  class="px-4 bg-transparent p-3 rounded-lg text-red-500 hover:bg-gray-100 hover:text-red-400 mr-2">Não preciso de troco</button>
                                            <button onclick="addTroco()" class="px-4 bg-green p-3 text-white text-white hover:bg-green ">SALVAR</button>
                                        </div>

                                 

                                </div>
                            </div>
                        <!-- MODAL ADD PRODUTO -->


                           <!-- MODAL ENDREÇO -->
                           <div id="overlayModalEndereco" class="hidden bg-black bg-opacity-75 fixed inset-0 justify-center items-center z-50">
                                <div class="bg-white w-11/12 lg:w-4/6 xl:w-1/2 ">
                                    <div class="flex justify-between items-center    py-3 p-3 ">
                                        <h1 class="text-black text-base sm:text-lg font-semibold">TROCAR ENDEREÇO</h1>
                                        <span onclick="closeEndereco()" style="font-size:30px;cursor:pointer;margin-right:15px" class="font-semibold text-black ">x</span>
                                    </div>

                                    <div class="pl-5 pr-5 pt-2">
                                        <p class="mb-2"> Endereço Completo</p>
                                        <input type="text" required  id="pedido_endereco_input" maxlength="200" class="border w-5/6 border-gray-500 h-12 p-2">

                                        <div class="grid xl:grid-cols-2 grid-cols-1 mt-5">
                                            <div class="span-col-1 pr-2">

                                                <label for="">Estado</label><Br>
                                                <select onchange="getCidades(this.value)" required id="pedido_estado_input" class="w-full h-12 p-2">
                                                    <option disabled selected value >SELECIONAR </option>
                                                    <?php foreach ($estados as $e) {  ?>
                                                            <option value="<?=$e->Uf?>"><?=$e->Nome?></option>
                                                           <?php }  ?>
                                                </select>

                                              
                                            </div>
                                            <div class="span-col-1 xl:pl-2 xl:pt-0 pt-3">
                                                <label for="">Cidade</label>
                                                <select  required id="pedido_cidade_input" class="w-full h-12 p-2" >
                                                    <option disabled selected value >SELECIONAR </option>
                                                </select>
                                               
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-2 mt-5">
                                            <div class="span-col-1">
                                            <label for="">CEP</label><Br>
                                                <input type="text" data-mask="99999-990" id="pedido_cep_input" required  class="border border-gray-500 h-12 p-2" maxlength="200" autocomplete="off" id="estado">
                                            </div>
                                           
                                        </div>
                                    </div>
                                
                                        <div class="flex justify-end space-x-4 px-6 py-3">
                                            <button  onclick="closeEndereco()"  class="px-4 bg-transparent p-3 rounded-lg text-red-500 hover:bg-gray-100 hover:text-red-400 mr-2">Cancelar</button>
                                            <button onclick="addEndereco()" class="px-4 bg-green p-3 text-white text-white hover:bg-green ">ADICIONAR</button>
                                        </div>

                                 

                                </div>
                            </div>
                        <!-- MODAL ENDREÇO -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js" type="text/javascript"></script>
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
    $(function() {
    $('#pedido_troco_modal').maskMoney();
    
  })
</script>

<script>
                        $("input:checkbox").on('click', function() {
                        // in the handler, 'this' refers to the box clicked on
                      
                        var $box = $(this);
                        if ($box.is(":checked")) {
                            // the name of the box is retrieved using the .attr() method
                            // as it is assumed and expected to be immutable
                            var group = "input:checkbox";
                            // the checked state of the group/box on the other hand will change
                            // and the current value is retrieved using .prop() method
                            $(group).prop("checked", false);
                            $box.prop("checked", true);
                        } else {
                            $box.prop("checked", false);
                        }
                        });
</script>

<script>

    
   
    function addTroco() {
        troco =  $('#pedido_troco_modal').val()
     
        $('#pedido_troco').val(troco)


        // $('#troco-label').removeClass('flex');

        $('#overlayModalTroco').addClass('hidden');
        $('#overlayModalTroco').removeClass('flex');


    }

    

    function closeTroco() {

        
        $('#overlayModalTroco').addClass('hidden');
        $('#overlayModalTroco').removeClass('flex');
        $('#pedido_troco_modal').val('')

        $('#pedido_troco').val('')
        $('#troco-label').addClass('hidden');
    }

 

    function addPedido() {


        // Verificações
        const pedido_user =  $('#pedido_user').val()
        const pedido_restaurante =  $('#pedido_restaurante').val()
        const pedido_total = $('#pedido_total').val()
        const pedido_observacoes = $('#pedido_observacoes').val()
        const pedido_pagamento = $('#pedido_pagamento').val()
        const pedido_endereco = $('#pedido_endereco').val()
        const pedido_cidade = $('#pedido_cidade').val()
        const pedido_estado = $('#pedido_estado').val()
        const pedido_cep = $('#pedido_cep').val()
        const pedido_frete = $('#pedido_frete').val() 
        const pedido_troco = $('#pedido_troco').val()

        const pedido_desconto = $('#pedido_desconto').val()
        const pedido_cupom = $('#pedido_cupom').val()


        if (pedido_cidade.length == 0 ) {
            alert('Preencha seu endereço corretamente.')
        } else if (pedido_estado.length == 0 ) {
            alert('Preencha seu endereço corretamente.')
        } else if (pedido_cep.length == 0 ) {
            alert('Preencha seu endereço corretamente.')
        } else if (pedido_endereco.length == 0 ) {
            alert('Preencha seu endereço corretamente.')
        } else if (pedido_pagamento.length == 0 ) {
            alert('Preencha seu método de pagamento.')
        } else {
            $.ajax({
                type: "POST",
                url: '',
                data: {
                    add_pedidos:'.',
                    pedido_total:pedido_total,
                    pedido_pagamento:pedido_pagamento,
                    pedido_endereco:pedido_endereco,
                    pedido_frete:pedido_frete,
                    pedido_observacoes:pedido_observacoes,
                    pedido_restaurante:pedido_restaurante,
                    pedido_user:pedido_user,
                    pedido_cep:pedido_cep,
                    pedido_estado:pedido_estado,
                    pedido_cidade:pedido_cidade,
                    pedido_desconto:pedido_desconto,
                    pedido_cupom:pedido_cupom,
                    pedido_troco:pedido_troco

                }, // serializes the form's elements.
                success: function(data)
                {
                    window.location.href = "./pedidos"
                }

            })
        }

       

    }


 </script>
 <script>

     function setPagamento(v) {
        if (v == "dinheiro") {
            $('#pedido_pagamento').val(v)
            $('#overlayModalTroco').removeClass('hidden');
            $('#overlayModalTroco').addClass('flex');

        } else {
            $('#pedido_pagamento').val(v)
        }
    }


    function trocarEnderecoModal() {
        $('#overlayModalEndereco').addClass('flex');
        $('#overlayModalEndereco').removeClass('hidden');
    }

    function closeEndereco() {
        $('#overlayModalEndereco').addClass('hidden');
        $('#overlayModalEndereco').removeClass('flex');
    }

    function addEndereco() {
        const endereco = $('#pedido_endereco_input').val()
        const cidade = $('#pedido_cidade_input').val()
        const estado = $('#pedido_estado_input').val()
        const cep = $('#pedido_cep_input').val()

       
        if (endereco.length == 0 ) {
            alert('Preencha o endereço corretamente.')
        } else if (cidade.length == 0) {
            alert('Preencha a cidade corretamente.')
        } else if (estado.length == 0) {
            alert('Preencha o estado corretamente.')
        } else if (cep.length == 0) {
            alert('Preencha o CEP corretamente.')
        } else {

            $('#pedido_endereco').val(endereco)
            $('#pedido_cidade').val(cidade)
            $('#pedido_estado').val(estado)
            $('#pedido_cep').val(cep)

            $('#pedido_endereco_view').html(endereco + ", <br>"+cidade+" - "+estado+"<br> CEP: "+cep )

             // Reset
            $('#pedido_endereco_input').val('')
            $('#pedido_cidade_input').val('')
            $('#pedido_estado_input').val('')
            $('#pedido_cep_input').val('')

            // Close
            $('#overlayModalEndereco').addClass('hidden');
            $('#overlayModalEndereco').removeClass('flex');
        }

       
    }

    </script>

<script>
   function getCidades(e) {
       

        $.ajax({
        type: "POST",
        url: '.restaurante/getcidades',
        data: {estado:e}, // serializes the form's elements.
        success: function(data)
        {
            $('#pedido_cidade_input').html("")
            $('#pedido_cidade_input').append(data)
        }
    });
   }
</script>