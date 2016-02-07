<?php 

function get_title(){
	if (@$_SERVER["REQUEST_URI"]) {
		$ruri = $_SERVER["REQUEST_URI"];
		$ruri = strtok(substr($ruri, strrpos($ruri, "/")+1), ".");
		$ruri = strip_tags($ruri);
		switch ($ruri) {
			case 'hakkinda':
				$title = "Hakkında";
				break;

			case 'komutlar':
				$title = "Komutlar";
				break;

			case 'ozellikler':
				$title = "Özellikler";
				break;

			case '':
				$title = "Botişko";
				break;

			default:
				$title = "Hay aksi!";
				header("HTTP/1.0 404 Not Found");
				break;
		}
	} else {
		// Just in case
		$title = "Botişko";
	}
	echo "<title>$title</title>";
}

function get_page(){
	if (@$_GET) {
		$page = $_GET["page"];
		$page = strip_tags($page);
		switch ($page) {
			case 'hakkinda':
			case 'komutlar':
			case 'ozellikler':
				return require_once 'pages/'.$page.'.php';
				break;

			case '':
				return require_once 'pages/index.php';
				break;

			default:
				return require_once 'pages/hata.php';
				break;
		}
	} else {
		return false;
	}
}

?>