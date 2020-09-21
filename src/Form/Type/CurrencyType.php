<?php

namespace App\Form\Type;

use App\Enum\PreferredChoicesEnum;
use App\Interfaces\CurrencyServiceInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * @package App\Form\Type
 */
class CurrencyType extends BaseType
{
    /**
     * @var CurrencyServiceInterface
     */
    private $currencyService;

    /**
     * @param CurrencyServiceInterface $currencyService
     */
    public function __construct(CurrencyServiceInterface $currencyService)
    {
        $this->currencyService = $currencyService;
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $currencyChoices = $this->currencyService->getCurrencyChoices();

        $builder
            ->add('amount', TextType::class, [
                'required' => true,
                'attr' => [
                    'class' => $this->attrClass,
                    'placeholder' => 'Enter amount',
                ],
                'label' => 'Enter amount',
                'constraints' => [
                    new Constraints\Required(),
                    new Constraints\NotBlank(),
                    new Constraints\Length(['min' => 1, 'max' => 24]),
                    new Constraints\Regex(['pattern' => '/^([0-9\.]+)$/', 'message' => $this->regexErrorMessage]),
                ],
            ])
            ->add('currency', ChoiceType::class, [
                'required' => true,
                'attr' => [
                    'class' => $this->attrClass,
                    'placeholder' => 'Currency',
                ],
                'label' => 'Currency',
                'constraints' => [
                    new Constraints\Required(),
                    new Constraints\NotBlank(),
                    new Constraints\Length(['min' => 1, 'max' => 255]),
                    new Constraints\Regex(['pattern' => '/^([a-zA-Z\-]+)$/', 'message' => $this->regexErrorMessage]),
                ],
                'choices' => $currencyChoices,
                'preferred_choices' => [$this->currencyService->getPreferredChoice($currencyChoices, PreferredChoicesEnum::EURO_TO_US_DOLLAR)],
            ]);
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'csrf_protection' => false,
            // 'csrf_field_name' => '_token',
            // 'csrf_token_id' => 'login_id',
        ]);
    }

    /**
     * @return string
     */
    public function getBlockPrefix(): string
    {
        return '';
        // return 'form_currency_calculator';
    }
}
