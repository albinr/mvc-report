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

/* library/read_one.html.twig */
class __TwigTemplate_312ee52a3040d09f81ce523aedbf107d extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "library/read_one.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "library/read_one.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "library/read_one.html.twig", 1);
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

        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["book"]) || array_key_exists("book", $context) ? $context["book"] : (function () { throw new RuntimeError('Variable "book" does not exist.', 3, $this->source); })()), "title", [], "any", false, false, false, 3), "html", null, true);
        
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
        echo "
<h1>Read one</h1>

<div class=\"one-book\">
    <div class=\"book-container\">
        <div class=\"book-info\">
            <p>";
        // line 12
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["book"]) || array_key_exists("book", $context) ? $context["book"] : (function () { throw new RuntimeError('Variable "book" does not exist.', 12, $this->source); })()), "bookid", [], "any", false, false, false, 12), "html", null, true);
        echo "</p>
            <p>Title: ";
        // line 13
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["book"]) || array_key_exists("book", $context) ? $context["book"] : (function () { throw new RuntimeError('Variable "book" does not exist.', 13, $this->source); })()), "title", [], "any", false, false, false, 13), "html", null, true);
        echo "</p>
            <p>Author: ";
        // line 14
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["book"]) || array_key_exists("book", $context) ? $context["book"] : (function () { throw new RuntimeError('Variable "book" does not exist.', 14, $this->source); })()), "author", [], "any", false, false, false, 14), "html", null, true);
        echo "</p>
            <p>Isbn: ";
        // line 15
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["book"]) || array_key_exists("book", $context) ? $context["book"] : (function () { throw new RuntimeError('Variable "book" does not exist.', 15, $this->source); })()), "isbn", [], "any", false, false, false, 15), "html", null, true);
        echo "</p>
            <form action=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("edit_book", ["bookid" => twig_get_attribute($this->env, $this->source, (isset($context["book"]) || array_key_exists("book", $context) ? $context["book"] : (function () { throw new RuntimeError('Variable "book" does not exist.', 16, $this->source); })()), "bookid", [], "any", false, false, false, 16)]), "html", null, true);
        echo "\" method=\"POST\">
                <button type=\"submit\" class=\"button green-button\">Update Book</button>
            </form>

            <form action=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("delete_book", ["bookid" => twig_get_attribute($this->env, $this->source, (isset($context["book"]) || array_key_exists("book", $context) ? $context["book"] : (function () { throw new RuntimeError('Variable "book" does not exist.', 20, $this->source); })()), "bookid", [], "any", false, false, false, 20)]), "html", null, true);
        echo "\" method=\"POST\">
                <button type=\"submit\" class=\"button red-button\">Delete Book</button>
            </form>
        </div>
        <div class=\"book-cover\">
            ";
        // line 25
        if (twig_get_attribute($this->env, $this->source, (isset($context["book"]) || array_key_exists("book", $context) ? $context["book"] : (function () { throw new RuntimeError('Variable "book" does not exist.', 25, $this->source); })()), "image", [], "any", false, false, false, 25)) {
            // line 26
            echo "            <img src=\"";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(twig_get_attribute($this->env, $this->source, (isset($context["book"]) || array_key_exists("book", $context) ? $context["book"] : (function () { throw new RuntimeError('Variable "book" does not exist.', 26, $this->source); })()), "image", [], "any", false, false, false, 26)), "html", null, true);
            echo "\" alt=\"Cover image of ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["book"]) || array_key_exists("book", $context) ? $context["book"] : (function () { throw new RuntimeError('Variable "book" does not exist.', 26, $this->source); })()), "title", [], "any", false, false, false, 26), "html", null, true);
            echo "\" class=\"book-img\">
            ";
        } else {
            // line 28
            echo "            No image
            ";
        }
        // line 30
        echo "        </div>
    </div>
</div>

";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "library/read_one.html.twig";
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
        return array (  141 => 30,  137 => 28,  129 => 26,  127 => 25,  119 => 20,  112 => 16,  108 => 15,  104 => 14,  100 => 13,  96 => 12,  88 => 6,  78 => 5,  59 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}{{ book.title }}{% endblock %}

{% block body %}

<h1>Read one</h1>

<div class=\"one-book\">
    <div class=\"book-container\">
        <div class=\"book-info\">
            <p>{{ book.bookid }}</p>
            <p>Title: {{ book.title }}</p>
            <p>Author: {{ book.author }}</p>
            <p>Isbn: {{ book.isbn }}</p>
            <form action=\"{{ path('edit_book', {'bookid': book.bookid}) }}\" method=\"POST\">
                <button type=\"submit\" class=\"button green-button\">Update Book</button>
            </form>

            <form action=\"{{ path('delete_book', {'bookid': book.bookid}) }}\" method=\"POST\">
                <button type=\"submit\" class=\"button red-button\">Delete Book</button>
            </form>
        </div>
        <div class=\"book-cover\">
            {% if book.image %}
            <img src=\"{{ asset( book.image ) }}\" alt=\"Cover image of {{ book.title }}\" class=\"book-img\">
            {% else %}
            No image
            {% endif %}
        </div>
    </div>
</div>

{% endblock %}", "library/read_one.html.twig", "/home/albinr/dbwebb-kurser/mvc/me/report/templates/library/read_one.html.twig");
    }
}
