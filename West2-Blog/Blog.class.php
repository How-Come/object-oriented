<?php

class Blog{

    private $id;
    private $title;
    private $author;
    private $content;
    private $statue;
    private $uptime;
    private $changtime;
    /**
     * @return the $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return the $title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return the $author
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @return the $content
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @return the $statue
     */
    public function getStatue()
    {
        return $this->statue;
    }

    /**
     * @return the $uptime
     */
    public function getUptime()
    {
        return $this->uptime;
    }

    /**
     * @return the $changtime
     */
    public function getChangtime()
    {
        return $this->changtime;
    }

    /**
     * @param field_type $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param field_type $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @param field_type $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    /**
     * @param field_type $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @param field_type $statue
     */
    public function setStatue($statue)
    {
        $this->statue = $statue;
    }

    /**
     * @param field_type $uptime
     */
    public function setUptime($uptime)
    {
        $this->uptime = $uptime;
    }

    /**
     * @param field_type $changtime
     */
    public function setChangtime($changtime)
    {
        $this->changtime = $changtime;
    }

    
}