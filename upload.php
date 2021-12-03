<?php
if (isset($_POST['submit'])) {
	$projekt = $_FILES['projekt'];
	
	$projektName = $_FILES['projekt']['name'];
	$projektTmpName = $_FILES['projekt']['tmp_name'];
	$projektSize = $_FILES['projekt']['size'];
	$projektError = $_FILES['projekt']['error'];
	$projektType = $_FILES['projekt']['type'];
	
	$projektExt = explode('.', $projektName);
	$projektActualExt = strtolower(end($projektExt));
	
	$allowed = array('jpg','jpeg','png', 'pdf');
	
	if (in_array($projektActualExt, $allowed)) {	
		if ($projektError === 0) {
			if ($projektSize < 1000000) {
				$projektNameNew = uniqid('', true).".".$projektActualExt;
				$projektDestination = 'projekty/'.$projektNameNew;
				move_uploaded_file($projektTmpName, $projektDestination);
				header("Location: Wykonane.php");
			} else {
					echo "Plik jest za duży aby go przesłać!";
			}
		} else {
				echo "Wystąpił błąd podczas przesyłania pliku!";
		}
	} else {
			echo "Nie można załadować plików tego typu!";
	}
}

?>

