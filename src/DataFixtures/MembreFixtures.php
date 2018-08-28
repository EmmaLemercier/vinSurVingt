<?php
namespace App\DataFixtures;

use App\Entity\Membre;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;


class MembreFixtures extends Fixture{
    
    public function load(ObjectManager $manager)
    {
        for($i = 1; $i < 40; $i++)
        {
            $membre = new Membre();
            $membre->setPseudoMembre("membre".$i)
                    ->setMotDePasseMembre("motDePasse".$i);
            $manager->persist($membre);
        }
        $manager->flush();
    }
    
}