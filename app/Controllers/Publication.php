<?php

namespace App\Controllers;
use App\Models\PublicationModel;

class Publication extends BaseController
{

    public function index()
    {
        $model=new PublicationModel();
        $data['posts']=$model->get();
        echo view('header');
        echo view('user');
        echo view('menu');
        echo view('Publication/all',$data);
        echo view('footer');
    }

    public function add()
    {
        $model=new PublicationModel();
        if($this->request->getmethod()==='post' && $this->validate(['content'=>'required']))
        {
            $model->save(['content'=>$this->request->getpost('content'),'user'=>$this->request->getpost('user'),'user=>1']);
        }
        return redirect()->to(base_url().'/publication');
    }

    public function edit($id)
    {
        $model=new PublicationModel();
        if($this->request->getmethod()==='post' &&  $this->validate(['content'=>'required']))
        {
            $model->save(['id'=>$this->request->getpost('id'),'content'=>$this->request->getpost('content')]);
            return redirect()->to(base_url().'/publication');
        }
        else
        {
            $data['posts']=$model->get($id);
            echo view('header');
            echo view('user');
            echo view('Publication/edit',$data);
            echo view('footer');
        }
    }

    public function delete($id)
    {
        $model=new PublicationModel();
        $model->delete($id);
        return redirect()->to(base_url().'/publication');
    }

}