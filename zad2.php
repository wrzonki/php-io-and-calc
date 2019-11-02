<?php
include_once "header.php";
class Data {
	private $dzien = 0;
	private $miesiac = 0;
	private $rok = 0;
	private $notatka = '';
	private $ilosc = 0;
	function __construct($dzien = 0, $miesiac = 0, $rok = 0, $notka = '') {
		$this->dzien = (int)$dzien;
		$this->miesiac = (int)$miesiac;
		$this->rok = (int)$rok;
		$this->notatka = $notka;
		$this->ilosc = @date("t", mktime(0, 0, 0, $miesiac, $dzien, $rok)); 
	}
	
	private function MiesiacNaTekst() {
		$m = Array(1=>'styczeń', 2=>'luty', 3=>'marzec', 4=>'kwiecień', 5=>'maj', 6=>'czerwiec', 7=>'lipiec', 8=>'sierpień', 9=>'wrzesień', 10=>'październik', 11=>'listopad', 12=>'grudzień');
		return  @$m[$this->miesiac];
	}
	
	function Wyswietl() {
		return $this->Walidacja() ? "Miesiąc {$this->MiesiacNaTekst()} ma tylko/aż {$this->ilosc} dni\n<br>dzień={$this->dzien}, miesiąc ={$this->MiesiacNaTekst()}, rok={$this->rok}\n<br><strong>{$this->notatka}</strong>" : false;
	}
	
	private function Walidacja() {
		if ((int)$this->dzien > 31 || (int)$this->dzien < 1 || (int)$this->miesiac > 12 || (int)$this->miesiac < 1 || (int)$this->rok <2000) {
			return false;
		}
		else {
			return  true;
		}
	}
	
	
}

$final = new Data(23, '2', 2001, 'Urodziny Justyny');
echo $final->Wyswietl();