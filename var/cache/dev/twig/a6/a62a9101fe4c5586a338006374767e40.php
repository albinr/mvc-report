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

/* report/metrics.html.twig */
class __TwigTemplate_3a359c19375746cc043df11416d46fba extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "report/metrics.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "report/metrics.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "report/metrics.html.twig", 1);
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

        echo "Metrics";
        
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
        echo "<h1>Metrics</h1>

<h2>Introduktion</h2>

<p>De sex C:a används för att bedöma och förbättre kodkvalitet.</p>

<h3>Codestyle</h3>
<p>Det första C:et är Codestyle. Det handlar om hur koden är formaterad. Kod som är enhetlig är lättare att läsa, förstå
    och arbeta med. Exempel på saker som kan vara viktiga inom Codestyle är klar och tydlig namngivning (tex variabler
    och funktioner), indentering för att lätt se struktur och sist är användning av kommentarer för att förtydliga och
    förklara koden.</p>

<p>Exempel på tydliga namn kan tillexempel vara klass namnet DeckOfCards. Namnet indikerar att det är en kortlek med
    troligen spelkort i sig. När man också vet att klassen Cards finns så kan man få en förståelse av hur klassen kan
    fungera.</p>

<h3>Coverage</h3>
<p>Coverage är det andra C:et och handlar om hur stor del av koden som täcks/testas av automatiska tester. Hög täckning
    leder ofta till mindre buggar i koden eftersom att de upptäckts av testerna i ett tidigare stadium i utvecklingen.
</p>

<p>Just nu har jag några tester som täcker koden för spelet och klassen twentyone.</p>

<h3>Complexity</h3>
<p>Complexity handlar om hur komplicerad koden är. Kod som är komplicerad är svår att förstå och underhålla. Komplex kod
    kan till exempel vara många nestade if statements eller loopar. Cyklomatisk komplexitet är ett mått man kan använda
    för att mäta komplexitet i kod. Den räknar antalet linjära exekveringsvägar i koden.
</p>

<h3>Cohesion</h3>
<p>Cohesion mäter hur olika delar av koden relaterar till varandra. Till exempel att en klass byggs/används med eller i
    en annan klass som ett kort i en kortlek. Kod med hög cohesion innebär att komponenter i koden är direkt relaterade
    till funktionen av den och det underlättar underhåll och förståelse av koden.</p>

<h3>Coupling</h3>
<p>Coupling handlar om hur olika moduler eller klasser är beroende av varandra. Att sikta på låg coupling är bra för att
    det säkerställer att ändringar i en del av koden inte förstör andra delar. Detta gör koden lättare att underhålla.
</p>
<p>I spelet twentyone har jag rätt så hög coupling eftersom att klassen är beroende av många andra klasser. Till exempel
    DeckOfCards och CardHand dessa klasser är också beroende av andra som till exempel Card och CarGraphic klasserna.
</p>

<h3>CRAP</h3>
<p>Change Risk Anti-Patterns(CRAP) är ett sätt att mäta kod genom att kombinera de tidigare nämnda bedömningarna. Mer
    specifikt så är det ett mått som kombinerar kod komplexitet och täckning för att identifiera problem med ändringar
    man gör. Ju högre CRAP värde man har desto svårare är det att göra ändringar i den på grund av den höga
    komplexiteten och dålig kodtäckning.
</p>
<p>Just nu har min kod 28% i coverage så jag kommer behöva skriva mer tester för att göra min kod mindre CRAP.</p>

<h2>Phpmetrics</h2>
<p>Här kommer statistik från phpmetrics.</p>

<ul>
    <li>Violations: 5 (0 critical, 1 errors)</li>
    <li>Lines of code: 930</li>
    <li>Classes: 16</li>
    <li>Average cyclomatic complexity by class: 3.69</li>
    <li>Assertions in tests: 70</li>
    <li>Average bugs by class: 0.14</li>
</ul>

<div>
    <img src=\"";
        // line 69
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("img/phpmetrics.png"), "html", null, true);
        echo "\" alt=\"bild på maintainabilyt\" style=\"width: 300px;\">
    <p>Bild på maintainability complexity</p>
</div>

<h3>Flaskhalsar och Svagheter:</h3>

<h4>Blob / God Object in App\\Controller\\ApiController</h4>
<p>Problem: Klassen har många publika metoder och hög sammanhangslöshet (LCOM=9) som betyder att
    den hanterar flera funktioner som kan vara mer effektivt separerade.
</p>

<p>Potentiell lösning: Bryt ned klassen i flera mindre och mer fokuserade klasser som var och en ansvarar för en
    specifik
    del funktionalitet.
