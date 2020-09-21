<?php

namespace App\Interfaces;

/**
 * @package App\Interfaces
 */
interface CurrencyServiceInterface
{
    /**
     * @return array
     */
    public function getCurrencyChoices(): array;

    /**
     * @param array $choices
     * @param string $choice
     * @return string
     */
    public function getPreferredChoice(array $choices, string $choice): string;
}
