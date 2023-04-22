<?php

namespace App\Controllers;
use App\Models\RecordModel;

class Record extends BaseController
{

    public function index()
    {
        $model=new RecordModel();
        $data['posts']=$model->get();
        echo view('header');
        echo view('user');
        echo view('menu');
        echo view('Record/all',$data);
        echo view('footer');
    }
    
    public function add()
    {
        $model=new RecordModel();
        if($this->request->getmethod()==='post' && $this->validate(['image'=>'required']))
        {
            $model->save(['image'=>$this->request->getpost('image'),'user'=>$this->request->getpost('user'),'user=>1']);
            $nombre_archivo=$_FILES['userfile']['name'];
            $tipo_archivo=$_FILES['userfile']['type'];
            $tamano_archivo=$_FILES['userfile']['size'];
            if(!((strpos($tipo_archivo,"png") || strpos($tipo_archivo,"jpg") || strpos($tipo_archivo,"jpeg")) && ($tamano_archivo<100000000000))){
                echo "La extensión o el tamaño de los archivos no es correcta. <br><br><table><tr><td><li>Se permiten archivos .gif o .jpg<br><li>se permiten archivos de 100 Kb máximo.</td></tr></table>";
            }else{
                if(move_uploaded_file($_FILES['userfile']['tmp_name'],$nombre_archivo)){
                    echo "El archivo ha sido cargado correctamente.";
                }else{
                    echo "Ocurrió algún error al subir el fichero. No pudo guardarse.";
                }
            }
        }
        return redirect()->to(base_url().'/record');
    }

    public function edit($id)
    {
        $model=new RecordModel();
        if($this->request->getmethod()==='post' &&  $this->validate(['image'=>'required']))
        {
            $model->save(['id'=>$this->request->getpost('id'),'image'=>$this->request->getpost('image')]);
            return redirect()->to(base_url().'/record');
        }
        else
        {
            $data['posts']=$model->get($id);
            echo view('header');
            echo view('user');
            echo view('Record/edit',$data);
            echo view('footer');
        }
    }

    public function delete($id)
    {
        $model=new RecordModel();
        $model->delete($id);
        return redirect()->to(base_url().'/record');
    }
    
}