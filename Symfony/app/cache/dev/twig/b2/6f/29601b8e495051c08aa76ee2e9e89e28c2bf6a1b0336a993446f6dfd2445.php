<?php

/* ::base.html.twig */
class __TwigTemplate_b26f29601b8e495051c08aa76ee2e9e89e28c2bf6a1b0336a993446f6dfd2445 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
<!--[if lt IE 7]>      <html class=\"no-js lt-ie9 lt-ie8 lt-ie7\"> <![endif]-->
<!--[if IE 7]>         <html class=\"no-js lt-ie9 lt-ie8\"> <![endif]-->
<!--[if IE 8]>         <html class=\"no-js lt-ie9\"> <![endif]-->
<!--[if gt IE 8]><!--> <html class=\"no-js\"> <!--<![endif]-->

\t<head>\t
\t\t<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
\t\t<link rel=\"stylesheet\" href=\"/script/normalize.css\" type=\"text/css\" media=\"all\" />\t\t

\t\t<meta property=\"og:title\" content=\"SCGB - Société de Construction Générale en Batîment\" />
\t\t<meta property=\"og:locale\" content=\"fr_FR\" />
\t\t<meta property=\"og:url\" content=\"http://scgb-salvaggio.fr/\" />\t
\t\t<meta property=\"og:description\" content=\"S.C.G.B. Salvaggio est une P.M.E. oeuvrant dans les secteurs suivants :la construction, la rénovation, l'aménagement intérieur et la reprise en sous-oeuvre\" />\t\t
\t\t<link rel=\"shortcut icon\" type=\"image/x-icon\" href=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("image/logos/scgb.ico"), "html", null, true);
        echo "\" />
\t\t<meta property=\"og:image\" content=\"http://scgb-salvaggio.fr/image/galerie-photos/siege-SCGB.jpg\" />\t\t
\t\t<meta name=\"viewport\" content=\"width=400, initial-scale=1.0\">\t
\t\t
\t\t<link rel=\"apple-touch-icon\" href=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("image/apple-touch-57.jpg"), "html", null, true);
        echo "\" />
\t\t<link rel=\"apple-touch-icon\" href=\"";
        // line 21
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("image/apple-touch-72.jpg"), "html", null, true);
        echo "\" sizes=\"72x72\" />
\t\t<link rel=\"apple-touch-icon\" href=\"";
        // line 22
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("image/apple-touch-114.jpg"), "html", null, true);
        echo "\" sizes=\"114x114\" />
\t\t<link href=\"//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css\" rel=\"stylesheet\">

\t\t<meta name=\"author\" content=\"Rémy ANDREINI\" />
\t\t<meta name=\"generator\" content=\"Rémy ANDREINI\" />

\t\t<script type=\"text/javascript\" src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js\"></script>

\t\t<title>SCGB -";
        // line 30
        $this->displayBlock('title', $context, $blocks);
        echo "</title>

\t\t<meta name=\"description\" content=\"S.C.G.B. Salvaggio est une P.M.E. oeuvrant dans les secteurs suivants :la construction, la rénovation, l'aménagement intérieur et la reprise en sous-oeuvre\">

\t\t<meta name=\"keywords\" content=\"ivry rénovation,ivry construction\">\t
\t\t
\t\t<!--[if lte IE 8]><script type=\"text/javascript\" src=\"";
        // line 36
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/roundies.js"), "html", null, true);
        echo "\"></script><![endif]-->
\t\t
\t\t<!--  Superzided -->
\t\t<script src=\"";
        // line 39
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/supersized/supersized.3.2.7.min.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
\t\t<script type=\"text/javascript\" src=\"";
        // line 40
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/supersized/supersized.shutter.min.js"), "html", null, true);
        echo "\"></script>
\t\t<link rel=\"stylesheet\" href=\"";
        // line 41
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/supersized/supersized.css"), "html", null, true);
        echo "\" type=\"text/css\" media=\"screen\" />\t
\t\t<script src=\"";
        // line 42
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/supersized/index.background.resize.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>\t\t
\t\t
        <link rel=\"stylesheet\" type=\"text/css\" media=\"screen\" href=\"";
        // line 44
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("script/bootstrap/bootstrap.min.css"), "html", null, true);
        echo "\" />
        <link rel=\"stylesheet\" type=\"text/css\" media=\"screen\" href=\"";
        // line 45
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("script/bootstrap/bootstrap-responsive.css"), "html", null, true);
        echo "\" />\t

\t\t<!-- FancyBox -->
\t\t<script type=\"text/javascript\" src=\"";
        // line 48
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("effet/fancybox/lib/jquery-1.9.0.min.js"), "html", null, true);
        echo "\"></script>
