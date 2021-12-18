<!DOCTYPE html>
<html lang="pt-br">

<head> 
    <title>Ecobox - Inscrição de Restaurante</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?=base_url()?>/assets/css/main.css">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="icon" href="<?=base_url()?>/assets/images/favicon.jpg">
</head>

<body class="bg-gray-100">
  
    <div class="grid lg:grid-cols-4 col-span-1">
        <!-- Sidebar -->
        <div class="grid col-span-1 bg-white hidden lg:block ">
           
            <div class="w-full border-b border-gray-200 flex p-3  space-x-2 ">
                <p class="rounded-full bg-green py-3 px-5 text-white">1</p>
                <p class="text-lg py-2">Informações Básicas</p>
            </div>
            <div class="w-full border-b border-gray-200 flex p-3 space-x-2 ">
                <p class="rounded-full bg-green-80 py-3 px-5 text-white">1</p>
                <p class="text-lg py-2">Termos</p>
            </div>
            <div class="w-full border-b border-gray-200 flex p-3 space-x-2 ">
                <p class="rounded-full bg-green-80 py-3 px-5 text-white">1</p>
                <p class="text-lg py-2">Horário de Funcionamento</p>
            </div>
            <div class="w-full border-b border-gray-200 flex p-3 space-x-2 ">
                <p class="rounded-full bg-green-80 py-3 px-5 text-white">1</p>
                <p class="text-lg py-2">Documentação</p>
            </div>
            <div class="w-full border-b border-gray-200 flex p-3 space-x-2 ">
                <p class="rounded-full bg-green-80 py-3 px-5 text-white">1</p>
                <p class="text-lg py-2">Aprovação</p>
            </div>
        </div>
        <!-- Fim Sidebar -->

        <!-- Container -->
        <div class="grid pt-0 p-5 lg:col-span-3 col-span-1 ">

            <div class="bg-white lg:mt-0 mt-12">
                <!-- Titulo -->
                <div class="lg:mt-0 mt-5">
                    <p class="text-xl text-black pb-0 p-5 font-semibold">Crie seu Restaurante</p>
                    <p class="mt-1 pl-5">Insira as informações da sua restaurante.</p>
                </div>
                <!-- Fim Titulo -->

                <!-- Form -->
                <form action="" autocomplete="off" method="POST">

                    <div class="grid md:grid-cols-2 p-5">
                        <div class="grid md:col-span-1">
                            <label class="mt-2" for="">Nome do Restaurante</label>
                            <input type="text" class="lg:w-5/6 w-full p-3 mt-2 border border-gray-300 h-12 focus:outline-none"  >
                        </div>
                        <div class="grid md:col-span-1">
                            <label class="mt-2" for="">Selecione a Imagem do Restaurante</label>
                            <input type="text" class="lg:w-5/6 w-full p-3 mt-2 border border-gray-300 h-12 focus:outline-none" >
                        </div>
                    </div>

                    <div class="grid md:grid-cols-2 pt-0 p-5">
                        <div class="grid md:col-span-1">
                            <label class="mt-2" for="">Telefone do Restaurante</label>
                            <input type="text" class="lg:w-5/6 w-full p-3 mt-2 border border-gray-300 h-12 focus:outline-none"  >
                        </div>
                        <div class="grid md:col-span-1">
                            <label class="mt-2" for="">Endereço do Restaurante</label>
                            <input type="text" class="lg:w-5/6 w-full p-3 mt-2 border border-gray-300 h-12 focus:outline-none" >
                        </div>
                    </div>

                    <div class="grid md:grid-cols-2 pt-0 p-5">
                        <div class="grid md:col-span-1">
                            <label class="mt-2" for="">Tipo de Comida</label>
                            <input type="text" class="lg:w-5/6 w-full p-3 mt-2 border border-gray-300 h-12 focus:outline-none"  >
                        </div>
                        <div class="grid md:col-span-1 flex">
                            <label class="mt-2" for="">Tempo de Preparo Médio <small>[MINUTOS]</small></label>
                            <input type="number" class="lg:w-1/6 w-full p-3 mt-2 border border-gray-300 h-12 focus:outline-none" >
                           
                        </div>
                    </div>

                    <div class="grid md:grid-cols-2 pt-0 p-5">
                        <div class="grid md:col-span-1">
                            <label class="mt-2" for="">Pessoa Jurídica</label>
                            <input type="text" class="lg:w-5/6 w-full p-3 mt-2 border border-gray-300 h-12 focus:outline-none"  >
                        </div>
                        <div class="grid md:col-span-1">
                            <label class="mt-2" for="">Tipo de Documento</label>
                            <input type="text" class="lg:w-5/6 w-full p-3 mt-2 border border-gray-300 h-12 focus:outline-none" >
                        </div>
                    </div>
                    
                    <div class="grid md:grid-cols-2 pt-0 p-5">
                        <div class="grid md:col-span-1">
                            <label class="mt-2" for="">Razão Social</label>
                            <input type="text" class="lg:w-5/6 w-full p-3 mt-2 border border-gray-300 h-12 focus:outline-none"  >
                        </div>
                       
                    </div>
                    
                    <hr>

                    <div class="lg:mt-0 mt-5">
                    <p class="text-xl text-black pb-0 p-5 font-semibold">Informações do representante legal</p>

                    <div class="grid md:grid-cols-2 p-5">
                        <div class="grid md:col-span-1">
                            <label class="mt-2" for="">Nome </label>
                            <input type="text" class="lg:w-5/6 w-full p-3 mt-2 border border-gray-300 h-12 focus:outline-none"  >
                        </div>
                        <div class="grid md:col-span-1">
                            <label class="mt-2" for="">Sobrenome</label>
                            <input type="text" class="lg:w-5/6 w-full p-3 mt-2 border border-gray-300 h-12 focus:outline-none" >
                        </div>
                    </div>
                    <div class="grid md:grid-cols-2 p-5">
                        <div class="grid md:col-span-1">
                            <label class="mt-2" for="">Documento </label>
                            <input type="text" class="lg:w-5/6 w-full p-3 mt-2 border border-gray-300 h-12 focus:outline-none"  >
                        </div>
                        
                    </div>


                    <div class="flex  mt-12 mb-12 justify-center">
                        <button class="bg-green text-xl px-12 py-2 text-white ">
                            CONTINUAR
                        </button>

                    </div>
                </div>

                </form>
                <!-- Fim Form -->
            </div>
        </div>
        <!-- Fim Container -->

    </div>
</body>

</html>
