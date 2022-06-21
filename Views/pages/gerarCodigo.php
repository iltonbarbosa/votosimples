<p>Códigos para votação</p>
<table class="table" style="font-family: Times New Roman, Times, serif; font-size:30px">
	<tbody>
		<?php
		$i=0;
		if($codigos != null) foreach($codigos as $cod):?>
				<?php
					if($i == 0)
						echo "<tr>";
					if ($i <= 6){
						$i++;
						echo "<td>".$cod['codigovoto']."</td>";
					}else {
						$i = 0;
						echo "</tr>";
					}?>
		<?php endforeach; ?>
	</tbody>
</table>
