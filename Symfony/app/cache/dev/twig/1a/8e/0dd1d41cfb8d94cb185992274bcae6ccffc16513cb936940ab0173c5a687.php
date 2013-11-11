<?php

/* SCGBDevisBundle:DevisAdmin:list.html.twig */
class __TwigTemplate_1a8e0dd1d41cfb8d94cb185992274bcae6ccffc16513cb936940ab0173c5a687 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::base.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 4
        $context["language"] = "fr";
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "Mon devis en ligne";
    }

    // line 7
    public function block_body($context, array $blocks = array())
    {
        // line 8
        echo "<div id=\"bottom\" class=\"row-fluid \">
\t\t<div class=\"space_box white_box\">
\t\t\t<h1 class=\"text_blue title text-left \" > Mon devis</h1>
\t\t\t
\t\t\t<div class=\"form-padding\">
\t\t\t\t<legend>Vos différentes pièces <a href=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("devis_update", array("id" => $this->getAttribute($this->getContext($context, "entity"), "id"))), "html", null, true);
        echo "\" class=\"btn pull-right\" id=\"udapte_room\">Modifier mes pièces</a></legend>                    
\t\t\t\t";
        // line 14
        if (twig_test_empty($this->getAttribute($this->getContext($context, "entity"), "rooms"))) {
            // line 15
            echo "\t\t\t\t<div class=\"alert alert-block\">
\t\t\t\t\t<button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
\t\t\t\t\t<strong>Oups ! </strong> Vous n'avez pas ou plus de pièce associé à votre devis, nous vous invions à en ajouter  : 
\t\t\t\t\t<a href=\"";
            // line 18
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("devis_update", array("id" => $this->getAttribute($this->getContext($context, "entity"), "id"))), "html", null, true);
            echo "\" class=\"btn btn-primary\" style=\"margin-left:10px;\" id=\"add_room\">Ajouter des pièces</a>
\t\t\t\t\t
\t\t\t\t</div>
\t\t\t\t";
        } else {
            // line 22
            echo "\t\t\t\t<div class=\"result spacer\">
\t\t\t\t\t<table class=\"table table-striped table-bordered table-hover\" >
\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t<th style=\"text-align:center\">";
            // line 25
            echo $this->env->getExtension('translator')->getTranslator()->trans("Nom", array(), "messages");
            echo "</th>
\t\t\t\t\t\t\t<th style=\"text-align:center\">";
            // line 26
            echo $this->env->getExtension('translator')->getTranslator()->trans("Taile (m²)", array(), "messages");
            echo "</th>
\t\t\t\t\t\t\t<th style=\"text-align:center\">";
            // line 27
            echo $this->env->getExtension('translator')->getTranslator()->trans("Hauteur (m)", array(), "messages");
            echo "</th>
\t\t\t\t\t\t\t<th style=\"text-align:center\">";
            // line 28
            echo $this->env->getExtension('translator')->getTranslator()->trans("Coût des travaux (€)", array(), "messages");
            echo "</th>
\t\t\t\t\t\t\t<th style=\"text-align:center\">";
            // line 29
            echo $this->env->getExtension('translator')->getTranslator()->trans("Action", array(), "messages");
            echo "</th>
\t\t\t\t\t\t</tr>
\t\t\t\t\t\t";
            // line 31
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "entity"), "rooms"));
            foreach ($context['_seq'] as $context["_key"] => $context["room"]) {
                // line 32
                echo "\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t<td style=\"text-align:center;width:80px;\">";
                // line 33
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "room"), "name"), "html", null, true);
                echo "</td>
\t\t\t\t\t\t\t\t<td style=\"text-align:center;width:20px;\">";
                // line 34
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "room"), "size"), "html", null, true);
                echo " </td>
\t\t\t\t\t\t\t\t<td style=\"text-align:center;width:20px\">";
                // line 35
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "room"), "width"), "html", null, true);
                echo "</td>
\t\t\t\t\t\t\t\t<td style=\"text-align:center;width:20px\">";
                // line 36
                if (twig_test_empty($this->getAttribute($this->getContext($context, "room"), "totalWorkAmount"))) {
                    echo " Aucun travaux associés";
                } else {
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "room"), "totalWorkAmount"), "html", null, true);
                    echo " ";
                }
                echo "</td>
\t\t\t\t\t\t\t\t<td style=\"text-align:center;width:120px\"> <a href=\"";
                // line 37
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("room_add_work", array("id" => $this->getAttribute($this->getContext($context, "room"), "id"))), "html", null, true);
                echo "\" class=\"btn btn-success pull-left\" id=\"add_work\">Ajouter des travaux</a> <a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("room_remove", array("id" => $this->getAttribute($this->getContext($context, "room"), "id"))), "html", null, true);
                echo "\" class=\"btn btn-warning pull-right\" id=\"delete_room\">Supprimer la pièce</a></td>
\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['room'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 40
            echo "\t\t\t\t\t</table>
\t\t\t\t</div>
\t\t\t\t";
        }
        // line 43
        echo "\t\t\t</div>
\t\t</div>
</div>
";
    }

    public function getTemplateName()
    {
        return "SCGBDevisBundle:DevisAdmin:list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  135 => 43,  130 => 40,  119 => 37,  110 => 36,  106 => 35,  102 => 34,  98 => 33,  95 => 32,  91 => 31,  86 => 29,  82 => 28,  78 => 27,  74 => 26,  70 => 25,  65 => 22,  58 => 18,  53 => 15,  51 => 14,  47 => 13,  40 => 8,  37 => 7,  31 => 3,  26 => 4,);
    }
}
