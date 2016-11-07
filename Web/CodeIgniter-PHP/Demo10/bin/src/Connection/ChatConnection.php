<?php

namespace Chat\Connection;

use Chat\Repository\ChatRepositoryInterface;
use Ratchet\ConnectionInterface;

class ChatConnection implements ChatConnectionInterface
{
    /**
     * The ConnectionInterface instance
     *
     * @var ConnectionInterface
     */
    private $connection;

    /**
     * The username of this connection
     *
     * @var string
     */
    private $name;

    /**
     * The ChatRepositoryInterface instance
     *
     * @var ChatRepositoryInterface
     */
    private $repository;

    /**
     * ChatConnection Constructor
     *
     * @param ConnectionInterface     $conn
     * @param ChatRepositoryInterface $repository
     * @param string                  $name
     */
    public function __construct(ConnectionInterface $conn, ChatRepositoryInterface $repository, $name = "")
    {
        $this->connection = $conn;
        $this->name = $name;
        $this->repository = $repository;
    }

    /**
     * Sends a message through the socket
     *
     * @param string $sender
     * @param string $msg
     * @return void
     */
    public function sendMsg($sender, $msg)
    {
        $this->send([
            'action'   => 'message',
            'username' => $sender,
            'msg'      => $msg
        ]);
    }

    /**
     * Get the connection instance
     *
     * @return ConnectionInterface
     */
    public function getConnection()
    {
        return $this->connection;
    }

    /**
     * Set the name for this connection
     *
     * @param string $name
     * @return void
     */
    public function setName($name)
    {
        if ($name === "")
            return;

        // Check if the name exists already
        if ($this->repository->getClientByName($name) !== null)
        {
            $this->send([
                'action'   => 'setname',
                'success'  => false,
                'username' => $this->name
            ]);

            return;
        }

        $this->name = $name;

        $this->send([
            'action'   => 'setname',
            'success'  => true,
            'username' => $this->name
        ]);
    }

    /**
     * Get the username of the connection
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Send data through the socket
     *
     * @param  array  $data
     * @return void
     */
    private function send(array $data)
    {
        $this->connection->send(json_encode($data));
    }
}
