<?php

namespace Dhii\Action;

use Exception as RootException;
use Dhii\Action\Exception\CouldNotRunException;

/**
 * Functionality for creating Could Not Run exceptions.
 *
 * @since [*next-version*]
 */
trait CreateCouldNotRunExceptionCapableTrait
{
    protected function _createCouldNotRunException($message = null, $code = null, RootException $previous = null, $action = null)
    {
        return new CouldNotRunException($message, $code, $previous, $action);
    }
}
