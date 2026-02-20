<?php

class Task
{
    private $id;
    private $title;
    private $description;
    private $deadline;
    private $is_done;

    public function getIconStatus()
    {
        $iconStatus = $this->getIs_done() ? '☑' : '☐';

        return $iconStatus;
    }
    
    public function getIntervalBeforeDeadline()
    {
        $now = new DateTime();
        $date = new DateTime($this->deadline);

        $interval = $date->diff($now);
        
        return $interval->days + 1;
    }

    public function getFormatedDeadline()
    {
        $date = new DateTime($this->getDeadline());
        $formatedDate = $date->format('d/m/Y');

        return $formatedDate;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of title
     */ 
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */ 
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of deadline
     */ 
    public function getDeadline()
    {
        return $this->deadline;
    }

    /**
     * Set the value of deadline
     *
     * @return  self
     */ 
    public function setDeadline($deadline)
    {
        $this->deadline = $deadline;

        return $this;
    }

    /**
     * Get the value of is_done
     */ 
    public function getIs_done()
    {
        return $this->is_done;
    }

    /**
     * Set the value of is_done
     *
     * @return  self
     */ 
    public function setIs_done($is_done)
    {
        $this->is_done = $is_done;

        return $this;
    }
}
