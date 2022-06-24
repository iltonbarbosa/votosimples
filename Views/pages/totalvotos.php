<link href="carousel.css" rel="stylesheet">
<main>
	<div class="pricing-header p-3 pb-md-4 mx-auto text-center">
		<img class="mb-4" src="<?= base_url() ?>dist/img/logo.png" alt="Logomarca do Conselho Regional de Cultura de Samambaia">
		<h1 class="display-4 fw-normal">Total de votos</h1>
		<p class="fs-5 text-muted">Total geral de votos:<strong style="color:red"> <?= $totalvotos->totalgeral?></strong> </p>
		<p class="fs-5 text-muted"><strong>Total de votos por candidato: </strong></p>
    </div>
	<div class="container">

		<!-- Three columns of text below the carousel -->
		<div class="row">
			<?php if($votos != null) foreach($votos as $cand):?>
				<div class="col">
					<img class="bd-placeholder-img rounded-circle" width="150" height="150" src="<?= base_url() ?>dist/img/<?=$cand['imagem']?>" role="img" aria-label="Nome do candidato" preserveAspectRatio="xMidYMid slice" focusable="false"><title><?=$cand['nome']?></title><rect width="100%" height="100%" fill="#777"/></svg>

					<h3 class="fw-normal"><?=$cand['nome']?></h3>
					<h3 class="fw-normal"> Total de votos:<?=$cand['totalvotos']?></h3>
				</div>
			<?php endforeach; ?>
		</div><!-- /.row -->


		<!-- START THE FEATURETTES -->

		<hr class="featurette-divider">
		<!-- /END THE FEATURETTES -->

  </div><!-- /.container -->
</main>
