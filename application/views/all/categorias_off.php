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
            
                        <!-- MODAL LOCALIZAÇÃO -->
                            <div id="overlayModalLocalizacao" class="hidden bg-black bg-opacity-75 xl:p-0 p-3 fixed inset-0 justify-center items-center z-50">
                                <div class="bg-green bg-green w-11/1 rounded-md 2 lg:w-4/6 xl:w-1/3 ">
                                    <div class="flex justify-between items-center    py-3 p-3 ">

                                    <div>
                                    <span class="text-white text-base sm:text-lg font-semibold">LOCALIZAÇÃO</span><br>
                                    <span class="text-white text-sm ">Forneça a localização para melhorar sua experiência.</span>
                                    </div>
                                 
                                     
                                      
                                      
                                        <!-- <span onclick="closeLocalizacao()" style="font-size:30px;cursor:pointer;margin-right:15px" class="font-semibold text-white ">x</span> -->
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
                                            <!-- <button  onclick="closeLocalizacao()"  class="px-4  p-3 rounded-lg text-white  hover:text-white mr-2">Informar depois</button> -->
                                            <button onclick="addLocalizacao()" class="px-4 bg-green p-3 text-white text-white hover:bg-green ">SALVAR</button>
                                        </div>

                                 

                                </div>
                            </div>
                        <!-- MODAL LOCALIZAÇÃO -->
                
        </main>

       

    
    </section>

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

    </script>
    <script>
        function getCidades(e) {
         

                    $.ajax({
                    type: "POST",
                    url: '../restaurante/getcidades',
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

        $(document).ready(function() {
            openLocalizacao()
        });
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

                    location.reload()
                  
                }

            }
        </script>

</html>


