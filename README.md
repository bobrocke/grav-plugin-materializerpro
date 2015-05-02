# Grav Materializer Pro Plugin

Materializer Pro is a [Grav](http://github.com/getgrav/grav) plugin that can be used as a dependency for other themes and plugins to load the [Materialize framework](http://materializecss.com).  The main purpose of this plugin is to allow the Materialize theme to depend on the Materializer's Sass/JS and to allow the plugin to be updated independently of the theme itself.

Rather than using the icon font that comes with the Materialize Framework, Materializer Pro uses a newer, expanded icon font: [Material Design Icons](http://materialdesignicons.com).

# Installation

## GPM Installation (Preferred)

The simplest way to install this plugin is via the [Grav Package Manager (GPM)](http://learn.getgrav.org/advanced/grav-gpm).  From the root of your Grav install type:

    bin/gpm install materializerpro

## Manual Installation

If for some reason you can't use GPM you can manually install this plugin. Download the zip version of this repository and unzip it under `/your/site/grav/user/plugins`. Then, rename the folder to `materializerpro`.

You should now have all the plugin files under:

	/your/site/grav/user/plugins/materializerpro

# Usage

To best understand what the Materializer Pro plugin provides, you should read through the original [Materialize framework documentation](http://materializecss.com).

## Configuration

Materializer Pro is **enabled** but **not always loaded** by default.  You can change this behavior by setting `always_load: true` in the plugin's configuration.  Simply copy the `user/plugins/materializerpro/materializerpro.yaml` into `user/config/plugins/materializerpro.yaml` and make your modifications.

```
enabled: true                   # Enable / Disable this plugin
always_load: false              # If set to `false` the Theme must have `public $load_materializer_plugin = true;` to add the Sass/CSS/JS
load_core_css: true             # Load the core `materialdesignicons.css` CSS file
load_core_js: true              # Load the core `materializer.js` JS file
