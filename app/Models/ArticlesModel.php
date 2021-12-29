<?php

namespace App\Models;

use CodeIgniter\Model;

class ArticlesModel extends Model
{
    protected $table = 'articles';
    public function getArticles($id = false){
        if ($id === false){

        return $this->findAll();
        } 
        return $this->where(['id' => $id])->first();
    }
    public function searchArticles($phrase = null){
        $builder = $this->db->table("articles");

		$builder->select('*');
        $builder->like('category','%' . $phrase . '%','after');
        $builder->orlike('name','%' . $phrase . '%','after');
		$query = $builder->get();
        return $query->getResultArray();
    }
    
    }
   

