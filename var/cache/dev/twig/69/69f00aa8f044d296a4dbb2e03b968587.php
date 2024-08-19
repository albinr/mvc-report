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

/* report/report.html.twig */
class __TwigTemplate_9b279c9685cf641a0be43c9ea9f17753 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "report/report.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "report/report.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "report/report.html.twig", 1);
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

        echo "Report";
        
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
        echo "<h1>Rapport</h1>
<section>
    <h2 id=\"kmom01\">Kmom01</h2>
    <h3>Erfarenhet av objektorientering</h3>
    <p>Erfarenheten jag har av objektorientering kommer från den tidigare OOPython kursen. I kursen fick jag lära mig
        grunderna i att skapa klasser, instansiera objekt och att använda arv för att skapa strukturerad och
        återanvändbar kod.</p>

    <p>Python vehicle class exempel:</p>
    <pre>
    <code>
    class Vehicle:
        def __init__(self, make, model):
            self.make = make
            self.model = model
    </code>
    </pre>

    <p>PHP vehicle class exempel:</p>
    <pre>
    <code>
    class Vehicle {
        public \$make;
        public \$model;
    
        public function __construct(\$make, \$model) {
            \$this->make = \$make;
            \$this->model = \$model;
        }
    }        
    </code>
    </pre>

    <p>Syntaxen i Python gjorde det enkelt att förstå och lära sig koncepten inom objektorientering men i PHP är det
        annorlunda. Att det behövs mer rader kod, pilar (->) och dollartecken känns jobbigt. Syntaxen kommer ta ett tag
        att vänja sig och det kommer vara frustrerande men jag tror att jag förstår grunden.
    </p>

    <h3>PHPs modell för klasser och objekt</h3>
    <p>
        Grunderna för att programmera objektorienterat i PHP börjar med att förstå klasser och objekt.
    </p>

    <p>En klass kan ses som en mall för att skapa objekt. Objekt kan också kallas en instans av en klass. I klassen
        definieras objektets attribut och beteende. Ett attribut för en hundklass kan till exempel vara vilket namn
        hunden har. Ett beteende(metod) för en sådan klass kan till exempel vara att skälla.</p>

    <p>Åtkomsthantering är också en viktig del av objektorientering. Att markera och avgränsa vilka attribut och metoder
        en användare har tillgång till är viktigt för enkapsulering objektets data. Det leder till säkrare och intakta
        objekt. Genom att använda “Public”,”Private”, och “Protected” kan vi kontrollera åtkomsten.</p>

    <p><code>- Public är tillgängligt både inom och utanför klassen.</code></p>
    <p><code>- Private kan endast nås inom klassen där den deklareras.</code></p>
    <p><code>- Protected är tillgängligt inom klassen och dess underklasser.</code></p>

    <p>Konstruktorer och destruktorer används för att skapa och förstöra instansierade objekt. En konstruktor anropas
        automatiskt när ett nytt objekt skapas. Den initialiserar också objektets attribut med specifika värden.
        Destruktorer anropas automatiskt när ett objekt förstörs för att fria minne.
    </p>

    <p>Arv är viktigt att veta för att förstå att en klass kan ärva egenskaper och metoder från en annan klass. Det kan
        till exempel vara användbart för att återanvända kod och minska upprepning.</p>

    <p>Här är ett exempel på en klass för en hund:</p>

    <pre><code>
    class Dog {
        public \$name;
        private \$sound = \"Woof\";
    
        public function __construct(\$name) {
            \$this->name = \$name;
        }
    
        public function bark() {
            echo \$this->name . \" says \" . \$this->sound;
        }
    }
    
    \$myDog = new Dog(\"Sixten\");
    \$myDog->bark();
        
    </code></pre>

    <h3>Reflektion över kodbas</h3>
    <p>Jag tycker att kodbasen för uppgiften var svår att förstå till en början. Det var många mappar och filer som jag
        inte riktigt förstod vad de gjorde för att de inte nämns i set up guiden. Men jag har fått en större förståelse
        för Symfony som ramverk. Jag har skapat en webbsida som använder sig av en controller för att servera twig
        template filer och ett litet json api med kända citat.</p>

    <p>Utmaningar jag stött var att lägga till bilder korrekt och att ladda upp sidan på studentservern. När jag
        försökte ladda bilder så visades de inte lokalt men de visades på student server.</p>

    <p>Jag löste det genom att sätta rätt path till filerna i Symfony och installera de paket som behövdes genom npm
        install. I mitt första försök på uppgiften så hade jag inget utrymme kvar på studentservern. Det betydde att jag
        inte kunde ladda upp en kod för att testa den. Nu har jag dock fått mer utrymme.</p>

    <p>Jag har valt att lägga till sass i projektet. Med hjälp av sass så kan jag lätt använda variabler och dela upp
        min scss kod i små moduler för till exempel header, navigation och footer.</p>

    <p>Ett problem jag fortfarande stöter på är felmeddelanden i webbläsarens konsol. Hur jag än försöker så fortsätter
        de poppa upp. Det är något jag måste fixa i framtiden.</p>

    <p>Jag tror att jag förstår de viktiga delarna och flödet för mvc med routes och templates.</p>

    <h3>PHP The Right Way</h3>
    <p>Delarna av PHP The Right Way artikeln jag läst och använt är Getting Started, Coding Practices, Errors and
        Exceptions och Code Style Guide. Getting Started handlade mer om hur jag installerar php och utvecklingsmiljön,
        men det har jag redan gjort.</p>

    <p>Det var intressant att läsa igenom Coding practices. Det gav mig en bättre förståelse för hur man skriver vissa
        delar av php. Tillsammans med kodstil guiden så har jag fått se riktlinjer för de grundläggande
        kodningsstandarder och kodstil regler som finns. Hittills har jag följt de kodexempel vi fått från övningarna.
        Jag kommer nog få mer användning av Code Style Guiden senare när jag skriver mer komplicerade kod bitar.</p>

    <p>Jag läste också om hur jag kan använda phps pakethanterare Composer för att underlätta utvecklingen.</p>

    <p>Artikeln känns som ett bra komplement för en mindre erfaren php utvecklare som mig själv.</p>

    <h3>Today I Learned</h3>
    <p>Min til för detta kursmoment är hur jag kan börja programmera objektorienterat i php och de första grunderna i
        Symfony med routes. Jag tror jag har byggt en bra grund för att fortsätta bygga på rapportsidan.</p>
</section>
<section>
    <h2 id=\"kmom02\">Kmom02</h2>
    <h3>Objektorienterade konstruktioner</h3>
    <h4>Arv</h4>
    <p>Arv används av klasser för att ärva egenskaper och metoder från andra klasser. För att ärva från en annan klass
        används ordet ‘extends’ (förlänga/utöka). Med den nuvarande klassen kan du nu utöka funktionalitet eller
        förändra den.</p>

    <h4>Komposition</h4>
    <p>Komposition betyder att en klass innehåller en eller flera instanser av en annan klass. Ett exempel kan vara en
        kortlek har flera kort eller en bil som har en motor. Det är alltså “har-en” eller “har många” förhållande.</p>

    <h4>Interface</h4>
    <p>Interface kan användas för att specificera metoder som måste finnas i klassen. Interface används för att se till
        att olika klasser följer samma strukturella regler i koden även om de obligatoriska funktionerna kan skrivas
        olika.</p>

    <h4>Trait</h4>
    <p>Trait används för att återanvända kod i klasser. En trait används för att gruppera funktionalitet på ett mer
        flexibelt sätt. En klass kan använda flera traits och flera klasser kan använda en trait.</p>

    <h3>Implementation av uppgiften</h3>
    <p>För att lösa uppgiften skapade jag klasserna Card(Ett spelkort),CardGrapic(För en grafisk representation av ett
        spelkort), DeckOfCards(En kortlek) och CardHand(En hand men kort).</p>

    <p>DeckOfCards och CardHand har ett kompositions förhållande med Card-klassen. Det finns också ett arv av Card
        klassen i CardGrapic.</p>

    <p>För att visa korten med den specifika stilen i kraven så använder jag html och css. Jag tycker korten ser helt
        okej ut just nu, men jag vill lägga till symboler för knekt, drottning och kung. Just nu är det bara bokstäver.
    </p>

    <p>Jag har haft en stor utmaning under uppgiften och det var att få koden att fungera på studentservern. Problemet
        var dock inte med min kod, det var min Firefox webbläsare. Av någon anledning så minskade inte kortleken när jag
        laddade om sidorna för att dra kort. Först trodde jag det berodde på att jag satte hela DeckOfCards objektet i
        session.</p>

    <p>För att lösa problemet så försökte jag först att bara ladda upp arrayen med kort objekt istället. När det inte
        heller fungerade så lade jag till metoder för att skapa en kortlek från en array och en metod för att skapa en
        array med värden som strängar av en kortlek. Det fungerade inte heller.</p>

    <p>När jag tillslut bad en kompis testa min lösning så fungerade det på hans dator. Då bestämde jag mig för att
        testa med Crome som webbläsare och då fungerade det. Av mina lösningar så tror jag att ladda upp en array med
        strängar är smidigare än att ladda upp en array med objekt i session.</p>

    <p>Förbättringar som kan göras är till exempel att slå samman de två draw card rutterna. Efter som de nästan gör
        samma sak (drar ett eller flera kort), men jag lyckades inte med det i detta kursmoment.</p>

    <p>Jag skapade också CardHand klassen utan att använda den. Jag kanske får användning av den i ett senare
        kursmoment.
    </p>

    <h3>Symfony och MVC</h3>
    <p>Att jobba med mvc och Symfony har känts ganska smidigt. Ett problem jag stötte på dock var att skapa routes med
        metoderna GET och POST. Jag fick lösa det genom att rendera en a tag för GET routes och en form submit för
        Routes med POST. Tror det inte är helt korrekt att göra så men det fungerar.
    </p>

    <p>När jag jobbade med arrayer i session så slutade min sida för att visa allt i session att fungera. Den första
        lösningen var att lägga till en __toString metod på DeckOfCards klassen. Men när jag bytte sätt att ladda upp
        till session så kändes den lösningen inte så bra. Jag googlade lite och hittade en komponent i Symfony som heter
        VarDumper. Med den kan jag lätt dumpa all information från session, även arrayer.
    </p>

    <h3>Today I Learned</h3>
    <p>Min til för detta kursmoment är hur jag kan skapa klasser i PHP. Efter mycket krångel så tycker jag att jag
        förstår klasser bättre. Jag tycker det har varit svåra moment hittills och jag hoppas det blir något lättare
        framåt.</p>

</section>
<section>
    <h2 id=\"kmom03\">Kmom03</h2>
    <p>I kmom03 har jag skapat kortspelet 21 i min rapport sida. För att skapa kortspelet har jag använt mig av
        flödesdiagram och pseudokod för att hjälpa att planera och strukturera koden jag skrivit.
    </p>
    <h3>Modellering av kortspel</h3>
    <p>När jag började med uppgiften så kändes det svårt att börja lösa den. Jag visste inte riktigt hur jag skulle
        göra. Men när jag började med att försöka skapa ett flödesdiagram så började jag också få bättre förståelse för
        hur koden skulle kunna se ut.</p>

    <p>Jag tycker det var svårt att skapa ett flödesdiagram. Det blev antingen för komplicerat eller för simpelt
        diagram. Det jag landat på är den version jag tyckte om mest men jag är inte helt nöjd. I diagrammet så ska ju
        banken också gå igenom en loop när de drar kort.
    </p>

    <p>Det som hjälpte allra mest var pseudokoden tycker jag. Jag listade snabbt ut vilka klasser och funktioner som jag
        skulle behöva. När jag tänker på större uppgifter jag gjort tidigare så har jag alltid tänkt på ett liknande
        sätt. Den enda skillnaden var att jag inte skrev ner pseudokoden/tankarna i vissa fall. Likt när man inte
        skriver kommentarer i koden så glömde jag bort vad planen för koden var.</p>

    <h3>Implementation av uppgiften</h3>

    <p>För att göra uppgiften så skapade jag klassen TwentyOne. Klassen använder sig av DeckOfCards, CardHand, Card och
        CardGraphic klasserna för att skapa ett 21 kortspel. Klassen initieras med att skapa en blandad kortlek, en hand
        med kort för spelaren och en hand med kort till banken och en status för att kontrollera spelets gång. Sedan
        skapade jag funktionen hit() för att ge ett kort till spelaren. Varje gång hit() kallas så räknas värdet av
        spelarens hand ut. Om värdet är högre än 21 så blir det en förlust för spelaren. Om spelaren väljer att stanna
        med funktionen stand() så startar bankens tur. Banken drar kort tills kortens totala värde är mindre än 16. Jag
        har testat olika värden för hur mycket risk banken tar och jag har slutat på 16. Det gör spelet lite svårare
        tycker jag. När banken har dragit sina kort så kallar jag på game over funktionen. Game over räknar ut värdet på
        banken och spelarens kort för att se vem som vann. Jag har också skapat olika get funktionenr för att hämta
        spelaren och bankens hand, deras värde och status på spelet.</p>

    <p>Det svåraste med uppgiften var att räkna ut värdet på en hand med kort. Funktionen calcScore har gått igenom
        många förändringar. Eftersom ett ess kan ha värdet 1 eller 14 så blev det väldigt klurigt. I min första lösning
        så skapade jag en array som samlade alla värden i en hand, kort för kort. Om ett ess hittades så blev det en
        array med värdet 1 och 14 i sig. En array kunde se ut så här [ 2, [ 1, 14 ], 5 ]. Den lösningen kändes inte så
        smidig och kod liters klagade på den mycket.</p>

    <p>Min nuvarande lösning är bättre tycker jag. I den lösningen så har jag en variabel för totala värdet av handen
        och en variabel för att räkna antalet ess. Om jag stöter på ett ess lä ökar ess räknaren. Efter att hela handen
        med kort gåtts igenom så gör jag en till loop som kör ett turnary if statement så många gånger som ett ess
        hittades i handen. Jag kollar om vilket värde på ess undviker att överskrida 21. På det sättet hittar jag det
        bästa värdet.
    </p>

    <h3>Att koda i symfony</h3>

    <p>Jag tycker det har gått bra att koda med Symfony. För detta kursmoment har det känts enkelt att skapa spelet med
        template-filer. Jag har också lyckats få mina routes att ha lite kod genom att skicka in hela game objektet till
        template-filerna. Jag hittade också funktionen serialise() och unserialize() för att enkelt lägga upp ett objekt
        i session och hämta det.
    </p>

    <p>Jag har fått många klagomål från linters på att jag haft över 10 routes i en kontroller. Jag har brutit ut alla
        api routes till en separat controller.</p>

    <h3>Today i Learned</h3>

    <p>I detta kursmoment har jag lärt mig hur jag kan förbereda mig innan jag börjar skriva kod, med hjälp av
        flödesdiagram och pseudokod. Jag har också lärt mig lite mer om hur jag bättre programmerar i php med hjälp av
        linters. Det har varit roligt och lärorikt projekt. Det har till exempel varit roligt att styla spelplanen.
    </p>

</section>
<section>
    <h2 id=\"kmom04\">Kmom04</h2>
    <p>I detta kursmoment har jag skapat enhetstester för 2 av mina klasser och lagt till dokumentation för min kod.</p>

    <h3>Kod tester med PHPUnit</h3>
    <p>Att skriva tester med PHPUnit har gått bra och varit ganska roligt. Jag känner igen mig lite från OOPython kursen
        så jag tyckte det var enkelt och smidigt att skapa testerna. En sak som gjorde det hela lite roligare och mer
        motiverande var att se progress bars för varje klass man gjorde tester för. Med dokumentationen så kunde jag
        lätt hitta olika typer av asserts för att testa olika saker i min kod. Något som ofta hände när jag kodade
        tester i python var att jag bara använde assertEqual. Nu använder jag många fler och jag tror det beror på att
        jag läste mer av dokumentationen för PHPUnit.
    </p>

    <h3>Kodtäckning</h3>
    <p>Jag har lyckats få 96% kodtäckning för Lines, 94% för Functions and Methods och 83% för Classes and Traits för
        mina klasser i Card namespacet. Så jag tror att jag lyckats ganska bra. Om jag hade mer tid så skulle jag lägga
        till kodtäckning för Controller också.</p>

    <h3>Kodens testbarhet</h3>
    <p>Min kod var inte jätte testbar när jag började skriva testerna. Det fanns delar som var mindre testbara och jag
        behövde ändra som till exempel min game over function och stand funktionen. Jag har också gjort några funktioner
        public istället för private för att kunna kalla dem i testerna. Det kanske inte är ett bra tillvägagångssätt men
        det var min lösning.</p>

    <p>Jag har behövt skriva om delar av min kod för att göra den mer testbar. Jag har flyttat in TwentyOne under Card
        namespacet så att jag får lättare tillgång till klasserna. Det har också gjorts förändringar i koden. Ett
        exempel är att jag skapat en addCardToHand function som tar emot en kort hand och lägger till ett kort i den.
        Jag har allmänt försökt att dela upp funktionerna mer och dem mindre och lättare att testa och förstå.</p>

    <h3>Snygg och ren kod</h3>
    <p>Jag tror att tester oftast kan identifiera snygg och ren kod. De funktioner i min kod som var svåra att testa var
        alltid lite mer komplexa och gjorde mer än en sak oftast. Jag tror att kod som är lätt att testa är modulär med
        tydliga avgränsningar mellan olika delar. Modulär kod underlättar underhåll, uppdatering och felsökning.</p>

    <p>Jag tror dock att det går att skapa kod som är extremt komplicerad och svår att läsa men som också är lätt att
        testa.
    </p>

    <h3>Today i learned</h3>

    <p>Min til för detta kursmoment är hur jag kan skapa tester i php med PHPUnit. Jag har också fått lära mig skriva
        lite snyggare kod tycker jag. Jag hade inställningen att detta kursmoment skulle vara ett av de tråkigare. Det
        var dock lite roligare än förväntat att skapa testerna. Jag skulle vilja se ett exempel på hur ett projekt med
        större kodbas hanterar tester.
    </p>
</section>
<section>
    <h2 id=\"kmom05\">Kmom05</h2>
    <p>I detta kursmoment har jag lagt till ORM för att koppla min rapport sida till en sqlite databas.</p>

    <h3>Symfony och doctrine övningen</h3>
    <p>Övningen med Symfony och Doctrine gick bra och var bra tycker jag. Det var en tydlig genomgång av hur man kan
        skapa entiteter och controllers genom terminalen. Det enda som var lite jobbigt var om man ändrade något i
        entiteterna och glömde migrera dem med migration kommandot. Detta gav mig lite problem senare när jag gjorde
        uppgiften och behövde uppdatera mina variabla namn enligt phpstan.</p>

    <h3>Tankar om applikationen</h3>
    <p>I början så tänkte jag mycket på stylingen av applikationen men när jag började få lite tidspress så växlade jag
        till att möta kraven mer exakt. Min tanke var att skapa något som ser ut som en webbshop där man kan se bilder
        på böckerna och en knapp för att visa mer detaljer.</p>

    <p>Alla delar av applikationen loopar tillbaka till vyn med många böcker. Om man raderar en bok så går man tillbaka
        till read_many vyn. Detsamma händer efter man har lagt till och uppdaterat en bok.</p>

    <h3>ORM i CRUD</h3>
    <p>Jag tycker det varit lätt att jobba med ORM. När jag jämför med sättet vi jobbat mot en databas i Webtec och
        Databas kurserna så tycker jag att detta varit väldigt smidigt. Kanske kan eftersom jag fått erfarenhet av dessa
        kurser så har det känts lite enklare. Jag tycker det känns som att jobba mot ett objekt och att man lagrar
        objekt i databasen om det är förståeligt. Att skapa, radera och uppdatera med ORM har varit enkelt eftersom det
        känns som att jag bara uppdaterar värden på ett objekt.</p>

    <h3>Tankar om ORM</h3>
    <p>Jämfört med det tidigare sätt vi jobbat mot databaser med råa sql förfrågningar och procedurer så ser jag
        fördelar med detta sätt att jobba mot en databas. ORM gör koden enklare att skriva och läsa. Det gör också koden
        säkrare mot sql injektioner. En nackdel med ORM jag läst om är att det kan bli dålig prestanda om man gör
        komplexa databasförfrågningar.</p>

    <h3>Today i learned</h3>
    <p>Min til för detta kursmoment är hur ORM kan användas för att förenkla och effektivisera interaktionen med
        databaser. Detta har gett mig ett nytt sätt att tänka kring databasdesign och applikationsutveckling. Jag ser
        fördelar med att kunna hantera data som objekt istället för som separata datarader. Jag tror att denna kunskap
        kommer att vara värdefull i framtida projekt där databashantering är viktigt.
    </p>
</section>
<section>
    <h2 id=\"kmom06\">Kmom06</h2>
    <p>I detta kursmomentet har jag lagt till automatiserade tester i min rapport-sida. Med Phpmetrics och Scrutinizer
        har jag försökt förbättra min kod.</p>

    <h3>Min uppfattning av Phpmetrics</h3>
    <p>Jag tycker Php Metrics har varit ett värdefullt och bra verktyg att få lära sig jobba med. När jag först började
        arbeta med verktyget så såg jag fram emot att få bilden med bollar att bli helt grön. Detta var mycket svårare
        än förväntat och jag lyckades inte se den feedback jag ville ha från bilden. Men jag fick se en liten
        förbättring i alla fall.
    </p>

    <p>Varningarna och deras förklaringar som Phpmetrics visar var bra och ganska konkreta tycker jag. Att man fick tips
        på hur man kunde lösa dem kom till nytta. Jag har löst alla varningar och issues som verktyget pekade ut i koden
        jag skrivit.
    </p>

    <h3>Min uppfattning av Scrutinizer</h3>
    <p>Scrutinizer har varit lätt att installera och integrera i min rapport-sida. Att man kan få badges att visa upp
        som visar kodkvalitet är en rolig och motiverande del av verktyget. Från första början så hade jag 10 poäng i
        kodkvalitet och 28% kodtäckning. Mina filer hade alla A i betyg så det var nästan inga problem från scrutinizer
        som jag behövde fixa. När jag var klar med uppgiften så var min kodtäckning på 89%.</p>

    <p>Det uppkom dock ganska jobbiga och tidskrävande problem jag stötte på med scrutinizer. Problemet började när jag
        skulle skriva tester för mina controllers. Alla tester passerade phpunit lokalt men i Scrutinizer så
        misslyckades dem. Jag gick igenom en hel runda med problemlösningar och lyckades tillslut hitta lösningen som
        var att kommentera ut en rad ur \".gitignore\". Problemen uppstod eftersom scrutinizer inte fick tillgång till delar
        av koden som testerna behövde.
    </p>

    <p>Ett annat problem jag hade var när jag skulle testa min databas. Det var ett liknande som ovan då scrutinizer
        inte fick tillgång till sqlite databasen. Databasen låg dock i mappen “var/“ som hade en massa andra filer
        också. Min lösning var att ta en kopia på databasen och lägga den i rapportmappen så att scrutinizer kunde komma
        åt den och köra testerna.
    </p>

    <h3>Kodkvalitet</h3>
    <p>Jag tycker att kodkvalitet är en otroligt viktig del av att skapa bra program. Kod med hög kvalitet är lättare
        att läsa, lättare att underhålla och vidareutveckla. Jag tror att badges från tjänster som Scrutinizer kan visa
        kodens kvalitet till en grad. Dock tycker jag att man borde inspektera koden på scrutinizer snabbt för att se
        hur mycket kod som Scrutinizer tar del av för att avgöra mer exakt om betygen är riktiga.
    </p>

    <p>Jag tycker att badges ger en bra motivation för mig som utvecklar att sikta på en högre standard i min kod. Det
        är dock också viktigt att inte bara stödja sig på betyg från verktyg som dessa men också genom att granska koden
        själv eller med andra.
    </p>

    <h3>Today i learned</h3>
    <p>Min til för detta kursmoment är hur jag kan lägga till och använda verktyg och automatiserade tester för att
        förbättra min kod. Jag har fått lära mig hur jag kan identifiera problem i min kod med verktygen. Jag kommer
        definitivt använda mig mer av verktyg som dessa i framtida projekt jag gör.</p>
</section>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "report/report.html.twig";
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
        return array (  88 => 6,  78 => 5,  59 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"base.html.twig\" %}

{% block title %}Report{% endblock %}

{% block body %}
<h1>Rapport</h1>
<section>
    <h2 id=\"kmom01\">Kmom01</h2>
    <h3>Erfarenhet av objektorientering</h3>
    <p>Erfarenheten jag har av objektorientering kommer från den tidigare OOPython kursen. I kursen fick jag lära mig
        grunderna i att skapa klasser, instansiera objekt och att använda arv för att skapa strukturerad och
        återanvändbar kod.</p>

    <p>Python vehicle class exempel:</p>
    <pre>
    <code>
    class Vehicle:
        def __init__(self, make, model):
            self.make = make
            self.model = model
    </code>
    </pre>

    <p>PHP vehicle class exempel:</p>
    <pre>
    <code>
    class Vehicle {
        public \$make;
        public \$model;
    
        public function __construct(\$make, \$model) {
            \$this->make = \$make;
            \$this->model = \$model;
        }
    }        
    </code>
    </pre>

    <p>Syntaxen i Python gjorde det enkelt att förstå och lära sig koncepten inom objektorientering men i PHP är det
        annorlunda. Att det behövs mer rader kod, pilar (->) och dollartecken känns jobbigt. Syntaxen kommer ta ett tag
        att vänja sig och det kommer vara frustrerande men jag tror att jag förstår grunden.
    </p>

    <h3>PHPs modell för klasser och objekt</h3>
    <p>
        Grunderna för att programmera objektorienterat i PHP börjar med att förstå klasser och objekt.
    </p>

    <p>En klass kan ses som en mall för att skapa objekt. Objekt kan också kallas en instans av en klass. I klassen
        definieras objektets attribut och beteende. Ett attribut för en hundklass kan till exempel vara vilket namn
        hunden har. Ett beteende(metod) för en sådan klass kan till exempel vara att skälla.</p>

    <p>Åtkomsthantering är också en viktig del av objektorientering. Att markera och avgränsa vilka attribut och metoder
        en användare har tillgång till är viktigt för enkapsulering objektets data. Det leder till säkrare och intakta
        objekt. Genom att använda “Public”,”Private”, och “Protected” kan vi kontrollera åtkomsten.</p>

    <p><code>- Public är tillgängligt både inom och utanför klassen.</code></p>
    <p><code>- Private kan endast nås inom klassen där den deklareras.</code></p>
    <p><code>- Protected är tillgängligt inom klassen och dess underklasser.</code></p>

    <p>Konstruktorer och destruktorer används för att skapa och förstöra instansierade objekt. En konstruktor anropas
        automatiskt när ett nytt objekt skapas. Den initialiserar också objektets attribut med specifika värden.
        Destruktorer anropas automatiskt när ett objekt förstörs för att fria minne.
    </p>

    <p>Arv är viktigt att veta för att förstå att en klass kan ärva egenskaper och metoder från en annan klass. Det kan
        till exempel vara användbart för att återanvända kod och minska upprepning.</p>

    <p>Här är ett exempel på en klass för en hund:</p>

    <pre><code>
    class Dog {
        public \$name;
        private \$sound = \"Woof\";
    
        public function __construct(\$name) {
            \$this->name = \$name;
        }
    
        public function bark() {
            echo \$this->name . \" says \" . \$this->sound;
        }
    }
    
    \$myDog = new Dog(\"Sixten\");
    \$myDog->bark();
        
    </code></pre>

    <h3>Reflektion över kodbas</h3>
    <p>Jag tycker att kodbasen för uppgiften var svår att förstå till en början. Det var många mappar och filer som jag
        inte riktigt förstod vad de gjorde för att de inte nämns i set up guiden. Men jag har fått en större förståelse
        för Symfony som ramverk. Jag har skapat en webbsida som använder sig av en controller för att servera twig
        template filer och ett litet json api med kända citat.</p>

    <p>Utmaningar jag stött var att lägga till bilder korrekt och att ladda upp sidan på studentservern. När jag
        försökte ladda bilder så visades de inte lokalt men de visades på student server.</p>

    <p>Jag löste det genom att sätta rätt path till filerna i Symfony och installera de paket som behövdes genom npm
        install. I mitt första försök på uppgiften så hade jag inget utrymme kvar på studentservern. Det betydde att jag
        inte kunde ladda upp en kod för att testa den. Nu har jag dock fått mer utrymme.</p>

    <p>Jag har valt att lägga till sass i projektet. Med hjälp av sass så kan jag lätt använda variabler och dela upp
        min scss kod i små moduler för till exempel header, navigation och footer.</p>

    <p>Ett problem jag fortfarande stöter på är felmeddelanden i webbläsarens konsol. Hur jag än försöker så fortsätter
        de poppa upp. Det är något jag måste fixa i framtiden.</p>

    <p>Jag tror att jag förstår de viktiga delarna och flödet för mvc med routes och templates.</p>

    <h3>PHP The Right Way</h3>
    <p>Delarna av PHP The Right Way artikeln jag läst och använt är Getting Started, Coding Practices, Errors and
        Exceptions och Code Style Guide. Getting Started handlade mer om hur jag installerar php och utvecklingsmiljön,
        men det har jag redan gjort.</p>

    <p>Det var intressant att läsa igenom Coding practices. Det gav mig en bättre förståelse för hur man skriver vissa
        delar av php. Tillsammans med kodstil guiden så har jag fått se riktlinjer för de grundläggande
        kodningsstandarder och kodstil regler som finns. Hittills har jag följt de kodexempel vi fått från övningarna.
        Jag kommer nog få mer användning av Code Style Guiden senare när jag skriver mer komplicerade kod bitar.</p>

    <p>Jag läste också om hur jag kan använda phps pakethanterare Composer för att underlätta utvecklingen.</p>

    <p>Artikeln känns som ett bra komplement för en mindre erfaren php utvecklare som mig själv.</p>

    <h3>Today I Learned</h3>
    <p>Min til för detta kursmoment är hur jag kan börja programmera objektorienterat i php och de första grunderna i
        Symfony med routes. Jag tror jag har byggt en bra grund för att fortsätta bygga på rapportsidan.</p>
</section>
<section>
    <h2 id=\"kmom02\">Kmom02</h2>
    <h3>Objektorienterade konstruktioner</h3>
    <h4>Arv</h4>
    <p>Arv används av klasser för att ärva egenskaper och metoder från andra klasser. För att ärva från en annan klass
        används ordet ‘extends’ (förlänga/utöka). Med den nuvarande klassen kan du nu utöka funktionalitet eller
        förändra den.</p>

    <h4>Komposition</h4>
    <p>Komposition betyder att en klass innehåller en eller flera instanser av en annan klass. Ett exempel kan vara en
        kortlek har flera kort eller en bil som har en motor. Det är alltså “har-en” eller “har många” förhållande.</p>

    <h4>Interface</h4>
    <p>Interface kan användas för att specificera metoder som måste finnas i klassen. Interface används för att se till
        att olika klasser följer samma strukturella regler i koden även om de obligatoriska funktionerna kan skrivas
        olika.</p>

    <h4>Trait</h4>
    <p>Trait används för att återanvända kod i klasser. En trait används för att gruppera funktionalitet på ett mer
        flexibelt sätt. En klass kan använda flera traits och flera klasser kan använda en trait.</p>

    <h3>Implementation av uppgiften</h3>
    <p>För att lösa uppgiften skapade jag klasserna Card(Ett spelkort),CardGrapic(För en grafisk representation av ett
        spelkort), DeckOfCards(En kortlek) och CardHand(En hand men kort).</p>

    <p>DeckOfCards och CardHand har ett kompositions förhållande med Card-klassen. Det finns också ett arv av Card
        klassen i CardGrapic.</p>

    <p>För att visa korten med den specifika stilen i kraven så använder jag html och css. Jag tycker korten ser helt
        okej ut just nu, men jag vill lägga till symboler för knekt, drottning och kung. Just nu är det bara bokstäver.
    </p>

    <p>Jag har haft en stor utmaning under uppgiften och det var att få koden att fungera på studentservern. Problemet
        var dock inte med min kod, det var min Firefox webbläsare. Av någon anledning så minskade inte kortleken när jag
        laddade om sidorna för att dra kort. Först trodde jag det berodde på att jag satte hela DeckOfCards objektet i
        session.</p>

    <p>För att lösa problemet så försökte jag först att bara ladda upp arrayen med kort objekt istället. När det inte
        heller fungerade så lade jag till metoder för att skapa en kortlek från en array och en metod för att skapa en
        array med värden som strängar av en kortlek. Det fungerade inte heller.</p>

    <p>När jag tillslut bad en kompis testa min lösning så fungerade det på hans dator. Då bestämde jag mig för att
        testa med Crome som webbläsare och då fungerade det. Av mina lösningar så tror jag att ladda upp en array med
        strängar är smidigare än att ladda upp en array med objekt i session.</p>

    <p>Förbättringar som kan göras är till exempel att slå samman de två draw card rutterna. Efter som de nästan gör
        samma sak (drar ett eller flera kort), men jag lyckades inte med det i detta kursmoment.</p>

    <p>Jag skapade också CardHand klassen utan att använda den. Jag kanske får användning av den i ett senare
        kursmoment.
    </p>

    <h3>Symfony och MVC</h3>
    <p>Att jobba med mvc och Symfony har känts ganska smidigt. Ett problem jag stötte på dock var att skapa routes med
        metoderna GET och POST. Jag fick lösa det genom att rendera en a tag för GET routes och en form submit för
        Routes med POST. Tror det inte är helt korrekt att göra så men det fungerar.
    </p>

    <p>När jag jobbade med arrayer i session så slutade min sida för att visa allt i session att fungera. Den första
        lösningen var att lägga till en __toString metod på DeckOfCards klassen. Men när jag bytte sätt att ladda upp
        till session så kändes den lösningen inte så bra. Jag googlade lite och hittade en komponent i Symfony som heter
        VarDumper. Med den kan jag lätt dumpa all information från session, även arrayer.
    </p>

    <h3>Today I Learned</h3>
    <p>Min til för detta kursmoment är hur jag kan skapa klasser i PHP. Efter mycket krångel så tycker jag att jag
        förstår klasser bättre. Jag tycker det har varit svåra moment hittills och jag hoppas det blir något lättare
        framåt.</p>

</section>
<section>
    <h2 id=\"kmom03\">Kmom03</h2>
    <p>I kmom03 har jag skapat kortspelet 21 i min rapport sida. För att skapa kortspelet har jag använt mig av
        flödesdiagram och pseudokod för att hjälpa att planera och strukturera koden jag skrivit.
    </p>
    <h3>Modellering av kortspel</h3>
    <p>När jag började med uppgiften så kändes det svårt att börja lösa den. Jag visste inte riktigt hur jag skulle
        göra. Men när jag började med att försöka skapa ett flödesdiagram så började jag också få bättre förståelse för
        hur koden skulle kunna se ut.</p>

    <p>Jag tycker det var svårt att skapa ett flödesdiagram. Det blev antingen för komplicerat eller för simpelt
        diagram. Det jag landat på är den version jag tyckte om mest men jag är inte helt nöjd. I diagrammet så ska ju
        banken också gå igenom en loop när de drar kort.
    </p>

    <p>Det som hjälpte allra mest var pseudokoden tycker jag. Jag listade snabbt ut vilka klasser och funktioner som jag
        skulle behöva. När jag tänker på större uppgifter jag gjort tidigare så har jag alltid tänkt på ett liknande
        sätt. Den enda skillnaden var att jag inte skrev ner pseudokoden/tankarna i vissa fall. Likt när man inte
        skriver kommentarer i koden så glömde jag bort vad planen för koden var.</p>

    <h3>Implementation av uppgiften</h3>

    <p>För att göra uppgiften så skapade jag klassen TwentyOne. Klassen använder sig av DeckOfCards, CardHand, Card och
        CardGraphic klasserna för att skapa ett 21 kortspel. Klassen initieras med att skapa en blandad kortlek, en hand
        med kort för spelaren och en hand med kort till banken och en status för att kontrollera spelets gång. Sedan
        skapade jag funktionen hit() för att ge ett kort till spelaren. Varje gång hit() kallas så räknas värdet av
        spelarens hand ut. Om värdet är högre än 21 så blir det en förlust för spelaren. Om spelaren väljer att stanna
        med funktionen stand() så startar bankens tur. Banken drar kort tills kortens totala värde är mindre än 16. Jag
        har testat olika värden för hur mycket risk banken tar och jag har slutat på 16. Det gör spelet lite svårare
        tycker jag. När banken har dragit sina kort så kallar jag på game over funktionen. Game over räknar ut värdet på
        banken och spelarens kort för att se vem som vann. Jag har också skapat olika get funktionenr för att hämta
        spelaren och bankens hand, deras värde och status på spelet.</p>

    <p>Det svåraste med uppgiften var att räkna ut värdet på en hand med kort. Funktionen calcScore har gått igenom
        många förändringar. Eftersom ett ess kan ha värdet 1 eller 14 så blev det väldigt klurigt. I min första lösning
        så skapade jag en array som samlade alla värden i en hand, kort för kort. Om ett ess hittades så blev det en
        array med värdet 1 och 14 i sig. En array kunde se ut så här [ 2, [ 1, 14 ], 5 ]. Den lösningen kändes inte så
        smidig och kod liters klagade på den mycket.</p>

    <p>Min nuvarande lösning är bättre tycker jag. I den lösningen så har jag en variabel för totala värdet av handen
        och en variabel för att räkna antalet ess. Om jag stöter på ett ess lä ökar ess räknaren. Efter att hela handen
        med kort gåtts igenom så gör jag en till loop som kör ett turnary if statement så många gånger som ett ess
        hittades i handen. Jag kollar om vilket värde på ess undviker att överskrida 21. På det sättet hittar jag det
        bästa värdet.
    </p>

    <h3>Att koda i symfony</h3>

    <p>Jag tycker det har gått bra att koda med Symfony. För detta kursmoment har det känts enkelt att skapa spelet med
        template-filer. Jag har också lyckats få mina routes att ha lite kod genom att skicka in hela game objektet till
        template-filerna. Jag hittade också funktionen serialise() och unserialize() för att enkelt lägga upp ett objekt
        i session och hämta det.
    </p>

    <p>Jag har fått många klagomål från linters på att jag haft över 10 routes i en kontroller. Jag har brutit ut alla
        api routes till en separat controller.</p>

    <h3>Today i Learned</h3>

    <p>I detta kursmoment har jag lärt mig hur jag kan förbereda mig innan jag börjar skriva kod, med hjälp av
        flödesdiagram och pseudokod. Jag har också lärt mig lite mer om hur jag bättre programmerar i php med hjälp av
        linters. Det har varit roligt och lärorikt projekt. Det har till exempel varit roligt att styla spelplanen.
    </p>

</section>
<section>
    <h2 id=\"kmom04\">Kmom04</h2>
    <p>I detta kursmoment har jag skapat enhetstester för 2 av mina klasser och lagt till dokumentation för min kod.</p>

    <h3>Kod tester med PHPUnit</h3>
    <p>Att skriva tester med PHPUnit har gått bra och varit ganska roligt. Jag känner igen mig lite från OOPython kursen
        så jag tyckte det var enkelt och smidigt att skapa testerna. En sak som gjorde det hela lite roligare och mer
        motiverande var att se progress bars för varje klass man gjorde tester för. Med dokumentationen så kunde jag
        lätt hitta olika typer av asserts för att testa olika saker i min kod. Något som ofta hände när jag kodade
        tester i python var att jag bara använde assertEqual. Nu använder jag många fler och jag tror det beror på att
        jag läste mer av dokumentationen för PHPUnit.
    </p>

    <h3>Kodtäckning</h3>
    <p>Jag har lyckats få 96% kodtäckning för Lines, 94% för Functions and Methods och 83% för Classes and Traits för
        mina klasser i Card namespacet. Så jag tror att jag lyckats ganska bra. Om jag hade mer tid så skulle jag lägga
        till kodtäckning för Controller också.</p>

    <h3>Kodens testbarhet</h3>
    <p>Min kod var inte jätte testbar när jag började skriva testerna. Det fanns delar som var mindre testbara och jag
        behövde ändra som till exempel min game over function och stand funktionen. Jag har också gjort några funktioner
        public istället för private för att kunna kalla dem i testerna. Det kanske inte är ett bra tillvägagångssätt men
        det var min lösning.</p>

    <p>Jag har behövt skriva om delar av min kod för att göra den mer testbar. Jag har flyttat in TwentyOne under Card
        namespacet så att jag får lättare tillgång till klasserna. Det har också gjorts förändringar i koden. Ett
        exempel är att jag skapat en addCardToHand function som tar emot en kort hand och lägger till ett kort i den.
        Jag har allmänt försökt att dela upp funktionerna mer och dem mindre och lättare att testa och förstå.</p>

    <h3>Snygg och ren kod</h3>
    <p>Jag tror att tester oftast kan identifiera snygg och ren kod. De funktioner i min kod som var svåra att testa var
        alltid lite mer komplexa och gjorde mer än en sak oftast. Jag tror att kod som är lätt att testa är modulär med
        tydliga avgränsningar mellan olika delar. Modulär kod underlättar underhåll, uppdatering och felsökning.</p>

    <p>Jag tror dock att det går att skapa kod som är extremt komplicerad och svår att läsa men som också är lätt att
        testa.
    </p>

    <h3>Today i learned</h3>

    <p>Min til för detta kursmoment är hur jag kan skapa tester i php med PHPUnit. Jag har också fått lära mig skriva
        lite snyggare kod tycker jag. Jag hade inställningen att detta kursmoment skulle vara ett av de tråkigare. Det
        var dock lite roligare än förväntat att skapa testerna. Jag skulle vilja se ett exempel på hur ett projekt med
        större kodbas hanterar tester.
    </p>
</section>
<section>
    <h2 id=\"kmom05\">Kmom05</h2>
    <p>I detta kursmoment har jag lagt till ORM för att koppla min rapport sida till en sqlite databas.</p>

    <h3>Symfony och doctrine övningen</h3>
    <p>Övningen med Symfony och Doctrine gick bra och var bra tycker jag. Det var en tydlig genomgång av hur man kan
        skapa entiteter och controllers genom terminalen. Det enda som var lite jobbigt var om man ändrade något i
        entiteterna och glömde migrera dem med migration kommandot. Detta gav mig lite problem senare när jag gjorde
        uppgiften och behövde uppdatera mina variabla namn enligt phpstan.</p>

    <h3>Tankar om applikationen</h3>
    <p>I början så tänkte jag mycket på stylingen av applikationen men när jag började få lite tidspress så växlade jag
        till att möta kraven mer exakt. Min tanke var att skapa något som ser ut som en webbshop där man kan se bilder
        på böckerna och en knapp för att visa mer detaljer.</p>

    <p>Alla delar av applikationen loopar tillbaka till vyn med många böcker. Om man raderar en bok så går man tillbaka
        till read_many vyn. Detsamma händer efter man har lagt till och uppdaterat en bok.</p>

    <h3>ORM i CRUD</h3>
    <p>Jag tycker det varit lätt att jobba med ORM. När jag jämför med sättet vi jobbat mot en databas i Webtec och
        Databas kurserna så tycker jag att detta varit väldigt smidigt. Kanske kan eftersom jag fått erfarenhet av dessa
        kurser så har det känts lite enklare. Jag tycker det känns som att jobba mot ett objekt och att man lagrar
        objekt i databasen om det är förståeligt. Att skapa, radera och uppdatera med ORM har varit enkelt eftersom det
        känns som att jag bara uppdaterar värden på ett objekt.</p>

    <h3>Tankar om ORM</h3>
    <p>Jämfört med det tidigare sätt vi jobbat mot databaser med råa sql förfrågningar och procedurer så ser jag
        fördelar med detta sätt att jobba mot en databas. ORM gör koden enklare att skriva och läsa. Det gör också koden
        säkrare mot sql injektioner. En nackdel med ORM jag läst om är att det kan bli dålig prestanda om man gör
        komplexa databasförfrågningar.</p>

    <h3>Today i learned</h3>
    <p>Min til för detta kursmoment är hur ORM kan användas för att förenkla och effektivisera interaktionen med
        databaser. Detta har gett mig ett nytt sätt att tänka kring databasdesign och applikationsutveckling. Jag ser
        fördelar med att kunna hantera data som objekt istället för som separata datarader. Jag tror att denna kunskap
        kommer att vara värdefull i framtida projekt där databashantering är viktigt.
    </p>
</section>
<section>
    <h2 id=\"kmom06\">Kmom06</h2>
    <p>I detta kursmomentet har jag lagt till automatiserade tester i min rapport-sida. Med Phpmetrics och Scrutinizer
        har jag försökt förbättra min kod.</p>

    <h3>Min uppfattning av Phpmetrics</h3>
    <p>Jag tycker Php Metrics har varit ett värdefullt och bra verktyg att få lära sig jobba med. När jag först började
        arbeta med verktyget så såg jag fram emot att få bilden med bollar att bli helt grön. Detta var mycket svårare
        än förväntat och jag lyckades inte se den feedback jag ville ha från bilden. Men jag fick se en liten
        förbättring i alla fall.
    </p>

    <p>Varningarna och deras förklaringar som Phpmetrics visar var bra och ganska konkreta tycker jag. Att man fick tips
        på hur man kunde lösa dem kom till nytta. Jag har löst alla varningar och issues som verktyget pekade ut i koden
        jag skrivit.
    </p>

    <h3>Min uppfattning av Scrutinizer</h3>
    <p>Scrutinizer har varit lätt att installera och integrera i min rapport-sida. Att man kan få badges att visa upp
        som visar kodkvalitet är en rolig och motiverande del av verktyget. Från första början så hade jag 10 poäng i
        kodkvalitet och 28% kodtäckning. Mina filer hade alla A i betyg så det var nästan inga problem från scrutinizer
        som jag behövde fixa. När jag var klar med uppgiften så var min kodtäckning på 89%.</p>

    <p>Det uppkom dock ganska jobbiga och tidskrävande problem jag stötte på med scrutinizer. Problemet började när jag
        skulle skriva tester för mina controllers. Alla tester passerade phpunit lokalt men i Scrutinizer så
        misslyckades dem. Jag gick igenom en hel runda med problemlösningar och lyckades tillslut hitta lösningen som
        var att kommentera ut en rad ur \".gitignore\". Problemen uppstod eftersom scrutinizer inte fick tillgång till delar
        av koden som testerna behövde.
    </p>

    <p>Ett annat problem jag hade var när jag skulle testa min databas. Det var ett liknande som ovan då scrutinizer
        inte fick tillgång till sqlite databasen. Databasen låg dock i mappen “var/“ som hade en massa andra filer
        också. Min lösning var att ta en kopia på databasen och lägga den i rapportmappen så att scrutinizer kunde komma
        åt den och köra testerna.
    </p>

    <h3>Kodkvalitet</h3>
    <p>Jag tycker att kodkvalitet är en otroligt viktig del av att skapa bra program. Kod med hög kvalitet är lättare
        att läsa, lättare att underhålla och vidareutveckla. Jag tror att badges från tjänster som Scrutinizer kan visa
        kodens kvalitet till en grad. Dock tycker jag att man borde inspektera koden på scrutinizer snabbt för att se
        hur mycket kod som Scrutinizer tar del av för att avgöra mer exakt om betygen är riktiga.
    </p>

    <p>Jag tycker att badges ger en bra motivation för mig som utvecklar att sikta på en högre standard i min kod. Det
        är dock också viktigt att inte bara stödja sig på betyg från verktyg som dessa men också genom att granska koden
        själv eller med andra.
    </p>

    <h3>Today i learned</h3>
    <p>Min til för detta kursmoment är hur jag kan lägga till och använda verktyg och automatiserade tester för att
        förbättra min kod. Jag har fått lära mig hur jag kan identifiera problem i min kod med verktygen. Jag kommer
        definitivt använda mig mer av verktyg som dessa i framtida projekt jag gör.</p>
</section>
{% endblock %}", "report/report.html.twig", "/home/albinr/dbwebb-kurser/mvc/me/report/templates/report/report.html.twig");
    }
}
