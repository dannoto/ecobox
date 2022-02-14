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


    /* Absolute Center CSS Spinner */
.loading {
  position: fixed;
  z-index: 999;
  height: 2em;
  width: 2em;
  overflow: show;
  margin: auto;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  color:white;
}

/* Transparent Overlay */
.loading:before {
  content: '';
  display: block;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: #6A9F46;
}

/* :not(:required) hides these rules from IE9 and below */
.loading:not(:required) {
  /* hide "loading..." text */
  font: 0/0 a;
  color: transparent;
  text-shadow: none;

  border: 0;
}

.loading:not(:required):after {
  content: '';
  display: block;
  font-size: 10px;
  width: 1em;
  height: 1em;

  margin-top: -0.5em;
  -webkit-animation: spinner 1500ms infinite linear;
  -moz-animation: spinner 1500ms infinite linear;
  -ms-animation: spinner 1500ms infinite linear;
  -o-animation: spinner 1500ms infinite linear;
  animation: spinner 1500ms infinite linear;
  border-radius: 0.5em;

  -webkit-box-shadow: rgba(255,255,255, 0.9) 1.5em 0 0 0, rgba(255,255,255, 0.9) 1.1em 1.1em 0 0, rgba(255,255,255, 0.9) 0 1.5em 0 0, rgba(255,255,255, 0.9) -1.1em 1.1em 0 0, rgba(0, 0, 0, 0.5) -1.5em 0 0 0, rgba(0, 0, 0, 0.5) -1.1em -1.1em 0 0, rgba(255,255,255, 0.9) 0 -1.5em 0 0, rgba(255,255,255, 0.9) 1.1em -1.1em 0 0;
  box-shadow: rgba(255,255,255, 0.9) 1.5em 0 0 0, rgba(255,255,255, 0.9) 1.1em 1.1em 0 0, rgba(255,255,255, 0.9) 0 1.5em 0 0, rgba(255,255,255, 0.9) -1.1em 1.1em 0 0, rgba(255,255,255, 0.9) -1.5em 0 0 0, rgba(255,255,255, 0.9) -1.1em -1.1em 0 0, rgba(255,255,255, 0.9) 0 -1.5em 0 0, rgba(255,255,255, 0.9) 1.1em -1.1em 0 0;
}

/* Animation */

