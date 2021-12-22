<style>
    .slick-prev:before, .slick-next:before {
        color: #6A9F46;
        font-size: 25px;
        line-height: 0px;
    }
    .slick-prev.slick-disabled:before, .slick-next.slick-disabled:before {
        opacity: 0;
    }
    .slick-dots li.slick-active button:before {
        color: #6A9F46;
    }
</style>

<!-- Início Slide Banners Home -->
<div class="grid grid-cols-12 lg:grid-cols-10 px-2 md:px-0">
    <div class="md:col-span-1"></div>

    <div class="col-span-12 md:col-span-10 lg:col-span-8 py-6">
        <h1 class="font-semibold text-xl md:text-xl text-gray-800 py-5">Restaurantes perto de você</h1>

        <div class="restaurantesProximo">              
            <div>
                <a href="<?=base_url()?>perfilRestaurante">
                    <!-- Início Imagem Restaurante -->
                        <div  style="background-image: url('<?=base_url()?>assets/images/burguer-king.jpeg'); width: 94%; margin: 0 3%;" class="h-48 bg-cover bg-center rounded-lg"></div>
                    <!-- Fim Imagem Restaurante -->

                    <!-- Início Nome Restaurante -->
                        <p class="text-lg font-semibold text-gray-800 text-center pt-1 w-full">Burger King</p>
                    <!-- Fim Nome Restaurante -->
                </a>
            </div>
            <!-- Fim Restaurante 1 -->

            <!-- Início Restaurante 2 -->
            <div>
                <a href="<?=base_url()?>perfilRestaurante">
                    <!-- Início Imagem Restaurante -->
                        <div style="background-image: url('<?=base_url()?>assets/images/subway.jpeg'); width: 94%; margin: 0 3%;" class="h-48 bg-cover bg-center rounded-lg"></div>
                    <!-- Fim Imagem Restaurante -->

                    <!-- Início Nome Restaurante -->
                        <p class="text-lg font-semibold text-gray-800 text-center pt-1 w-full">Subway</p>
                    <!-- Fim Nome Restaurante -->
                </a>
            </div>
            <!-- Fim Restaurante 2 -->

            <!-- Início Restaurante 3 -->
            <div>
                <a href="<?=base_url()?>perfilRestaurante">
                    <!-- Início Imagem Restaurante -->
                        <div style="background-image: url('<?=base_url()?>assets/images/mcdonalds.jpg'); width: 94%; margin: 0 3%;" class="h-48 bg-cover bg-center rounded-lg"></div>
                    <!-- Fim Imagem Restaurante -->

                    <!-- Início Nome Restaurante -->
                        <p class="text-lg font-semibold text-gray-800 text-center pt-1 w-full">McDonald's</p>
                    <!-- Fim Nome Restaurante -->
                </a>
            </div>
            <!-- Fim Restaurante 3 -->

            <!-- Início Restaurante 4 -->
            <div>
                <a href="<?=base_url()?>perfilRestaurante">
                    <!-- Início Imagem Restaurante -->
                        <div style="background-image: url('<?=base_url()?>assets/images/domino.jpg'); width: 94%; margin: 0 3%;" class="h-48 bg-cover bg-center rounded-lg"></div>
                    <!-- Fim Imagem Restaurante -->

                    <!-- Início Nome Restaurante -->
                        <p class="text-lg font-semibold text-gray-800 text-center pt-1 w-full">Domino's Pizza</p>
                    <!-- Fim Nome Restaurante -->
                </a>
            </div>
            <!-- Fim Restaurante 4 -->

            <!-- Início Restaurante 5 -->
            <div>
                <a href="<?=base_url()?>perfilRestaurante">
                    <!-- Início Imagem Restaurante -->
                        <div style="background-image: url('<?=base_url()?>assets/images/doces.jpeg'); width: 94%; margin: 0 3%;" class="h-48 bg-cover bg-center rounded-lg"></div>
                    <!-- Fim Imagem Restaurante -->

                    <!-- Início Nome Restaurante -->
                        <p class="text-lg font-semibold text-gray-800 text-center pt-1 w-full">Magnólia Doces</p>
                    <!-- Fim Nome Restaurante -->
                </a>
            </div>
            <!-- Fim Restaurante 5 -->
        </div>   
    </div>

    <div class="md:col-span-1"></div>
</div>
<!-- Fim Slide Categorias -->