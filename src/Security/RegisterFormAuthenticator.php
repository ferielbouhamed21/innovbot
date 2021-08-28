<?php


namespace App\Security;
use App\Entity\User;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

class RegisterFormAuthenticator
{
    private  $entityManager;
    public function __construct( EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function createAccount(Request $request): array
    {
        $credentials = [
            'username' => $request->request->get('username'),
            'email' => $request->request->get('email'),
            'password' => $request->request->get('password'),
            'confirm' => $request->request->get('confirm'),
        ];
        if ($credentials['username'] == '' || $credentials['email'] == '' || $credentials['password'] == '' || $credentials['confirm'] == '') {
            $message = "Please fill all the fields!";
            return ["warning"=> $message];
        }
        elseif ($credentials['password'] != $credentials['confirm']){
            $message = "Passwords don't match!";
            return ["warning"=> $message];
        }
//        elseif ($repository->findOneByUsername($credentials['username'])){
//            $message = "Username already exists!";
//            return ["warning"=> $message];
//        }
//        elseif ($repository->findOneByEmail($credentials['email'])){
//            $message = "Email already linked to another account!";
//            return ["warning"=> $message];
//        }
        else {
            $user = new User();
            $user->setUuid($credentials['username'])
                ->setPassword($credentials['password'])
                ->setEmail($credentials['email']);
            $this->entityManager->persist($user);
            $this->entityManager->flush();
            $message = "Your account has been created!";
            return ["success"=> $message];
        }
    }
}