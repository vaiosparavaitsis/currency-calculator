<?php

namespace App\Controller;

use App\Traits\JsonResponseTrait;
use App\Traits\RequestTrait;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @package App\Controller
 */
abstract class BaseController extends AbstractController
{
    use RequestTrait;
    use JsonResponseTrait;
}
