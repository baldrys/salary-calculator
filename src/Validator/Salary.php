<?php

namespace App\Validator;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class Salary extends Constraint
{
    /*
     * Any public properties become valid options for the annotation.
     * Then, use these in your validator class.
     */
    public $message = 'Заработная плата не может быть меньше 40000 руб!';

    public function getTargets()
    {
        return self::CLASS_CONSTRAINT;
    }
}
