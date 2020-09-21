<?php

namespace App\Controller;

use App\Entity\Currency;
use App\Form\Type\CurrencyAddType;
use App\Form\Type\CurrencyDeleteType;
use App\Form\Type\CurrencyUpdateType;
use App\Repository\CurrencyRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @package App\Controller
 */
class CrudController extends BaseController
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * @var CurrencyRepository
     */
    private $currencyRepository;

    /**
     * @param EntityManagerInterface $entityManager
     * @param CurrencyRepository $currencyRepository
     */
    public function __construct(EntityManagerInterface $entityManager, CurrencyRepository $currencyRepository)
    {
        $this->entityManager = $entityManager;
        $this->currencyRepository = $currencyRepository;
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function add(Request $request): Response
    {
        $form = $this->createForm(CurrencyAddType::class);

        $errors = [];
        if ($request->isMethod(Request::METHOD_POST)) {
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $formData = $form->getData();

                $currency = new Currency();
                $currency->setNameFrom($formData['currency_from']);
                $currency->setNameTo($formData['currency_to']);
                $currency->setRatio($formData['ratio']);

                $this->entityManager->persist($currency);
                $this->entityManager->flush();

                return $this->redirect($request->getUri());
            }
        }

        return $this->render('pages/add/index.html.twig', [
            'form' => $form->createView(),
            'errors' => $errors,
        ]);
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function updateList(Request $request): Response
    {
        return $this->render('pages/update/list.html.twig', [
            'currencies' => $this->currencyRepository->getCurrencies(),
        ]);
    }

    /**
     * @param Request $request
     * @param $id
     * @return Response
     */
    public function update(Request $request, $id): Response
    {
        $form = $this->createForm(CurrencyUpdateType::class);

        $errors = [];
        if ($request->isMethod(Request::METHOD_POST)) {
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $formData = $form->getData();

                $currencyFrom = $formData['currency_from'];
                $currencyTo = $formData['currency_to'];
                $ratio = $formData['ratio'];

                if (!empty($currencyFrom) || !empty($currencyTo) || !empty($ratio)) {
                    $currency = $this->currencyRepository->getCurrencyById($id);

                    if ($currency !== null) {
                        if (!empty($currencyFrom)) {
                            $currency->setNameFrom($currencyFrom);
                        }

                        if (!empty($currencyTo)) {
                            $currency->setNameTo($currencyTo);
                        }

                        if (!empty($ratio)) {
                            $currency->setRatio($ratio);
                        }
                    }

                    $this->entityManager->persist($currency);
                    $this->entityManager->flush();

                    return $this->redirect($request->getUri());
                }
            }
        }

        return $this->render('pages/update/show.html.twig', [
            'form' => $form->createView(),
            'errors' => $errors,
            'id' => $id,
        ]);
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function deleteList(Request $request): Response
    {
        return $this->render('pages/delete/list.html.twig', [
            'currencies' => $this->currencyRepository->getCurrencies(),
        ]);
    }

    /**
     * @param Request $request
     * @param $id
     * @return Response
     */
    public function delete(Request $request, $id): Response
    {
        $currency = $this->currencyRepository->getCurrencyById($id);

        if ($currency !== null) {
            $this->entityManager->remove($currency);
            $this->entityManager->flush();
        }

        return $this->redirect($this->generateUrl('app_delete_index'));
    }
}
