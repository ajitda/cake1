<?php

namespace App\Controller;
use App\Controller\AppController;
use Cake\Routing\Router;
/**
* 
*/
class PostsController extends AppController
{
	public function initialize()
	{
		parent::initialize();
		$this->loadModel('Posts');
	}

	public function index()
	{
		$this->set('posts', $this->Posts->find('all'));

	}

	public function add()
	{
		//$post = $this->Posts->newEntity();
		$post = '';
		if($this->request->is('post')){
			//$post = $this->Posts->patchEntity($post, $this->request->getData());
			if(!empty($this->request->data['file']['name'])){
				$filename = $this->request->data['file']['name'];
				$url = Router::url('/', true).'img/'.$filename;
				$current_file = 'img/'.$filename;
				//print_r($url);
				//exit();
				$tmp_file = $this->request->data['file']['tmp_name'];
				if(move_uploaded_file($tmp_file, $current_file)){
					$post = $this->Posts->newEntity();
					$post->title = $this->request->data['title'];
					$post->description = $this->request->data['description'];
					$post->path = $url;
					$post->created= date("Y-m-d H:i:s");
					$post->modified= date("Y-m-d H:i:s");
					if($this->Posts->save($post)){
						$this->Flash->success('Post Added Successfully', ['key'=> 'message']);
						return $this->redirect(['action'=>'index']);
					}else{
						$this->Flash->error(__('Unable to add your post!'));
					}
				}
			}
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