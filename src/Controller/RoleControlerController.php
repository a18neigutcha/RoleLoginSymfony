<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;

class RoleControlerController extends AbstractController
{

    /**
     * @Route("/roleControlller", name="roleControler")
     */
    public function index()
    {
        $roles=$this->getUser()->getRoles();

        $users_resp=[];
        if(in_array("ROLE_ADMIN",$roles)){
            $users = $this->getDoctrine()
                ->getRepository(User::class)
                ->findAll();

            $users_resp=$users;
        }else if(in_array("ROLE_SUPER",$roles)){
            $users = $this->getDoctrine()
                ->getRepository(User::class)
                ->findByRole("ROLE_SUPER");

            $users2=$this->getDoctrine()
                ->getRepository(User::class)
                ->findByRole("ROLE_USER");

            $users_resp=array_merge($users,$users2);

            /* foreach($users as $user){
                $rols=$user->getRoles();
                if(in_array("ROLE_SUPER",$rols)){
                    $users_resp[]=$user;
                }
            } */
        }else if(in_array("ROLE_USER",$roles)){
            $users = $this->getDoctrine()
            ->getRepository(User::class)
            ->findByRole("ROLE_USER");

            $users_resp=$users;

            /* foreach($users as $user){
                $rols=$user->getRoles();
                if(in_array("ROLE_USER",$rols)){
                    $users_resp[]=$user;
                }
            } */
            
        }
        return $this->render('role_controler/listUsers.html.twig', [
            'listUsers' => $users_resp,
        ]);
        
    }

    
}
