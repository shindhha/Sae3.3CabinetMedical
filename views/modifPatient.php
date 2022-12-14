<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/styles.css">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
	<script type="text/javascript" src="../scripts/script.js"></script>
	<title>MEDILOG</title>
	
</head>

<body onload="resizeMenu()">
	<?php
	spl_autoload_extensions(".php");
	spl_autoload_register();
	use yasmf\HttpHelper;
	?>
	<div class="container-fluid h-100  text-white">
		<div class="row h-100">
			<!-- Menu -->
			<div id="menu" class="pt-3 menu col-md-1 col-3 col-sm-2 d-md-flex d-none flex-column gap-3 blue h-100 align-items-center">
				<span onclick="manageClass('menu','d-none')"class="material-symbols-outlined d-md-none d-sm-block text-end w-100">arrow_back</span>
				<div class=" green border-1 ratio ratio-1x1">

				</div>
				<a href="index.php?controller=medicamentslist" class=" green border-1 ratio ratio-1x1">

					<span class="d-flex display-1 align-items-center justify-content-center material-symbols-outlined">
						medication
					</span>

				</a>
				<a href="index.php?controller=patientslist" class=" green border-1 ratio ratio-1x1">
					<span class="d-flex justify-content-center align-items-center material-symbols-outlined">
						groups
					</span>
				</a>
			</div>
			<!-- Main page -->
			<div class="col-md-11 h-75 text-center">
				<!-- Bandeau outils -->	
				
				<nav class="  row h-15 navbar navbar-expand-lg navbar-light green">
					<div class="d-flex justify-content-between px-5 container-fluid green">
						
						<span class="h1 d-md-block d-none"> Fiche Patient </span>
						<div class="d-flex align-items-center">	

						</div>				

					</div>
				</nav>
				<!-- Bandeau Patient -->
				<form>
				<div class="blue row">
					<div class="d-flex justify-content-between">
						<span></span>
						<div class="d-flex flex-row"> 
							<div>Nom :<input class="form-control" type="text" name="nom" value="<?php if (isset($patient)) echo $patient[0]['nom']; ?>"> </div>
							<div>Prenom :<input class="form-control" type="text" name="prenom" value="<?php if (isset($patient)) echo $patient[0]['prenom']; ?>"> </div>
						</div>
						<div>
							<select name="sexe">
								<option value="1">Homme</option>
								<option value="0">Femme</option>
							</select>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="d-flex flex-row justify-content-between text-green">
						
						<div class="d-flex flex-column justify-content-start ">
							<h1>Informations</h1>

							<div class="d-flex flex-row"> 
								<span>Adresse</span> <input class="form-control" type="text" name="adresse" value="<?php if (isset($patient)) echo $patient[0]['adresse']; ?>"> 
							</div>
							<div class="d-flex flex-row">
								<span>n??Telephone</span><input class="form-control" type="text" name="numTel" value="<?php if (isset($patient)) echo $patient[0]['numTel']; ?>">
							</div>
							<div class="d-flex flex-row">
								<span>email</span><input class="form-control" type="text" name="email" value="<?php if (isset($patient)) echo $patient[0]['numTel']; ?>">
							</div>
							<div class="d-flex flex-row">
								<select name="medecinRef" class="form-select">
									<option>Medecin Traitant</option>
									<?php 
									while ($row = $medecins->fetch()) {
										echo "<option value='". $row['numRPPS']."'>" . $row['nom'] . " " . $row['prenom'] . "</option>";
									}
									?>
									
								</select>
							</div>
							<div class="d-flex flex-row">
								<span>Num??ro de s??curit?? sociale</span><input class="form-control" type="text" name="numSecu" value="<?php if (isset($patient)) echo $patient[0]['numSecu']; ?>">
							</div>
							<div class="d-flex flex-row">
								<span>Date de naissance</span><input class="form-control" type="date" name="dateNaissance" value="<?php if (isset($patient)) echo $patient[0]['dateNaissance']; ?>">
							</div>
							<div class="d-flex flex-row">
								<span>Lieu de naissance</span><input class="form-control" type="text" name="LieuNaissance" value="<?php if (isset($patient)) echo $patient[0]['LieuNaissance']; ?>">
							</div>
							<div class="d-flex flex-row">
								<span>Code Postal</span><input class="form-control" type="number" name="codePostal" value="<?php if (isset($patient)) echo $patient[0]['codePostal']; ?>">
							</div>
						</div>

						<div class="d-flex flex-column">
							<h1>Notes</h1>
							
								<textarea  name="notes" rows="5" cols="33">
									<?php if (isset($patient)) echo $patient[0]['notes']; ?>
								</textarea>
							
							
						</div>
					</div>
				</div>

				<span class="fs-1 d-md-none d-sm-block text-green"> Liste Patients </span>
				<!-- content -->
				<div class="row h-100 align-items-center text-center">
					<!-- Portail de connexion -->
					<?php 
								if (isset($visites)) {
								?>
					<div class="container ">
						<div class="row justify-content-center">

							<div class="overflow-scroll h-50 col-md-10 col-xl-9 col-sm-7 col-12 green border-2 p-5">

								<table class="table table-striped lightGreen">
									<tr>
										<th>Date</th>
										<th>Motif</th>
										<th>note</th>
									</tr>
									<?php 

									foreach ($visites as $row) {
									echo "<tr>"
											 ."<td>" . $row['motifVisite'] . "</td>"
											 ."<td>" . $row['dateVisite'] . "</td>"
											 ."<td>" . $row['note'] . "</td>"
									?>
									<td>
										
									
									<div class="dropdown green">
										<span class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-auto-close="false" data-bs-toggle="dropdown" aria-expanded="false">
									
											</span>
										<div class="p-0  dropdown-menu dropdown-menu-end green text-white no-border" aria-labelledby="dropdownMenuButton1">
											
												<table class="text-white ">
													<tr><td><input type="submit" name="actionP" value="Afficher"> </td></tr>
												</table>

											
										</div>
									</div>

									</td>
									<?php
											echo "</tr>";
										}
									?>
									
								</table>
								<?php
							}
								?>
							</div>
							<div class="d-flex flex-row justify-content-between">
								<div class="d-flex me-2 py-2 px-3 border-1 green">
								<input type="submit" class="green no-border text-white" value="Annuler">
						
								</div>
								<div class="d-flex me-2 py-2 px-3 border-1 green">
						
									<input type="hidden" name="modif" value="<?php echo $modif; ?>">
									<input type="hidden" name="action" value="fichePatient">
									<input type="hidden" name="controller" value="patientslist">
									<input type="submit" class="green no-border text-white" value="Valider">
						
								</div>
					
							</div>

						</div>

					</div>

				</div>
				
			</form>
			</div>

		</div>


		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
	</div>
</body>
</html>
