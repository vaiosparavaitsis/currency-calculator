<?php

namespace App\Service;

use App\Entity\Currency;
use App\Interfaces\CurrencyServiceInterface;
use App\Repository\CurrencyRepository;

/**
 * @package App\Service
 */
class CurrencyService implements CurrencyServiceInterface
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
     * @inheritDoc
     */
    public function getCurrencyChoices(): array
    {
        $currencies = $this->currencyRepository->getCurrencies();

        $choices = [];
        /** @var Currency $currency */
        foreach ($currencies as $currency) {
            $choices[$currency->getFullName()] = $currency->getSlug();
        }

        return $choices;
    }

    /**
     * @inheritDoc
     */
    public function getPreferredChoice(array $choices, string $choice): string
    {
        return in_array($choice, $choices, false) ? $choice : '';
    }
}
