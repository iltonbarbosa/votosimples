
    <!-- Custom styles for this template -->
    <link href="<?= base_url() ?>dist/css/signin/signin.css" rel="stylesheet">
<main class="form-signin">
	<div id="mensagem" >
		<?php if (isset($msg)) { ?>
			<div class="alert alert-danger" role="alert">
				<?php
					echo $msg;
				?>
			</div>
		<?php } ?>
	</div>


  <form action='<?= base_url() ?>adm/totalvotos' method='POST'>
    <img class="mb-4" src="<?= base_url() ?>dist/img/logo.png" alt="Logomarca do Conselho Regional de Cultura de Samambaia">
    <h1 class="h3 mb-3 fw-normal">Acesso administrativo<br/> Informe a senha</h1>

    <div class="form-floating">
      <input type="password" class="form-control" name="senha" id="senha" placeholder="digite a senha." required>
      <label for="codigo">Senha</label>
    </div>

    <button class="w-100 btn btn-lg btn-primary" type="submit">Acesse</button>
    <p class="mt-5 mb-3 text-muted">&copy; Sistema Voto Simples - 2022</p>
	<?= csrf_field() ?>
  </form>
</main>



  </body>
</html>
