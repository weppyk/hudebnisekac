<?php

namespace AppBundle\Controller;

#use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bridge\Doctrine\RegistryInterface;
#use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
#use Symfony\Component\HttpFoundation\JsonResponse;
#use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;
#use Symfony\Component\Serializer\Tests\Normalizer\SerializerNormalizer;

#use Symfony\Component\Serializer\Encoder\JsonEncoder;
#use Symfony\Component\Serializer\Encoder\XmlEncoder;
#use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
#use Symfony\Component\Serializer\SerializerInterface;
#use AppBundle\Controller\SerializerController;


class SerializerController # extends Controller
{
    /*    public function __construct(RegistryInterface $doctrine, SerializerInterface $serializer)
    {
        $response = new Response();
        $response->setContent("Ahoj");
        return $response;
    }
}
*/
    /*
     * @Route("/products.json")
     */
    public function __construct(RegistryInterface $doctrine, SerializerInterface $serializer)
    {
        $this->serializer=$serializer;
        $this->doctrine=$doctrine;
    }


    public function productJsonAction()
    {
        #$encoders = array(new XmlEncoder(), new JsonEncoder());
        #$normalizers = array(new ObjectNormalizer());
        #$serializer = new Serializer($normalizers, $encoders);
        #$serializer = $this->get('serializer');
        #$this->serializer=$serializer;


        #$product= new Product();
        #$product= $this->showAction(1);
        $product= $this->showAll();

        $jsonData=$this->serializer->serialize($product,'json');
        $response=new Response();
        $response->setContent($jsonData);

        $response->headers->set('Content-Type', 'application/json');

        return $response;

    }

    public function showAll()
    {
        $product= $this->doctrine
            ->getRepository('AppBundle:Product')
            ->findAll();
        return $product;
    }
    public function showAction($id)
    {
        $product = $this->getDoctrine()
            ->getRepository('AppBundle\Entity\Product')
            ->find($id);

        if (!$product) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }

        return $product;
    }


}