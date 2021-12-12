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
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/2.8.0/alpine.js"></script>

   
</head>


<body>

<div x-data="{ sidebarOpen: false }" class="flex overflow-x-hidden h-screen">
  <aside class="flex-shrink-0 w-64 flex flex-col border-r transition-all duration-300" :class="{ '-ml-64': !sidebarOpen }">
    <div class="h-64 bg-gray-900"></div>
    <nav class="flex-1 flex flex-col bg-white">
      <a href="#" class="p-2">Nav Link 1</a>
      <a href="#" class="p-2">Nav Link 2</a>
      <a href="#" class="p-2">Nav Link 3</a>
    </nav>
  </aside>
  <div class="flex-1">
    <header class="grid md:grid-cols-10  grid-cols-4 items-center h-16 text-semibold text-gray-100 border-b border-gray-200 ">
      <div class="col-span-1 md:border-r border-gray-500 border-opacity-20 grid justify-items-center ">
            <button class="p-1  " @click="sidebarOpen = !sidebarOpen">
                <svg style="height: 50px;" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6 text-gray-600">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
      </div>
      <div class="md:col-span-3 col-span-2  grid justify-items-center ml-5  md:border-r border-gray-500 border-opacity-20 ">
            <img src="<?=base_url()?>assets/images/logo.png" alt="">
      </div>
      <!-- <div class="col-span-5 w-full    border-r border-gray-500 border-opacity-20  md:visible invisible"> 
        
            <form class=" w-full grid justify-items-center ">
              
                  
                    <div class="flex ">
                        
                        <input type="text"  class=" bg-gray-100 h-12 p-3" placeholder="Pesquise no Ecobox...">

                        <div class="w-12 flex items-center justify-center bg-green rounded text-blue-dark">
                            <ion-icon name="search" style="font-size: 25px;" class="text-white "></ion-icon>
                        </div>

                    </div>
            </form>
      </div> -->
      <!-- <div class="col-span-1 grid justify-items-center  md:visible invisible" >
            <ion-icon name="cart" style="font-size: 35px;" class="text-green "></ion-icon>
      </div> -->
      
      <!-- mobile account -->
      <div class="col-span-1  md:hidden grid justify-items-center">
            <img src="<?=base_url()?>assets/images/avatar.png" alt="">
      </div>
      
      
    </header>
    <main class="h-full">
            <div class="bg-green h-96  items-center justify-center">
               
                <div class="block ">
                    <p  class=" text-xl text-center">Se você tem EcoBox, você tem tudo.</p>
                </div>
                <div class=" block grid justify-items-center w-full">
                   
                        <form  >
                            <input type="text"  class="border-1 border-gray-400 bg-gray-100 h-12 " placeholder="Onde você deseja receber seu pedido?">
                        </form>
                   
                </div>
                <div class="block ">
                    <div class="inline-block ">
                        <span  class="text-center">Usar minha localização</span>
                    </div>
                    <div  class="inline-block ">
                        <span class="text-center">Fazer Login</span>
                    </div>
                </div>
            </div>  
    
    </main>
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
