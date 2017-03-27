<?php 
include 'modules/includes/header.html';
?>
	<noscreen/>

		<left class="left">
			<h2>Madame, Monsieur,</h2>
			<p>
				Votre enfant va partir durant l'année scolaire en classe de découverte.
				<br />Une participation financière par enfant va prochainement vous être demandée.
				<br /><br />Cette année le conseil municipal a décidé d'instaurer trois types de réductions
				et un plafonnement à 100 Euros par enfant.
			</p>
			<br />
			<ul>
				<li>Réduction de 10% si le Quotient Familial est inférieur à 500 Euros</li>
				<li>Réduction de 20% pour famille de 2 enfants</li>
				<li>Réduction de 40% pour famille de 3 enfants ou plus</li>
			</ul>
		</left>

	<noscreen/>

		<right class="right">
			<h2>Liste des séjours prévus </h2>
			<fieldset>
			<?php
			$bdd = new PDO('mysql:host=localhost;dbname=stpaul;charset=utf8', 'root');
			$sejours = $bdd->query('select * from sejour order by sejno');
			foreach ($sejours as $sejour): ?>
				<sejour>
					<h2><p><?php echo $sejour['SEJINTITULE'] ?></p></h2>
					<?php echo $sejour['SEJMONTANTMBI'].'€' ?><BR/>
					<?php echo 'A partir du '.$sejour['SEJDTEDEB'] ?>
					<?php echo $sejour['SEJDUREE'].' nuits' ?>
				</sejour>
			<?php endforeach ?>
			</fieldset>
		</right>
</main>
<?php 
include 'modules/includes/footer.html';
?>