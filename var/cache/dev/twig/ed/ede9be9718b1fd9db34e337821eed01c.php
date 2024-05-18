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

/* twentyone/game.html.twig */
class __TwigTemplate_ac0c683e609cbbad3fba525e9fdcf2b9 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "twentyone/game.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "twentyone/game.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "twentyone/game.html.twig", 1);
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

        echo "Game";
        
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
        echo "<h1>Game of Twenty One</h1>

<div class=\"bank-cards\">
    <h2>Banks Cards:</h2>
    <div class=\"hand\">
        ";
        // line 11
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["game"]) || array_key_exists("game", $context) ? $context["game"] : (function () { throw new RuntimeError('Variable "game" does not exist.', 11, $this->source); })()), "getBankHand", [], "method", false, false, false, 11), "getRenderedHand", [], "method", false, false, false, 11));
        foreach ($context['_seq'] as $context["_key"] => $context["card"]) {
            // line 12
            echo "        ";
            echo $context["card"];
            echo "
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['card'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 14
        echo "    </div>
    <div class=\"game-points\">Card score: ";
        // line 15
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["game"]) || array_key_exists("game", $context) ? $context["game"] : (function () { throw new RuntimeError('Variable "game" does not exist.', 15, $this->source); })()), "getBankScore", [], "method", false, false, false, 15), "html", null, true);
        echo "</div>
</div>
<div class=\"game-status\">";
        // line 17
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["game"]) || array_key_exists("game", $context) ? $context["game"] : (function () { throw new RuntimeError('Variable "game" does not exist.', 17, $this->source); })()), "getStatus", [], "method", false, false, false, 17), "html", null, true);
        echo "</div>
<div class=\"player-cards\">
    <h2>Your Cards:</h2>
    <div class=\"hand\">
        ";
        // line 21
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["game"]) || array_key_exists("game", $context) ? $context["game"] : (function () { throw new RuntimeError('Variable "game" does not exist.', 21, $this->source); })()), "getPlayerHand", [], "method", false, false, false, 21), "getRenderedHand", [], "method", false, false, false, 21));
        foreach ($context['_seq'] as $context["_key"] => $context["card"]) {
            // line 22
            echo "        ";
            echo $context["card"];
            echo "
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['card'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 24
        echo "    </div>
    <div class=\"game-points\">Card score: ";
        // line 25
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["game"]) || array_key_exists("game", $context) ? $context["game"] : (function () { throw new RuntimeError('Variable "game" does not exist.', 25, $this->source); })()), "getPlayerScore", [], "method", false, false, false, 25), "html", null, true);
        echo "</div>
</div>

<div class=\"game-actions\">
    ";
        // line 29
        if ((twig_get_attribute($this->env, $this->source, (isset($context["game"]) || array_key_exists("game", $context) ? $context["game"] : (function () { throw new RuntimeError('Variable "game" does not exist.', 29, $this->source); })()), "getStatus", [], "method", false, false, false, 29) == "playing")) {
            // line 30
            echo "        <a href=\"";
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("game_hit");
            echo "\" class=\"button blue-button\">Hit</a>
        <a href=\"";
            // line 31
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("game_stand");
            echo "\" class=\"button\">Stand</a>
    ";
        } else {
            // line 33
            echo "        <a href=\"";
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("game_start");
            echo "\" class=\"button blue-button\">Play Again</a>
        <a href=\"";
            // line 34
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("game");
            echo "\" class=\"button\">Back to Home</a>
    ";
        }
        // line 36
        echo "</div>


";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "twentyone/game.html.twig";
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
        return array (  168 => 36,  163 => 34,  158 => 33,  153 => 31,  148 => 30,  146 => 29,  139 => 25,  136 => 24,  127 => 22,  123 => 21,  116 => 17,  111 => 15,  108 => 14,  99 => 12,  95 => 11,  88 => 6,  78 => 5,  59 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"base.html.twig\" %}

{% block title %}Game{% endblock %}

{% block body %}
<h1>Game of Twenty One</h1>

<div class=\"bank-cards\">
    <h2>Banks Cards:</h2>
    <div class=\"hand\">
        {% for card in game.getBankHand().getRenderedHand() %}
        {{ card|raw }}
        {% endfor %}
    </div>
    <div class=\"game-points\">Card score: {{ game.getBankScore() }}</div>
</div>
<div class=\"game-status\">{{ game.getStatus() }}</div>
<div class=\"player-cards\">
    <h2>Your Cards:</h2>
    <div class=\"hand\">
        {% for card in game.getPlayerHand().getRenderedHand() %}
        {{ card|raw }}
        {% endfor %}
    </div>
    <div class=\"game-points\">Card score: {{ game.getPlayerScore() }}</div>
</div>

<div class=\"game-actions\">
    {% if game.getStatus() == 'playing' %}
        <a href=\"{{ path('game_hit') }}\" class=\"button blue-button\">Hit</a>
        <a href=\"{{ path('game_stand') }}\" class=\"button\">Stand</a>
    {% else %}
        <a href=\"{{ path('game_start') }}\" class=\"button blue-button\">Play Again</a>
        <a href=\"{{ path('game') }}\" class=\"button\">Back to Home</a>
    {% endif %}
</div>


{% endblock %}", "twentyone/game.html.twig", "/home/albinr/dbwebb-kurser/mvc/me/report/templates/twentyone/game.html.twig");
    }
}
