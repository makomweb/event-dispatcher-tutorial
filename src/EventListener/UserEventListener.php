<?php

namespace App\EventListener;

use App\Event\UserRegisteredEvent;
use Psr\Log\LoggerInterface;

class UserEventListener {

    /**
     * @var LoggerInterface
     */
    private $logger;

    public function __construct(LoggerInterface $logger) {

        $this->logger = $logger;
    }

    public function onRegistered(UserRegisteredEvent $event) {

        $this->logger->info("UserEventListener::onRegistered()");
    }
}