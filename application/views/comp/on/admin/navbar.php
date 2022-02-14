<style>
    .menuItens:hover {
        color: #6A9F46;
    }
</style>

<!-- Início Navbar -->
<nav class="grid grid-cols-12 md:grid-cols-12 items-center border-b border-gray-200 border-opacity-50 shadow h-16 bg-white relative">
    <!-- Início Btn Menu -->
    <div class="col-span-2 md:col-span-1 flex justify-center items-center">
        <button id="btnMenu">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6 text-gray-700">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </button>
    </div>
    <!-- Fim Btn Menu -->

    <!-- Início Logo -->
    <div class="col-span-8 md:col-span-5 flex justify-center md:justify-start items-center">
        <a href="<?=base_url()?>admin/dashboard">
            <img class="h-14 py-1" src="<?=base_url()?>assets/images/logo.png" alt="">
        </a>
    </div>
    <!-- Fim Logo -->

  

   
</nav>
<!-- Fim Navbar -->


    <!-- Início Menu -->
    <div id="overlay" class="fixed hidden justify-center items-center inset-t-16 z-50 left-0 w-10/12 md:w-5/12 lg:w-4/12 xl:w-3/12">
        <div class="bg-white h-screen shadow-xl">
            <!-- Início Barra Pesquisa Navbar -->
           
           
     
  
    
           
            <!-- Fim Barra Pesquisa Navbar -->
       
                    <div class=" space-x-3 items-center px-5 py-5">
                       <center>
                       <img style="object-fit: cover;" class="w-28 h-28 rounded-full border-solid border-2 border-green" src="<?=base_url()?>assets/images/avatars/admin.jpg" alt="">
                        <h1 class="font-semibold text-gray-700 text-base"><?=$this->session->userdata('session_admin')['admin_nome']?> </h1>
                       </center>
                    </div>

                    <div class="menu px-5">
                        <ul>
                            <li class="pb-1"><a class="menuItens text-gray-700 text-base" href="<?=base_url()?>admin/dashboard">Dashboard</a></li>
                            <li class="pb-1"><a class="menuItens text-gray-700 text-base" href="<?=base_url()?>admin/usuarios">Usuários</a></li>
                            <li class="pb-1"><a class="menuItens text-gray-700 text-base" href="<?=base_url()?>admin/restaurantes">Restaurantes</a></li>
                            <li class="pb-1"><a class="menuItens text-gray-700 text-base" href="<?=base_url()?>admin/categorias">Categorias</a></li>
                            <li class="pb-1"><a class="menuItens text-gray-700 text-base" href="<?=base_url()?>admin/Cupons">Cupons</a></li>
                            <li class="pb-1"><a class="menuItens text-gray-700 text-base" href="<?=base_url()?>admin/ajuda">FAQ</a></li>
                            <li class="pb-1"><a class="menuItens text-gray-700 text-base" href="<?=base_url()?>admin/termos">Termos</a></li>
                            <li class="pb-1"><a class="menuItens text-gray-700 text-base" href="<?=base_url()?>admin/privacidade">Privacidade</a></li>
                            <li class="pb-1"><a class="menuItens text-gray-700 text-base" href="<?=base_url()?>admin/gerentes">Gerentes</a></li>
                            <li class="pb-1"><a class="menuItens text-gray-700 text-base" href="<?=base_url()?>admin/vendas">Vendas</a></li>
                   
                            <li class="pb-1"><a class="menuItens text-gray-700 text-base" href="<?=base_url()?>admin/logout" >Sair</a></li>
                        </ul>
                    </div>
                    
                    <h1 class="text-gray-700 text-base font-semibold pt-8 pb-1 px-5 border-b border-gray-200 border-opacity-75">Outros</h1>

                    <div class="menu px-5 pt-2">
                        <ul>
                          
                            <li class="pb-1"><a class="menuItens text-gray-700 text-base" href="<?=base_url()?>termos">Termos</a></li>
                            <li class="pb-1"><a class="menuItens text-gray-700 text-base" href="<?=base_url()?>privacidade">Privacidade</a></li>
                        </ul>
                    </div>
       

        </div>
    </div>

    <script type="text/javascript" src="<?=base_url()?>/assets/js/modalMenu.js"></script>
    
<!-- Fim Menu -->

