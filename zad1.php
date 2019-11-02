<?php
include_once "header.php";
class Silnia {
	private $silnia;
	
	function __construct($s) {
		$this->silnia = $s;
		}
	private function SilniaIteracja() {
		return $this->licz($this->silnia);
		}
	private function licz($s) {
		return $s >1 ? $s * $this->licz($s-1) : 1;
		}
	private function SilniaRekurencja() {
		$ret = $this->silnia;
		for ($x = $this->silnia - 1; $x >1; $x--) {
			$ret = $ret * $x;
			}
		return $ret;
		}
	function Wyswietl() {
		return "Interacyjnie -> {$this->silnia}!={$this->SilniaIteracja()}\n<br/>Rekurencyjnie -> {$this->silnia}!={$this->SilniaRekurencja()}\n";
		}
	}


$silnia = new Silnia(4);
echo $silnia->Wyswietl();

?>