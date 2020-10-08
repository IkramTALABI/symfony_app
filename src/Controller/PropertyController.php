<?php

namespace App\Controller;


use App\Entity\Property;
use App\Repository\PropertyRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class PropertyController extends AbstractController
{

    private $respository;
    private $em;

    public function __construct(PropertyRepository $repository, EntityManagerInterface $em)
    {
        $this->respository=$repository;
        $this->em=$em;
    }

    /**
     *
     * @return Response
     */

    public function index(): Response
    {
        //Inserer dans la bdd
        $property= new Property();
        $property->setTitle('mon troizieme bien')
            ->setDescription('une petite description')
            ->setPrice(3000);

//ajouter ds la bdd
    //        $em=$this->getDoctrine()->getManager();
    //        $em->persist($property);
    //        $this->em->flush();
    //ou
    //        $this->em->persist($property);
    //        $this->em->flush();

//modifier de la bdd
    //        $p=$this->respository->finAllVisible();
    //        $p[1]->setSold(true);
    //        $this->em->flush();
    //        dump($p);


        return $this->render('property/index.html.twig',
        [
            'current_menu' => 'properties'
        ]);
    }

    /**
     * @Route("biens/{id})" ,name="property.show")
     * @param $slug
     * @param $id
     * @return Response
     */
    public function show($id): Response
    {
        $property=$this->respository->find($id);

        return $this->render('property/show.html.twig',[
            'current_menu' => 'properties',
                'property' => $property
            ]
        );
    }


}
