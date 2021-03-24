# Event dispatcher / subscriber / listener tutorial

### created with 

~~~bash
> symfony new event-dispatcher-tutorial
> composer require symfony/event-dispatcher  
~~~

## Dispatch an event

~~~php
class UserRegisteredEvent extends Event {
    const NAME = 'user.registered';
    protected $user;

    public function __construct(User $user) {
        $this->user = $user;
    }

    public function getUser(): User {
        return $this->user;
    }
}
~~~

~~~php
public function __construct(EventDispatcherInterface $dispatcher) {

    $this->dispatcher = $dispatcher;
}

/**
 * @Route("/user", name="user")
 */
public function index(): Response {
    $user = new User();
    $user->name = "John Doe";
    $user->age = 23;

    $this->dispatcher->dispatch(new UserRegisteredEvent($user));

    // ...
}
~~~

## Subscribe to an event (via EventSubscriber)

~~~php
class UserEventSubscriber implements EventSubscriberInterface {
    public static function getSubscribedEvents() : array {
        return [
            UserRegisteredEvent::class => 'onRegistered'
        ];
    }

    public function onRegistered(UserRegisteredEvent $event) {
        // TODO Handle event!
    }
}
~~~

## Listen to an event ()

~~~php
class UserEventListener {
    public function onRegistered(UserRegisteredEvent $event) {
        // TODO Handle event!
    }
}
~~~

~~~yaml
# services.yaml
App\EventListener\UserEventListener:
  tags:
    - { 'name': 'kernel.event_listener', 'event': 'App\Event\UserRegisteredEvent', 'method': 'onRegistered' }
~~~

## Conclusion

~~~
Event listener and subscriber behave the same way it's a matter of taste how
dealing with events has to be configured in your modules and application
~~~

## Debugging

check if there is an event listener registered for this event

`php bin/console debug:event-dispatcher`
