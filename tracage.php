<?		

// 		┌───────────────────────────────────────────────────────────────────────────────────────────────┐
// 		│ tracage : Création d'un fichier dans /log/tracage.log qui sert de traceur AJAX     		│
// 		└───────────────────────────────────────────────────────────────────────────────────────────────┘
	
	function tracage($texte) {
		// Si on peut déterminer l'adresse IP
		$adresse_ip = Null;
		if(isset($_SERVER['REMOTE_ADDR'])) {
			$adresse_ip = '"'.$_SERVER['REMOTE_ADDR'].'"';
		}
		$txt_log=$adresse_ip.';'.date('d/m/Y H:i:s').';'.$texte."\n";
		// écriture dans un fichier de traçage
		$fichier = "log/tracage_".date('Ymd').".log";

		// Vous pouvez faire soit un seul fichier / soit un fichier par jour avec date('Ymd') dans le nom du fichier.
		// $fichier = "/log/tracage.log";
		
		preg_match("`^(.*\/)([^\/]+)$`",$_SERVER['SCRIPT_FILENAME'], $matches);
		$chemin_script = $matches[1];
		$fichierCible = $chemin_script.$fichier;
		$myFile=fopen($fichierCible,'a+');
		fputs($myFile,$txt_log);
		fclose($myFile);
	}

?>	