\t\t<script type=\"text/javascript\" src=\"";
        // line 49
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("effet/fancybox/lib/jquery.mousewheel-3.0.6.pack.jsv"), "html", null, true);
        echo "\"></script>
\t\t<script type=\"text/javascript\" src=\"";
        // line 50
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("effet/fancybox/source/jquery.fancybox.js?v=2.1.4"), "html", null, true);
        echo "\"></script>
\t\t<link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 51
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("effet/fancybox/source/jquery.fancybox.css?v=2.1.4"), "html", null, true);
        echo "\" media=\"screen\" />
\t\t<link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 52
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("effet/fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5"), "html", null, true);
        echo "\" />
\t\t<script type=\"text/javascript\" src=\"";
        // line 53
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("effet/fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"), "html", null, true);
        echo "\"></script>
\t\t<link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 54
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("effet/fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7"), "html", null, true);
        echo "\" />
\t\t<script type=\"text/javascript\" src=\"";
        // line 55
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("effet/fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"), "html", null, true);
        echo "\"></script>
\t\t<script type=\"text/javascript\" src=\"";
        // line 56
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("effet/fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.5"), "html", null, true);
        echo "\"></script>\t\t
\t\t<script type=\"text/javascript\">
\t\t\$(document).ready(function() {
\t\t\t/*
\t\t\t *  Simple image gallery. Uses default settings
\t\t\t */

\t\t\t\$('.fancybox').fancybox();

\t\t\t/*
\t\t\t *  Different effects
\t\t\t */

\t\t\t// Change title type, overlay closing speed
\t\t\t\$(\".fancybox-effects-a\").fancybox({
\t\t\t\thelpers: {
\t\t\t\t\ttitle : {
\t\t\t\t\t\ttype : 'outside'
\t\t\t\t\t},
\t\t\t\t\toverlay : {
\t\t\t\t\t\tspeedOut : 0
\t\t\t\t\t}
\t\t\t\t}
\t\t\t});

\t\t\t// Disable opening and closing animations, change title type
\t\t\t\$(\".fancybox-effects-b\").fancybox({
\t\t\t\topenEffect  : 'none',
\t\t\t\tcloseEffect\t: 'none',

\t\t\t\thelpers : {
\t\t\t\t\ttitle : {
\t\t\t\t\t\ttype : 'over'
\t\t\t\t\t}
\t\t\t\t}
\t\t\t});

\t\t\t// Set custom style, close if clicked, change title type and overlay color
\t\t\t\$(\".fancybox-effects-c\").fancybox({
\t\t\t\twrapCSS    : 'fancybox-custom',
\t\t\t\tcloseClick : true,

\t\t\t\topenEffect : 'none',

\t\t\t\thelpers : {
\t\t\t\t\ttitle : {
\t\t\t\t\t\ttype : 'inside'
\t\t\t\t\t},
\t\t\t\t\toverlay : {
\t\t\t\t\t\tcss : {
\t\t\t\t\t\t\t'background' : 'rgba(238,238,238,0.85)'
\t\t\t\t\t\t}
\t\t\t\t\t}
\t\t\t\t}
\t\t\t});

\t\t\t// Remove padding, set opening and closing animations, close if clicked and disable overlay
\t\t\t\$(\".fancybox-effects-d\").fancybox({
\t\t\t\tpadding: 0,

\t\t\t\topenEffect : 'elastic',
\t\t\t\topenSpeed  : 150,

\t\t\t\tcloseEffect : 'elastic',
\t\t\t\tcloseSpeed  : 150,

\t\t\t\tcloseClick : true,

\t\t\t\thelpers : {
\t\t\t\t\toverlay : null
\t\t\t\t}
\t\t\t});

\t\t\t/*
\t\t\t *  Button helper. Disable animations, hide close button, change title type and content
\t\t\t */

\t\t\t\$('.fancybox-buttons').fancybox({
\t\t\t\topenEffect  : 'none',
\t\t\t\tcloseEffect : 'none',

\t\t\t\tprevEffect : 'none',
\t\t\t\tnextEffect : 'none',

\t\t\t\tcloseBtn  : false,

\t\t\t\thelpers : {
\t\t\t\t\ttitle : {
\t\t\t\t\t\ttype : 'inside'
\t\t\t\t\t},
\t\t\t\t\tbuttons\t: {}
\t\t\t\t},

\t\t\t\tafterLoad : function() {
\t\t\t\t\tthis.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
\t\t\t\t}
\t\t\t});


