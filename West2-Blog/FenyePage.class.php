<?php

class FenyePage{
    
    public $pageSize = 6;
    public $res_array;
    public $rowCount;
    public $pageNow = 1;
    public $pageCount;
    public $navigate;
    public $gotoUrl = 'index.php';

    /**
     * @return the $pageSize
     */
    public function getPageSize()
    {
        return $this->pageSize;
    }

    /**
     * @return the $res_array
     */
    public function getRes_array()
    {
        return $this->res_array;
    }

    /**
     * @return the $rowCount
     */
    public function getRowCount()
    {
        return $this->rowCount;
    }

    /**
     * @return the $pageNow
     */
    public function getPageNow()
    {
        return $this->pageNow;
    }

    /**
     * @return the $pageCount
     */
    public function getPageCount()
    {
        return $this->pageCount;
    }

    /**
     * @return the $navigate
     */
    public function getNavigate()
    {
        return $this->navigate;
    }

    /**
     * @return the $gotoUrl
     */
    public function getGotoUrl()
    {
        return $this->gotoUrl;
    }

    /**
     * @param number $pageSize
     */
    public function setPageSize($pageSize)
    {
        $this->pageSize = $pageSize;
    }

    /**
     * @param field_type $res_array
     */
    public function setRes_array($res_array)
    {
        $this->res_array = $res_array;
    }

    /**
     * @param field_type $rowCount
     */
    public function setRowCount($rowCount)
    {
        $this->rowCount = $rowCount;
    }

    /**
     * @param number $pageNow
     */
    public function setPageNow($pageNow)
    {
        $this->pageNow = $pageNow;
    }

    /**
     * @param field_type $pageCount
     */
    public function setPageCount($pageCount)
    {
        $this->pageCount = $pageCount;
    }

    /**
     * @param field_type $navigate
     */
    public function setNavigate($navigate)
    {
        $this->navigate = $navigate;
    }

    /**
     * @param field_type $gotoUrl
     */
    public function setGotoUrl($gotoUrl)
    {
        $this->gotoUrl = $gotoUrl;
    }

    
}