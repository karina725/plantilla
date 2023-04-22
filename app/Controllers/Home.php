<?php

namespace App\Controllers;
use App\Models\UserModel;

class Home extends BaseController
{

    public function index()
    {
        echo view('header');
        echo view('user');
        echo view('menu');
        echo view('home');
        echo view('footer');
    }
    
    public function login()
    {
        $model=new UserModel();
        if($this->request->getMethod()==='post' && $this->validate(['login'=>'required','password'=>'required']))
        {
            $user=$model->login(['login'=>$this->request->getPost('login'),'password'=>$this->request->getPost('password')]);
            if(isset($user))
            {
                session()->set(['user'=>$user['id'],'name'=>$user['name'],'admin'=>$user['admin']]);
                return redirect()->to(base_url().'/publication');
            }
            session()->setFlashdata('login_error','Los datos ingresados no son correctos.');
            return redirect()->to(base_url());
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url());
    }

}