<?php

/*
 * This file is part of the sfcalculator package.
 * (c) Aula de Software Libre <aulasoftwarelibre@uco.es>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CalculatorControllerTest extends WebTestCase
{
    public function testSubmitValidData()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');

        $buttonCrawlerNode = $crawler->selectButton('Submit');
        $form = $buttonCrawlerNode->form();
        $crawler = $client->submit($form, [
            'numbers_form[a]' => 3,
            'numbers_form[b]' => 2,
        ]);

        $this->assertSame(200, $client->getResponse()->getStatusCode());
        $this->assertSame("5", $crawler->filterXPath('//*[@id="result"]')->text());
    }
}
