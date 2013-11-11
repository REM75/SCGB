<?php

/* SCGBDevisBundle:DevisAdmin:index.html.twig */
class __TwigTemplate_6a80e99e423a2d62ee22e30f7a5229779148329be95f74b1a4ba80de019425af extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
  <head>
    <title>Bienvenue sur ma première page avec le Site du Zéro !</title>
  </head>
  <body>
    <h1> ";
        // line 7
        echo twig_escape_filter($this->env, $this->getContext($context, "nom"), "html", null, true);
        echo "</h1>
 
    <p>
      Le Hello World est un grand classique en programmation.
      Il signifie énormément, car cela veut dire que vous avez
      réussi à exécuter le programme pour accomplir une tâche simple :
      afficher ce hello world !
    </p>
  </body>
</html>";
    }

    public function getTemplateName()
    {
        return "SCGBDevisBundle:DevisAdmin:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  27 => 7,  19 => 1,);
    }
}
