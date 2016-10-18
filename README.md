# AdminTheme plugin for CakePHP

This plugin is a theme for CakePHP 3 based on the [Sbadmin 2](https://startbootstrap.com/template-overviews/sb-admin-2) Bootstrap theme.

## Installation

You can install this plugin into your CakePHP application using [composer](http://getcomposer.org).

The recommended way to install composer packages is:

```
composer require falco442/cake-3-admin-theme
```

## Form helper

Activate this theme's Form Helper by adding it in `src/View/AppView.php`

```
    public function initialize(){
    	...
        $this->loadHelper('AdminTheme.Form');
        ...
    }
```

## Bake

This plugin includes a template for bake. You can bake your views using 

```
cd cake-root/bin && ./cake bake --theme=AdminTheme views
```
