<?php
/**
 * Created by PhpStorm.
 * User: satoru
 * Date: 2018/03/10
 * Time: 14:46
 */

class ClassLoader
{
    protected $dirs;

    public function register(){
        spl_autoload_register(array($this, 'loadClass'));
    }

    public function registerDir($dir){
        $this->dirs[] = $dir;
    }

    public function loadClass($class){
        foreach ((array) $this->dirs as $dir) {
            $file = $dir . '/' . $class . '.php';
            if (is_readable($file)) {
                require $file;

                return;
            }
        }
    }
}