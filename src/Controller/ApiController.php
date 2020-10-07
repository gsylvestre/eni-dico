<?php


namespace App\Controller;

use App\Repository\TermRepository;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ApiController extends AbstractController
{
    /**
     * @Route("/api/v1/term", name="api_term_list")
     */
    public function termList(TermRepository $termRepository, SerializerInterface $serializer)
    {
        $terms = $termRepository->findBy(["isPublished" => true], ["term" => "ASC"]);
        //ne prend que les propriétés du group nommé arbitrairement "list"
        $data = $serializer->serialize($terms, 'json', SerializationContext::create()->setGroups(["list"]));

        $response = new JsonResponse();
        $response->setContent($data);

        return $response;
    }

    /**
     * @Route("/api/v1/term/{id}", name="api_term_detail")
     */
    public function termDetail(int $id, TermRepository $termRepository, SerializerInterface $serializer)
    {
        $terms = $termRepository->find($id);
        //sans group pour récupérer toutes les propriétés
        $data = $serializer->serialize($terms, 'json');

        $response = new JsonResponse();
        $response->setContent($data);

        return $response;
    }
}