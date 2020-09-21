<?php

namespace App\Controller;

use App\Entity\Currency;
use App\Form\Type\CurrencyType;
use App\Repository\CurrencyRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @package App\Controller
 */
class HomeController extends BaseController
{
    /**
     * @var CurrencyRepository
     */
    private $currencyRepository;

    /**
     * @param CurrencyRepository $currencyRepository
     */
    public function __construct(CurrencyRepository $currencyRepository)
    {
        $this->currencyRepository = $currencyRepository;
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function index(Request $request): Response
    {
        $form = $this->createForm(CurrencyType::class);

        $errors = [];
        $convertedValue = '';
        $currencyNameTo = '';
        if ($request->isMethod(Request::METHOD_POST)) {
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $formData = $form->getData();

                $amount = $formData['amount'];

                /** @var Currency $currency */
                $currency = $this->currencyRepository->getCurrencyBySlug($formData['currency']);
                $convertedValue = $amount * $currency->getRatio();
                $currencyNameTo = $currency->getNameTo();
            }
        }

        return $this->render('pages/home/index.html.twig', [
            'form' => $form->createView(),
            'errors' => $errors,
            'convertedValue' => $convertedValue,
            'currencyNameTo' => $currencyNameTo,
        ]);
    }
}
