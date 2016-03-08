<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;


class SerializerController extends Controller
{
    /**
     * @Route("/products.json")
     */
    public function productJsonAction()
    {
        $encoders = array(new XmlEncoder(), new JsonEncoder());
        $normalizers = array(new ObjectNormalizer());
        $serializer = new Serializer($normalizers, $encoders);



        #$product= new Product();
        $product= $this->showAction(1);
        #$a= $product->showAction('1');
        $jsonContent=$serializer->serialize($product,'json');
        #return $this->render("Ahoj");
        return new Response($jsonContent);
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