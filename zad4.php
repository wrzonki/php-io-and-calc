<?php


include_once "header.php";

class KwadratLiczbowy {
	protected $n;
	protected $from;
	protected $to;
	protected $tab = Array(Array());
	
	
	function __construct($n, $from, $to) {
		$this->n = $n;
		$this->from = $from;
		$this->to = $to;
	}
	
	function Wypelnij() {
		for ($x = 0; $this->n > $x; $x++) {
			for ($y = 0; $this->n > $y; $y++) {
				$this->tab[$x][$y] = rand($this->from, $this->to);
			}
		}
	}
	
	function Wyswietl() {
		$ret = "<table>\n<tbody>\n";
		foreach ($this->tab as $y) {
			$ret .= "<tr>\n";
			foreach ($y as $val) {
				$ret .= "<td>{$val}</td>";
			}
			$ret .= "\n</tr><br/>\n";
		}
		$ret .= "</tbody></table>";
		return $ret;

	}
	
	function Informacja() {
		return "<p>Oto kwadrat liczbowy (bok={$this->n}, liczby losowe z zakresu od {$this->from} do {$this->to}).\n<br/></p>";
	}
}

class KwadratSpecjalny extends KwadratLiczbowy {
	protected  $suma =0;
	
	function __construct($n, $from, $to, $suma) {
		parent::__construct($n, $from, $to); 
		$this->suma = $suma;	
	}
	
	function Informacja() {
		$ret = parent::Informacja();
		$ret .= "<p>Suma liczb w każdym wierszu ma wynosić {$this->suma}\n<br/></p>";
		return $ret;
	}
	
	function Wypelnij() {
		if ($this->from * $this->n > $this->suma || $this->to * $this->n < $this->suma) return false;
		for ($x = 0; $this->n > $x; $x++) {
			$suma = 0;
			while ($suma != $this->suma) {
				$suma = 0;
				for ($y = 0; $this->n > $y; $y++) {
					$rand = rand($this->from, $this->to);
					$suma += $rand;
					$this->tab[$x][$y] = $rand;
				}
			}
		}
		return true;
	}
}

$tab = new KwadratSpecjalny(10, 2, 5, 25);
$tab->Wypelnij();
echo $tab->Informacja();
echo $tab->Wyswietl();
?>