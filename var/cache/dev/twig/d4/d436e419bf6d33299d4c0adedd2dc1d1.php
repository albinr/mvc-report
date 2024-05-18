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

/* library/read_many.html.twig */
class __TwigTemplate_05f3dd642d69ef335a6b884bc8bc6562 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "library/read_many.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "library/read_many.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "library/read_many.html.twig", 1);
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

        echo "Library Catalog";
        
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
        echo "<h1>Library</h1>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Author</th>
            <th>ISBN</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        ";
        // line 19
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["books"]) || array_key_exists("books", $context) ? $context["books"] : (function () { throw new RuntimeError('Variable "books" does not exist.', 19, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["book"]) {
            // line 20
            echo "        <tr>
            <td>";
            // line 21
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["book"], "bookid", [], "any", false, false, false, 21), "html", null, true);
            echo "</td>
            <td>";
            // line 22
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["book"], "title", [], "any", false, false, false, 22), "html", null, true);
            echo "</td>
            <td>";
            // line 23
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["book"], "author", [], "any", false, false, false, 23), "html", null, true);
            echo "</td>
            <td>";
            // line 24
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["book"], "isbn", [], "any", false, false, false, 24), "html", null, true);
            echo "</td>
            <td>
                <a href=\"";
            // line 26
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("read_one", ["bookid" => twig_get_attribute($this->env, $this->source, $context["book"], "bookid", [], "any", false, false, false, 26)]), "html", null, true);
            echo "\">Details</a>
                <a href=\"";
            // line 27
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("edit_book", ["bookid" => twig_get_attribute($this->env, $this->source, $context["book"], "bookid", [], "any", false, false, false, 27)]), "html", null, true);
            echo "\">Edit</a>
                <form action=\"";
            // line 28
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("delete_book", ["bookid" => twig_get_attribute($this->env, $this->source, $context["book"], "bookid", [], "any", false, false, false, 28)]), "html", null, true);
            echo "\" method=\"post\"
                    style=\"display: inline;\">
                    <button type=\"submit\">Delete</button>
                </form>
            </td>
        </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['book'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 35
        echo "        <tr>
            <td colspan=\"5\"><a href=\"";
        // line 36
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("create");
        echo "\">+ Add book</a></td>
        </tr>
    </tbody>
</table>


<div class=\"library\">
    ";
        // line 43
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["books"]) || array_key_exists("books", $context) ? $context["books"] : (function () { throw new RuntimeError('Variable "books" does not exist.', 43, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["book"]) {
            // line 44
            echo "    <div class=\"book-container\">
        <div class=\"book-info\">
            <span>";
            // line 46
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["book"], "bookid", [], "any", false, false, false, 46), "html", null, true);
            echo "</span>
            <div>
                <h3>";
            // line 48
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["book"], "title", [], "any", false, false, false, 48), "html", null, true);
            echo "</h3>
                <p>";
            // line 49
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["book"], "author", [], "any", false, false, false, 49), "html", null, true);
            echo "</p>
                <p>Isbn: ";
            // line 50
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["book"], "isbn", [], "any", false, false, false, 50), "html", null, true);
            echo "</p>
            </div>
            <p><a href=\"";
            // line 52
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("read_one", ["bookid" => twig_get_attribute($this->env, $this->source, $context["book"], "bookid", [], "any", false, false, false, 52)]), "html", null, true);
            echo "\" class=\"button\">Details</a></p>
        </div>
        <div class=\"book-cover\">
            ";
            // line 55
            if (twig_get_attribute($this->env, $this->source, $context["book"], "image", [], "any", false, false, false, 55)) {
                // line 56
                echo "            <img src=\"";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(twig_get_attribute($this->env, $this->source, $context["book"], "image", [], "any", false, false, false, 56)), "html", null, true);
                echo "\" alt=\"Cover image of ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["book"], "title", [], "any", false, false, false, 56), "html", null, true);
                echo "\" class=\"book-img\">
            ";
            } else {
                // line 58
                echo "            No image
            ";
            }
            // line 60
            echo "        </div>
    </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['book'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 63
        echo "    <a href=\"";
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("create");
        echo "\" class=\"book-cover\">+ Add book</a>
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
        return "library/read_many.html.twig";
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
        return array (  215 => 63,  207 => 60,  203 => 58,  195 => 56,  193 => 55,  187 => 52,  182 => 50,  178 => 49,  174 => 48,  169 => 46,  165 => 44,  161 => 43,  151 => 36,  148 => 35,  135 => 28,  131 => 27,  127 => 26,  122 => 24,  118 => 23,  114 => 22,  110 => 21,  107 => 20,  103 => 19,  88 => 6,  78 => 5,  59 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Library Catalog{% endblock %}

{% block body %}
<h1>Library</h1>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Author</th>
            <th>ISBN</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        {% for book in books %}
        <tr>
            <td>{{ book.bookid }}</td>
            <td>{{ book.title }}</td>
            <td>{{ book.author }}</td>
            <td>{{ book.isbn }}</td>
            <td>
                <a href=\"{{ path('read_one', {'bookid': book.bookid}) }}\">Details</a>
                <a href=\"{{ path('edit_book', {'bookid': book.bookid}) }}\">Edit</a>
                <form action=\"{{ path('delete_book', {'bookid': book.bookid}) }}\" method=\"post\"
                    style=\"display: inline;\">
                    <button type=\"submit\">Delete</button>
                </form>
            </td>
        </tr>
        {% endfor %}
        <tr>
            <td colspan=\"5\"><a href=\"{{ path('create') }}\">+ Add book</a></td>
        </tr>
    </tbody>
</table>


<div class=\"library\">
    {% for book in books %}
    <div class=\"book-container\">
        <div class=\"book-info\">
            <span>{{ book.bookid }}</span>
            <div>
                <h3>{{ book.title }}</h3>
                <p>{{ book.author }}</p>
                <p>Isbn: {{ book.isbn }}</p>
            </div>
            <p><a href=\"{{ path('read_one', {'bookid': book.bookid}) }}\" class=\"button\">Details</a></p>
        </div>
        <div class=\"book-cover\">
            {% if book.image %}
            <img src=\"{{ asset( book.image ) }}\" alt=\"Cover image of {{ book.title }}\" class=\"book-img\">
            {% else %}
            No image
            {% endif %}
        </div>
    </div>
    {% endfor %}
    <a href=\"{{ path('create') }}\" class=\"book-cover\">+ Add book</a>
</div>
{% endblock %}", "library/read_many.html.twig", "/home/albinr/dbwebb-kurser/mvc/me/report/templates/library/read_many.html.twig");
    }
}
