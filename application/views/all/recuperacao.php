<!DOCTYPE html>
<html lang="p-br">

<head> 
    <title>Ecobox</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?=base_url()?>/assets/css/main.css">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="icon" href="<?=base_url()?>/assets/images/favicon.jpg">
</head>

<style>
    body {
        font-family: 'Montserrat';
    }
    #background-banner {
        background-image: url("<?=base_url()?>/assets/images/bg-login.jpg");
        background-size: cover;
        background-repeat: no-repeat;
        background-position: 80% 100%;
    }
    #check {
        accent-color: #6A9F46;
    }
</style>

<body>
    <section>
        <!-- Início Header -->
        <header class="w-full fixed z-50">
            <?php $this->load->view('comp/off/header_simples')?>
        </header>
        <!-- Fim Header -->

        <main class="pt-16">
            <div class="grid grid-cols-1 md:grid-cols-5 xl:grid-cols-3 px-5 md:px-0">
                <div class="col-span-1"></div>

                <!-- Início Formulário Recuperação -->
                <div class="col-span-1 md:col-span-3 xl:col-span-1 grid justify-items-center">
                    <!-- Início Título -->
                    <p class="font-semibold text-gray-700 text-2xl md:text-3xl text-center pb-5 pt-12">Recuperação</p>
                    <!-- Fim Título -->

                    <!-- Início Subtítulo -->
                    <p class="text-gray-700 text-lg text-center">Insira seu e-mail para recuperar sua senha.</p>
                    <!-- Fim Subtítulo -->
  

                    <!-- Início Formulário -->
                    <form action="" method="POST" class="py-12 w-full">
                        <label for="email" class="font-semibold text-gray-700">E-mail</label>
                        <input type="email" name="user_email" id="email" autocomplete="off" required maxlength="200" class="w-full h-12 p-2 mb-5 border-2 border-opacity-50 border-gray-700 rounded-md focus:outline-none">


                        
                            <?php if ($this->session->flashdata('recuperacao') ) { ?>
                                <p style="color:red;" class="font-regular text-center y-2"><?=$this->session->flashdata('recuperacao')?></p>
                            <?php } ?>
                        

                        <button type="submit" class="w-full mb-5 mt-6 md:mt-14 xl:mt-10 h-12 rounded-md bg-green">
                            <p class="font-semibold text-white text-xl">ENVIAR</p>
                        </button>
                    </form>
                    <!-- Fim Formulário -->
                </div>

                <div class=" col-span-1 "></div>
            </div>
            <!-- Fim Formulário Cadastro -->
        </main>
    </section>
</body>

</html>

<!-- Hover Voltar -->
<script>
    function hoverAtivado() {
        document.getElementById("img-voltar").src = '<?=base_url()?>/assets/images/voltar-green.svg';
    }

    function hoverDesativado() {
        document.getElementById("img-voltar").src = '<?=base_url()?>/assets/images/voltar.svg';
    }
</script>
