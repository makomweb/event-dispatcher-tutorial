<?php

namespace App;

use App\Events\UserRegisteredEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class UserEventSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents() : array
    {
        return [
            UserRegisteredEvent::class => 'onUserRegistered'
        ];
    }

    public function onUserRegistered(UserRegisteredEvent $event) {
        // TODO implement!
    }
}