<?php

namespace App\Controller;

use App\Events\UserRegisteredEvent;
use App\User;
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

    public function __construct(EventDispatcherInterface $dispatcher) {

        $this->dispatcher = $dispatcher;
    }

    /**
     * @Route("/user", name="user")
     */
    public function index(): Response
    {
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
