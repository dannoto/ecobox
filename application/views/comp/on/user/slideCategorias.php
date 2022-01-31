<style>
    .slick-prev:before, .slick-next:before {
        color: #6A9F46;
        font-size: 25px;
        line-height: 0px;
    }
    .slick-prev.slick-disabled:before, .slick-next.slick-disabled:before {
        opacity: 0;
    }
    @media (max-width: 640px) {
        .containerSlide {
            width:116px;
        }
        .imgSlide {
            width: 106px;
            height: 106px;
            margin: 0 5px;
        }
        .titleSlide {
            font-size: 11px;
            width: 106px;
            margin: 0 5px;
        }
    }
    @media (min-width: 641px) {
        .containerSlide {
            width:130px;
        }
        .imgSlide {
            width: 110px;
            height: 110px;
            margin: 0 10px;
        }
        .titleSlide {
            font-size: 14px;
            width: 110px;
            margin: 0 10px;
        }
    }
</style>

<!-- Início Slide Categorias -->
<div class="grid grid-cols-12 lg:grid-cols-10 px-2 md:px-0">
    <div class="md:col-span-1"></div>

    <div class="col-span-12 md:col-span-10 lg:col-span-8 py-6">
        <div class="categorias">
            <?php foreach($this->categorias_model->getCategorias() as $c) { ?>
                
                <div class="containerSlide">
                    <a href="">
                        <div style="background-image: url('<?=base_url()?>assets/images/categorias/<?=$c->cat_imagem?>')" class="imgSlide bg-cover bg-center rounded-lg"></div>
                        <p class="font-normal text-sm text-center pt-1 titleSlide"><?=$c->cat_nome?></p>
                    </a>
                </div>
            <?php } ?>
            
            <!-- <div class="containerSlide">
                <a href="">
                    <div style="background-image: url('<?=base_url()?>assets/images/categorias/brasileira.jpg')" class="imgSlide bg-cover bg-center rounded-lg"></div>
                    <p class="font-normal text-sm text-center pt-1 titleSlide">Brasileira</p>
                </a>


            <div class="containerSlide">
                <a href="">
                    <div style="background-image: url('<?=base_url()?>assets/images/categorias/cafe-da-manha.jpg')" class="imgSlide  bg-cover bg-center rounded-lg"></div>
                    <p class="font-normal text-sm text-center pt-1 titleSlide">Café da Manhã</p>
                </a>
            </div>

            <div class="containerSlide">
                <a href="">
                    <div style="background-image: url('<?=base_url()?>assets/images/categorias/hamburgueres.jpg')" class="imgSlide bg-cover bg-center rounded-lg"></div>
                    <p class="font-normal text-sm text-center pt-1 titleSlide">Hambúrgueres</p>
                </a>
            </div>

            <div class="containerSlide">
                <a href="">
                    <div style="background-image: url('<?=base_url()?>assets/images/categorias/massas.jpg')" class="imgSlide bg-cover bg-center rounded-lg"></div>
                    <p class="font-normal text-sm text-center pt-1 titleSlide">Massas</p>
                </a>
            </div>

            <div class="containerSlide">
                <a href="">
                    <div style="background-image: url('<?=base_url()?>assets/images/categorias/fast-food.jpg')" class="imgSlide bg-cover bg-center rounded-lg"></div>
                    <p class="font-normal text-sm text-center pt-1 titleSlide">Fast Food</p>
                </a>
            </div>

            <div class="containerSlide">
                <a href="">
                    <div style="background-image: url('<?=base_url()?>assets/images/categorias/sanduiches.jpg')" class="imgSlide bg-cover bg-center rounded-lg"></div>
                    <p class="font-normal text-sm text-center pt-1 titleSlide">Sanduíches</p>
                </a>
            </div>

            <div class="containerSlide">
                <a href="">
                    <div style="background-image: url('<?=base_url()?>assets/images/categorias/japones.jpg" class="imgSlide bg-cover bg-center rounded-lg"></div>
                    <p class="font-normal text-sm text-center pt-1 titleSlide">Japonesa</p>
                </a>
            </div>

            <div class="containerSlide">
                <a href="">
                    <div style="background-image: url('<?=base_url()?>assets/images/categorias/churrasco.jpg')" class="imgSlide bg-cover bg-center rounded-lg"></div>
                    <p class="font-normal text-sm text-center pt-1 titleSlide">Churrasco</p>
                </a>
            </div>

            <div class="containerSlide">
                <a href="">
                    <div style="background-image: url('<?=base_url()?>assets/images/categorias/saudavel.jpg')" class="imgSlide bg-cover bg-center rounded-lg"></div>
                    <p class="font-normal text-sm text-center pt-1 titleSlide">Saúdavel</p>
                </a>
            </div>

            <div class="containerSlide">
                <a href="">
                    <div style="background-image: url('<?=base_url()?>assets/images/categorias/acai.jpg')" class="imgSlide bg-cover bg-center rounded-lg"></div>
                    <p class="font-normal text-sm text-center pt-1 titleSlide">Açaí</p>
                </a>
            </div>

            <div class="containerSlide">
                <a href="">
                    <div style="background-image: url('<?=base_url()?>assets/images/categorias/sorvetes.jpg')" class="imgSlide bg-cover bg-center rounded-lg"></div>
                    <p class="font-normal text-sm text-center pt-1 titleSlide">Sorvetes</p>
                </a>
            </div>

            <div class="containerSlide">
                <a href="">
                    <div style="background-image: url('<?=base_url()?>assets/images/categorias/sobremesas.jpeg')" class="imgSlide bg-cover bg-center rounded-lg"></div>
                    <p class="font-normal text-sm text-center pt-1 titleSlide">Sobremesas</p>
                </a>
            </div> -->
        </div>
    </div>

    <div class="md:col-span-1"></div>
</div>
<!-- Fim Slide Categorias -->