<!DOCTYPE html>
<html lang="p-br">

<head> 

    <title>Recuperação</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Courseplus is - Professional A unique and beautiful collection of UI elements">
    <link href="<?=base_url()?>/assets/images/favicon.png" rel="icon" type="image/png">
    <link rel="stylesheet" href="<?=base_url()?>/assets/css/main.css">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

   
</head>

<body>
<!-- 
    <div class="">
        <div>
            <p>Voltar</p>
        </div>
    </div> -->
    <div class="grid md:grid-cols-6 grid-cols-6 border-b border-gray-400 border-opacity-50 h-16">
        <div class="col-span-1 md:col-span-2   ">
          
            <div class="  grid justify-items-center ">
                <a href="<?=base_url()?>login" >
                    <ion-icon style="font-size: 35px;padding-top:12px" name="chevron-back-outline"   ></ion-icon>
                    <span  style="padding-bottom:20px"  class="md:visible invisible text-left text-sm font-semibold  ">VOLTAR</span>
                </a>
                   
               
                    
            </div>
            
    
        </div>
        <div class="col-span-5 md:col-span-4 grid justify-items-center p-3">
            <img class="md:invisible visible mr-14" src="<?=base_url()?>assets/images/logo.png" alt="">
        </div>
    </div>

    <div class="grid  md:grid-cols-5 grid-cols-1 h-auto  ">

    <div class="col-span-1 "></div>
    <div class="col-span-3  grid justify-items-center">
                <p class="font-semibold text-grey md:pt-12 pt-12 md:text-4xl text-xl ">Recuperação</p>
                <p class="font text-grey  pt-1 md:text-base text-base ">Insira seu e-mail para recuperar sua senha.</p>


                <form action="" class="md:grid grid-cols-1 md:p-48 md:pt-12  p-12 w-full  ">
                    
                    <label for="email" class="font-semibold ">E-mail</label>
                    <input type="email" name="email" id="email" class="col-span-1 w-full h-12 p-4 border-2 border-opacity-25 border-gray-700  rounded-md mb-5"  required maxlength="200" id="email" >
                    
              

                    <!-- <a class="md:p-5 md:pl-0 " href="">
                        <p>Recuperar minha Senha</p>
                    </a> -->
                   

                    <button type="submit" class="mt-5 h-12 rounded-md w-full  bg-green " >
                        <p class="font-semibold text-white md:text-xl text-lg">ENVIAR</p>
                    </button>
                </form>

    </div>
    <div class=" col-span-1 "></div>

    </div>

      

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="<?=base_url()?>/assets/js/uikit.js"></script>
    <script src="<?=base_url()?>/assets/js/tippy.all.min.js"></script>
    <script src="<?=base_url()?>/assets/js/simplebar.js"></script>
    <script src="<?=base_url()?>/assets/js/custom.js"></script>
    <script src="<?=base_url()?>/assets/js/bootstrap-select.min.js"></script>
    <script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
 
</body>

</html>
