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


    hr {

        height: 5px;
        margin-top: 15px;
        margin-bottom: 15px;
    }

    input {
        width: 50%;
    }
</style>


<body class="bg-gray-100">
    <section>
        <!-- Início Navbar -->
        <header class="w-full fixed z-50">
        <?php $this->load->view('comp/on/restaurante/navbar_on')?>
        </header>
        <!-- Fim Navbar -->

        <main class="pt-16">
            <div class="grid grid-cols-1 py-5 md:py-14 px-5 md:px-14 lg:px-24 xl:px-32"> 
                <div class="col-span-1 bg-white px-5 py-5 md:px-8 lg:px-14 md:py-8 lg:py-10 h-auto">
                    <h1 class="font-semibold text-xl md:text-2xl text-center md:text-left  ">Horários de Funcioamento</h1>
                    <p class="pb-8">Insira os horários de funcionamento do seu estabelecimento.</p>

                  
<!-- 
                    <div class="flex justify-center">
                        <img class="h-52 w-52 mb-8 rounded-full border-solid border-4 border-green" src="<?=base_url()?>assets/images/avatars/<?=$user['user_imagem']?>" alt=""/>
                    </div> -->

                    <form method="post" enctype="multipart/form-data" action="">
                        <!-- <div class="grid grid-cols-2 pb-5 md:pb-10">
                            <div class="col-span-2">
                                <label for="file" class="font-semibold ">Foto de Perfil</label><br>
                                <input data-mask="99:99" class="pt-2 w-full" type="file" name="user_imagem" accept="image/*"/>
                            </div>
                        </div> -->
                      

                        <div class="grid grid-cols-2 flex">
                            <div class="col-span-2 md:col-span-1 pr-0 md:pr-2.5 lg:pr-5">
                                <label for="nome" class="font-semibold ">Abertura Seg-Sex</label><br>
                                <input data-mask="99:99" type="text" value="<?=$f['funcionamento_seg_sex_abertura']?>"  required name="funcionamento_seg_sex_abertura"  minlength="5"   class="w-1/3 h-12 p-2 mb-5 border border-black focus:outline-none">
                            </div> 
                            
                            <div class="col-span-2 md:col-span-1 pl-0 md:pl-2.5 lg:pl-5">
                                <label for="sobrenome" class="font-semibold ">Fechamento Seg-Sex</label><br>
                                <input data-mask="99:99" type="text"  value="<?=$f['funcionamento_seg_sex_fechamento']?>" name="funcionamento_seg_sex_fechamento"  required  minlength="5" id="sobrenome"  class="w-1/3 h-12 p-2 mb-5 border border-black focus:outline-none">
                            </div>
                        </div>

                        <hr>

                        <div class="grid grid-cols-2 flex justify-center">
                            <div class="col-span-2 lg:col-span-1 md:pl-0 ">
                                <label for="telefone" class="font-semibold ">Abertura Sábado</label><br>
                                <input data-mask="99:99" type="tel" value="<?=$f['funcionamento_sab_abertura']?>" name="funcionamento_sab_abertura" required  minlength="5"     class="w-1/3 h-12 p-2 mb-5 border border-black focus:outline-none">
                            </div>
                            
                            <div class="col-span-2 lg:col-span-1 md:pl-0 lg:pl-5">
                                <label for="telefone" class="font-semibold ">Fechamento Sábado</label><br>
                                <input data-mask="99:99" type="tel" value="<?=$f['funcionamento_sab_fechamento']?>" name="funcionamento_sab_fechamento" required  minlength="5"     class="w-1/3 h-12 p-2 mb-5 border border-black focus:outline-none">
                            </div>
                        </div>

                        <hr>

                        <div class="grid grid-cols-2 flex">
                            <div class="col-span-2 md:col-span-1 pr-0 md:pr-2.5 lg:pr-5">
                                <label for="identidade" class="font-semibold ">Domingo Abertura </label><br>
                                <input data-mask="99:99" type="text"  value="<?=$f['funcionamento_dom_abertura']?>" name="funcionamento_dom_abertura"  required   minlength="5" maxlength="12"    class="w-1/3 h-12 p-2 mb-5 border border-black focus:outline-none">
                            </div>
                            
                            <div class="col-span-2 md:col-span-1 pl-0 md:pl-2.5 lg:pl-5">
                                <label for="nascimento" class="font-semibold ">Domingo Fechamento </label><br>
                                <input data-mask="99:99" type="text"  value="<?=$f['funcionamento_dom_fechamento']?>" name="funcionamento_dom_fechamento"   required   minlength="5" class="w-1/3 h-12 p-2 mb-5 border border-black focus:outline-none">
                            </div>
                        </div>
                        
                        <hr>

                        <div class="grid grid-cols-2 flex">
                            <div class="col-span-2 md:col-span-1 pr-0 md:pr-2.5 lg:pr-5">
                                <label for="identidade" class="font-semibold ">Feriado Abertura</label><br>
                                <input data-mask="99:99" type="text" value="<?=$f['funcionamento_feriado_abertura']?>" name="funcionamento_feriado_abertura"   minlength="5" required   class="w-1/3 h-12 p-2 mb-5 border border-black focus:outline-none">
                            </div>
                            
                            <div class="col-span-2 md:col-span-1 pl-0 md:pl-2.5 lg:pl-5">
                                <label for="nascimento" class="font-semibold ">Feriado Fechamento</label><br>
                                <input data-mask="99:99" type="text" value="<?=$f['funcionamento_feriado_fechamento']?>" name="funcionamento_feriado_fechamento"    minlength="5" required   class="w-1/3 h-12 p-2 mb-5 border border-black focus:outline-none">
                            </div>
                        </div>

                        


                   
 
                    <div class="grid justify-center md:justify-center">
                        <button type="submit" class="w-auto h-12 px-20 mb-5 mt-14 xl:mt-10  bg-green" >
                            <p class="font-semibold uppercase text-white text-xl">CONTINUAR</p>
                        </button>
                    </div>
                    </form>

                </div>
            </div>  
        </main>
    </section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>/assets/js/mascaraCelular.js"></script>
<script type="text/javascript" src="<?=base_url()?>/assets/js/mascaraData.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
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
</body>
</html>