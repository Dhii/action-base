<?php

namespace Dhii\Action;

use Dhii\Action\Exception\RunException;
use Exception as RootException;

/**
 * Functionality for creating Run exceptions.
 *
 * @since [*next-version*]
 */
trait CreateRunExceptionCapableTrait
{
    /**
     * @since [*next-version*]
     */
    protected function _createRunException($message = null, $code = null, RootException $previous = null, $action = null)
    {
        return new RunException($message, $code, $previous, $action);
    }
}
