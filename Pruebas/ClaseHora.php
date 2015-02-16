<?php

class Hora{

	private $hora;
	private $minuto;
	private $segundo;

	function __construct()
	{

		$this-> hora = 00;
		$this-> minuto = 00;
		$this-> segundo = 00;

	}

	function Asigna($h, $m, $s)
	{

		$this-> hora = $h;
		$this-> minuto = $m;
		$this-> segundo = $s;
		$this->EsValida();
	}
	
	function devHora()
	{
		return $this->hora;
	}

	function devMinutos()
	{
		return $this->minuto;
	}
	
	function devSegundos()
	{
		return $this->segundo;
	}
	
	private function EsValida()
	{
		if ($this-> segundo < 0)
		{
			$this-> segundo = 0;
		}

		while ($this-> segundo >= 60)
		{
			$this-> segundo = $this-> segundo - 60;
			$this-> minuto = $this-> minuto + 1;
		}

		if ($this-> minuto < 0)
		{
			$this-> minuto = 0;
		}

		while ($this-> minuto >= 60)
		{
			$this-> hora = $this-> hora + 1;
			$this-> minuto = $this-> minuto - 60;
		}

		if ($this-> hora < 0)
		{
			$this-> hora = 00;
		}

		while ($this-> hora >= 24)
		{
			$this-> hora = $this-> hora - 24;
		}

	}

	function daHoraTotal()//ToString
	{
		return "$this->hora : $this->minuto : $this->segundo";
	}

	function A_segundos()
	{
		$segundosTrans = 0;

		for ($i = 0; $i < $this->hora; $i++)
		{
			$segundosTrans = $segundosTrans + 3600;
		}

		for ($i = 0; $i < $this->minuto; $i++)
		{
			$segundosTrans = $segundosTrans + 60;
		}

		$segundosTrans = $segundosTrans + $this->segundo;

		return $segundosTrans;

	}

	function de_Segundos($sec)
	{
		$this->hora =00;
		$this->minuto=00;
		$this->segundo=00;

		while ($sec >= 3600)
		{
			$this->hora++;
				
			if ($this->hora >= 24)
			{
				$this->hora = 00;
			}
				
			$sec = $sec - 3600;
		}

		while ($sec >= 60)
		{
			$this->minuto++;

			if ($this->minuto >= 60)
			{
				$this->minuto = 00;
				$this->hora++;

				if ($this->hora >= 24)
				{
					$this->hora = 00;
				}
			}

			$sec = $sec - 60;
		}

		$this->segundo = $sec;

	}

	function segundos_desde(Hora $SecHora)
	{
		$segundos_t = 0;

		for ($i = $this->hora; $i != $SecHora->hora; $i++)
		{
			$segundos_t = $segundos_t + 3600;
				
			if ($i == 24)
			{
				$i = -1;
			}
		}

		for ($i = $this->minuto; $i != $SecHora->minuto; $i++)
		{
			$segundos_t = $segundos_t + 60;
				
			if ($i == 60)
			{
				$i = 0;
			}

		}

		for ($i = $this->segundo; $i != $SecHora->segundo; $i++)
		{
			$segundos_t++;
				
			if ($i == 60)
			{
				$i = 0;
			}

		}


		return $segundos_t;
	}

	function Siguiente($sec = 1)
	{

		for ($i = 0; $i < $sec; $i++)
		{
		$this->segundo++;

		if ($this->segundo == 60)
		{
		$this->segundo=0;
			$this->minuto++;
			 
			if ($this->minuto == 60)
			{
			$this->hora++;
			$this->minuto = 0;

				if ($this->hora == 24)
				{
				$this->hora = 0;
			}
			}
			}

			}


			}

			function Anterior($sec = 1)
			{

			for ($i = 0; $i < $sec; $i++)
			{
			$this->segundo--;

			if ($this->segundo == -1)
			{
			$this->segundo=59;
			$this->minuto--;
				
			if ($this->minuto == -1)
			{
				$this->hora--;
				$this->minuto = 59;

				if ($this->hora == -1)
				{
					$this->hora = 23;
				}
				}
				}

			}


			}

			function copia()
			{


			}

			function esIgual(Hora $horaIg)
			{
			if (($this->hora == $horaIg->hora) && ($this->minuto == $horaIg->minuto) && ($this->segundo == $horaIg->segundo))
			{
			return  true;
			}

			return false;
			}

			function esMenor(Hora $horaMen)
			{
			if ($this->hora < $horaMen->hora)
			{
			return true;
				
			}else if ($this->hora > $horaMen->hora)
			{
			return false;

}else if ($this->hora == $horaMen->hora)
{
if ($this->minuto < $horaMen->minuto)
{
return true;

}else if ($this->minuto > $horaMen->minuto)
{
return false;

}else if ($this->minuto == $horaMen->minuto)
{

if ($this->segundo < $horaMen->segundo)
{
return true;
	
}else if ($this->segundo >= $horaMen->segundo)
	{
	return false;
}

}

}

}

function esMayor(Hora $horaMen)
{
if ($this->hora > $horaMen->hora)
{
return true;

}else if ($this->hora < $horaMen->hora)
{
return false;

}else if ($this->hora == $horaMen->hora)
{
if ($this->minuto > $horaMen->minuto)
{
return true;

}else if ($this->minuto < $horaMen->minuto)
{
return false;

}else if ($this->minuto == $horaMen->minuto)
{

if ($this->segundo > $horaMen->segundo)
{
return true;

}else if ($this->segundo <= $horaMen->segundo)
{
return false;
}

}

}

}

function CargaHoraSistema()
{


$horaEnSec = time();

$this->segundo = date('s', $horaEnSec);
$this->minuto = date('i',$horaEnSec);
$this->hora = date('H', $horaEnSec);



}

function ConvierteASeguntos($ho, $min, $seg)
{
 
$segT = (3600 * $h) + (60 * $min) + $seg;
 
return $segT;
}

function ConvierteAHora($segund)
{
$this->hora=0;
$this->minuto = 0;
$this->segundo = 0;

for ($i=0; $i < $segund; $i++)
{
$this->segundo++;

if ($this->segundo == 60)
{
$this->segundo = 0;
$this->minuto++;

if ($this->minuto == 60)
{
$this->minuto = 0;
$this->hora++;
	
if ($this->hora == 24)
{
$this->hora = 0;
}

}

}
}
}


}

?>