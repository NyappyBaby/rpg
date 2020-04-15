<?php

namespace App\Controller;

use App\Entity\Arme;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ArmeController extends AbstractController
{

    /**
     * @Route("/armes", name="armes")
     */
    public function index()
    {
        Arme::creerArmes();

        $armes = Arme::$_armes;

        return $this->render('arme/index.html.twig', ['armes' => $armes]);

        dump($armes);
    }

    /**
     * @Route("/arme/{nom}", name="display_arme")
     */
    public function show($nom){

        Arme::creerArmes();
        $armement = Arme::recupererArmeParNom($nom);
        
        return $this->render('arme/arme.html.twig', ['armement' => $armement]);

    }

}
