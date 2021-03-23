<?php

namespace App\EventSubscriber;

use App\Event\UserRegisteredEvent;
use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class UserEventSubscriber implements EventSubscriberInterface
{
    /**
     * @var LoggerInterface
     */
    private $logger;

    public function __construct(LoggerInterface $logger) {

        $this->logger = $logger;
    }

    public static function getSubscribedEvents() : array
    {
        return [
            UserRegisteredEvent::class => 'onRegistered'
        ];
    }

    public function onRegistered(UserRegisteredEvent $event) {

        $this->logger->info("UserEventSubscriber::onRegistered()");
    }
}