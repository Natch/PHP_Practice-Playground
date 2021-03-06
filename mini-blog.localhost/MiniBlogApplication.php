<?php
/**
 * Created by PhpStorm.
 * User: satoru
 * Date: 2018/03/18
 * Time: 17:57
 */

class MiniBlogApplication extends Application
{
    protected $login_action = array('account', 'signin');

    public function getRootDir() {
        return __DIR__;
    }

    protected function registerRoutes() {
        return array(
            '/account' => array('controller' => 'account', 'action' => 'index'),
            '/account/:action' => array('controller' => 'account'),
        );
    }

    protected function configure() {
        $this->db_manager->connect('master', array(
            'dsn' => 'mysql:dbname=mini_blog;host=localhost',
            'user' => 'root',
            'password' => 'realize328',
        ));
    }
}