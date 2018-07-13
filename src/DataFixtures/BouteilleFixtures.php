<?php
namespace App\DataFixtures;

use App\Entity\Bouteille;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;


class BouteilleFixtures extends Fixture{
    
    public function load(ObjectManager $manager)
    {
        for($i = 1; $i < 40; $i++)
        {
            $bouteille = new Bouteille();
            $bouteille->setAppellationBouteille("bouteille".$i)
                    ->setCapaciteGardeBouteille(5)
                    ->setProvenance("France")
                    ->setMillesime('2018'-$i)
                    ->setTeinte("Rouge")
                    ->setTeneurAlcool(13.5)
                    ->setTranquillite(true);
            $manager->persist($bouteille);
        }
        $manager->flush();
    }
    
}