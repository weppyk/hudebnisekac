<?php
/**
 * Created by PhpStorm.
 * User: weppyk
 * Date: 7.3.16
 * Time: 19:57
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProductController extends Controller
{
    /**
     * @Route("/products", name="products")
     */
    public function showProductsAction()
    {
        return $this->render('products.html.twig');
    }
}