\t\t\t/*
\t\t\t *  Thumbnail helper. Disable animations, hide close button, arrows and slide to next gallery item if clicked
\t\t\t */

\t\t\t\$('.fancybox-thumbs').fancybox({
\t\t\t\tprevEffect : 'none',
\t\t\t\tnextEffect : 'none',

\t\t\t\tcloseBtn  : false,
\t\t\t\tarrows    : false,
\t\t\t\tnextClick : true,

\t\t\t\thelpers : {
\t\t\t\t\tthumbs : {
\t\t\t\t\t\twidth  : 50,
\t\t\t\t\t\theight : 50
\t\t\t\t\t}
\t\t\t\t}
\t\t\t});

\t\t\t/*
\t\t\t *  Media helper. Group items, disable animations, hide arrows, enable media and button helpers.
\t\t\t*/
\t\t\t\$('.fancybox-media')
\t\t\t\t.attr('rel', 'media-gallery')
\t\t\t\t.fancybox({
\t\t\t\t\topenEffect : 'none',
\t\t\t\t\tcloseEffect : 'none',
\t\t\t\t\tprevEffect : 'none',
\t\t\t\t\tnextEffect : 'none',

\t\t\t\t\tarrows : false,
\t\t\t\t\thelpers : {
\t\t\t\t\t\tmedia : {},
\t\t\t\t\t\tbuttons : {}
\t\t\t\t\t}
\t\t\t\t});

\t\t\t/*
\t\t\t *  Open manually
\t\t\t */

\t\t\t\$(\"#fancybox-manual-a\").click(function() {
\t\t\t\t\$.fancybox.open('1_b.jpg');
\t\t\t});

\t\t\t\$(\"#fancybox-manual-b\").click(function() {
\t\t\t\t\$.fancybox.open({
\t\t\t\t\thref : 'iframe.html',
\t\t\t\t\ttype : 'iframe',
\t\t\t\t\tpadding : 5
\t\t\t\t});
\t\t\t});

\t\t\t\$(\"#fancybox-manual-c\").click(function() {
\t\t\t\t\$.fancybox.open([
\t\t\t\t\t{
\t\t\t\t\t\thref : '1_b.jpg',
\t\t\t\t\t\ttitle : 'My title'
\t\t\t\t\t}, {
\t\t\t\t\t\thref : '2_b.jpg',
\t\t\t\t\t\ttitle : '2nd title'
\t\t\t\t\t}, {
\t\t\t\t\t\thref : '3_b.jpg'
\t\t\t\t\t}
\t\t\t\t], {
\t\t\t\t\thelpers : {
\t\t\t\t\t\tthumbs : {
\t\t\t\t\t\t\twidth: 75,
\t\t\t\t\t\t\theight: 50
\t\t\t\t\t\t}
\t\t\t\t\t}
\t\t\t\t});
\t\t\t});


\t\t});
\t</script>
\t<style type=\"text/css\">
\t\t.fancybox-custom .fancybox-skin {
\t\t\tbox-shadow: 0 0 50px #222;
\t\t}
\t</style>
\t\t\t\t
\t\t<!-- Style -->
\t\t<link rel=\"stylesheet\" media=\"screen\" type=\"text/css\"  href=\"";
        // line 240
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("script/style.css"), "html", null, true);
        echo "\" />
\t\t<link rel=\"stylesheet\" media=\"screen\" type=\"text/css\"  href=\"";
        // line 241
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("script/style_menu.css"), "html", null, true);
        echo "\" />
\t\t\t\t
\t</head>

<body>

\t<div id=\"header\">
\t\t<div class=\"row-fluid\">
\t\t\t<div class=\"span8\">
\t\t\t\t<a href=\"/welcome.php\" ><img  id=\"logo\" src=\"";
        // line 250
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("image/logos/logo-scgb.png"), "html", null, true);
        echo "\" alt=\"Logo de la société SCGB\"/> </a>\t\t\t
\t\t\t\t
\t\t\t\t\t";
        // line 252
        $this->env->loadTemplate("::menu.html.twig")->display($context);
        // line 253
        echo "\t\t\t </div>
\t\t\t
\t\t\t<div class=\"span4\" >\t
\t\t\t\t<div id=\"partenaire\">
\t\t\t\t\t<p class=\"text_blue\" style=\"margin-top: 15px;text-align: center\"> <strong>Nos Labels Qualités : </strong>
\t\t\t\t\t\t<a href=\"http://www.qualibat.com/Views/PagesStatiques/Qualification.aspx\" target=\"blank\" rel=\"nofollow\"><img style=\"padding-left:40px; width:60px;\" id=\"logo\" src=\"";
        // line 258
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("image/logos/qualibat.jpg"), "html", null, true);
        echo "\" /> </a>
