<?php

/* AppBundle:default:index.html.twig */
class __TwigTemplate_b123cb1c37252ba3b92f936e0ae65c7c3e5ab14eb41d0382b9d7a7b45bff5714 extends Twig_Template
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
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
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
            getMessage();
            \$('div.buttonBlock button').click(function() {
                sendMessage();
            });
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
                    type: \"post\", //typ połączenia
//                    contentType: 'application/json', //gdy wysyłamy dane czasami chcemy ustawić ich typ
                    dataType: 'json', //typ danych jakich oczekujemy w odpowiedzi
                    data: { //dane do wysyłki
                        'message': text
                    }
                })
//                .fail(function(response) {
//                    alert('Nie można wysłać pustej wiadomości!');
//                })
//                .always(function() {
//                    \$('input#message').val(\"\");
//                })
            }
        }


        function getMessage() {
            \$.ajax({
                url: \"";
        // line 56
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("chat_data");
        echo "\",
                type: \"post\", //typ połączenia
//                    contentType: 'application/json', //gdy wysyłamy dane czasami chcemy ustawić ich typ
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
        return array (  88 => 56,  65 => 36,  31 => 4,  28 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "AppBundle:default:index.html.twig", "/home/dawid/PhpstormProjects/Chat/src/AppBundle/Resources/views/default/index.html.twig");
    }
}
