<?php

namespace Dhii\Action\Exception;

use Dhii\Action\ActionInterface;
use Dhii\Util\String\StringableInterface as Stringable;
use Exception as RootException;

/**
 * {@inheritdoc}
 *
 * @since [*next-version*]
 */
class CouldNotRunException extends AbstractBaseActionAwareException implements CouldNotRunExceptionInterface
{
    /**
     * {@inheritdoc}
     *
     * @since [*next-version*]
     *
     * @param string|Stringable|int|float|bool|null $message  The message, if any.
     * @param int|float|string|Stringable|null      $code     The numeric error code, if any.
     * @param RootException|null                    $previous The inner exception, if any.
     * @param ActionInterface|null                  $action   The action that could not run, if any.
     */
    public function __construct($message = null, $code = null, RootException $previous = null, $action = null)
    {
        $this->_initBaseException($message, $code, $previous);
        $this->_setAction($action);

        $this->_construct();
    }
}