\t\t\t\t\t</p>
\t\t\t\t</div>\t\t\t\t\t\t\t
\t\t\t\t<div id=\"adress-header\">
\t\t\t\t<p class=\"text_blue\" style=\" padding-top:15px; text-align: center\"><strong>44, rue Constant Coquelin - 94400 Vitry sur Seine <br/> 
\t\t\t\tTél : 01.55.53.17.85</strong></p>
\t\t\t\t</div>\t
\t\t\t</div>\t\t
\t\t</div>
\t</div>
\t
    <div id=\"content\" class=\"container-fluid \">
        ";
        // line 270
        $this->displayBlock('body', $context, $blocks);
        // line 271
        echo "    </div>
\t\t
\t\t
<br/><br/><br/><br/>
<div id=\"footer\">
\t<div class=\"row-fluid\">
\t\t<div class=\"span6\">\t\t\t\t
\t\t\t<div id=\"first_block_footer\" class=\"footer_link\"> 
\t\t\t\t<ul  class=\"text marge\">
\t\t\t\t\t<li><a href=\"/welcome.php\">Accueil</a></li>
\t\t\t\t\t<li><a href=\"/entreprise/histoire.php\">L'entreprise </a></li>
\t\t\t\t\t<li><a href=\"";
        // line 282
        echo $this->env->getExtension('routing')->getPath("devis_new");
        echo "\"><span>Devis en Ligne</span></a></li>
\t\t\t\t\t<li><a href=\"/entreprise/contact.php\">Nos Contacts</a></li>
\t\t\t\t\t<li><a href=\"/home/mentionslegales.php\">Mentions Légales</a></li>
\t\t\t\t</ul>
\t\t\t</div>
\t\t\t
\t\t\t<div id=\"second_block_footer\" class=\"footer_link\"> 
\t\t\t\t<ul class=\"text marge\">
\t\t\t\t\t<li><a href=\"/services/presentation.php\">Nos Services :</a></li>
\t\t\t\t\t<li class=\"sub-footer\"><a href=\"/services/amenagement.php\">Aménagement Intérieur</a></li>
\t\t\t\t\t<li class=\"sub-footer\"><a href=\"/services/construction.php\">Construction</a></li>
\t\t\t\t\t<li class=\"sub-footer\"><a href=\"/services/renovation.php\">Rénovation </a></li>
\t\t\t\t\t<li class=\"sub-footer\"><a href=\"/services/reprises.php\">Reprise en sous-oeuvre</a></li>
\t\t\t\t\t<li class=\"sub-footer\"><a href=\"/services/etudes.php\">Etudes</a></li>
\t\t\t\t</ul>
\t\t\t</div>\t
\t\t
\t\t</div>\t\t\t
\t\t<div class=\"span6\" >
\t\t\t<div id=\"second_block_footer\" class=\"footer_link\"> 
\t\t\t\t<ul class=\"text marge\">
\t\t\t\t\t<li><p>Nos Partenaires :</p></li>
\t\t\t\t\t<li> <a href=\"#\" ><img style=\"width:60px;\" id=\"logo\" src=\"";
        // line 304
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("image/logos/qualibat.jpg"), "html", null, true);
        echo "\" alt=\"logo qualibat\"/> </a>
\t\t\t\t\t\t<a href=\"#\" ><img style=\"padding-left:40px; width:60px;\" id=\"logo\" src=\"";
        // line 305
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("image/logos/qualibat.jpg"), "html", null, true);
        echo "\" alt=\"logo qualibat\"/></a> </li>
\t\t\t\t</ul>
\t\t\t</div>\t
\t\t
\t\t</div>\t\t
\t</div>
\t
</div>
\t
</body>
</html>
";
    }

    // line 30
    public function block_title($context, array $blocks = array())
    {
    }

    // line 270
    public function block_body($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "::base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  435 => 270,  430 => 30,  414 => 305,  410 => 304,  385 => 282,  372 => 271,  370 => 270,  355 => 258,  348 => 253,  346 => 252,  341 => 250,  329 => 241,  325 => 240,  138 => 56,  134 => 55,  130 => 54,  126 => 53,  122 => 52,  118 => 51,  114 => 50,  110 => 49,  106 => 48,  100 => 45,  96 => 44,  91 => 42,  87 => 41,  83 => 40,  79 => 39,  73 => 36,  64 => 30,  53 => 22,  49 => 21,  45 => 20,  38 => 16,  21 => 1,);
    }
}
