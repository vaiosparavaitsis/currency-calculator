<?php

namespace App\Traits;

use Symfony\Component\HttpFoundation\Request;

/**
 * @package App\Traits
 */
trait RequestTrait
{
    /**
     * @param Request $request
     * @param string $name
     * @return mixed
     */
    public function getRequestParameter(Request $request, string $name)
    {
        return $request->request->get($name);
    }
}