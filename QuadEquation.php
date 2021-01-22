<?php
	namespace Zhukov;

	use core\EquationInterface;

	Class QuadEquation extends Equation implements EquationInterface{

	    public function equationTwo(float $a, float $b, float $c) {
			

	        if ($a == 0) {
	            return $this->solve($b, $c, null);
	        }
			$d = $this->dis($a, $b, $c);

			if ($d < 0){
				$this->x = false;
				throw new ZhukovException("Error: equation has no solutions\n");
			}

			$d = sqrt($d);
			$x1 = ((-$b) + $d) / (2 * $a);
			$x2 = ((-$b) - $d) / (2 * $a);

			if($x1 == $x2){
				$this->x = [$x1];
				return [$x1];
			}
			\Zhukov\MyLog::log("Determined that is a quadratic equation\n");
			$this->x = array($x1,$x2);
			return  array($x1,$x2);
		}

		protected function dis($a, $b, $c) {
			$d = ($b**2) - 4 * $a * $c;
			return $d;
		}
	}	
?>