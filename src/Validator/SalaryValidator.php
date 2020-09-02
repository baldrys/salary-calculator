<?php

namespace App\Validator;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class SalaryValidator extends ConstraintValidator
{
    public function validate($salary, Constraint $constraint)
    {
        if ($salary->getMortgage() === true && $salary->getBaseRate() < 40000)
            $this->context->buildViolation($constraint->message)
                ->addViolation();
    }
}
