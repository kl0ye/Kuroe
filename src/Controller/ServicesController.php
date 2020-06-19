<?php

namespace App\Controller;

use App\Entity\Services;
use App\Repository\ServicesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ServicesController extends AbstractController
{
    /**
     * @Route("/api/services", name="api_all_services", methods={"GET"})
     */
    public function getAllServices(ServicesRepository $repo)
    {
        return $this->json($repo->findAll(), 200, []);
    }

    /**
     * @Route("/api/services", name="api_services_post", methods={"POST"})
     */
    public function newServices(Request $request, SerializerInterface $serializer,EntityManagerInterface $manager)
    {
        $jsonRecu = $request->getContent();
        $newService = $serializer->deserialize($jsonRecu, Services::class, 'json');
        $manager->persist($newService);
        $manager->flush();
        return $this->json('Add New Services', 201, []);
    }

    /**
     * @Route("/api/services/{id}", name="api_services_delete", methods={"DELETE"})
     */
    public function deleteService(Services $services, ServicesRepository $repository, EntityManagerInterface $manager)
    {
        $manager->remove($services);
        $manager->flush();
        return $this->json('Delete Services', 201, []);
    }

}
