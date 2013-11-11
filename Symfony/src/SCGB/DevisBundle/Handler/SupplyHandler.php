<?php
/*******************************************************
*   Twiy - 2012
*     Created by : Clotaire RENAUD
*     Date : 18/07/2012
*   % Last modification : $Id$
*    Contact : clotaire.renaud@twiy.fr
*******************************************************/

namespace Ambrelouise\SupplyBundle\Handler;

use Twtools\ComponentBundle\Handler\EntityHandler;
use Ambrelouise\ShopBundle\Entity\Log;
/**
* Manager cart during action
*/
class SupplyHandler extends EntityHandler
{

    /**
    * __constructor
    * @param object $container kernel container
    */
    public function __construct($container)
    {
        $this->container = $container;
        $this->request = $container->get('request');
        $this->em = $container->get('doctrine')->getManager();
        $this->session = $this->container->get('session');
    }


    /**
    * Convert currency of a supply
    *
    * @return true
    */
    public function convertCurrencySupply()
    {
        $supply = $this->values['entity'];
        foreach ($supply->getFees() as $fee) {
            $valueInCurrencyUsed = $fee->getValue() / $fee->getChangeRate();
            $fee->setValueEuro($valueInCurrencyUsed);
        }

        foreach ($supply->getSupplyProducts() as $supplyProduct) {
            $valueInCurrencyUsed = $supplyProduct->getRawValue() / $supply->getChangeRate();
            $supplyProduct->setConvertedValue($valueInCurrencyUsed);
        }

        return true;
    }


    /**
    * Convert currency of a supply
    *
    * @return true
    */
    public function searchProductWithSerialNumber()
    {
        $serialNumber = $this->values['serialNumber'];
        $emptyEntity = $this->values['entity'];
        $reason = $this->values['reason'];

        $supplyProduct =  $this->em->getRepository('AmbrelouiseSupplyBundle:SupplyProduct')->findBySerialNumber($serialNumber);
        if ( count($supplyProduct)==0 ) {

             return false;
        }
        $supplyProduct = array_pop($supplyProduct);

        $log = new Log();
        $log->setLoan($emptyEntity);
        $log->setReference($supplyProduct->getReference());
        $log->setQuantity(1);
        $log->setReason($this->em->getRepository('AmbrelouiseShopBundle:LogReason')->findOneByProcessStep($reason));
        $log->setSerialNumber($serialNumber);
        $emptyEntity->addLog($log);

        return true;
    }

    /**
    * Convert currency of a supply
    *
    * @return true
    */
    public function DistributionOfFeesValuesInSupplyProduct()
    {
        $supply = $this->values['entity'];
        /*foreach ($supply->getFees() as $fee) {
            $valueInCurrencyUsed = $fee->getValue() / $fee->getChangeRate() ;
            $fee->setValueEuro($valueInCurrencyUsed);
        }

        foreach ($supply->getSupplyProducts() as $supplyProduct) {
            $valueInCurrencyUsed = $supplyProduct->getRawValue() / $supply->getChangeRate() ;
            $supplyProduct->setConvertedValue($valueInCurrencyUsed);
        }*/

        return true;
    }

    /**
    * Calculate data of a supply
    *
    * @return true
    */
    public function calculateDataSupply()
    {
        $supply = $this->values['entity'];
        $totalFee = 0;
        foreach ($supply->getFees() as $fee) {
            $totalFee += $fee->getValueEuro();
        }
        $supply->setvalueFees($totalFee);

        $totalJewelry = 0;
        foreach ($supply->getSupplyProducts() as $supplyProduct) {
            $totalJewelry += $supplyProduct->getConvertedValue() * $supplyProduct->getQuantity();
        }
        $supply->setValueJewelry($totalJewelry);

        $counter = 0;
        foreach ($supply->getSupplyProducts() as $supplyProduct) {
            $counter += $supplyProduct->getQuantity();
        }
        $supply->setCountProducts($counter);

        return true;
    }


    /**
    * Attribute a unique serial number on each supplied product
    *
    * @return true
    */
    public function attributeSerialNumber()
    {
        $allSupply = $this->values['allSupply'];
        $supply = $this->values['entity'];

        $lastSerialNumber = '00-000000';
        foreach ($allSupply as $supply) {
            foreach ($supply->getSupplyProducts() as $supplyProduct) {
                if ($lastSerialNumber < $supplyProduct->getSerialNumber()) {
                    $lastSerialNumber = $supplyProduct->getSerialNumber();
                }
                if ($supplyProduct->getSerialNumber() == null) {
                    $newSupplyProducts[] = $supplyProduct;
                }
            }
        }
        $currentYear = substr(date("Y"), 2, 4);
        $currentSerialNumberYear = substr($lastSerialNumber, 0, 2);
        if ($currentSerialNumberYear != $currentYear || $lastSerialNumber == null) {
            $lastSerialNumber = $currentYear.'-000000';
        }
        $counterSerialPart = substr($lastSerialNumber, 0, 2).substr($lastSerialNumber, 3, 9);
        if (isset($newSupplyProducts)) {
            foreach ($newSupplyProducts as $newSupplyProduct) {
                $counterSerialPart = $counterSerialPart+1;
                $lastSerialNumber = substr($counterSerialPart, 0, 2).'-'.substr($counterSerialPart, 2, 8);
                $newSupplyProduct->setSerialNumber($lastSerialNumber);
            }
        }

        return true;
    }

    /**
    * Save entity
    *
    * @return true
    */
    public function saveSupply()
    {
        $supply = $this->values['entity'];
        // sending data are valid
        $this->em->persist($supply);
        $this->em->flush();

        return true;
    }

    /**
    * Check before delete
    *
    * @return entity
    */
    public function checkbeforedelete()
    {
        $delatableLog = $this->values['delatableLog'];
        if (    $delatableLog == 0) {

            return false;
        }

        return true;
    }


}
