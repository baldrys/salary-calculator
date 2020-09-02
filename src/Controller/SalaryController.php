<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Salary;
use App\Form\SalaryFormType;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\SalaryRepository;
use App\Service\SalaryCalculator;

class SalaryController extends AbstractController
{
    /**
     * @Route("/", name="calcSalary")
     */
    public function index(Request $request, SalaryCalculator $calculator)
    {

        $salary = new Salary();
        $form = $this->createForm(SalaryFormType::class, $salary);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $salary = $form->getData();
            $salary->setRealRate($calculator->calculateSalary($salary->getBaseRate()));
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($salary);
            $entityManager->flush();
            return $this->redirectToRoute('salaryShow', ['id' => $salary->getId()]);
        }
        return $this->render('salary/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/salary/{id}", name="salaryShow")
     */
    public function show($id, SalaryRepository $repository)
    {
        $salary = $repository
            ->find($id);
        return $this->render('salary/calculatedSalary.html.twig', [
            'controller_name' => 'SalaryController',
            'salary' => $salary
        ]);
    }
}