@-webkit-keyframes spinner {
  0% {
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@-moz-keyframes spinner {
  0% {
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@-o-keyframes spinner {
  0% {
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@keyframes spinner {
  0% {
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
</style>


<body class="">
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
            <!-- Início Pesquisa Localização -->
            <div class="grid grid-cols-1 md:grid-cols-6 xl:grid-cols-4 bg-green h-96 items-center justify-center"> 
                <div class="md:col-span-1"></div>
                <div class="col-span-1 md:col-span-4 xl:col-span-2 block items-center justify-center px-5 lg:px-12">
                    <p class="text-2xl lg:text-3xl text-center text-white pb-10">Se você tem <b>EcoBox</b>, você tem tudo.</p>
                    
                    <form>
                        <div class="flex">
                            <div class="absolute z-40 h-12 py-3 px-3">
                                <img class="h-6 w-6" src="<?=base_url()?>assets/images/location.svg" alt="">
                            </div>
                            
                            <input onclick="openLocalizacao()" id="localizacao" type="text" class="h-12 w-full bg-white flex justify-center py-3 pl-12 pr-3 rounded-md placeholder-gray-500 focus:outline-none" placeholder="Entregar em...">
                        </div>
                    </form>

                    <div class="flex pt-3">
                        <spán onclick="openLocalizacao()" class="flex space-x-2 items-center" >
                            <img class="h-5" src="<?=base_url()?>assets/images/my-location.svg" alt="">
                            <p class="text-base cursor-pointer text-center text-white">Informar localização </p>
</span>
                    </div>
                </div>

                <div class="md:col-span-1"></div>
            </div>  
            <!-- Fim Pesquisa Localização -->

            <!-- Início Slide Categorias -->
            <div>
                <?php $this->load->view('comp/on/user/slideCategorias')?>
            </div>
            <!-- Fim Slide Categorias -->

            <!-- Início Slide Banners -->
            <div>
                <?php $this->load->view('comp/on/user/slideBannerHome')?>
            </div> 
            <!-- Fim Slide Banners -->


            <!-- Início Restaurantes Perto de Você -->
            <?php if ( !isset($_COOKIE['setLocation']) || $_COOKIE['setLocation'] == "false" ) { ?>


            <?php } else {?>
                <div>
                    <?php $this->load->view('comp/on/user/restaurantes_location')?>
                </div>
           <?php } ?>

           
            <!-- Fim Restaurantes Perto de Você -->

            <!-- Início Restaurantes -->
            <div>
                <?php $this->load->view('comp/on/user/restaurantes')?>
            </div>
            <!-- Fim Restaurantes -->
        </main>
    </section>


   <!-- MODAL LOCALIZAÇÃO -->
   <div id="overlayModalLocalizacao" class="hidden bg-black bg-opacity-75 xl:p-0 p-3 fixed inset-0 justify-center items-center z-50">
                                <div class="bg-green bg-green w-11/1 rounded-md 2 lg:w-4/6 xl:w-1/3 ">
                                    <div class="flex justify-between items-center    py-3 p-3 ">

                                    <div>
                                    <span class="text-white text-base sm:text-lg font-semibold">LOCALIZAÇÃO</span><br>
                                    <span class="text-white text-sm ">Forneça a localização para melhorar sua experiência.</span>
                                    </div>
                                 
                                     
                                      
                                      
                                        <span onclick="closeLocalizacao()" style="font-size:30px;cursor:pointer;margin-right:15px" class="font-semibold text-white ">x</span>
                                    </div>

                                    <div class="pl-5 pr-5 bg-green pt-2">
                                    <div>
                                   
                                    </div>
                                        <p  class="uppercase mb-2font-semibold text-white"> Endereço Completo</p>
                                        <input type="text" required  id="pedido_endereco_input" maxlength="200" class="border w-full border-gray-500 h-12 p-2">

                                        <div class="grid xl:grid-cols-1 grid-cols-1 mt-5">
                                            <div class="span-col-1 ">

                                                <label class="uppercase font-semibold text-white" for="">Estado</label><Br>
                                                <select onchange="getCidades(this.value)" required id="pedido_estado_input" class="w-full h-12 p-2">
                                                    <option disabled selected value >SELECIONAR </option>
                                                    <?php foreach ($estados as $e) {  ?>
                                                            <option value="<?=$e->Uf?>"><?=$e->Nome?></option>
                                                           <?php }  ?>
                                                </select>

                                              
                                            </div>
                                            <div class="span-col-1 xl:pt-0 mt-3">
                                                <label class="uppercase font-semibold text-white" for="">Cidade</label>
                                                <select  required id="pedido_cidade_input" class="w-full h-12 p-2" >
                                                    <option disabled selected value >SELECIONAR </option>
                                                </select>
                                               
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-2 mt-5">
                                            <div class="span-col-1">
                                            <label class="uppercase font-semibold text-white" for="">CEP</label><Br>
                                                <input type="text" data-mask="99999-990" id="pedido_cep_input" required  class="border border-gray-500 h-12 p-2" maxlength="200" autocomplete="off" id="estado">
                                            </div>
                                           
                                        </div>
                                    </div>
                                
                                        <div class="flex justify-end space-x-4 px-6 py-3">
                                            <button  onclick="closeLocalizacao()"  class="px-4  p-3 rounded-lg text-white  hover:text-white mr-2">Informar depois</button>
                                            <button onclick="addLocalizacao()" class="px-4 bg-green p-3 text-white text-white hover:bg-green ">SALVAR</button>
                                        </div>

                                 

                                </div>
                            </div>
                        <!-- MODAL LOCALIZAÇÃO -->




                   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="<?=base_url()?>/assets/slider/slick/slick.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script type="text/javascript" src="<?=base_url()?>/assets/js/slideCategorias.js"></script>
    <script type="text/javascript" src="<?=base_url()?>/assets/js/slideRestaurantesHome.js"></script>
    <!-- <script type="text/javascript" src="<?=base_url()?>/assets/js/slideBannerHome.js"></script> -->
    <script>
        $('.bannersHome').slick({
            dots: false,
            prevArrow: '<button type="button" class="slick-prev justify-center flex">Previous</button>',
            nextArrow: '<button type="button" class="slick-next justify-center flex">Next</button>',
            infinite: false,
            speed: 300,
            slidesToShow: 3,
            slidesToScroll: 1,
            responsive: [
            {
                breakpoint: 1024,
                settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
                dots: false,
                infinite: false
                }
            },
            {
                breakpoint: 640,
                settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                dots: true,
                infinite: true,
                autoplay: true,
                autoplaySpeed: 4000,
                }
            }
            ]
        });
  
    </script>

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
    // navigator.geolocation.getCurrentPosition(onPositionUpdate);

   
 

        // $('body').removeClass('hidden');
        //    setTimeout(function(){
        //     $('.loading').removeClass('loading');
        //    }, 1000);


        //Check Location Cookie
        if (getCookie('setLocation') != null ) {
            
            const endereco = getCookie('endereco')
            const cidade = getCookie('cidade')
            const estado = getCookie('estado')
            const cep = getCookie('cep')
           
            $('#localizacao').val(endereco+", "+cidade+"/"+estado)
            
        } else {
           
            $('#overlayModalLocalizacao').addClass('flex');
            $('#overlayModalLocalizacao').removeClass('hidden');
        }
        
     

});



   


function onPositionUpdate(position) {
    var lat = position.coords.latitude;
    var lon = position.coords.longitude;
    
    setCookie('longitude',lon, 30)
    setCookie('latitude',lat, 30)

    
}
</script>



</body>
<!-- <div class="loading">&#8230;</div> -->
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

<script>
    
    function openLocalizacao() {
        $('#overlayModalLocalizacao').addClass('flex');
        $('#overlayModalLocalizacao').removeClass('hidden');
    }

    function closeLocalizacao() {



        $('#overlayModalLocalizacao').addClass('hidden');
        $('#overlayModalLocalizacao').removeClass('flex');
    }

    function addLocalizacao() {
  
        const estado= $('#pedido_estado_input').val()
        const cidade = $('#pedido_cidade_input').val()
        const cep = $('#pedido_cep_input').val()
        const endereco = $('#pedido_endereco_input').val()


        

        if (cep.length != 9 ) {
            alert('Informe o CEP corretamente.')
        } else if (endereco.length == 0 ) {
            alert('Informe o Endereço corretamente.')
        } else if (estado == null ) {
            alert('Informe a Estado corretamente.')
        } else if (cidade == null ) {
            alert('Informe o Cidade corretamente.')
        } else {
            
            setCookie('setLocation','true','30')

            setCookie('estado', estado,'30')
            setCookie('cidade', cidade,'30')
            setCookie('cep',cep,'30')
            setCookie('endereco',endereco,'30')

            $('#overlayModalLocalizacao').addClass('hidden');
            $('#overlayModalLocalizacao').removeClass('flex');
            $('#localizacao').val(endereco+", "+cidade+"/"+estado)

            location.reload()
        }

    }




    </script>

  <script>

      function useCupom(id) {
          
        setCookie('cupom',id,'30')

        window.location.href = "<?=base_url()?>carrinho"
      }

  </script>
</html>


