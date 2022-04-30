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

/* index.twig */
class __TwigTemplate_7da115f61bacc907ff9b917e8546f5a2c3d5738c7c0fb77ae293f574d1dbea90 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'head' => [$this, 'block_head'],
            'langue' => [$this, 'block_langue'],
            'title' => [$this, 'block_title'],
            'description' => [$this, 'block_description'],
            'content' => [$this, 'block_content'],
            'scripts' => [$this, 'block_scripts'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "layouts/app.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("layouts/app.twig", "index.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_head($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 5
        echo "    ";
        $this->displayParentBlock("head", $context, $blocks);
        echo "
";
    }

    // line 8
    public function block_langue($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo twig_escape_filter($this->env, ($context["langue"] ?? null), "html", null, true);
    }

    // line 10
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 11
        echo "    ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["seo"] ?? null), "title", [], "any", false, false, false, 11), "html", null, true);
        echo "
";
    }

    // line 14
    public function block_description($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 15
        echo "    ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["seo"] ?? null), "desc", [], "any", false, false, false, 15), "html", null, true);
        echo "
";
    }

    // line 19
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 20
        echo "
";
    }

    // line 23
    public function block_scripts($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 24
        echo "    ";
        $this->displayParentBlock("scripts", $context, $blocks);
        echo "
";
    }

    public function getTemplateName()
    {
        return "index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  104 => 24,  100 => 23,  95 => 20,  91 => 19,  84 => 15,  80 => 14,  73 => 11,  69 => 10,  62 => 8,  55 => 5,  51 => 4,  40 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"layouts/app.twig\" %}


{% block head %}
    {{ parent() }}
{% endblock %}

{% block langue %}{{langue}}{% endblock %}

{% block title %}
    {{seo.title}}
{% endblock %}

{% block description %}
    {{seo.desc}}
{% endblock %}


{% block content %}

{% endblock %}

{% block scripts %}
    {{ parent() }}
{% endblock %}
", "index.twig", "/var/www/html/resources/views/index.twig");
    }
}
