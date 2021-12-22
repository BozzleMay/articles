<?php

namespace App\Controllers;

use App\Models\ArticlesModel;
use App\Models\CommentsModel;

 use CodeIgniter\Controller;

class CommentsController extends Controller

{
 public function save() {

    helper(['form', 'url']);
         
    $val = $this->validate([
        'name' => 'required',
        'comment' => 'required'
    ]);
        $model = new ArticlesModel();
       
        $commentsModel = new CommentsModel();

 
        if (!$val)
        {
            echo view('templates/header');
            echo 'This did not work';
            echo view('templates/footer');
 
            
 
        }
        else
        { 
        
        $commentData = [
            'article_id' => $this->request->getVar('articleId'),
            'author' => $this->request->getVar('name'),
        'comments' => $this->request->getVar('comment'),
       ];
        $commentsModel->insert($commentData);
        $data['articles'] = $model->getArticles();
        $data['comments'] = $commentsModel->getComments();
        $data['search'] = $model->searchArticles($this->request->getVar('keyword'));
       
        echo view('templates/header', $data, $commentData);
        echo view('pages/home');
        echo view('templates/footer');
    }
         
    }
}