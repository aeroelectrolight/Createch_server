<?php

/*
 *
 */

namespace AppBundle\Datafixtures\ORM;

/**
 * Description of LoadCouleurData
 *
 * @author ludo
 */
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Settings\Couleur;

class LoadCouleurData extends AbstractFixture implements OrderedFixtureInterface {
    
    public function load(ObjectManager $manager) {
        $couleur = new Couleur();
        $couleur->setCouleur('#AAA');
        $couleur->setTitle('testgris');
        
        $manager->persist($couleur);
        $manager->flush();
    }
    
    public function getOrder() {
        return 1;
    }
}
