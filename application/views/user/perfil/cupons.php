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
            <?php $this->load->view('comp/on/user/navbar_on')?>
        </header>
        <!-- Fim Navbar -->

        <main class="pt-16">
          
            <div class="grid grid-cols-1 py-5 md:py-14 px-5 md:px-14 lg:px-24 xl:px-32"> 
                <div class="col-span-1 bg-white px-5 py-5 md:px-8 lg:px-14 md:py-8 lg:py-10 h-auto">
                    <h1 class="font-semibold text-xl md:text-2xl text-center md:text-left text-gray-700 pb-10">Meus Cupons</h1>

                   
                <?php if (count($this->cupom_model->getCupons() ) > 0  ) { ?>
                    <div class="grid xl:grid-cols-2 grid-cols-1 space-x-2">
                    <?php foreach($this->cupom_model->getCupons() as $c) { ?>
                     
                            <div class="flex span-col-1 border border-gray-100 xl:mt-0 mt-5  ">
                                <img src="<?=base_url()?>assets/images/cupom.png" alt="">
                                <div class="ml-5">
                                    <h1 >COMPRAS ACIMA DE <span class="font-semibold">R$ <?=$c->cupom_limite?></span></h1>
                                    <h1 class="text-xl font-semibold text-green"> <?=$c->cupom_limite?>% DE DESCONTO</h1>
                                    <br>
                                    <button onclick="useCupom(this.id)" id=" <?=$c->id?>"  class="bg-green  text-white font-semibold text-center py-3 px-2">USAR AGORA</button>
                                </div>
                            </div>
                        
                    <?php }?>
                    </div>
                <?php  } else  { ?>

                    <div class="flex justify-center items-center border border-gray-400 h-12">
                        <p class="font-semibold">NENHUM CUPOM DISPONÍVEL.</p>
                    </div>
                <?php  } ?>
             
                </div>
            </div>  
        </main>
    </section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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

    function updateStatus(id){
      
        $.ajax({
            type: "POST",
            url: '',
            data: {update_status:'.',pedido_id:id,pedido_status:'3'}, // serializes the form's elements.
            success: function(data)
            {
                location.reload()
            }
        })

    }
</script>


</body>
</html>