# Event dispatcher tutorial

created with 

~~~bash
> symfony new event-dispatcher-tutorial
> composer require symfony/event-dispatcher  
~~~

## Dispatch an event

## Subscribe to event

via EventSubscriber

via EventListener

## Add Logging

`composer require symfony/monolog-bundle`

~~~php
use App\Event\UserRegisteredEvent;
use App\User;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController {

    /** @var EventDispatcherInterface */
    private $dispatcher;
    
    /** @var LoggerInterface */
    private $logger;
 
    public function __construct(EventDispatcherInterface $dispatcher, LoggerInterface $logger) {
 
        $this->dispatcher = $dispatcher;
        $this->logger = $logger;
    }
    
    public function index(): Response
    {
        $this->logger->info("Entering UserController::index()");
        
        // ...
    }
}
~~~