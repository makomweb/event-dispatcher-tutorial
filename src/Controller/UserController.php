<?php

namespace App\Controller;

use App\Event\UserRegisteredEvent;
use App\User;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\EventDispatcher\EventDispatcherInterface;

class UserController extends AbstractController
{
    /**
     * @var EventDispatcherInterface
     */
    private $dispatcher;
    /**
     * @var LoggerInterface
     */
    private $logger;

    public function __construct(EventDispatcherInterface $dispatcher, LoggerInterface $logger) {

        $this->dispatcher = $dispatcher;
        $this->logger = $logger;
    }

    /**
     * @Route("/user", name="user")
     */
    public function index(): Response
    {
        $this->logger->info("Entering UserController::index()");

        $user = new User();
        $user->name = "John Doe";
        $user->age = 23;

        $this->dispatcher->dispatch(new UserRegisteredEvent($user));

        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/UserController.php',
        ]);
    }
}
