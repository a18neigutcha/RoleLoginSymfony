<?php

namespace App\DataFixtures;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\User;

class UserFixtures extends Fixture
{
    private $passwordEncoder;
    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        $user = new User();
        $user->setEmail("a18neigutcha@inspedralbes.cat");
        $user->setPassword($this->passwordEncoder->encodePassword(
                         $user,
                         'password'
                     ));

        $roles=[];
        $roles[]='ROLE_ADMIN';
        $user->setRoles($roles);
        $manager->persist($user);
        $manager->flush();
    }
}
