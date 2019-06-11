<?php

namespace Liuggio\StatsdClient\Sender;

/**
 * Interface SenderInterface
 * @package Liuggio\StatsdClient\Sender
 */
Interface SenderInterface
{
    /**
     * @abstract
     * @return mixed
     */
    public function open();

    /**
     * @abstract
     *
     * @param        $handle
     * @param string $string
     * @param null   $length
     *
     * @return mixed
     */
    public function write($handle, $string, $length = null);

    /**
     * @abstract
     *
     * @param $handle
     *
     * @return mixed
     */
    public function close($handle);
}
