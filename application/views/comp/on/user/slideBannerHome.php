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
<?php if (count($this->cupom_model->getCupons() ) > 0  ) { ?>
                <h1 class="xl:ml-32 ml-5 font-semibold text-xl">Aproveite os Cupons</h1>


                <div class="grid grid-cols-12 lg:grid-cols-10 px-2 md:px-0">
                    <div class="md:col-span-1"></div>

                    <div class="col-span-12 md:col-span-10 lg:col-span-8 py-2">
                        <div class="bannersHome">


                            <?php foreach($this->cupom_model->getCupons() as $c) { ?>
                                    
                            
                                <!-- <a href=""> -->
                                    <div style=" width: 100%;" class="h-40 flex mr-2 p-2 bg-yellow-100 rounded-lg">
                                 
                                        <div class="bg-yellow-100 flex  w-full">
                                            <img style="object-fit: cover;" src="<?=base_url()?>assets/images/cupom.png" alt="">
                                            <div class="ml-5 mb-2">
                                               
                                                <small >ACIMA DE <span class="font-semibold">R$ <?=$c->cupom_minimo?></span></small>
                                                <h1 class="text-base font-semibold text-green"> <?=$c->cupom_desconto?>% DE DESCONTO</h1>
                                                <br>
                                                <button onclick="useCupom(this.id)" id=" <?=$c->id?>"  class="bg-green  text-base text-white font-semibold text-center py-2 px-2">USAR AGORA</button>
                                            </div>
                                        </div>
                                    </div>
                            <!-- </a> -->
                                <?php }?>
                        </div>
                    </div>

                    <div class="md:col-span-1"></div>
                </div>
        <?php  } else  { ?>

                        
        <?php  } ?>
      
<!-- Fim Slide Categorias -->