<?php
namespace Zhukov;

use core\EquationInterface;

Class Equation implements EquationInterface {
	protected $x;
	public function solve($a, $b, $c):array{	
		if($a == 0){
			throw new ZhukovException("Determined that the equation doesn't exist\n");
		}
		\Zhukov\MyLog::log("Determined that is a linear equation\n");
		$x = -$b/$a;
        $this->x = [$x];
        return [$x];
	}
}

?>