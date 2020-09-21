<?php

namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;

/**
 * @package App\Form\Type
 */
class BaseType extends AbstractType
{
    /**
     * @var string
     */
    protected $attrClass = 'form-control clbg-custom-grey-1 clbghi-custom-grey-1 fs-12 fwd-500 box-shadow-focus-none clb-black-dark-5 clbf-blacker-darkest-7';

    /**
     * @var string
     */
    protected $regexErrorMessage = 'The field contains characters that are not allowed.';
}
