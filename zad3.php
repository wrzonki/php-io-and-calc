<?php
include_once "header.php";
class Czytacz {
	private $tytuly = Array();
	private $dane = Array();
	
	function WczytajDane($nazwa,$separator_glowny=':',$separator_poboczny=',') {
		if (file_exists($nazwa)) {
			$p = fopen($nazwa, 'r');
			while (($buffer = fgets($p)) !== false) {
				$a = explode($separator_glowny,$buffer);
				$this->tytuly[] = $a[0];
				$this->dane[] = explode($separator_poboczny, $a[1]);
			}
		return true;
		}
		else return "Nie można otworzyć pliku '{$nazwa}'!";
	}
	
	function WyswietlListy($typ) {
		$ret = '<ul>';
		foreach ($this->tytuly as $key=>$val) {
			$kol = $key +1;
			$w = $typ == 1 ? "{$kol} " : '';
			$ret .= "<h3>{$w}{$val}\n</h3>";
			foreach ($this->dane[$key] as $key2=>$val2) {
				$kol2 = $key2 +1;
				$w2 = $typ == 1 ? "{$kol2}" : '';
				$ret .= "<li>\t{$w2}{$val2}</li>\n";
			}
		}
	return $ret;
	}
}

$cz = new Czytacz();
$e = $cz->WczytajDane('zad3.txt');
echo $e == true ? $cz->WyswietlListy(0) : $e;
?>