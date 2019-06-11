<?php

namespace Liuggio\StatsdClient\Sender;


/**
 * Class EchoSender
 * @package Liuggio\StatsdClient\Sender
 */
Class EchoSender implements SenderInterface
{
    /**
     * {@inheritDoc}
     */
    public function open()
    {
        echo '[open]';

        return true;
    }

    /**
     * {@inheritDoc}
     */
    public function write($handle, $message, $length = null)
    {
        echo "[$message]";

        return strlen($message);
    }

    /**
     * {@inheritDoc}
     */
    public function close($handle)
    {
        echo '[closed]';
    }
}
