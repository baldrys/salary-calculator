<?php

namespace App\Service;

class SalaryCalculator
{
	const FIXED_SALARY = 50000;
	const STANDART_RATE = 0.13;
	const OVER_RATE = 0.18;

	public function calculateSalary($salary)
	{
		if ($salary < self::FIXED_SALARY)
			return $salary * (1 - self::STANDART_RATE);
		else {
			$overPrice = $salary - self::FIXED_SALARY;
			return self::FIXED_SALARY * (1 - self::STANDART_RATE) + $overPrice * (1 - self::OVER_RATE);
		}
	}
}
