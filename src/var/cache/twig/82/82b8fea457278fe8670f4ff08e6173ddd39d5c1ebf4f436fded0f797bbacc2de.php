<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* layouts/app.twig */
class __TwigTemplate_b612dfeae5885db85ca2ecbe6b7f41c5c4adbf2542900c22fb5cb7fefb99110e extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'head' => [$this, 'block_head'],
            'description' => [$this, 'block_description'],
            'fb_title' => [$this, 'block_fb_title'],
            'fb_image' => [$this, 'block_fb_image'],
            'fb_url' => [$this, 'block_fb_url'],
            'fb_description' => [$this, 'block_fb_description'],
            'title' => [$this, 'block_title'],
            'header' => [$this, 'block_header'],
            'content' => [$this, 'block_content'],
            'footer' => [$this, 'block_footer'],
            'scripts' => [$this, 'block_scripts'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">
<head>
    ";
        // line 4
        $this->displayBlock('head', $context, $blocks);
        // line 27
        echo "</head>
<body data-mobile-nav-style=\"classic\">


     ";
        // line 31
        $this->displayBlock('header', $context, $blocks);
        // line 34
        echo "
     ";
        // line 35
        $this->displayBlock('content', $context, $blocks);
        // line 36
        echo "
     ";
        // line 37
        $this->displayBlock('footer', $context, $blocks);
        // line 40
        echo "     
     ";
        // line 41
        $this->displayBlock('scripts', $context, $blocks);
        // line 44
        echo "</body>
</html>";
    }

    // line 4
    public function block_head($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 5
        echo "        <meta charset=\"utf-8\">
        <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\" />
        <meta name=\"author\" content=\"Nikba Creative Studio\">
        <meta name=\"viewport\" content=\"width=device-width,initial-scale=1.0,maximum-scale=1\" />
        <meta name=\"description\" content=\"";
        // line 9
        $this->displayBlock('description', $context, $blocks);
        echo "\">

         <meta property=\"og:title\" content=\"";
        // line 11
        $this->displayBlock('fb_title', $context, $blocks);
        echo "\" />
         <meta property=\"og:image\" content=\"";
        // line 12
        $this->displayBlock('fb_image', $context, $blocks);
        echo "\" />
         <meta property=\"og:type\" content=\"article\" />
         
         <meta property=\"og:url\" content=\"";
        // line 15
        $this->displayBlock('fb_url', $context, $blocks);
        echo "\" />
         <meta property=\"og:site_name\" content=\"\" />
         <meta property=\"og:description\" content=\"";
        // line 17
        $this->displayBlock('fb_description', $context, $blocks);
        echo "\" />

         <link rel=\"shortcut icon\" href=\"/assets/images/favicon.webp\">
         <link rel=\"apple-touch-icon-precomposed\" sizes=\"114x114\" href=\"/assets/images/apple-touch-icon-114x114.webp\">
         <link rel=\"apple-touch-icon-precomposed\" sizes=\"72x72\" href=\"/assets/images/apple-touch-icon-72x72.webp\">
         <link rel=\"apple-touch-icon-precomposed\" href=\"/assets/images/apple-touch-icon-57x57.webp\">
        
         <title>";
        // line 24
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
         <link rel=\"stylesheet\" type=\"text/css\" href=\"/assets/css/style.min.css\" />
    ";
    }

    // line 9
    public function block_description($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 11
    public function block_fb_title($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 12
    public function block_fb_image($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 15
    public function block_fb_url($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 17
    public function block_fb_description($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 24
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 31
    public function block_header($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 32
        echo "        ";
        echo twig_include($this->env, $context, "sections/header.twig");
        echo "
     ";
    }

    // line 35
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 37
    public function block_footer($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 38
        echo "        ";
        echo twig_include($this->env, $context, "sections/footer.twig");
        echo "
     ";
    }

    // line 41
    public function block_scripts($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 42
        echo "        ";
        echo twig_include($this->env, $context, "sections/scripts.twig");
        echo "
     ";
    }

    public function getTemplateName()
    {
        return "layouts/app.twig";
    }

    public function getDebugInfo()
    {
        return array (  198 => 42,  194 => 41,  187 => 38,  183 => 37,  177 => 35,  170 => 32,  166 => 31,  160 => 24,  154 => 17,  148 => 15,  142 => 12,  136 => 11,  130 => 9,  123 => 24,  113 => 17,  108 => 15,  102 => 12,  98 => 11,  93 => 9,  87 => 5,  83 => 4,  78 => 44,  76 => 41,  73 => 40,  71 => 37,  68 => 36,  66 => 35,  63 => 34,  61 => 31,  55 => 27,  53 => 4,  48 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<!DOCTYPE html>
<html lang=\"en\">
<head>
    {% block head %}
        <meta charset=\"utf-8\">
        <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\" />
        <meta name=\"author\" content=\"Nikba Creative Studio\">
        <meta name=\"viewport\" content=\"width=device-width,initial-scale=1.0,maximum-scale=1\" />
        <meta name=\"description\" content=\"{% block description %}{% endblock %}\">

         <meta property=\"og:title\" content=\"{% block fb_title %}{% endblock %}\" />
         <meta property=\"og:image\" content=\"{% block fb_image %}{% endblock %}\" />
         <meta property=\"og:type\" content=\"article\" />
         
         <meta property=\"og:url\" content=\"{% block fb_url %}{% endblock %}\" />
         <meta property=\"og:site_name\" content=\"\" />
         <meta property=\"og:description\" content=\"{% block fb_description %}{% endblock %}\" />

         <link rel=\"shortcut icon\" href=\"/assets/images/favicon.webp\">
         <link rel=\"apple-touch-icon-precomposed\" sizes=\"114x114\" href=\"/assets/images/apple-touch-icon-114x114.webp\">
         <link rel=\"apple-touch-icon-precomposed\" sizes=\"72x72\" href=\"/assets/images/apple-touch-icon-72x72.webp\">
         <link rel=\"apple-touch-icon-precomposed\" href=\"/assets/images/apple-touch-icon-57x57.webp\">
        
         <title>{% block title %}{% endblock %}</title>
         <link rel=\"stylesheet\" type=\"text/css\" href=\"/assets/css/style.min.css\" />
    {% endblock %}
</head>
<body data-mobile-nav-style=\"classic\">


     {% block header %}
        {{ include('sections/header.twig') }}
     {% endblock %}

     {% block content %}{% endblock %}

     {% block footer %}
        {{ include('sections/footer.twig') }}
     {% endblock %}
     
     {% block scripts %}
        {{ include('sections/scripts.twig') }}
     {% endblock %}
</body>
</html>", "layouts/app.twig", "/var/www/html/resources/views/layouts/app.twig");
    }
}
