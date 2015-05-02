<?php
namespace Grav\Plugin;

use \Grav\Common\Plugin;
use \Grav\Common\Grav;
use \Grav\Common\Page\Page;

class MaterializerProPlugin extends Plugin
{
    /**
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return [
            'onThemeInitialized' => ['onThemeInitialized', 0]
        ];
    }

    /**
     * Initialize configuration
     */
    public function onThemeInitialized()
    {
        if ($this->isAdmin()) {
            $this->active = false;
        }

        $load_events = false;

        // if not always_load see if the theme expects to load the materializer plugin
        if (!$this->config->get('plugins.materializerpro.always_load')) {
            $theme = $this->grav['theme'];
            if (isset($theme->load_materializerpro_plugin) && $theme->load_materializerpro_plugin) {
                $load_events = true;
            }
        } else {
            $load_events = true;
        }

        if ($load_events) {
            $this->enable([
                'onTwigSiteVariables' => ['onTwigSiteVariables', 0]
            ]);
        }
    }

    /**
     * if enabled on this page, load the JS + CSS and set the selectors.
     */
    public function onTwigSiteVariables()
    {
        $config = $this->config->get('plugins.materializerpro');

        $materialize_bits = [];

        if ($config['load_css']) {
            $materialize_bits[] = 'plugin://materializer/css/materialdesignicons.css';
        }
        if ($config['load_js']) {
            $materialize_bits[] = 'plugin://materializer/js/materialize.js';
        }

        $assets = $this->grav['assets'];
        $assets->registerCollection('materialize', $materialize_bits);
        $assets->add('materialize', 100);
    }
}
