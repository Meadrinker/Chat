<?php

/* AppBundle:default:index.html.twig */
class __TwigTemplate_a7174a9acdee91f48c03622558eb63eaef8b62d2ed9e1398fbc0eabbecde9aab extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "AppBundle:default:index.html.twig", 1);
        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "AppBundle:default:index.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 4
        echo "    <div class=\"chatBlock\">

    </div>

    <div class=\"textBlock\">
        <input type=\"text\" id=\"message\" size=\"71\">
    </div>

    <div class=\"buttonBlock\">
        <button type=\"button\">Send</button>
    </div>

    <div id=\"prototype\" style=\"display: none;\">
        <div class=\"messageBlock\">
             <div>Dawid</div>
        </div>
    </div>

    <script>
        var id = 0;
        \$(document).ready(function() {
            \$('div.buttonBlock button').click(function() {
                sendMessage();
            });
            getMessage();
        });

        function sendMessage() {
            var text_length = \$('input#message').val().replace(/\\s/g,'').length;
            if (text_length > 0) {
                var text = \$('input#message').val();
                \$.ajax({
                    url: \"";
        // line 36
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("chat_send");
        echo "\",
                    cache: false,
                    timeout:50000, /* Timeout in ms */
                    type: \"post\", //typ połączenia
                    dataType: 'json', //typ danych jakich oczekujemy w odpowiedzi
                    data: { //dane do wysyłki
                        'message': text
                    }
                })
                .fail(function(response) {
                    alert('Nie można wysłać pustej wiadomości!');
                })
                .always(function() {
                    \$('input#message').val(\"\");
                })
            }
        }

        function getMessage() {
            \$.ajax({
                url: \"";
        // line 56
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("chat_data");
        echo "\",
                cache: false,
                timeout:50000, /* Timeout in ms */
                type: \"post\", //typ połączenia
                dataType: 'json', //typ danych jakich oczekujemy w odpowiedzi
                data: { \"id\": id }
            })
            .done(function(response) {
                id = response.id;
                \$.each(response.messages, function(index, val) {
                    var message = \$('#prototype').html();
                    message = \$(message).text(
                        response.messages[index].user
                            + '('
                            + response.messages[index].date
                            + ')'
                            + ': '
                            + response.messages[index].message
                    );
                    \$('div.chatBlock').append(message);
                });
                getMessage();
            });
        }
    </script>

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "AppBundle:default:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  97 => 56,  74 => 36,  40 => 4,  34 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends 'base.html.twig' %}

{% block body %}
    <div class=\"chatBlock\">

    </div>

    <div class=\"textBlock\">
        <input type=\"text\" id=\"message\" size=\"71\">
    </div>

    <div class=\"buttonBlock\">
        <button type=\"button\">Send</button>
    </div>

    <div id=\"prototype\" style=\"display: none;\">
        <div class=\"messageBlock\">
             <div>Dawid</div>
        </div>
    </div>

    <script>
        var id = 0;
        \$(document).ready(function() {
            \$('div.buttonBlock button').click(function() {
                sendMessage();
            });
            getMessage();
        });

        function sendMessage() {
            var text_length = \$('input#message').val().replace(/\\s/g,'').length;
            if (text_length > 0) {
                var text = \$('input#message').val();
                \$.ajax({
                    url: \"{{ path('chat_send') }}\",
                    cache: false,
                    timeout:50000, /* Timeout in ms */
                    type: \"post\", //typ połączenia
                    dataType: 'json', //typ danych jakich oczekujemy w odpowiedzi
                    data: { //dane do wysyłki
                        'message': text
                    }
                })
                .fail(function(response) {
                    alert('Nie można wysłać pustej wiadomości!');
                })
                .always(function() {
                    \$('input#message').val(\"\");
                })
            }
        }

        function getMessage() {
            \$.ajax({
                url: \"{{ path('chat_data') }}\",
                cache: false,
                timeout:50000, /* Timeout in ms */
                type: \"post\", //typ połączenia
                dataType: 'json', //typ danych jakich oczekujemy w odpowiedzi
                data: { \"id\": id }
            })
            .done(function(response) {
                id = response.id;
                \$.each(response.messages, function(index, val) {
                    var message = \$('#prototype').html();
                    message = \$(message).text(
                        response.messages[index].user
                            + '('
                            + response.messages[index].date
                            + ')'
                            + ': '
                            + response.messages[index].message
                    );
                    \$('div.chatBlock').append(message);
                });
                getMessage();
            });
        }
    </script>

{% endblock %}", "AppBundle:default:index.html.twig", "/home/dawid/PhpstormProjects/Chat/src/AppBundle/Resources/views/default/index.html.twig");
    }
}
