<?php

namespace App\EventListeners;

use App\Events\UserRegisteredEvent;
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