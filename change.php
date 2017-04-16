<?php
class Nominal //klasa nominal
{
protected $money;

public function __construct($money) //metdoa konstruuje obiekt
	{
		$this->money=$money; //obiket sklada sie z 1 zmiennej nominal
	}

public function displayData() //metoda wyswietli mozliwe kombinacje
	{
		$nomi = array(200, 100, 50, 20, 10, 5, 2, 1); //szereg nominalow od 200zł do 1zł
		$result = 0; //zmienna $result jest == 0 i za pomoca niej wyswietlimy wynik (aby w echo nie trzeba bylo znowu pisac dzialania)
		if(is_numeric($this->money) == false) //walidacja dla cyfr
		{
			echo "Proszę podać wartość nominału za pomocą cyfr";
		}
		else if(is_numeric($this->money) == true)
		{
			$counter = 0;
			foreach($nomi as $value)
			{
				if($this->money == $value)
				{
					$counter++;
				}
			}
			if($counter == 0)
			{
				echo "Wprowadz pieniadz: 200, 100, 50, 20, 10, 5, 2 zl";
			}
			else
				{		
				foreach($nomi as $value) //dla kazdego nominalu z przedzialu $nomi zapisanego jako $value
				{
					if($this->money > $value) //jezeli dane wpisane przez usytkownika sa wieksze niz dany element ($value) szeregu $nomi
					{
						$result = ($this->money / $value); //do zmiennej $result dodajemy wynik dzielenia liczby usera przez $value to nam da ilosc potrzebnych banktonow lub monet o nomilane $value
						
					if($this->money % $value != 0) //jezeli reszta z dzielenia != 0 jest to mozliwe tylko w 2 przypadkach 50zl i 5zl
					{
						$rest = ($this->money % $value); //jest to reszta z tego dzielenia                       //$rest banknot o nizszym nominale niż $value
						echo "Mozna rozmienic na: " . (($this->money - $rest)/$value) . " po " . $value . "zł oraz " . $rest . "zł<br><br>";
					}   //powyzsze dzialanie pozwala nam wyliczyc bez reszty ile dostaniemy banknotow po np. 20zl. Odejmujemy $rest do money poniewaz kwota podana przez uzytkownika jest stala np. 50 i to od niej musimy odjac reszte z dzielenia by otrzymac wynik bez reszty 
						else
						{
							echo "Mozna rozmienic na: " . $result . " po " . $value . "zł <br><br>"; //gdy % == 0 od razu przechodzimy do wyniku
						}
					}
				}
			}
		}
	}
}

$kwota = $_POST['kwota']; //dane sczytane z HTML wprowadzone przez usera
$rozm = new Nominal($kwota); //nowy obiekt na podstawie klasy Nominal
$rozm->displayData(); //uzycie metdoy displayData(); na obiekcie $rozm stworzonym na podst. klasy Nominal
?>