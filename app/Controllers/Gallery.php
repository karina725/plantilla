<?php

namespace App\Controllers;
use App\Models\GalleryModel;

class Gallery extends BaseController
{

    public function index()
    {
        $model=new GalleryModel();
        $data['posts']=$model->get();
        echo view('header');
        echo view('user');
        echo view('menu');
        echo view('Gallery/all',$data);
        echo view('footer');
    }
    
}