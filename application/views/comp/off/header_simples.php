<nav class="grid grid-cols-8 md:grid-cols-1 border-b border-gray-200 border-opacity-50 shadow h-16 px-5 md:px-40 lg:px-52 relative">
    <div class="col-span-1 flex justify-items-center items-center">
        <a onmouseover="hoverAtivado()" onmouseout="hoverDesativado()" class="flex space-x-3 items-center" href="<?=base_url()?>login">
            <img id="img-voltar" src="<?=base_url()?>/assets/images/voltar.svg" alt="">
            <p class="hidden md:flex text-left text-base font-semibold text-gray-700">VOLTAR</p>
        </a>        
    </div>
    
    <div class="col-span-6 md:hidden flex justify-center items-center">
        <div>
            <img class="h-14 py-1" src="<?=base_url()?>assets/images/logo.png" alt="">
        </div>
    </div>  

    <div class="col-span-1 md:hidden"></div>
</nav>