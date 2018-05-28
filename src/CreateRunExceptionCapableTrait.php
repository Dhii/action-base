<?php

namespace Dhii\Action;

use Dhii\Action\Exception\RunException;
use Exception as RootException;
use Dhii\Util\String\StringableInterface as Stringable;

/**
 * Functionality for creating Run exceptions.
 *
 * @since [*next-version*]
 */
trait CreateRunExceptionCapableTrait
{
    /**
     * Creates a new Run exception.
     *
     * @since [*next-version*]
     *
     * @param string|Stringable|int|float|bool|null $message  The error message, if any.
     * @param int|float|string|Stringable|null      $code     The error code, if any.
     * @param RootException|null                    $previous The inner exception, if any.
     * @param ActionInterface|null                  $action   The action that encountered a problem, if any.
     *
     * @return RunException The new exception.
     */
    protected function _createRunException($message = null, $code = null, RootException $previous = null, $action = null)
    {
        return new RunException($message, $code, $previous, $action);
    }
}
