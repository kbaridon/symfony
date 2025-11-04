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

/* color/index.html.twig */
class __TwigTemplate_be29a31747ee261b23e123bfe8e4b116 extends Template
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

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "color/index.html.twig"));

        $this->parent = $this->load("base.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        yield "Colors";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 5
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 6
        yield "<h1>Colors shades</h1>
<table style=\"border-collapse: collapse;\">
    <thead>
        <tr>
            ";
        // line 10
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(Twig\Extension\CoreExtension::keys((isset($context["colors"]) || array_key_exists("colors", $context) ? $context["colors"] : (function () { throw new RuntimeError('Variable "colors" does not exist.', 10, $this->source); })())));
        foreach ($context['_seq'] as $context["_key"] => $context["name"]) {
            // line 11
            yield "                <th style=\"padding: 8px; text-align: left;\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["name"], "html", null, true);
            yield "</th>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['name'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 13
        yield "        </tr>
    </thead>
    <tbody>
        ";
        // line 16
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(range(0, ((isset($context["count"]) || array_key_exists("count", $context) ? $context["count"] : (function () { throw new RuntimeError('Variable "count" does not exist.', 16, $this->source); })()) - 1)));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 17
            yield "            <tr>
                ";
            // line 18
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["colors"]) || array_key_exists("colors", $context) ? $context["colors"] : (function () { throw new RuntimeError('Variable "colors" does not exist.', 18, $this->source); })()));
            foreach ($context['_seq'] as $context["name"] => $context["shades"]) {
                // line 19
                yield "                    ";
                $context["shade"] = CoreExtension::getAttribute($this->env, $this->source, $context["shades"], $context["i"], [], "array", false, false, false, 19);
                // line 20
                yield "                    <td title=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["shade"]) || array_key_exists("shade", $context) ? $context["shade"] : (function () { throw new RuntimeError('Variable "shade" does not exist.', 20, $this->source); })()), "hex", [], "any", false, false, false, 20), "html", null, true);
                yield "\" style=\"height: 40px; width: 80px; background: ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["shade"]) || array_key_exists("shade", $context) ? $context["shade"] : (function () { throw new RuntimeError('Variable "shade" does not exist.', 20, $this->source); })()), "hex", [], "any", false, false, false, 20), "html", null, true);
                yield "; padding: 0; border: 1px solid #ccc; vertical-align: middle;\"></td>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['name'], $context['shades'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 22
            yield "            </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['i'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 24
        yield "    </tbody>
</table>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "color/index.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  141 => 24,  134 => 22,  123 => 20,  120 => 19,  116 => 18,  113 => 17,  109 => 16,  104 => 13,  95 => 11,  91 => 10,  85 => 6,  75 => 5,  58 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Colors{% endblock %}

{% block body %}
<h1>Colors shades</h1>
<table style=\"border-collapse: collapse;\">
    <thead>
        <tr>
            {% for name in colors|keys %}
                <th style=\"padding: 8px; text-align: left;\">{{ name }}</th>
            {% endfor %}
        </tr>
    </thead>
    <tbody>
        {% for i in 0..(count - 1) %}
            <tr>
                {% for name, shades in colors %}
                    {% set shade = shades[i] %}
                    <td title=\"{{ shade.hex }}\" style=\"height: 40px; width: 80px; background: {{ shade.hex }}; padding: 0; border: 1px solid #ccc; vertical-align: middle;\"></td>
                {% endfor %}
            </tr>
        {% endfor %}
    </tbody>
</table>
{% endblock %}
", "color/index.html.twig", "/home/kbaridon/Documents/symfony/1-Base_Symfony/ex03/d04/templates/color/index.html.twig");
    }
}
