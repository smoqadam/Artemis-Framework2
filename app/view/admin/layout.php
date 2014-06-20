<!DOCTYPE html>
<html>
<head>
    {% block head %}
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" href="style.css" />
    <title>{% block title %}{% endblock %} - Admin Area</title>
    {% endblock %}
</head>
<body>
<div id="content">{% block content %}{% endblock %}</div>
<div id="footer">
    {% block footer %}
    &copy; Copyright 2011 by <a href="http://phpro.ir/">PHPro.ir</a>.
    {% endblock %}
</div>
</body>
</html>