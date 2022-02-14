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
    <div class="col-span-6 md:col-span-5 flex items-center">
        <a href="<?=base_url()?>">
            <img class="h-14 py-1" src="<?=base_url()?>assets/images/logo.png" alt="">
        </a>
    </div>
    <!-- Fim Logo -->

    <!-- Início Barra Pesquisa Navbar -->
    <div class="md:col-span-4 hidden md:flex w-full justify-center items-center">
        <form action="<?=base_url()?>busca" class="flex" method="GET">
            <input autocomplete="off" required name="q" class="w-full query h-10 px-3 rounded-l-md bg-gray-100 placeholder-gray-500 focus:outline-none" type="text" placeholder="Busque por item ou restaurante">
            <button type="submit" class="w-10 h-10 px-2 flex justify-center items-center rounded-r-md bg-green">
                <img class="h-5" src="<?=base_url()?>/assets/images/search.svg" alt="">
            </button>
        </form>
    </div>
    <!-- Fim Barra Pesquisa Navbar -->

    <!-- Início Btn Login e Carrinho -->
    <div class="col-span-4 md:col-span-2 flex justify-end space-x-4 md:space-x-8 items-center pr-2 md:pr-6">
        <a href="<?=base_url()?>login">
            <img class="h-6" src="<?=base_url()?>assets/images/login.svg" alt="">
        </a>
        <a class="flex" href="<?=base_url()?>login">
            <img class="h-6" src="<?=base_url()?>assets/images/carrinho.svg" alt="">
          
        </a> 
    </div>
    <!-- Fim Btn Login e Carrinho -->
</nav>
<!-- Fim Navbar -->

<!-- Início Menu -->
<div id="overlay" class="fixed hidden justify-center items-center inset-t-16 z-50 left-0 w-10/12 md:w-5/12 lg:w-4/12 xl:w-3/12">
    <div class="bg-white h-screen shadow-xl">
        <!-- Início Barra Pesquisa Navbar -->
        <form action="<?=base_url()?>busca" method="GET">
            <div class="flex justify-center items-center py-5 ">
                <input autocomplete="off" name="q" required class="w-9/12 query h-10 px-3 rounded-l-md bg-gray-100 placeholder-gray-500 focus:outline-none" type="text" placeholder="Busque por item ou restaurante">
                <button type="submit" class="w-10 h-10 px-2 flex justify-center items-center rounded-r-md bg-green">
                    <img class="h-5" src="<?=base_url()?>/assets/images/search.svg" alt="">
                </button>
            </div>
        </form>

        <!-- Fim Barra Pesquisa Navbar -->

        <div class="menu px-5">
            <ul>
                <li class="pb-1"><a class="menuItens text-gray-700 text-base" href="<?=base_url()?>login">Login</a></li>
                <li class="pb-1"><a class="menuItens text-gray-700 text-base" href="<?=base_url()?>cadastro">Cadastrar</a></li>
                <li class="pb-1"><a class="menuItens text-gray-700 text-base" href="<?=base_url()?>faq">Precisa de Ajuda?</a></li>
            </ul>
        </div>
        
        <h1 class="text-gray-700 text-base font-semibold pt-8 pb-1 px-5 border-b border-gray-200 border-opacity-75">Outros</h1>

        <div class="menu px-5 pt-2">
            <ul>
                <li class="pb-1"><a class="menuItens text-gray-700 text-base" href="<?=base_url()?>restaurante/inscricao/cadastro">Cadastrar meu Restaurante</a></li>
                <li class="pb-1"><a class="menuItens text-gray-700 text-base" href="<?=base_url()?>termos">Termos</a></li>
                <li class="pb-1"><a class="menuItens text-gray-700 text-base" href="<?=base_url()?>privacidade">Privacidade</a></li>
            </ul>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script type="text/javascript" src="<?=base_url()?>/assets/js/modalMenu.js"></script>

<!-- <script>
    function searchMobile() {   
        const data = $('.query').val();
        if (data.length == 0 ) {
            
        } else {

            window.location.href = "busca?q="+data
        }
    }
</script> -->
<script>
            function search() {

            
                const data = $('.query').val();
                if (data.length == 0 ) {
                    
                } else {

                    window.location.href = "busca?q="+data
                }
            }


            

        </script>

<!-- Fim Menu -->