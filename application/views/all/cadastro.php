<!DOCTYPE html>
<html lang="pt-br">

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
        <?php $this->load->view('comp/off/header_simples')?>
        <!-- Fim Header -->

        <main>
            <div class="grid grid-cols-1 md:grid-cols-5 xl:grid-cols-3 px-5 md:px-0">
                <div class="col-span-1"></div>

                <!-- Início Formulário Cadastro -->
                <div class="col-span-1 md:col-span-3 xl:col-span-1 grid justify-items-center">
                    <!-- Início Título -->
                    <p class="font-semibold text-gray-700 text-2xl md:text-3xl text-center md:pb-5 pt-12">Crie uma Conta</p>
                    <!-- Fim Título -->

                    <div>
                        <?php if ($this->session->flashdata('registrar') ) { ?>
                            <p style="color:red;" class="font-regular text-center y-2"><?=$this->session->flashdata('registrar')?></p>
                        <?php } ?>
                    </div>

                    <!-- Início Formulário -->
                    <form action="" method="post" class="py-12 w-full">
                        <div class="block md:flex md:space-x-5">
                            <div>
                                <label for="nome" class="font-semibold text-gray-700">Nome</label>
                                <input type="text" name="nome" id="nome" maxlength="200" autocomplete="off" required class="w-full h-12 p-2 mb-5 border-2 border-opacity-50 border-gray-700 rounded-md focus:outline-none">
                            </div>
                            
                            <div>
                                <label for="sobrenome" class="font-semibold text-gray-700">Sobrenome</label>
                                <input type="text" name="sobrenome" maxlength="200" id="sobrenome" autocomplete="off" required class="w-full h-12 p-2 mb-5 border-2 border-opacity-50 border-gray-700 rounded-md focus:outline-none">
                            </div>
                        </div>
                        
                        <label for="email" class="font-semibold text-gray-700">E-mail</label>
                        <input type="email" name="email" id="email" autocomplete="off" required maxlength="200" class="w-full h-12 p-2 mb-5 border-2 border-opacity-50 border-gray-700 rounded-md focus:outline-none">
                        
                        <label for="telefone" class="font-semibold text-gray-700">Telefone</label>
                        <input type="tel" name="telefone" required id="telefone" onkeypress="mascaraTel(this)" inputmode="number" minlength="11" maxlength="15" autocomplete="off" required class="w-full h-12 p-2 mb-5 border-2 border-opacity-50 border-gray-700 rounded-md focus:outline-none">
                        
                        <label for="password" class="font-semibold text-gray-700">Senha</label>
                        <input type="password" name="password" id="password" required maxlength="200" minlength="6" class="w-full h-12 p-2 mb-5 border-2 border-opacity-50 border-gray-700 rounded-md focus:outline-none">

                        <div class="flex items-center space-x-3">
                            <div class="flex">
                                <input id="check" class="border-2 border-green" required type="checkbox">
                            </div>

                            <div class="flex">
                                <p class="text-sm text-gray-700">Ao continuar você concorda com os <a href="<?=base_url()?>termos" class="text-green font-semibold">Termos e Condições</a></p>
                            </div>
                        </div>

                        <button type="submit" class="w-full mb-5 mt-14 xl:mt-10 h-12 rounded-md bg-green">
                            <p class="font-semibold text-white text-xl">CRIAR CONTA</p>
                        </button>
                    </form>
                    <!-- Fim Formulário -->
                </div>
                <!-- Fim Formulário Cadastro -->

                <div class=" col-span-1"></div>
            </div>
        </main>
    </section>
</body>

</html>

<!-- Máscara Input Celular -->
<script type="text/javascript">
    function mascaraTel(telefone){ 
        if(telefone.value.length == 0)
        telefone.value = '(' + telefone.value; 

        if(telefone.value.length == 3)
        telefone.value = telefone.value + ') '; 

        if(telefone.value.length == 10)
        telefone.value = telefone.value + '-';
    }
</script>

<!-- Hover Voltar -->
<script>
    function hoverAtivado() {
        document.getElementById("img-voltar").src = '<?=base_url()?>/assets/images/voltar-green.svg';
    }

    function hoverDesativado() {
        document.getElementById("img-voltar").src = '<?=base_url()?>/assets/images/voltar.svg';
    }
</script>