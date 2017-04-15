<?php

Class Wangxp_Helloworld_IndexController extends Mage_Core_Controller_Front_Action{


    //测试的首页
    public function indexAction(){
    	//Mage::app()->cleanCache();
    	echo "indexAction";
    	$this->loadLayout();
   	 	$this->renderLayout();
    }
     //测试的首页
    public function testModelAction(){
    	echo "testModelAction";
    	echo "<hr/>1<br/>";
    	$getModel = Mage::getModel('helloworld/wxpblogposts');
    	echo get_class($getModel)."----";
    	echo "<hr/>2<br/>";
    	$getModel->test();
    	echo "<hr/>3<br/>";
    	//$getResourceModel = Mage::getResourceModel('helloworld/wxpblogposts');
    	//$getResourceModel->test();
    	//echo get_class($getResourceModel)."----";
    	echo "<hr/>4<br/>";
     	
     	 $this->selectNewPostAction();  //查询
	    //$this->createNewPostAction(); //添加操作
	    //$this->editFirstPostAction(); //修改
     	$this->deleteFirstPostAction(); // 删除
	    
    }

    // 查询
    public function selectNewPostAction() {
    	$getModel = Mage::getModel('helloworld/wxpblogposts');
	   	$params = $this->getRequest()->getParams();                 // 获取参数的一种方式
	    echo("Loading the blogpost with an ID of ".$params['id']);
	    $getModel->load($params['id']);         // 出入 定义的字段与 id 数据库相等的数据      
	    // $data = $getModel->getData();
	    // var_dump($data); 
	    // echo "<hr/>5<br/>";
	   	// $OrigData = $getModel->getOrigData("title");
	   	// var_dump($OrigData);
	   	// var_dump($getModel->getBlogpostId());
	   	// var_dump($getModel->getTitle());		// 获取数据表中的 title 方法一
	   	// var_dump($getModel['title']);		// 获取数据表中的 title 方法二
	   	// $getModel->setData("title","123");   // 设置数据表中的 title
	   	// var_dump($getModel['title']);        // 获取数据表中的 title 方法三
	   	// $data = $getModel->getData();
	    // var_dump($data); 
	    $getModel->offsetSet("a",array("asas","dss")); // 随意的设置data中的值
	    $data = $getModel->getData();
	    var_dump($data); 
	}

    // 添加操作
    public function createNewPostAction() {
	    $getModel = Mage::getModel('helloworld/wxpblogposts');
	    $getModel->setTitle('Code Post!');
	    $getModel->setPost('This post was created from code!');
	    $getModel->save();
	    echo 'post created';
	}

	//修改
	public function editFirstPostAction() {
	   	$getModel = Mage::getModel('helloworld/wxpblogposts');
	    $getModel->load(1);   // 未制定，就是添加操作了
	    $getModel->setTitle("The First post11!");
	    $getModel->save();
	    echo 'post edited';
	}

	// 删除
	public function deleteFirstPostAction() {
	   	$getModel = Mage::getModel('helloworld/wxpblogposts');
	    $getModel->load(4);
	    $getModel->delete();
	    echo 'post removed';
	}

	// 获取数据模型数组
	public function showAllAction() {
		$getModel = Mage::getModel('helloworld/wxpblogposts');
		echo 1111;
	    $posts = $getModel->getCollection();          // 需要在resource下加入 Wxpblogposts/Collection.php 文件
	    foreach($posts as $blog_post){
	    	$data[] = $blog_post->getData();
	        echo '<h3>'.$blog_post->getTitle().'</h3>';
	        echo nl2br($blog_post->getPost());
	    }
	    echo "<pre>";
	    print_r($data);
	}
}