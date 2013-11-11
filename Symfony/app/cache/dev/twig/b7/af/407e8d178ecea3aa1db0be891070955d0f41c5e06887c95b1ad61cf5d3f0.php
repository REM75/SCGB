<?php

/* SCGBDevisBundle:RoomAdmin:new.html.twig */
class __TwigTemplate_b7af407e8d178ecea3aa1db0be891070955d0f41c5e06887c95b1ad61cf5d3f0 extends Twig_Template
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

    // line 6
    public function block_body($context, array $blocks = array())
    {
        // line 7
        echo "<div id=\"bottom\" class=\"row-fluid \">
\t\t<div class=\"space_box white_box\">
\t\t\t<h1 class=\"text_blue title text-left \" > Mon devis</h1>
\t\t\t 
\t\t\t<div class=\"entity-form spacer\">
\t\t\t\t<form method=\"post\" ";
        // line 12
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "form"), 'enctype');
        echo ">
\t\t\t\t\t<div class=\"form-horizontal form-padding\">
\t\t\t\t\t\t<legend>Votre ";
        // line 14
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "name"), "html", null, true);
        echo "</legend>\t
\t\t\t\t\t\t<span class=\"row-fluid\">
\t\t\t\t\t\t\t<span class=\"span4\">
\t\t\t\t\t\t\t\t<ul class=\"unstyled\">
\t\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t\t<span><i class=\"fa fa-arrows-alt\"></i> Taile de la pièce : ";
        // line 19
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "size"), "html", null, true);
        echo " m²</span>
\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t\t\t<ul class=\"unstyled\">
\t\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t\t<span><i class=\"fa fa-arrows-v\"></i> Hauteur de la pièce :  ";
        // line 24
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "width"), "html", null, true);
        echo " m</span>
\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t<span class=\"span4\">\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t";
        // line 29
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "form"), 'rest');
        echo " 
\t\t\t\t\t\t\t\t";
        // line 30
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "form"), 'errors');
        echo "
\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t</span>
\t\t\t\t\t\t<input type=\"submit\" class=\"btn btn-primary submit-padding\" />
\t\t\t\t\t</div>
\t\t\t  </form>
\t\t\t</div>
\t\t</div>
</div>

";
    }

    public function getTemplateName()
    {
        return "SCGBDevisBundle:RoomAdmin:new.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  80 => 30,  76 => 29,  68 => 24,  60 => 19,  52 => 14,  47 => 12,  40 => 7,  37 => 6,  31 => 3,  26 => 4,);
    }
}
