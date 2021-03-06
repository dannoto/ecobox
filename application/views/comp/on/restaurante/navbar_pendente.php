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
        <a href="<?=base_url()?>restaurante">
            <img class="h-14 py-1" src="<?=base_url()?>assets/images/logo.png" alt="">
        </a>
    </div>
    <!-- Fim Logo -->

    <!-- Início Barra Pesquisa Navbar -->
    
    <!-- Fim Barra Pesquisa Navbar -->

    <!-- Início Btn Login e Carrinho -->
    <!-- <div class="col-span-2 md:col-span-2 flex justify-end space-x-4 md:space-x-8 items-center pr-4 md:pr-6">
        <a class="flex" href="<?=base_url()?>carrinho">
            <img class="h-6" src="<?=base_url()?>assets/images/carrinho.svg" alt="">
            <div style="background-color: #dbab4f" class="rounded-full w-4 h-4 flex justify-center items-center -mt-2 -ml-2">
                <p style="font-size: 9px" class="font-semibold text-white">1</p>
            </div>
        </a> 
    </div> -->
    <!-- Fim Btn Login e Carrinho -->
</nav>
<!-- Fim Navbar -->

<!-- Início Menu -->
<div id="overlay" class="fixed hidden justify-center items-center inset-t-16 z-50 left-0 w-10/12 md:w-5/12 lg:w-4/12 xl:w-3/12">
    <div class="bg-white h-screen shadow-xl">
        <!-- Início Barra Pesquisa Navbar -->
        <div class="flex justify-center items-center pt-5 md:hidden">
            <input class="w-9/12 h-10 px-3 rounded-l-md bg-gray-100 placeholder-gray-500 focus:outline-none" type="text" placeholder="Busque por item ou loja">
            <button class="w-10 h-10 px-2 flex justify-center items-center rounded-r-md bg-green">
                <img class="h-5" src="<?=base_url()?>/assets/images/search.svg" alt="">
            </button>
        </div>
        <!-- Fim Barra Pesquisa Navbar -->

        <div class="md:col-span-4 hidden md:flex justify-center items-center">
        <ul>

            <li class="grid grid-cols-4 py-5 border-b-500 border-gray-500">
                <div class="col-span-1">
                    <p style="border-radius:100px;opacity:0.5" class="bg-green  px-5 text-white py-3 mr-8 ">1</p>
                </div>
                <div class="col-span-3">
                    <p class="uppercase text-lg flex items-center ">Informações</p>
                </div>
            </li>
            <li class="grid grid-cols-4 py-5 border-b-500 border-gray-500">
                <div class="col-span-1">
                    <p style="border-radius:100px;opacity:0.5" class="bg-green  px-5 text-white py-3 mr-8 ">2</p>
                </div>
                <div class="col-span-3">
                    <p class="uppercase text-lg flex items-center text-left ">Documentos</p>
                </div>
            </li>
            <li class="grid grid-cols-4 py-5 border-b-500 border-gray-500">
                <div class="col-span-1">
                    <p style="border-radius:100px;opacity:1" class="bg-green  px-5 text-white py-3 mr-8 ">3</p>
                </div>
                <div class="col-span-3">
                    <p class="uppercase text-lg flex items-center ">Funcionamento</p>
                </div>
            </li>

            <li class="grid grid-cols-4 py-5 border-b-500 border-gray-500">
                <div class="col-span-1">
                    <p style="border-radius:100px;opacity:0.5" class="bg-green  px-5 text-white py-3 mr-8 ">4</p>
                </div>
                <div class="col-span-3">
                    <p class="uppercase text-lg flex items-center ">Modelo</p>
                </div>
            </li>

        </ul>
    </div>

        <!-- <div class="flex space-x-3 items-center px-5 py-5">
            <img class="w-16 h-16 rounded-full border-solid border-2 border-green" src="<?=base_url()?>assets/images/avatars/<?=$this->perfil_model->getPerfil($this->session->userdata('session_user')['id'])['user_imagem']?>" alt="">
            <h1 class="font-semibold text-gray-700 text-lg"><?=$this->perfil_model->getPerfil($this->session->userdata('session_user')['id'])['user_nome']?> <?=$this->perfil_model->getPerfil($this->session->userdata('session_user')['id'])['user_sobrenome']?></h1>
        </div>

        <div class="menu px-5">
            <ul>
                <li class="pb-1"><a class="menuItens text-gray-700 text-base" href="<?=base_url()?>informacoes">Editar Dados</a></li>
                <li class="pb-1"><a class="menuItens text-gray-700 text-base" href="<?=base_url()?>pedidos">Meus Pedidos</a></li>
                <li class="pb-1"><a class="menuItens text-gray-700 text-base" href="<?=base_url()?>cupons">Meus Cupons</a></li>
                <li class="pb-1"><a class="menuItens text-gray-700 text-base" href="<?=base_url()?>seguranca">Segurança</a></li>
                <li class="pb-1"><a class="menuItens text-gray-700 text-base" href="<?=base_url()?>ajuda">Precisa de Ajuda?</a></li>
                <li class="pb-1"><a class="menuItens text-gray-700 text-base" href="<?=base_url()?>logout" >Sair</a></li>
            </ul>
        </div>
        
        <h1 class="text-gray-700 text-base font-semibold pt-8 pb-1 px-5 border-b border-gray-200 border-opacity-75">Outros</h1>

        <div class="menu px-5 pt-2">
            <ul>
                <li class="pb-1"><a class="menuItens text-gray-700 text-base" href="<?=base_url()?>restaurante/inscricao/cadastro">Cadastrar meu Restaurante</a></li>
                <li class="pb-1"><a class="menuItens text-gray-700 text-base" href="<?=base_url()?>faq">Perguntas Frequentes</a></li>
                <li class="pb-1"><a class="menuItens text-gray-700 text-base" href="<?=base_url()?>termos">Termos</a></li>
                <li class="pb-1"><a class="menuItens text-gray-700 text-base" href="<?=base_url()?>privacidade">Privacidade</a></li>
            </ul>
        </div> -->
    </div>
</div>

<script type="text/javascript" src="<?=base_url()?>/assets/js/modalMenu.js"></script>
<!-- Fim Menu -->