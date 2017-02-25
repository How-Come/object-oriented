<?php

class Blog_Sign{

    private $id;
    private $blog_id;
    private $sign_id;
    private $type;
    /**
     * @return the $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return the $blog_id
     */
    public function getBlog_id()
    {
        return $this->blog_id;
    }

    /**
     * @return the $sign_id
     */
    public function getSign_id()
    {
        return $this->sign_id;
    }

    /**
     * @return the $type
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param field_type $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param field_type $blog_id
     */
    public function setBlog_id($blog_id)
    {
        $this->blog_id = $blog_id;
    }

    /**
     * @param field_type $sign_id
     */
    public function setSign_id($sign_id)
    {
        $this->sign_id = $sign_id;
    }

    /**
     * @param field_type $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

}