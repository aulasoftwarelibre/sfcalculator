<?php

/*
 * This file is part of the sfcalculator package.
 * (c) Aula de Software Libre <aulasoftwarelibre@uco.es>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Controller;

use App\DTO\Numbers;
use App\Form\NumbersFormType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CalculatorController extends Controller
{
    /**
     * @Route("/", name="calculator")
     * @Route("/", name="homepage")
     */
    public function index(Request $request)
    {
        $result = null;
        $form = $this->createForm(NumbersFormType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var Numbers $data */
            $data = $form->getData();
            $result = $data->getA() + $data->getB();
        }

        return $this->render('calculator/index.html.twig', [
            'form' => $form->createView(),
            'result' => $result,
        ]);
    }
}
