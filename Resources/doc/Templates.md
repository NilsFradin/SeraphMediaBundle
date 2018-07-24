Templates
=========
All the templates for the back extend 'base.html.twig' and they contains different type of block.

- base.html.twig :

    ```html.twig
    <html>
        <head>
            <meta charset="UTF-8">

            <title>{% block title %} ... {% endblock %}</title>
            
            {% block stylesheets %} ... {% endblock %}
            
        </head>
        <body>
            {% block body %} ... {% endblock %}
            
            {% block javascripts %} ... {% endblock %}
        </body>
    </html>
    ```

- back/file/list.html.twig

    ```html.twig
    {% block title %} ... {% endblock %}
    
    {% block body %}        
        <table {% block table_attr %} ... {% endblock %}> 
    
            {% block thead %} ... {% endblock %}
            
            {% block tbody %} 
                ...
                {% block tbody_actions %} ... {% endblock %}
                ...
                {% block tbody_noResults %} ... {% endblock %}
                ...
            {% endblock %}
        
        </table>
        {% block page_actions %} ... {% endblock %}
    {% endblock %}
    ```

- back/file/modify.html.twig

    ```html.twig
    {% block title %} ... {% endblock %}
        
    {% block body %}
        {% block form_fields %} ... {% endblock %}
        
        {% block form_actions %} ... {% endblock %}
     
    {% endblock %}          
    ```