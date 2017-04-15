<?php
class Wangxp_Helloworld_Model_Wxpblogposts extends Mage_Core_Model_Abstract 
{
    protected function _construct()
    {
        $this->_init('helloworld/wxpblogposts');
    }

    public function test(){
    	echo 12121;
    }   
}