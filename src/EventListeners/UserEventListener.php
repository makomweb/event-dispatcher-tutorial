<?php

namespace App\EventListeners;

use App\Events\UserRegisteredEvent;

class UserEventListener {
    public function onRegistered(UserRegisteredEvent $event) {
        $user = $event->getUser();
        echo $user->name . "\r\n";
        echo $user->age . "\r\n";
    }
}