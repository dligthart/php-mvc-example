<?php
/**
 * Class LoginController.
 * 
 * @author dligthart <ligthart@pm.me>
 * @package phpcursus
 */
class LoginController extends Controller {

    public function __construct() {
        //echo 'LoginController Loaded' . PHP_EOL;
    }

    public function index(): View {
        return new View('login');
    }

    public function login($request): View {

        if($request['username'] === USERNAME 
            && $request['password'] === PASSWORD) {

            Session::set('username', USERNAME);

        } 

        return new View('login');
    }

    public function logout(): View {
        Session::stop();
        Http::redirect('login');
    }
}