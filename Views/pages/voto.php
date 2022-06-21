<link href="carousel.css" rel="stylesheet">
<main>
	<div class="pricing-header p-3 pb-md-4 mx-auto text-center">
		<img class="mb-4" src="<?= base_url() ?>dist/img/logo.png" alt="Logomarca do Conselho Regional de Cultura de Samambaia">
		<h1 class="display-4 fw-normal">Escolha seu candidato</h1>
		<p class="fs-5 text-muted">Clique no candidato da sua preferência e em seguida, confirme seu voto para Gerente de Cultura de Samambaia. </p>
    </div>
	<div class="container">

		<!-- Three columns of text below the carousel -->
		<div class="row">
			<?php if($candidatos != null) foreach($candidatos as $cand):?>
				<div class="col">
					<img class="bd-placeholder-img rounded-circle" width="150" height="150" src="<?= base_url() ?>dist/img/<?=$cand['imagem']?>" role="img" aria-label="Nome do candidato" preserveAspectRatio="xMidYMid slice" focusable="false"><title><?=$cand['nome']?></title><rect width="100%" height="100%" fill="#777"/></svg>

					<h3 class="fw-normal"><?=$cand['nome']?></h3>
					<p><a class="btn btn-primary" href="votoconfirmado/<?=$cand['candidatoid']."/".$codigo?>" onclick="return confirm('Confirma o seu voto neste(a) candidato(a)?')">
							Clique aqui para votar<br/> neste(a) candidato(a)
						</a></p>
					<p><?=$cand['descricao']?></p>

				</div>
			<?php endforeach; ?>
		</div><!-- /.row -->


		<!-- START THE FEATURETTES -->

		<hr class="featurette-divider">
		<p>Seu código de acesso: <?=$codigo?></p>
		<!-- /END THE FEATURETTES -->

  </div><!-- /.container -->
</main>
