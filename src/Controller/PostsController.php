<?php

namespace App\Controller;
use App\Controller\AppController;

/**
* 
*/
class PostsController extends AppController
{
	
	public function index()
	{
		$this->set('posts', $this->Posts->find('all'));

	}

	public function add()
	{
		$post = $this->Posts->newEntity();
		if($this->request->is($post)){
			$post = $this->Posts->patchEntity($post, $this->request->getData());
			if($this->Posts->save($post)){
				$this->Flash->success('Post Added Successfully', ['key'=> 'message']);
				return $this->redirect(['action'=>'index']);
			}
			$this->Flash->error(__('Unable to add your post!'));
		}
		$this->set('post', $post);
	}
}