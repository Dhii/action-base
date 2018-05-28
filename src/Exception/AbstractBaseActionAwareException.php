<?php

namespace Dhii\Action\Exception;

use Dhii\Action\ActionAwareTrait;
use Dhii\Action\NormalizeActionCapableTrait;
use Dhii\Exception\AbstractBaseException;

/**
 * Common functionality for action-aware exceptions.
 *
 * @since [*next-version*]
 */
abstract class AbstractBaseActionAwareException extends AbstractBaseException implements ActionAwareExceptionInterface
{
    /* @since [*next-version*] */
    use ActionAwareTrait;

    /* @since [*next-version*] */
    use NormalizeActionCapableTrait;

    /**
     * {@inheritdoc}
     *
     * @since [*next-version*]
     */
    public function getAction()
    {
        return $this->_getAction();
    }
}