</p>

<h4>Potentiella Buggar i App\\Controller\\CardController</h4>
<p>Problem: Klassen har teoretiska buggar baserade på Halstead-komplexitetsmått och ingen testtäckning.
</p>

<p>Potentiell lösning: Implementera enhetstester för att öka kodtäckningen och identifiera och åtgärda potentiella
    fel.
</p>

<h3>Hög Koppling (Coupling)</h3>

<p>Problem: Vissa klasser, såsom ovan nämnda, använder många externa klasser som ökar deras beroenden och
    komplexitet.
</p>

<p>Potentiell lösning: Minska beroendet genom att använda designmönster som Dependency Injection för att underlätta
    framtida underhåll och tester.
</p>

<h3>Sammanfattning</h3>
<p>Genom att använda Phpmetrics har jag sett svagheter i min kodstruktur, till exempel överkomplexitet och
    otillräcklig testtäckning. Genom att fixa dessa problem kan jag förbättra min kodkvalitet och minska
    risken för buggar i framtiden.</p>

<h2>Scrutinizer</h2>
<div class=\"badges\">
    <a href=\"https://scrutinizer-ci.com/g/albinr/mvc-report/?branch=main\" class=\"badge\">
        <img src=\"https://scrutinizer-ci.com/g/albinr/mvc-report/badges/quality-score.png?b=main\" style=\"padding: 10px;\"
            alt=\"\">
    </a>
    <a href=\"https://scrutinizer-ci.com/g/albinr/mvc-report/?branch=main\" class=\"badge\">
        <img src=\"https://scrutinizer-ci.com/g/albinr/mvc-report/badges/coverage.png?b=main\" style=\"padding: 10px;\"
            alt=\"\">
    </a>
    <a href=\"https://scrutinizer-ci.com/g/albinr/mvc-report/build-status/main\" class=\"badge\">
        <img src=\"https://scrutinizer-ci.com/g/albinr/mvc-report/badges/build.png?b=main\" style=\"padding: 10px;\" alt=\"\">
    </a>
</div>

<p>Scrutinizer visar att det är problem i src/kernel.php och tools/php-cs-fixer/.php-cs-fixer.dist.php. Dock är det
    filer som är autogenererade så det är inte kod jag skrivit.</p>

<div>
    <img src=\"";
        // line 127
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("img/scrutinizer.png"), "html", null, true);
        echo "\" alt=\"bild på maintainabilyt\" style=\"max-width: 600px;\">
    <p>Bild på scrutinizer fil betyg</p>
</div>

<p>Ett problem jag ser dock är att jag har väldigt låg kodtäckning (coverage) som är på 28%.</p>

<p>För att öka kod-täckningen så kommer jag skriva mer tester.</p>

<h2>Findings</h2>
<h3>Codestyle</h3>
<p>Från phpmetrics kan jag se att i min Api controller så finns det många publika metoder och lågt sammanhängande av
    metoder. Så en förbättring på codestyle hadde varit att dela upp api controller i flera mindre klasser. Jag kan
    tänka mig att lägga api ruterna i mer sammanhängande controllers. Som till exempel card/draw kan läggas i
    CardContoller istället för att liknande metoder används i den controllern.</p>

<h3>Coverage</h3>
<p>Både phpmetrics och scrutinizer pekar på låg coverage. Scrutinizer visa coverage på 28%. Jag behöver skriva flera
    tester för att täcka min kod mer. Med högre kodteckning minskar mängden potentiella buggar i koden i framtiden.
</p>

<h3>Cohesion och coupling</h3>
<p>Min kod har också höga värden av LCOM (LCOM=9) som pekar på låg sammanhållning och användningen av många externa
    klasser som visar hög koppling. Tillsammans kan det leda till en kodbas som är svår att underhålla och utveckla.
    För att få bättre code style så vill jag minska beroenden(låg coupling) och maximera sammanhållningen(hög
    cohesion).
</p>

<h3>Complexity</h3>
<p>I min ApiContoller så rapporteras det hög sannolikhet för buggar(0.71 buggar). Hög komplexitet ofta leder till
    kod som är svår att förstå, underhålla och testa. Jag behöver göra koden mindre komplex. Detta kan jag göra
    genom att till exempel förbättra strukturen, reflektera och granska koden mer noggrant.
</p>

<h3>CRAP</h3>
<p>För att göra min kod mindre CRAP så behöver jag definitivt skriva mer tester. Jag skulle också kunna göra koden
    mindre komplex om jag stöter på det.
</p>

<h2>Förbättringar</h2>

