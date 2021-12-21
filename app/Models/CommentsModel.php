<?php

namespace App\Models;

use CodeIgniter\Model;

class CommentsModel extends Model
{
    protected $table = 'comments';
    protected $allowedFields = ['author', 'comments', 'article_id'];
    public function getComments($id = false){
        if ($id === false){

        return $this->findAll();
        } else {
        return $this->getWhere(['id' => $id]);
    }

}

    }
   