<?php

/*******************************************************
*   Twiy - 2013
*     Created by : Rémy ANDREINI
*     Date : 24/04/2013
*   % Last modification : $Id$
*    Contact : remy.andreini@twiy.fr
*******************************************************/

namespace Ambrelouise\SupplyBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
* Default HTML Controller. Usefull to load templates and assign data to a Template
*/
class LoanAdminControllerTest extends WebTestCase
{
    /**
    * SetUp
    */
    public function setup()
    {
        $client = static::createClient();
        $client->followRedirects(true);
        $crawler = $client->request('GET', '/login');
        $form = $crawler->selectButton('login')->form(); // OK
        $form['_username'] = 'clotaire';
        $form['_password'] = 'clotaire';
        $crawler = $client->submit($form);
        $this->client = $client;
    }

    /**
    * test List
    */
    public function testList()
    {
        $crawler = $this->client->request('GET', '/admin/supply/loans/1/addlogs/1');
        $this->assertTrue($crawler->filter('html:contains("en perlite noir0")')->count() > 0);

        $crawler = $this->client->request('GET', '/admin/supply/loans/scanbar/1/?serilaNumber=13-000002&reason=loan_out');
        $this->assertTrue($this->client->getResponse()->isSuccessful());

        $crawler = $this->client->request('GET', '/admin/supply/loans/search?term=bijoux');
        $this->assertTrue($this->client->getResponse()->isSuccessful());

        $crawler = $this->client->request('GET', '/admin/supply/loans/new');
        $this->assertTrue($this->client->getResponse()->isSuccessful());

        $crawler = $this->client->request('GET', '/admin/supply/loans/search?term=bijoux');
        $this->assertTrue($this->client->getResponse()->isSuccessful());

        $crawler = $this->client->request('GET', '/admin/supply/loans?page=1&sort=customer&sort_type=desc');
        $this->assertTrue($this->client->getResponse()->isSuccessful());

        $crawler = $this->client->request('GET', '/admin/supply/loans/excel');
        $this->assertRegExp('/Customer/', $this->client->getResponse()->getContent());

        $crawler = $this->client->request('GET', '/admin/supply/loans/update/1');
        $this->assertTrue($this->client->getResponse()->isSuccessful());

        $crawler = $this->client->request('GET', '/admin/supply/loans/1/returnlogs');
        //echo $this->client->getResponse()->getContent();
        $this->assertTrue($this->client->getResponse()->isSuccessful());

    }

    /**
    * test New
    */
    public function testNewAndRemove()
    {
        $crawler = $this->client->request('GET', '/admin/supply/loans/new');
        $this->assertTrue($this->client->getResponse()->isSuccessful());

        $form = $crawler->selectButton('validate')->form();
        $crawler = $this->client->submit($form);
        $this->assertTrue($crawler->filter('html:contains("Some information seems incorrect. Could you check?")')->count() > 0);

        $form = $crawler->selectButton('validate')->form();
        $form['loan[date][date][day]'] = '23';
        $form['loan[date][date][month]'] = '4';
        $form['loan[date][date][year]'] = '2013';
        $form['loan[date][time][hour]'] = '10';
        $form['loan[date][time][minute]'] = '10';
        $form['loan[customer]'] = 2;
        $form['loan[channel]'] = 1;
        $form['loan[comment]'] = 'ici';
        $form['loan[step]'] = 1;
        $crawler = $this->client->submit($form);
        $this->assertTrue($crawler->filter('html:contains("success")')->count() > 0);

        //update loan
        $crawler = $this->client->request('GET', '/admin/supply/loans/update/1');
        $form = $crawler->selectButton('validate')->form();
        $form['loan[date][date][day]'] = '13';
        $form['loan[date][date][month]'] = '1';
        $form['loan[date][date][year]'] = '2013';
        $form['loan[date][time][hour]'] = '10';
        $form['loan[date][time][minute]'] = '10';
        $form['loan[comment]'] = 'changed';
        $form['loan[step]'] = 3;
        $crawler = $this->client->submit($form);
        $this->assertTrue($crawler->filter('html:contains("Jan 13, 2013")')->count() > 0);

        //remove loan
        $crawler = $this->client->request('GET', '/admin/supply/loans/update/2');
        $link = $crawler->selectLink('Delete')->link();
        $crawler = $this->client->click($link);
        $this->assertTrue($crawler->filter('html:contains("success")')->count() > 0);

        //retour normal
        $crawler = $this->client->request('GET', '/admin/supply/loans/3/addlogs');
        $form = $crawler->selectButton('validate')->form();
        $form['loan[logs][0][quantity]'] = '5';
        $form['loan[logs][1][quantity]'] = '3';
        $crawler = $this->client->submit($form);
        $this->assertTrue($crawler->filter('html:contains("successfully")')->count() >0);

        $crawler = $this->client->request('GET', '/admin/supply/loans/3/returnlogs');
        $form = $crawler->selectButton('validate')->form();
        $form['loan[logs][0][quantity]'] = '2';
        $crawler = $this->client->submit($form);
        $this->assertTrue($crawler->filter('html:contains("Addition")')->count() >0);

        //retour deffectueux
        $crawler = $this->client->request('GET', '/admin/supply/loans/3/returnlogs');
        $form = $crawler->selectButton('validate')->form();
        $form['loan[logs][0][quantity]'] = '2';
        $form['loan[logs][0][reason]'] = '3';
        $crawler = $this->client->submit($form);
        $this->assertTrue($crawler->filter('html:contains("successfully")')->count() > 0);

        $crawler = $this->client->request('GET', '/admin/supply/loans/15/deletelog/3000');
        $this->assertTrue($this->client->getResponse()->isNotFound());

        //remove log false
        $crawler = $this->client->request('GET', '/admin/supply/loans/3/deletelog/33');
        $this->assertTrue($crawler->filter('html:contains("Some information seems incorrect. Could you check?")')->count() > 0);

        //remove log true
        $crawler = $this->client->request('GET', '/admin/supply/loans/3/deletelog/34');
        $this->assertTrue($crawler->filter('html:contains("success")')->count() > 0);

    }

}
