<?php

class Wangxp_Helloworld_Model_Resource_Wxpblogposts extends Mage_Core_Model_Mysql4_Abstract
{
    /**
     * Initialize resource model
     *
     */
    protected function _construct()
    {
        $this->_init('helloworld/wxpblogposts', 'blogpost_id');
    }

    public function test(){
    	echo "blogpost_id";
    }
}