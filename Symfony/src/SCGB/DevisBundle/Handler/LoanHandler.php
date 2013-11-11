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
/**
* Manager cart during action
*/
class LoanHandler extends EntityHandler
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
    * Save entity
    *
    * @return entity
    */
    public function saveLoan()
    {
        $loan = $this->values['entity'];

        foreach ($loan->getLogs() as $log) {
            if ($log->getQuantity() != null) {
                $this->values['loan']->addLog($log);
            }
        }
        unset($this->values['entity']);
        $this->em->persist($this->values['loan']);
        $this->em->flush();

        return true;
    }

     /**
    * Cacule the total price of the entity (loan)
    *
    * @return entity
    */
    public function findSerialNumberOfaReturn()
    {
        $loan = $this->values['loan'];
        $reason = $this->values['reason'];
        $emptyEntity = $this->values['entity'];

        if ($reason == 'loan_return') {
            foreach ($emptyEntity->getLogs() as $newlog) {
                foreach ($loan->getLogs() as $log) {
                    if ($newlog->getReference() == $log->getReference() ) {
                        $newlog->setSerialNumber($log->getSerialNumber());
                    }
                }
            }
        }

        return true;
    }

    /**
    * Cacule the total price of the entity (loan)
    *
    * @return entity
    */
    public function loanTotalPrice()
    {
        $loan = $this->values['loan'];
        $amount=0;
        foreach ($loan->getLogs() as $log) {
            $cost = 0;
            $quantity = 0;
            if ($log->getReason()->getProcessStep() != 'product_downgrade') {
                $quantity = $log->getQuantity()*$log->getSign() *(-1);
            }
            $arraycost = $log->getReference()->getProduct()->getPrices();
            $cost = $arraycost[0]->getValue() * $quantity;
            $amount += $cost;
        }
        $loan->setValueProductsLoaned($amount);

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
