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

/* twentyone/home.html.twig */
class __TwigTemplate_c28fb25c64702fc47a6f6f2b94cd35b2 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "twentyone/home.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "twentyone/home.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "twentyone/home.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo "21";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    // line 5
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 6
        echo "<h1>Kortspel: 21</h1>

<p><a href=\"";
        // line 8
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("game_doc");
        echo "\" >Documentation</a></p>

<h3>Förklaring:</h3>

<p>Målet med spelet är att samla kort som har det totala värdet så nära 21 som möjligt, utan att överskrida 21.</p>

<h3>Kortens värde:</h3>
<ul>
    <li>De numrerade korten har sitt tryckta värde. (2-10)</li>
    <li>Knekt, Dam och Kung är värda 10.</li>
    <li>Ess kan vara värt antingen 1 eller 14, spelaren får välja vad som gymmar dem mest.</li>
</ul>

<h3>En spel runda ser ut så här:</h3>
<ol>
    <li>Spelaren tar ett kort. Kortet visas.</li>
    <li>Spelaren kan bestämma att stanna(stand) eller ta ytterligare ett kort(hit).</li>
    <li>Om spelaren får över 21 vinner banken.</li>
    <li>När spelaren stannar så är det bankens tur.</li>
    <li>Banken plockar kort tills den stannar eller har över 21.</li>
    <li>Banken vinner vid lika eller om banken har mer än spelaren.</li>
    <li>Spelaren vinner om banken får över 21.</li>
</ol>

<a href=\"";
        // line 32
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("game_start");
        echo "\" class=\"button green-button\">Starta spel</a>

";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "twentyone/home.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable()
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo()
    {
        return array (  119 => 32,  92 => 8,  88 => 6,  78 => 5,  59 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"base.html.twig\" %}

{% block title %}21{% endblock %}

{% block body %}
<h1>Kortspel: 21</h1>

<p><a href=\"{{ path('game_doc') }}\" >Documentation</a></p>

<h3>Förklaring:</h3>

<p>Målet med spelet är att samla kort som har det totala värdet så nära 21 som möjligt, utan att överskrida 21.</p>

<h3>Kortens värde:</h3>
<ul>
    <li>De numrerade korten har sitt tryckta värde. (2-10)</li>
    <li>Knekt, Dam och Kung är värda 10.</li>
    <li>Ess kan vara värt antingen 1 eller 14, spelaren får välja vad som gymmar dem mest.</li>
</ul>

<h3>En spel runda ser ut så här:</h3>
<ol>
    <li>Spelaren tar ett kort. Kortet visas.</li>
    <li>Spelaren kan bestämma att stanna(stand) eller ta ytterligare ett kort(hit).</li>
    <li>Om spelaren får över 21 vinner banken.</li>
    <li>När spelaren stannar så är det bankens tur.</li>
    <li>Banken plockar kort tills den stannar eller har över 21.</li>
    <li>Banken vinner vid lika eller om banken har mer än spelaren.</li>
    <li>Spelaren vinner om banken får över 21.</li>
</ol>

<a href=\"{{ path('game_start') }}\" class=\"button green-button\">Starta spel</a>

{% endblock %}", "twentyone/home.html.twig", "/home/albinr/dbwebb-kurser/mvc/me/report/templates/twentyone/home.html.twig");
    }
}
