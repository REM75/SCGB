<?php

/* SCGBDevisBundle:DevisAdmin:new.html.twig */
class __TwigTemplate_2540dc58d1934f38f1a9158c1252d15513d091848a2573d1ed005dbe6318eed5 extends Twig_Template
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
\t\t\t<h1 class=\"text_blue title text-left \" > Etablir un devis</h1>
\t\t\t 
\t\t\t<div class=\"entity-form spacer\">
\t\t\t\t<form method=\"post\" ";
        // line 12
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "form"), 'enctype');
        echo ">
\t\t\t\t\t<div class=\"form-horizontal form-padding\">\t\t\t\t\t\t
\t\t\t\t\t\t<legend>Saisissez vos travaux</legend>
\t\t\t\t\t\t<span class=\"row\">\t\t\t\t\t\t
\t\t\t\t\t\t\t<span id=\"sub-form\" class=\"span12\">
\t\t\t\t\t\t\t\t<fieldset>
\t\t\t\t\t\t\t\t\t<div class=\"space\" style=\"margin-bottom:10px;\">
\t\t\t\t\t\t\t\t\t\t<a href=\"#\" class=\"btn btn-success\" id=\"add_reference_link_";
        // line 19
        echo twig_escape_filter($this->env, $this->getContext($context, "language"), "html", null, true);
        echo "\">Ajouer une pièce</a>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<ul class=\"nav nav-tabs\">
\t\t\t\t\t\t\t\t\t\t";
        // line 22
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "form"), "rooms"));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
            // line 23
            echo "\t\t\t\t\t\t\t\t\t\t\t<li";
            if ($this->getAttribute($this->getContext($context, "loop"), "first")) {
                echo " class=\"active\"";
            }
            echo "><a data-toggle=\"tab\" href=\"#tab_reference_";
            echo twig_escape_filter($this->env, $this->getContext($context, "language"), "html", null, true);
            echo "_";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index"), "html", null, true);
            echo "\">Pièce ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index"), "html", null, true);
            echo "</a></li>
\t\t\t\t\t\t\t\t\t\t";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 25
        echo "\t\t\t\t\t\t\t\t\t </ul>

\t\t\t\t\t\t\t\t\t<div id=\"supply_references_";
        // line 27
        echo twig_escape_filter($this->env, $this->getContext($context, "language"), "html", null, true);
        echo "\" class=\"tab-content\" data-prototype=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "form"), "rooms"), "vars"), "prototype"), 'widget'));
        echo "\">
\t\t\t\t\t\t\t\t   ";
        // line 28
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "form"), "rooms"));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
            // line 29
            echo "\t\t\t\t\t\t\t\t\t\t<div class=\"tab-pane form-collection row-fluid";
            if ($this->getAttribute($this->getContext($context, "loop"), "first")) {
                echo " active";
            }
            echo "\" id=\"tab_reference_";
            echo twig_escape_filter($this->env, $this->getContext($context, "language"), "html", null, true);
            echo "_";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index"), "html", null, true);
            echo "\">
\t\t\t\t\t\t\t\t\t\t\t";
            // line 30
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "product"), 'widget', array("form_type" => "horizontal"));
            echo "
\t\t\t\t\t\t\t\t\t\t\t<div class=\"pull-right\"><a class=\"btn btn-warning\" id=\"remove_reference_link_";
            // line 31
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index"), "html", null, true);
            echo "\" onclick=\"delete_reference_link(";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index"), "html", null, true);
            echo ");\" >Supprimer la pièce</a></div>
\t\t\t\t\t\t\t\t\t\t\t<script>
\t\t\t\t\t\t\t\t\t\t\t\t\tfunction delete_reference_link(id){
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\$('#tab_reference_fr_'+id+'').parent().parent().find('ul.nav li.active').remove();
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\$('#tab_reference_fr_'+id+'').remove();
\t\t\t\t\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t\t\t\t</script>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 40
        echo "\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</fieldset>
\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t</span>
\t\t\t\t\t\t
\t\t\t\t\t\t";
        // line 45
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "form"), 'rest');
        echo " 
\t\t\t\t\t\t";
        // line 46
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "form"), 'errors');
        echo "
\t\t\t\t\t\t<div class=\"alert alert-info\">
\t\t\t\t\t\t\t<button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
\t\t\t\t\t\t\t<strong>Info sur les Ajouts/Modififactions :</strong> Valider une fois que toutes les pièces dans lesquels vous voulez faire des travaux ont été ajoutées/modifiées.
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<input type=\"submit\" class=\"btn btn-primary submit-padding\" />
\t\t\t\t\t</div>
\t\t\t  </form>
\t\t\t</div>
\t\t</div>
</div>

<script>

jQuery(document).ready(function() {
        \$('#add_reference_link_fr').on('click', function(e) {
            e.preventDefault();
            addFormReference(\$('#supply_references_fr'), 'fr');
        });
});

function addFormReference(collectionHolder, language) {
    \$('#supply_references_'+language+' .tab-pane').removeClass('active');
    \$('#supply_references_'+language).parent().find('ul.nav li').removeClass('active');
    var len = collectionHolder.children().length + 1;
    var prototype = collectionHolder.attr('data-prototype');
    var newForm = prototype.replace(/__name__/g, len);
    \$('#supply_references_'+language).parent().find('ul.nav').append('<li class=\"active\"><a data-toggle=\"tab\" href=\"#tab_reference_'+language+'_'+len+'\">Pièce '+len+'</a></li>');
    var \$newFormDiv = \$('<div class=\"tab-pane form-collection row-fluid active\" id=\"tab_reference_'+language+'_'+len+'\"></div>').append(newForm);
    collectionHolder.append(\$newFormDiv);
    addReferenceFormDeleteLink(\$newFormDiv);
}
function addReferenceFormDeleteLink(\$referenceFormDiv, language, len) {
    var \$removeFormA = \$('<div class=\"pull-right\"><a href=\"#\" class=\"btn btn-warning\" id=\"remove_reference_link_'+language+'_'+len+'\">Supprimer la pièce</a></div>');
    \$referenceFormDiv.prepend(\$removeFormA);

    \$removeFormA.on('click', function(e) {
        e.preventDefault();
        \$referenceFormDiv.parent().parent().find('ul.nav li.active').remove();
        \$referenceFormDiv.remove();
    });
}
</script>
";
    }

    public function getTemplateName()
    {
        return "SCGBDevisBundle:DevisAdmin:new.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  183 => 46,  179 => 45,  172 => 40,  147 => 31,  143 => 30,  132 => 29,  115 => 28,  109 => 27,  105 => 25,  80 => 23,  63 => 22,  57 => 19,  47 => 12,  40 => 7,  37 => 6,  31 => 3,  26 => 4,);
    }
}
