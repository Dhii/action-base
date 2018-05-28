<?php

namespace Dhii\Action;

use Exception as RootException;
use Dhii\Action\Exception\CouldNotRunException;
use Dhii\Util\String\StringableInterface as Stringable;

/**
 * Functionality for creating Could Not Run exceptions.
 *
 * @since [*next-version*]
 */
trait CreateCouldNotRunExceptionCapableTrait
{
    /**
     * Creates a new Could Not Run exception.
     *
     * @since [*next-version*]
     *
     * @param string|Stringable|int|float|bool|null $message  The error message, if any.
     * @param int|float|string|Stringable|null      $code     The error code, if any.
     * @param RootException|null                    $previous The inner exception, if any.
     * @param ActionInterface|null                  $action   The action that could not run, if any.
     *
     * @return CouldNotRunException The new exception.
     */
    protected function _createCouldNotRunException($message = null, $code = null, RootException $previous = null, $action = null)
    {
        return new CouldNotRunException($message, $code, $previous, $action);
    }
}
