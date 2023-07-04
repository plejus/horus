<?php

namespace App\Exception;

use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

class MissingShapeHandlerException extends UnprocessableEntityHttpException
{
}