<?php
/**
 * Created by PhpStorm.
 * User: sERAPH1
 * Date: 27/07/2018
 * Time: 14:39
 */

namespace Seraph\Bundle\MediaBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="directory")
 */
class Directory
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="name", type="string", length=255)
     */
    protected $name;

    /**
     * @ORM\ManyToOne(targetEntity="Directory", inversedBy="childrens")
     */
    protected $parent;

    /**
     * @ORM\OneToMany(targetEntity="Directory", mappedBy="parent")
     */
    protected $childrens;

    /**
     * @ORM\OneToMany(targetEntity="UploadedFile", mappedBy="directory")
     */
    protected $uploadedFiles;

    /**
     * @ORM\Column(name="position", type="integer")
     */
    protected $position;

    /**
     * @ORM\Column(name="depth", type="integer")
     */
    protected $depth;

    /**
     * @ORM\Column(name="left", type="integer")
     */
    protected $left;

    /**
     * @ORM\Column(name="right", type="integer")
     */
    protected $right;

    public function __construct()
    {
        $this->childrens = new ArrayCollection();
        $this->uploadedFiles = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Directory
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return Directory
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * @param mixed $parent
     * @return Directory
     */
    public function setParent($parent)
    {
        $this->parent = $parent;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getChildrens()
    {
        return $this->childrens;
    }

    /**
     * @param mixed $childrens
     * @return Directory
     */
    public function setChildrens($childrens)
    {
        $this->childrens = $childrens;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @param mixed $position
     * @return Directory
     */
    public function setPosition($position)
    {
        $this->position = $position;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDepth()
    {
        return $this->depth;
    }

    /**
     * @param mixed $depth
     * @return Directory
     */
    public function setDepth($depth)
    {
        $this->depth = $depth;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLeft()
    {
        return $this->left;
    }

    /**
     * @param mixed $left
     * @return Directory
     */
    public function setLeft($left)
    {
        $this->left = $left;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRight()
    {
        return $this->right;
    }

    /**
     * @param mixed $right
     * @return Directory
     */
    public function setRight($right)
    {
        $this->right = $right;
        return $this;
    }

    public function removeChildren(Directory $children)
    {
        $this->childrens->removeElement($children);
        $children->setParent(null);
    }

    public function addChildren(Directory $children)
    {
        $children->setParent($this);
        $this->childrens->add($children);
    }

    public function removeUploadedFile(UploadedFile $file)
    {
        $this->uploadedFiles->removeElement($file);
        $file->setDirectory(null);
    }

    public function addUploadFile(UploadedFile $file)
    {
        $file->setDirectory($this);
        $this->uploadedFiles->add($file);
    }
}