<h2>Diskussion</h2>






";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "report/metrics.html.twig";
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
        return array (  214 => 127,  153 => 69,  88 => 6,  78 => 5,  59 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"base.html.twig\" %}

{% block title %}Metrics{% endblock %}

{% block body %}
<h1>Metrics</h1>

<h2>Introduktion</h2>

<p>De sex C:a används för att bedöma och förbättre kodkvalitet.</p>

<h3>Codestyle</h3>
<p>Det första C:et är Codestyle. Det handlar om hur koden är formaterad. Kod som är enhetlig är lättare att läsa, förstå
    och arbeta med. Exempel på saker som kan vara viktiga inom Codestyle är klar och tydlig namngivning (tex variabler
    och funktioner), indentering för att lätt se struktur och sist är användning av kommentarer för att förtydliga och
    förklara koden.</p>

<p>Exempel på tydliga namn kan tillexempel vara klass namnet DeckOfCards. Namnet indikerar att det är en kortlek med
    troligen spelkort i sig. När man också vet att klassen Cards finns så kan man få en förståelse av hur klassen kan
    fungera.</p>

<h3>Coverage</h3>
<p>Coverage är det andra C:et och handlar om hur stor del av koden som täcks/testas av automatiska tester. Hög täckning
    leder ofta till mindre buggar i koden eftersom att de upptäckts av testerna i ett tidigare stadium i utvecklingen.
</p>

<p>Just nu har jag några tester som täcker koden för spelet och klassen twentyone.</p>

<h3>Complexity</h3>
<p>Complexity handlar om hur komplicerad koden är. Kod som är komplicerad är svår att förstå och underhålla. Komplex kod
    kan till exempel vara många nestade if statements eller loopar. Cyklomatisk komplexitet är ett mått man kan använda
    för att mäta komplexitet i kod. Den räknar antalet linjära exekveringsvägar i koden.
</p>

<h3>Cohesion</h3>
<p>Cohesion mäter hur olika delar av koden relaterar till varandra. Till exempel att en klass byggs/används med eller i
    en annan klass som ett kort i en kortlek. Kod med hög cohesion innebär att komponenter i koden är direkt relaterade
    till funktionen av den och det underlättar underhåll och förståelse av koden.</p>

<h3>Coupling</h3>
<p>Coupling handlar om hur olika moduler eller klasser är beroende av varandra. Att sikta på låg coupling är bra för att
    det säkerställer att ändringar i en del av koden inte förstör andra delar. Detta gör koden lättare att underhålla.
</p>
<p>I spelet twentyone har jag rätt så hög coupling eftersom att klassen är beroende av många andra klasser. Till exempel
    DeckOfCards och CardHand dessa klasser är också beroende av andra som till exempel Card och CarGraphic klasserna.
</p>

<h3>CRAP</h3>
<p>Change Risk Anti-Patterns(CRAP) är ett sätt att mäta kod genom att kombinera de tidigare nämnda bedömningarna. Mer
    specifikt så är det ett mått som kombinerar kod komplexitet och täckning för att identifiera problem med ändringar
    man gör. Ju högre CRAP värde man har desto svårare är det att göra ändringar i den på grund av den höga
    komplexiteten och dålig kodtäckning.
</p>
<p>Just nu har min kod 28% i coverage så jag kommer behöva skriva mer tester för att göra min kod mindre CRAP.</p>

<h2>Phpmetrics</h2>
<p>Här kommer statistik från phpmetrics.</p>

<ul>
    <li>Violations: 5 (0 critical, 1 errors)</li>
    <li>Lines of code: 930</li>
    <li>Classes: 16</li>
    <li>Average cyclomatic complexity by class: 3.69</li>
    <li>Assertions in tests: 70</li>
    <li>Average bugs by class: 0.14</li>
</ul>

<div>
    <img src=\"{{ asset('img/phpmetrics.png') }}\" alt=\"bild på maintainabilyt\" style=\"width: 300px;\">
    <p>Bild på maintainability complexity</p>
</div>

<h3>Flaskhalsar och Svagheter:</h3>

<h4>Blob / God Object in App\\Controller\\ApiController</h4>
<p>Problem: Klassen har många publika metoder och hög sammanhangslöshet (LCOM=9) som betyder att
    den hanterar flera funktioner som kan vara mer effektivt separerade.
</p>

<p>Potentiell lösning: Bryt ned klassen i flera mindre och mer fokuserade klasser som var och en ansvarar för en
    specifik
    del funktionalitet.
</p>

<h4>Potentiella Buggar i App\\Controller\\CardController</h4>
<p>Problem: Klassen har teoretiska buggar baserade på Halstead-komplexitetsmått och ingen testtäckning.
</p>

<p>Potentiell lösning: Implementera enhetstester för att öka kodtäckningen och identifiera och åtgärda potentiella
    fel.
</p>

<h3>Hög Koppling (Coupling)</h3>

<p>Problem: Vissa klasser, såsom ovan nämnda, använder många externa klasser som ökar deras beroenden och
    komplexitet.
</p>

<p>Potentiell lösning: Minska beroendet genom att använda designmönster som Dependency Injection för att underlätta
    framtida underhåll och tester.
</p>

<h3>Sammanfattning</h3>
<p>Genom att använda Phpmetrics har jag sett svagheter i min kodstruktur, till exempel överkomplexitet och
    otillräcklig testtäckning. Genom att fixa dessa problem kan jag förbättra min kodkvalitet och minska
    risken för buggar i framtiden.</p>

<h2>Scrutinizer</h2>
<div class=\"badges\">
    <a href=\"https://scrutinizer-ci.com/g/albinr/mvc-report/?branch=main\" class=\"badge\">
        <img src=\"https://scrutinizer-ci.com/g/albinr/mvc-report/badges/quality-score.png?b=main\" style=\"padding: 10px;\"
            alt=\"\">
    </a>
    <a href=\"https://scrutinizer-ci.com/g/albinr/mvc-report/?branch=main\" class=\"badge\">
        <img src=\"https://scrutinizer-ci.com/g/albinr/mvc-report/badges/coverage.png?b=main\" style=\"padding: 10px;\"
            alt=\"\">
    </a>
    <a href=\"https://scrutinizer-ci.com/g/albinr/mvc-report/build-status/main\" class=\"badge\">
        <img src=\"https://scrutinizer-ci.com/g/albinr/mvc-report/badges/build.png?b=main\" style=\"padding: 10px;\" alt=\"\">
    </a>
</div>

<p>Scrutinizer visar att det är problem i src/kernel.php och tools/php-cs-fixer/.php-cs-fixer.dist.php. Dock är det
    filer som är autogenererade så det är inte kod jag skrivit.</p>

<div>
    <img src=\"{{ asset('img/scrutinizer.png') }}\" alt=\"bild på maintainabilyt\" style=\"max-width: 600px;\">
    <p>Bild på scrutinizer fil betyg</p>
</div>

<p>Ett problem jag ser dock är att jag har väldigt låg kodtäckning (coverage) som är på 28%.</p>

<p>För att öka kod-täckningen så kommer jag skriva mer tester.</p>

<h2>Findings</h2>
<h3>Codestyle</h3>
<p>Från phpmetrics kan jag se att i min Api controller så finns det många publika metoder och lågt sammanhängande av
    metoder. Så en förbättring på codestyle hadde varit att dela upp api controller i flera mindre klasser. Jag kan
    tänka mig att lägga api ruterna i mer sammanhängande controllers. Som till exempel card/draw kan läggas i
    CardContoller istället för att liknande metoder används i den controllern.</p>

<h3>Coverage</h3>
<p>Både phpmetrics och scrutinizer pekar på låg coverage. Scrutinizer visa coverage på 28%. Jag behöver skriva flera
    tester för att täcka min kod mer. Med högre kodteckning minskar mängden potentiella buggar i koden i framtiden.
</p>

<h3>Cohesion och coupling</h3>
<p>Min kod har också höga värden av LCOM (LCOM=9) som pekar på låg sammanhållning och användningen av många externa
    klasser som visar hög koppling. Tillsammans kan det leda till en kodbas som är svår att underhålla och utveckla.
    För att få bättre code style så vill jag minska beroenden(låg coupling) och maximera sammanhållningen(hög
    cohesion).
</p>

<h3>Complexity</h3>
<p>I min ApiContoller så rapporteras det hög sannolikhet för buggar(0.71 buggar). Hög komplexitet ofta leder till
    kod som är svår att förstå, underhålla och testa. Jag behöver göra koden mindre komplex. Detta kan jag göra
    genom att till exempel förbättra strukturen, reflektera och granska koden mer noggrant.
</p>

<h3>CRAP</h3>
<p>För att göra min kod mindre CRAP så behöver jag definitivt skriva mer tester. Jag skulle också kunna göra koden
    mindre komplex om jag stöter på det.
</p>

<h2>Förbättringar</h2>

<h2>Diskussion</h2>






{% endblock %}", "report/metrics.html.twig", "/home/albinr/dbwebb-kurser/mvc/me/report/templates/report/metrics.html.twig");
    }
}
