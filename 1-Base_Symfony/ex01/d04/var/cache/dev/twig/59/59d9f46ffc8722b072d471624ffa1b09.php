<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* article/main.html.twig */
class __TwigTemplate_6f7e11622b8e568136122a671045c86a extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "article/main.html.twig"));

        // line 1
        yield "<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>Ex01: Main</title>
</head>
<body>
    <header>
        <h1>Bienvenue sur notre site d'articles</h1>
    </header>

    <ul>
        <li><a href=\"/e01/gull\">Gull</a></li>
        <li><a href=\"/e01/coffee\">Coffee</a></li>
        <li><a href=\"/e01/tea\">Tea</a></li>
    </ul>

    <footer>
        <p>Fin articles</p>
    </footer>
</body>
</html>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "article/main.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  45 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>Ex01: Main</title>
</head>
<body>
    <header>
        <h1>Bienvenue sur notre site d'articles</h1>
    </header>

    <ul>
        <li><a href=\"/e01/gull\">Gull</a></li>
        <li><a href=\"/e01/coffee\">Coffee</a></li>
        <li><a href=\"/e01/tea\">Tea</a></li>
    </ul>

    <footer>
        <p>Fin articles</p>
    </footer>
</body>
</html>
", "article/main.html.twig", "/home/kbaridon/Documents/symfony/1-Base_Symfony/ex01/d04/templates/article/main.html.twig");
    }
}
