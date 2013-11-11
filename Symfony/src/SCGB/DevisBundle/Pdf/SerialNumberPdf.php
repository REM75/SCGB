<?php

/*******************************************************
*   Twiy - 2012
*     Created by : Clotaire RENAUD
*     Date : 05/06/2012
*   % Last modification : $Id$
*    Contact : clotaire.renaud@twiy.fr
*******************************************************/


namespace Ambrelouise\SupplyBundle\Pdf;

use Twtools\ComponentBundle\Libraries\Fpdf;

/**
* AdminController
*/
class SerialNumberPdf extends Fpdf
{

    /**
    * setSupply
    * @param \Ambrelouise\ShopBundle\Entity\Supply $supply
    *
    * @return number
    */
    public function setSupply(\Ambrelouise\SupplyBundle\Entity\Supply $supply)
    {
        $this->supply = $supply;

        return $this;
    }

    /**
    * setOffset
    * @param offset $offset
    *
    * @return number
    */
    public function setOffset($offset)
    {
        $this->offset = $offset;

        return $this;
    }

    /**
    * change number in money format
    * @param integer $number   value
    * @param boolean $currency show currency
    *
    * @return number
    */
    private function money($number, $currency=false)
    {
        $ext = '';
        if ($currency) {
            $ext = ' ' . $this->currency;
        }

        return number_format($number, 2, ', ', ' ') . $ext;
    }

    /**
    * Header
    */
    public function Header()
    {
        $this->SetFont('Arial', 'B', 6);
    }

    /**
    * Footer of the page
    */
    public function Footer()
    {
    }

    /**
    * Array of products
    */
    public function FancyTable()
    {
        $this->setXY(3, 25);
        // Couleurs, épaisseur du trait et police grasse
        $this->SetFillColor(240, 230, 229);
        $this->SetTextColor(255);
        $this->SetDrawColor(240, 230, 229);
        $this->SetLineWidth(.3);
        $this->SetFont('', 'B');
        // En-tête
        $w = array(40, 40, 40, 40, 40);

        $this->Ln();
        // Restauration des couleurs et de la police
        $this->SetFillColor(249, 242, 242);
        $this->SetDrawColor(255, 255, 255);
        $this->SetTextColor(0);
        $this->SetFont('');

        $this->SetAutoPageBreak(false, '');
        // Données
        $fill = false;
        $vat = array();
        $counter = ($this->offset-1) % 65;
        $y = 7 + ((int) ($counter/5))*22;
        foreach ($this->supply->getSupplyProducts() as $k => $supplyProduct) {
            for ($i=0; $i<$supplyProduct->getQuantity(); $i++) {
                if ($counter == 65) {
                    $this->AddPage('P', 'A4');
                    $counter = 0;
                    $y = 6;
                }
                $x = (5+40*($counter%5));
                $this->setXY($x, $y);

                $title = $supplyProduct->getReference()->getProduct()->getTitle();

                $reference = $supplyProduct->getReference()->getReference();
                $serialNumber = $supplyProduct->getSerialNumber();
                $this->MultiCell($w[($counter%5)], 7, utf8_decode(substr($title, 0, 35)).("\n\n").utf8_decode($reference).(" SN:").utf8_decode($serialNumber), 1, 'C', $fill);

                $this->Image($this->container->get('router')->generate('barcode_generation', array('code' => $supplyProduct->getSerialNumber()), true), ($x+1), $y+6, 40);

                $counter++;
                if (($counter%5) == 0 ) {
                    $y += 22;
                }
                if (($counter%5) == 0 ) {
                    $this->Ln(20);
                }

            }
        };
        $this->Ln();
    }
}
