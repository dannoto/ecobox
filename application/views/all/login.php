<!DOCTYPE html>
<html lang="p-br">

<head> 

    <title>Login</title>
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
    <div class="md:grid grid-cols-2 ">
        <div style="background-image: url('./assets/images/bg-login.png');object-fit:cover; background-position:right; background-repeat:no-repeat" class="cold-span-1 lg:block hidden  sm:block hidden bg-yellow-500 h-screen">

        </div>
        <div class="cold-span-1  h-screen">
            <div class="md:grid grid justify-items-center md:p-28 p-12   ">

                <p class="font-semibold text-grey text-4xl p-5 mb-12 md:mb-5">Fazer Login</p>

                <form action="" class="md:grid grid-cols-1   w-full  ">
                    <label for="email" class="font-semibold ">E-mail</label>
                    <input type="email" name="email" id="email" class="col-span-1 w-full h-12 p-4 border-2 border-opacity-25 border-gray-700  rounded-md mb-5"  required maxlength="200" id="email" >
                    <label for="password" class="font-semibold" >Senha</label>
                    <input type="password" name="password" id="pasword" class="w-full col-span-1 h-12 p-4 border-2 border-opacity-25 border-gray-700  rounded-md mb-5"  required maxlength="200" id="email" >

                    <a class="md:p-5 md:pl-0 " href="">
                        <p>Recuperar minha Senha</p>
                    </a>

                    <button type="submit" class="mt-5 h-12 rounded-md w-full  bg-green " >
                        <p class="font-semibold text-white text-xl">Entrar</p>
                    </button>
                </form>

            </div>
        </div>
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
