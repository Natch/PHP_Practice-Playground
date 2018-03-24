<?php
/**
 * Created by PhpStorm.
 * User: satoru
 * Date: 2018/03/21
 * Time: 18:38
 */

class AccountController extends Controller
{
    public function signupAction() {
        return $this->render(array('_token' => $this->generateCsrfToken('account/signup')));
    }
}