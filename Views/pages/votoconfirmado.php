
    <!-- Custom styles for this template -->
    <link href="<?= base_url() ?>dist/css/signin/signin.css" rel="stylesheet">
<main class="form-signin">
  <form action="voto">
    <img class="mb-4" src="<?= base_url() ?>dist/img/logo.png" alt="Logomarca do Conselho Regional de Cultura de Samambaia">
    <h2 class="h2 mb-3 fw-normal">Voto confirmado</h1>
	<h3 class="h3 mb-3 fw-normal">Você votou em:<br/><strong><?=$candidato['nome']?></strong></h2>
	<img class="bd-placeholder-img rounded-circle" width="150" height="150" src="<?= base_url() ?>dist/img/<?=$candidato['imagem']?>" role="img" aria-label="Nome do candidato" preserveAspectRatio="xMidYMid slice" focusable="false"><title><?=$candidato['nome']?></title><rect width="100%" height="100%" fill="#777"/></svg>
  </form>
  <hr />
  <p style="margin-top:10px;"><a class="btn btn-primary btn-lg" href="../voto">clique aqui para fechar esta tela e ocultar seu voto.</a></p>
</main>



  </body>
</html>
