<?php

namespace App\Form\Type;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * @package App\Form\Type
 */
class CurrencyUpdateType extends BaseType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('currency_from', TextType::class, [
                'required' => true,
                'attr' => [
                    'class' => $this->attrClass,
                    'placeholder' => 'Currency From',
                ],
                'label' => 'Currency From',
                'constraints' => [
                    new Constraints\Length(['max' => 255]),
                    new Constraints\Regex(['pattern' => '/^([a-zA-Z\- ]+)$/', 'message' => $this->regexErrorMessage]),
                ],
            ])
            ->add('currency_to', TextType::class, [
                'required' => true,
                'attr' => [
                    'class' => $this->attrClass,
                    'placeholder' => 'Currency To',
                ],
                'label' => 'Currency To',
                'constraints' => [
                    new Constraints\Length(['max' => 255]),
                    new Constraints\Regex(['pattern' => '/^([a-zA-Z\- ]+)$/', 'message' => $this->regexErrorMessage]),
                ],
            ])
            ->add('ratio', TextType::class, [
                'required' => true,
                'attr' => [
                    'class' => $this->attrClass,
                    'placeholder' => 'Exchange rate',
                ],
                'label' => 'Exchange rate',
                'constraints' => [
                    new Constraints\Length(['max' => 24]),
                    new Constraints\Regex(['pattern' => '/^([0-9\.]+)$/', 'message' => $this->regexErrorMessage]),
                ],
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
        // return 'form_currency_calculator_update';
    }
}
