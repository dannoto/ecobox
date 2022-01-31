<!-- Início Restaurantes-->
<div class="grid grid-cols-12 lg:grid-cols-10 px-5 md:px-0">
    <div class="md:col-span-1"></div>

    <div class="col-span-12 md:col-span-10 lg:col-span-8 pb-10">
        <h1 class="font-semibold text-xl md:text-xl text-gray-800 py-5">Restaurantes </h1>

        <div class="grid grid-cols-2 md:grid-cols-6 xl:grid-cols-8 gap-5">
            <!-- Início Restaurante 1 -->

            <?php foreach ($this->restaurante_model->getRestaurantes() as $r) { ?>
            <div class="col-span-2 pb-5">
                <a href="<?=base_url()?>restaurante/perfil/<?=$r->id?>">
                    <!-- Início Imagem Restaurante -->
                        <div style="background-image: url('<?=base_url()?>assets/images/avatars/<?=$r->restaurante_imagem?>')" class="w-full h-48 bg-cover bg-center rounded-lg"></div>
                    <!-- Fim Imagem Restaurante -->

                    <!-- Início Nome Restaurante -->
                        <p class="text-lg font-semibold text-gray-800 text-center pt-1 w-full"><?=$r->restaurante_nome?></p>
                    <!-- Fim Imagem Restaurante -->
                
                    <!-- Início Nome Restaurante -->
                    <div class="flex justify-between items-center p-1">
                        <!-- Início Avaliação -->
                        <div class="flex space-x-1">
                            <img class="w-4" src="<?=base_url()?>assets/images/star.svg" alt="">
                            <p class="text-sm text-gray-800"><?=$r->restaurante_nota?></p>
                        </div>
                        <!-- Fim Avaliação -->

                        <!-- Início Nome Categoria -->
                        <div>
                            <p class="text-sm text-gray-800"><?=$this->categorias_model->getCategoria($r->restaurante_categoria)['cat_nome']?></p>
                        </div>
                        <!-- Fim Nome Categoria -->

                        <!-- Início Km -->
                        <div>
                            <!-- <p class="text-sm text-gray-800">8.5 km</p> -->
                        </div>
                        <!-- Fim Km -->
                    </div>
                    <!-- Fim Informações Restaurante -->
                </a>
            </div>
            <!-- Fim Restaurante 1 -->
            <?php } ?>

          

         
        </div>
    </div>

    <div class="md:col-span-1"></div>
</div>
<!-- Fim Restaurantes-->