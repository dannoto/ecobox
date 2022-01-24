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


<body class="bg-gray-100">
    <section>
        <!-- Início Navbar -->
        <header class="w-full fixed z-50">
            <?php $this->load->view('comp/on/restaurante/navbar_pendente')?>
        </header>
        <!-- Fim Navbar -->

        <main class="pt-16">
            <div class="grid grid-cols-1 py-5 md:py-14 px-5 md:px-14 lg:px-24 xl:px-32"> 
                <div class="col-span-1 bg-white px-5 py-5 md:px-8 lg:px-14 md:py-8 lg:py-10 h-auto">
                    <h1 class="font-semibold text-xl md:text-2xl text-center md:text-left text-gray-700 ">Crie seu Restaurante</h1>
                    <p class="pb-8">Insira as informações da sua restaurante</p>

                  
<!-- 
                    <div class="flex justify-center">
                        <img class="h-52 w-52 mb-8 rounded-full border-solid border-4 border-green" src="<?=base_url()?>assets/images/avatars/<?=$user['user_imagem']?>" alt=""/>
                    </div> -->

                    <form method="post" enctype="multipart/form-data" action="">
                        <!-- <div class="grid grid-cols-2 pb-5 md:pb-10">
                            <div class="col-span-2">
                                <label for="file" class="font-semibold text-gray-700">Foto de Perfil</label><br>
                                <input class="pt-2 w-full" type="file" name="user_imagem" accept="image/*"/>
                            </div>
                        </div> -->
                      

                        <div class="grid grid-cols-2 flex">
                            <div class="col-span-2 md:col-span-1 pr-0 md:pr-2.5 lg:pr-5">
                                <label for="nome" class="font-semibold text-gray-700">Nome do Restaurante</label>
                                <input type="text"  required name="restaurante_nome" maxlength="200"  class="w-full h-12 p-2 mb-5 border-2 border-opacity-50 border-gray-700 rounded-md focus:outline-none">
                            </div> 
                            
                            <div class="col-span-2 md:col-span-1 pl-0 md:pl-2.5 lg:pl-5">
                                <label for="sobrenome" class="font-semibold text-gray-700">Seleciona e Imagem do Restaurante</label>
                                <input type="file" name="restaurante_imagem" accept="image/png"  required class="w-full h-12 p-2 mb-5 border-2 border-opacity-50 border-gray-700 rounded-md focus:outline-none">
                            </div>
                        </div>
                        <br><br>
                        <div class="grid grid-cols-2 flex">
                            <div class="col-span-2 lg:col-span-1 md:pl-0 ">
                                <label for="telefone" class="font-semibold text-gray-700">Telefone do Restaurante</label>
                                <input type="tel" name="restaurante_telefone" required  data-mask="(00) 0 0000-0000" minlength="16"  maxlength="16" autocomplete="off" class="w-full h-12 p-2 mb-5 border-2 border-opacity-50 border-gray-700 rounded-md focus:outline-none">
                            </div>
                            
                            <div class="col-span-2 lg:col-span-1 md:pl-0 lg:pl-5">
                                <label for="telefone" class="font-semibold text-gray-700">Endereço do Restaurante</label>
                                <input type="text" name="restaurante_endereco" required  maxlength="200" class="w-full h-12 p-2 mb-5 border-2 border-opacity-50 border-gray-700 rounded-md focus:outline-none">
                            </div>
                        </div>

                        <div class="grid grid-cols-2 flex mt-3">
                            <div class="col-span-2 md:col-span-1 pr-0 md:pr-2.5 lg:pr-5">
                                <label for="telefone" class="font-semibold text-gray-700">Estado</label><Br>
                               <select  name="restaurante_estado" onchange="getCidades(this.value)" required  class="w-full h-12 pl-3 " >
                               <option disabled selected value >SELECIONAR OPÇÃO</option>
                               <?php foreach ($estados as $e) {  ?>
                                    <option value="<?=$e->Uf?>"><?=$e->Nome?></option>
                                    <?php }  ?>
                               </select>
                            </div>

                            <div class="col-span-2 md:col-span-1 pr-0 md:pr-2.5 lg:pr-5 lg:pl-5  pt-3 xl:pt-0">
                                <label for="telefone" required class="font-semibold text-gray-700">Cidade</label><br>

                                <select name="restaurante_cidade" required id="cidades" class="w-full h-12 pl-2" >
                                 
                                <option disabled selected value >SELECIONAR OPÇÃO</option>
                                </select>
                            </div>
                            
                            
                        </div>
                        <br><br>
                        <div class="grid grid-cols-2 flex mt-3">
                            <div class="col-span-2 md:col-span-1 pr-0 md:pr-2.5 lg:pr-5">
                                <label for="identidade" class="font-semibold text-gray-700">Tipo de Comida</label><br>
                                <select name="restaurante_categoria" required class="w-full h-12 pl-2 uppercase" >
                                    <option disabled selected value  >SELECIONAR OPÇÃO</option>
                                    <?php foreach ($categorias as $c) {  ?>
                                        <option class="uppercase" value="<?=$c->id?>"><?=$c->cat_nome?></option>
                                    <?php }  ?>
                               </select>
                                </select>
                               
                            </div>
                            
                            <div class="col-span-2 md:col-span-1 pl-0 md:pl-2.5 lg:pl-5">
                                <label for="nascimento" class="font-semibold text-gray-700">Tempo de Preparo Médio [Em minutos]</label>
                                <input type="number" name="restaurante_preparo_medio" data-mask="00" required minlength="1"  maxlength="2" class="w-full h-12 p-2 mb-5 border-2 border-opacity-50 border-gray-700 rounded-md focus:outline-none">
                            </div>
                        </div>

                        <div class="grid grid-cols-2 flex">
                            <div class="col-span-2 md:col-span-1 pr-0 md:pr-2.5 lg:pr-5">
                                <label for="identidade" class="font-semibold text-gray-700">CNPJ do Restaurante</label>
                                <input type="text" name="restaurante_cnpj" inputmode="number" required data-mask="00.000.000.0000/00" minlength="18"  maxlength="18"  class="w-full h-12 p-2 mb-5 border-2 border-opacity-50 border-gray-700 rounded-md focus:outline-none">
                            </div>
                            
                            <div class="col-span-2 md:col-span-1 pl-0 md:pl-2.5 lg:pl-5">
                                <label for="nascimento" class="font-semibold text-gray-700">Razão Social</label>
                                <input type="text" name="restaurante_razao_social"  maxlength="200" required  class="w-full h-12 p-2 mb-5 border-2 border-opacity-50 border-gray-700 rounded-md focus:outline-none">
                            </div>
                        </div>

                                <br>
                        <h1 class="font-semibold text-xl md:text-2xl text-center md:text-left text-gray-700 ">Informações do representante legal</h1>
                                <Br>
                        <div class="grid grid-cols-2 flex">
                            <div class="col-span-2 md:col-span-1 pr-0 md:pr-2.5 lg:pr-5">
                                <label for="identidade" class="font-semibold text-gray-700">Nome</label>
                                <input type="text" required name="restaurante_representante_nome" maxlength="200"   class="w-full h-12 p-2 mb-5 border-2 border-opacity-50 border-gray-700 rounded-md focus:outline-none">
                            </div>
                            
                            <div class="col-span-2 md:col-span-1 pl-0 md:pl-2.5 lg:pl-5">
                                <label for="nascimento" class="font-semibold text-gray-700">Sobrenome</label>
                                <input type="text" required name="restaurante_representante_sobrenome"  maxlength="200"  class="w-full h-12 p-2 mb-5 border-2 border-opacity-50 border-gray-700 rounded-md focus:outline-none">
                            </div>
                        </div>

                        <div class="grid grid-cols-2 flex">
                            <div class="col-span-2 md:col-span-1 pr-0 md:pr-2.5 lg:pr-5">
                                <label for="identidade" class="font-semibold text-gray-700">CPF do Representante</label>
                                <input type="text" required name="restaurante_representante_cpf"  data-mask="000.000.000-00" minlength="14"  maxlength="14"  class="w-full h-12 p-2 mb-5 border-2 border-opacity-50 border-gray-700 rounded-md focus:outline-none">
                            </div>
                   
                        </div>


                   
 
                    <div class="grid justify-center md:justify-center">
                        <button type="submit" class="w-auto h-12 px-20 mb-5 mt-14 xl:mt-10 rounded-md bg-green" >
                            <p class="font-semibold text-white text-xl">CONTINUAR</p>
                        </button>
                    </div>
                    </form>

                </div>
            </div>  
        </main>
    </section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>/assets/js/mascaraCelular.js"></script>
<script type="text/javascript" src="<?=base_url()?>/assets/js/mascaraData.js"></script>
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