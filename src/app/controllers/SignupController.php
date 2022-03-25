<?php
// session_start();

use Phalcon\Http\Request;
use Phalcon\Escaper;
use Phalcon\Mvc\Controller;


class SignupController extends Controller
{
    public function indexAction()
    {
    }
    public function subAction(){
        $request = new Request();
        $user = new Users();
        if (true === $request->isPost('submit')) {
        $username = $request->get('username');
        $password = $request->get('password');
        $check = $request->get('check');
        // echo $check;
        // $data = $this->model('Users')::find_by_username($username);
        // $data = Users::query()
        // ->insert
        // ->where("username = '$username'")
        // ->andWhere("password = '$password'")
        // ->execute();
        // print_r($data);
        $escaper = new Escaper();
        $inputdata = array(
            "username" => $escaper->escapeHtml($this->request->getPost('username'),),
            "password" => $escaper->escapeHtml($this->request->getPost('password'),)

        );
        $user->assign(
            $inputdata,
            [
            'username',
            'password'
            ]
        );
        $user->save();
        // echo "done";
        // die();


        }

    }
}