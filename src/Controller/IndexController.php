<?php 

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Services;
use App\Repository\ServicesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

final class IndexController extends AbstractController
{
    /**
     * @Route("/", name="home")
     * @Route("/{vueRouting}", name="home_routing")
     * @return Response
     */
    public function indexAction(EntityManagerInterface $manager, ServicesRepository $repo): Response
    {
        $services = $repo->findAll();
        return $this->render('base.html.twig', []);
    }
}