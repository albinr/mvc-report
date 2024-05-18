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

/* twentyone/doc.html.twig */
class __TwigTemplate_ed1ef6bcd0889c810520e4363d804a95 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "twentyone/doc.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "twentyone/doc.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "twentyone/doc.html.twig", 1);
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

        echo "Game Doc";
        
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
        echo "<h1>Dokumentation för spelet 21</h1>

<div class=\"row\">
    <div class=\"column\">
        <h2>Pseudokod</h2>
        <h4>Starta spelet:</h4>
        <ul>
            <li>Skapa och blanda en kortlek</li>
            <li>Skapa en tom hand för spelaren</li>
            <li>Skapa en tom hand för banken</li>
        </ul>

        <h4>Spelarens tur:</h4>
        <ul>
            <li>WHILE spelaren inte har stannat och inte överskridit 21 poäng:
                <ul>
                    <li>Fråga spelaren om de vill ta ett kort eller stanna</li>
                    <li>Om spelaren väljer att ta ett kort:
                        <ul>
                            <li>Dra ett kort från kortleken och lägg till i spelarens hand</li>
                            <li>Visa spelarens nya kort</li>
                            <li>Om spelarens totala poäng överskrider 21:
                                <ul>
                                    <li>Meddela spelaren att de överskridit 21</li>
                                    <li>Avsluta spelarens tur</li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>Annars om spelaren väljer att stanna:
                        <ul>
                            <li>Avsluta spelarens tur och påbörja bankens tur</li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>

        <h4>Bankens tur:</h4>
        <ul>
            <li>WHILE bankens totala poäng är mindre än 17:
                <ul>
                    <li>Dra ett kort från kortleken och lägg till i bankens hand</li>
                    <li>Visa bankens nya kort</li>
                    <li>Om bankens totala poäng överskrider 21:
                        <ul>
                            <li>Meddela att banken överskridit 21</li>
                            <li>Avsluta bankens tur</li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>

        <h4> Avgör vem som vann:</h4>
        <ul>
            <li>Om både spelaren och banken är under eller lika med 21:
                <ul>
                    <li>Om spelarens poäng är högre än bankens poäng:
                        <ul>
                            <li>Spelaren vinner</li>
                        </ul>
                    </li>
                    <li>Annars om bankens poäng är lika med eller högre än spelarens poäng:
                        <ul>
                            <li>Banken vinner</li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li>Annars:
                <ul>
                    <li>Om bara banken överskrider 21:
                        <ul>
                            <li>Spelaren vinner</li>
                        </ul>
                    </li>
                    <li>Om bara spelaren överskrider 21:
                        <ul>
                            <li>Banken vinner</li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>

        <h4>Klasser som behövs:</h4>
        <p>Card - Representerar ett kort med ett värde och en svit.</p>
        <p>Deck - Hanterar en kortlek. Ansvarig för att blanda och dra kort.</p>
        <p>Hand - Hanterar en samling kort för en spelare.</p>
        <p>Game - Kontrollerar spelets flöde, inkluderar att starta spelet, spelarens och dealerns drag, och att avgöra
            spelets slut.</p>
    </div>

    <div class=\"column\">
        <h2>Flödesschema</h2>
        <img src=\"";
        // line 102
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("img/game-flowchart.png"), "html", null, true);
        echo "\" alt=\"Flödesschema för spelet 21\">
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
        return "twentyone/doc.html.twig";
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
        return array (  186 => 102,  88 => 6,  78 => 5,  59 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"base.html.twig\" %}

{% block title %}Game Doc{% endblock %}

{% block body %}
<h1>Dokumentation för spelet 21</h1>

<div class=\"row\">
    <div class=\"column\">
        <h2>Pseudokod</h2>
        <h4>Starta spelet:</h4>
        <ul>
            <li>Skapa och blanda en kortlek</li>
            <li>Skapa en tom hand för spelaren</li>
            <li>Skapa en tom hand för banken</li>
        </ul>

        <h4>Spelarens tur:</h4>
        <ul>
            <li>WHILE spelaren inte har stannat och inte överskridit 21 poäng:
                <ul>
                    <li>Fråga spelaren om de vill ta ett kort eller stanna</li>
                    <li>Om spelaren väljer att ta ett kort:
                        <ul>
                            <li>Dra ett kort från kortleken och lägg till i spelarens hand</li>
                            <li>Visa spelarens nya kort</li>
                            <li>Om spelarens totala poäng överskrider 21:
                                <ul>
                                    <li>Meddela spelaren att de överskridit 21</li>
                                    <li>Avsluta spelarens tur</li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>Annars om spelaren väljer att stanna:
                        <ul>
                            <li>Avsluta spelarens tur och påbörja bankens tur</li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>

        <h4>Bankens tur:</h4>
        <ul>
            <li>WHILE bankens totala poäng är mindre än 17:
                <ul>
                    <li>Dra ett kort från kortleken och lägg till i bankens hand</li>
                    <li>Visa bankens nya kort</li>
                    <li>Om bankens totala poäng överskrider 21:
                        <ul>
                            <li>Meddela att banken överskridit 21</li>
                            <li>Avsluta bankens tur</li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>

        <h4> Avgör vem som vann:</h4>
        <ul>
            <li>Om både spelaren och banken är under eller lika med 21:
                <ul>
                    <li>Om spelarens poäng är högre än bankens poäng:
                        <ul>
                            <li>Spelaren vinner</li>
                        </ul>
                    </li>
                    <li>Annars om bankens poäng är lika med eller högre än spelarens poäng:
                        <ul>
                            <li>Banken vinner</li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li>Annars:
                <ul>
                    <li>Om bara banken överskrider 21:
                        <ul>
                            <li>Spelaren vinner</li>
                        </ul>
                    </li>
                    <li>Om bara spelaren överskrider 21:
                        <ul>
                            <li>Banken vinner</li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>

        <h4>Klasser som behövs:</h4>
        <p>Card - Representerar ett kort med ett värde och en svit.</p>
        <p>Deck - Hanterar en kortlek. Ansvarig för att blanda och dra kort.</p>
        <p>Hand - Hanterar en samling kort för en spelare.</p>
        <p>Game - Kontrollerar spelets flöde, inkluderar att starta spelet, spelarens och dealerns drag, och att avgöra
            spelets slut.</p>
    </div>

    <div class=\"column\">
        <h2>Flödesschema</h2>
        <img src=\"{{ asset('img/game-flowchart.png') }}\" alt=\"Flödesschema för spelet 21\">
    </div>
</div>
{% endblock %}", "twentyone/doc.html.twig", "/home/albinr/dbwebb-kurser/mvc/me/report/templates/twentyone/doc.html.twig");
    }
}
