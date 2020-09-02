<?php

namespace App\Form;

use App\Entity\Salary;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class SalaryFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'baseRate',
                NumberType::class,
                [
                    'label'    => 'Зарплата',
                    'required' => true,
                    'invalid_message' => 'Недопустимое значение для числового поля!',
                ]
            )
            ->add('mortgage', CheckboxType::class, [
                'label'    => 'Ипотека',
                'required' => false,
            ])
            ->add('save', SubmitType::class, ['label' => 'Расчитать']);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Salary::class,
        ]);
    }
}
