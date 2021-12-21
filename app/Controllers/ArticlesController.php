<?php

namespace App\Controllers;

use App\Models\ArticlesModel;
use App\Models\CommentsModel;

 use CodeIgniter\Controller;

class ArticlesController extends Controller
{
    public function index()
    {

        $model = new ArticlesModel();
        $data['articles'] = $model->getArticles();
        $data['search'] = $model->searchArticles($this->request->getVar('keyword'));
        $model = new CommentsModel();
        $data['comments'] = $model->getComments();
       
       

        echo view('templates/header', $data);
        echo view('pages/home');
        echo view('templates/footer');
    }
}