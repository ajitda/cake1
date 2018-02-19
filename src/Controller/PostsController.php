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

	public function view($id = Null)
	{
		$post = $this->Posts->get($id);
		$this->set('post', $post);
	}

	public function edit($id = Null){
		$post = $this->Posts->get($id);
		if($this->request->is(['post', 'put'])){
			$this->Posts->patchEntity($post, $this->request->getData());
			if($this->Posts->save($post)){
				$this->Flash->success('Post Updated Successfully', ['key'=> 'message']);
				return $this->redirect(['action'=>'index']);
			}
			$this->Flash->error(__('Unable to update your post!'));
		}
		$this->set('post', $post);
	}

	public function delete($id=Null)
	{
		$this->request->allowMethod(['post', 'delete']);
		$post= $this->Posts->get($id);
		if($this->Posts->delete($post)){
			$this->Flash->success('Post Deleted Successfully', ['key'=> 'message']);
			return $this->redirect(['action'=> 'index']);
		}
	}
}