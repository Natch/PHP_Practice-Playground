<?php
/**
 * Created by PhpStorm.
 * User: satoru
 * Date: 2018/03/11
 * Time: 18:13
 */

class View
{
    protected $base_dir;
    protected $defaults;
    protected $layout_variables = array();

    public function __construct($base_dir, $defaults = array())
    {
        $this->base_dir = $base_dir;
        $this->defaults = $defaults;
    }

    protected function render(array $variables, $template = null, $layout = 'layout') {
        $defaults = array(
            'request' => $this->request,
            'base_url' => $this->request->getBaseUrl(),
            'session' => $this->session,
        );

        $view = new View($this->application->getViewDir(), $defaults);

        if (is_null($template)) {
            $template = $this->action_name;
        }
        $path = $this->controller_name . '/' . $template;

        return $view->render($path, $variables, $layout);
    }

    public function setLayoutVar($name, $value) {
        $this->layout_variables[$name] = $value;
    }

    public function render($_path, array $_variables, $_layout = false) {
        $_file = $this->base_dir . '/' . $_path . '.php';

        extract(array_merge($this->defaults, $_variables));

        ob_start();
        ob_implicit_flush(0);

        require $_file;

        $content = ob_get_clean();

        if ($_layout) {
            $content = $this->render($_layout, array_merge($this->layout_variables, array('_content' => $content)));
            return $content;
        }
    }

    public function escape($string) {
        return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
    }

}