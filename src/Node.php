<?php
namespace Wandu\Mecab;

class Node
{
    /** @var string */
    public $surface;
    
    /** @var string */
    public $feature;
    
    /** @var int */
    public $id;
    
    /** @var int */
    public $length;
    
    /** @var int */
    public $rlength;
    
    /** @var int */
    public $rcAttr;
    
    /** @var int */
    public $lcAttr;
    
    /** @var int */
    public $posid;
    
    /** @var int */
    public $char_type;
    
    /** @var int */
    public $stat;
    
    /** @var boolean */
    public $isbest;
    
    /** @var double */
    public $alpha;

    /** @var double */
    public $beta;

    /** @var double */
    public $prob;

    /** @var int */
    public $wcost;

    /** @var int */
    public $cost;
    
    /** @var array */
    private $tags;
    
    public function __construct(array $attributes = [])
    {
        foreach ($attributes as $name => $attribute) {
            $this->{$name} = $attribute;
        }
    }

    /**
     * @return string
     */
    public function getSurface()
    {
        return $this->surface;
    }

    /**
     * @return string
     */
    public function getFeature()
    {
        return $this->feature;
    }

    /**
     * @return int
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * @return int
     */
    public function getStatus()
    {
        return $this->stat;
    }

    /**
     * @param string $tag
     * @return boolean
     */
    public function hasTag($tag)
    {
        if (!isset($this->tags)) {
            if ($this->feature) {
                $this->tags = explode(',', $this->feature);
            } else {
                $this->tags = [];
            }
        }
        return in_array($tag, $this->tags);
    }
}
