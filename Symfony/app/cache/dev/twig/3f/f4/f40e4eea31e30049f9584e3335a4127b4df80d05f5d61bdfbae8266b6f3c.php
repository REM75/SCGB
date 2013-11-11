<?php

/* ::menu.html.twig */
class __TwigTemplate_3ff4f40e4eea31e30049f9584e3335a4127b4df80d05f5d61bdfbae8266b6f3c extends Twig_Template
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
        echo "<div id=\"menu\">
\t\t<div id='cssmenu'>
\t\t
\t\t
\t\t\t<ul>\t\t\t\t
\t\t\t\t\t<li id=\"1\" ><a href='/welcome.php'><span>Accueil</span></a></li>
\t\t\t\t   <li id=\"2\"><a href='/entreprise/histoire.php'><span>L'entreprise</span></a></li>
\t\t\t\t   <li  class='has-sub'><a id=\"30\" href='/services/presentation.php'><span>Nos Services</span></a>
\t\t\t\t\t  <ul>
\t\t\t\t\t\t <li class='last'><a id=\"31\" href='/services/amenagement.php'><span>Aménagement Intérieur</span></a></li>
\t\t\t\t\t\t <li class='last'><a id=\"32\" href='/services/construction.php'><span>Construction</span></a></li>
\t\t\t\t\t\t <li class='last'><a id=\"33\" href='/services/renovation.php'><span>Rénovation</span></a></li>
\t\t\t\t\t\t <li class='last'><a id=\"34\" href='/services/reprises.php'><span>Reprises en sous-oeuvres</span></a></li>
\t\t\t\t\t\t <li class='last'><a id=\"35\" href='/services/etudes.php'><span>Etudes</span></a></li>
\t\t\t\t\t  </ul>
\t\t\t\t   </li>
\t\t\t\t   <li id=\"5\" class='last'><a href='/entreprise/contact.php'><span>Nos Contacts</span></a></li>\t\t
\t\t\t\t   <li id=\"4\" class=\"active\"><a href=\"";
        // line 18
        echo $this->env->getExtension('routing')->getPath("devis_new");
        echo "\"><span>Devis en Ligne</span></a></li>\t\t 
\t\t\t\t 
\t\t\t</ul>\t\t\t

\t\t
\t</div>
</div> 
";
    }

    public function getTemplateName()
    {
        return "::menu.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  38 => 18,  19 => 1,);
    }
}
