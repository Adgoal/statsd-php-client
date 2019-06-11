<?php

namespace Liuggio\StatsdClient\Sender;

use Liuggio\StatsdClient\Exception\InvalidArgumentException;

/**
 * Class SocketSender
 * @package Liuggio\StatsdClient\Sender
 */
Class SocketSender implements SenderInterface
{
    private $port;
    private $host;
    private $protocol;

    /**
     * SocketSender constructor.
     * @param string $hostname
     * @param int $port
     * @param string $protocol
     */
    public function __construct($hostname = 'localhost', $port = 8126, $protocol = 'udp')
    {
        $this->host = $hostname;
        $this->port = $port;

        switch ($protocol) {
            case 'udp':
                $this->protocol = SOL_UDP;
                break;
            case 'tcp':
                $this->protocol = SOL_TCP;
                break;
            default:
                throw new InvalidArgumentException(sprintf('Use udp or tcp as protocol given %s', $protocol));
                break;
        }

    }

    /**
     * {@inheritDoc}
     */
    public function open()
    {
        $fp = socket_create(AF_INET, SOCK_DGRAM, $this->getProtocol());

        return $fp;
    }

    /**
     * {@inheritDoc}
     */
    public function write($handle, $message, $length = null)
    {
        return socket_sendto($handle, $message, strlen($message), 0, $this->getHost(), $this->getPort());
    }

    /**
     * {@inheritDoc}
     */
    public function close($handle)
    {
        socket_close($handle);
    }


    /**
     * @param $host
     */
    protected function setHost($host)
    {
        $this->host = $host;
    }

    /**
     * @return string
     */
    protected function getHost()
    {
        return $this->host;
    }

    /**
     * @param $port
     */
    protected function setPort($port)
    {
        $this->port = $port;
    }

    /**
     * @return int
     */
    protected function getPort()
    {
        return $this->port;
    }

    /**
     * @param $protocol
     */
    protected function setProtocol($protocol)
    {
        $this->protocol = $protocol;
    }

    /**
     * @return int
     */
    protected function getProtocol()
    {
        return $this->protocol;
    }
}
