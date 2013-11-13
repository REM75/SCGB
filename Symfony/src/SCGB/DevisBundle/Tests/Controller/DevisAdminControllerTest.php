<?php

/*******************************************************
*   Twiy - 2013
*     Created by : Rémy ANDREINI
*     Date : 24/04/2013
*   % Last modification : $Id$
*    Contact : remy.andreini@twiy.fr
*******************************************************/

namespace SCGB\DevisBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
* Default HTML Controller. Usefull to load templates and assign data to a Template
*/
class DevisAdminControllerTest extends WebTestCase
{
    /**
    * SetUp
    */
    public function setup()
    {
        $client = static::createClient();
        $client->followRedirects(true);
        $this->client = $client;
    }

    /**
    * test List
    */
    public function testList()
    {
        $crawler = $this->client->request('GET', '/devis/4/list');
        $this->assertTrue($crawler->filter('html:contains("Vos différentes pièces")')->count() > 0);

        $crawler = $this->client->request('GET', '/devis/new');
        $this->assertTrue($crawler->filter('html:contains("Ajouts/Modififactions")')->count() > 0);

        $crawler = $this->client->request('GET', '/devis/room/10/add-work');
        $this->assertTrue($crawler->filter('html:contains("Mon devis")')->count() > 0);

        $crawler = $this->client->request('GET', '/devis/4/update');
        $this->assertTrue($crawler->filter('html:contains("Saisissez vos travaux")')->count() > 0);
    }

    /**
    * test New
    */
    public function testNewAndRemove()
    {
		die();
        $crawler = $this->client->request('GET', '/admin/supply/new');
        $this->assertTrue($crawler->filter('html:contains("Create a new supply")')->count() > 0);

        $form = $crawler->selectButton('validate')->form();
        $crawler = $this->client->submit($form);
        $this->assertTrue($crawler->filter('html:contains("Some information seems incorrect. Could you check?")')->count() > 0);

        //create
        $form = $crawler->selectButton('validate')->form();
        $form['supply[supplyDate][day]'] = '23';
        $form['supply[supplyDate][month]'] = '4';
        $form['supply[supplyDate][year]'] = '2013';
        $form['supply[paidAt][day]'] = '23';
        $form['supply[paidAt][month]'] = '4';
        $form['supply[paidAt][year]'] = '2013';
        $form['supply[supplier]'] = 2;
        $form['supply[referenceSupplier]'] = '1564210-Mgold';
        $form['supply[referenceIntern]'] = 'Intern-ref01';
        $form['supply[changeRate]'] = '1';
        $crawler = $this->client->submit($form);
        $this->assertTrue($crawler->filter('html:contains("success")')->count() > 0);

        //update
        $crawler = $this->client->request('GET', '/admin/supply/update/1');
        $form = $crawler->selectButton('validate')->form();
        $form['supply[supplyDate][day]'] = '13';
        $form['supply[supplyDate][month]'] = '1';
        $form['supply[supplyDate][year]'] = '2013';
        $form['supply[supplyProducts][0][quantity]'] = '10';
        $form['supply[supplyProducts][0][rawValue]'] = '14';
        $form['supply[supplyProducts][0][comment]'] = 'approvisionner !';

        $form['supply[fees][0][supplier]'] = 2;
        $form['supply[fees][0][invoiceReference]'] = 'XRFA10';
        $form['supply[fees][0][internReference]'] = 'ma-facture-4';
        $form['supply[fees][0][changeRate]'] = '1.333';
        $form['supply[fees][0][currency]'] = 2;
        $form['supply[fees][0][value]'] = '120';
        $crawler = $this->client->submit($form);
        $this->assertTrue($crawler->filter('html:contains("Jewelries value 140.00")')->count() > 0);
        $this->assertTrue($crawler->filter('html:contains(" Fees value 90.02")')->count() > 0);

    }

}
