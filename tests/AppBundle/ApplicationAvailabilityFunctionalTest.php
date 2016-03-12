<?php

namespace Tests\AppBundle;

#use Symfony\Bundle\FrameworkBundle\Tests\Functional\WebTestCase;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ApplicationAvailabilityFunctionalTest extends WebTestCase
{
    /**
     * @dataProvider urlProvider
     */
    public function testPageIsSuccessful($url)
    {
        $client =self::createClient();
        $client->request('GET',$url);

        $this->assertTrue($client->getResponse()->isSuccessful());
    }

    public function urlProvider()
    {
        return array(
            array('/'),
            array('/regitration'),
            array('/login')
        );

    }
}