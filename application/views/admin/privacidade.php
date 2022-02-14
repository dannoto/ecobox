<!DOCTYPE html>
<html lang="pt-br">

<head> 
    <title>Ecobox</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="<?=base_url()?>/assets/images/favicon.png" rel="icon" type="image/png">
    <link rel="stylesheet" href="<?=base_url()?>/assets/css/main.css">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>/assets/slider/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>/assets/slider/slick/slick-theme.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="icon" href="<?=base_url()?>/assets/images/favicon.jpg">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/2.8.0/alpine.js"></script>
</head>

<style>
    body {
        font-family: 'Montserrat';
    }
    .menuItens:hover {
        color: #6A9F46;
    }

    input[type='radio'] {
    display: none;
    }

    #generoMasculino, #generoFeminino {
        cursor: pointer;
        appearance: none;
        width: 20px;
        height: 20px;
        border-radius: 50%;
        outline: none;
        border: 2px solid #6A9F46;
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    #generoMasculino:checked:before, #generoFeminino:checked:before {
        content: '';
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: #6A9F46;
        position: absolute;
        align-items: center;
        justify-content: center;
    }
</style>


<body class="bg-white">
    <section>
        <!-- Início Navbar -->
        <header class="w-full fixed z-50">
            <?php $this->load->view('comp/on/admin/navbar')?>
        </header>
        <!-- Fim Navbar -->

        <main class="pt-16 bg-white">

        
            <div class="grid xl:grid-cols-1 py-5 md:py-14 px-5 md:px-14 lg:px-24 xl:px-32"> 
              
                    
                    <div class="w-full grid xl:grid-cols-2 grid-cols-1 xl:mb-0 mb-5"> 
                        
                        <div class="xl:col-span-1 grid-cols-2">
                            <h1  class="font-semibold text-left text-xl md:text-2xl   text-gray-700 ">Privacidade</h1>
                            <p class="pb-8 text-left">Sua privacidade do Ecobox.</p>
                        </div>
                      
                    </div>   
                    
                    <div class="w-full">

                        <form action="" method="POST">

                            <label for="">TÍTULO</label><br>
                            <input type="text" name="privacidade_titulo" value="<?=$privacidade['privacidade_nome']?>" class="h-12 p-2 border border-gray-200 xl:w-2/3 w-full" >
                            <br><br>
                            <label for="">CONTEÚDO</label><br>
                            <textarea name="privacidade_conteudo"  class="p-2 h-96 border border-gray-200 xl:w-2/3 w-full" ><?=$privacidade['privacidade_conteudo']?></textarea>
                        
                            <button type="submit" class="xl:w-2/3 w-full bg-green h-12 text-white font-semibold">ATUALIZAR</button>
                        </form>
                    </div>
                    
                   
                    
               
            </div>  
        </main>
    </section>

              

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>

<script>



function addCategoria() {



        const categoria_nome = $('#categoria_nome').val()
        const categoria_imagem =$('#imagem_nome').val()
        



        // const categoria_imagem = categoria_imagem.replace('C:\fakepath\', "")

        if (categoria_nome.length == 0) {
            alert('Preencha o nome do produto.')
        }  else if (categoria_imagem.length == 0) {
            alert('Preencha a imagem do produto.')
        } else {

                   
                    $.ajax({
                        type: "POST",
                        url: '',
                        data: {
                            add_categoria:'.',
                            categoria_nome:categoria_nome,
                            categoria_imagem:categoria_imagem,
                        },
                        success: function(data)
                        {
                            location.reload()
                            // console.log(data)
                        }
                    });
        }


        }




</script>
</body>
</html>