<?php

namespace Seraph\Bundle\MediaBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use FOS\UserBundle\Model\Group as BaseGroup;
use Doctrine\ORM\Mapping as ORM;
use Seraph\Bundle\MediaBundle\Form\Type\UploadedFileType;

/**
 * @ORM\Entity
 * @ORM\Table(name="group")
 */
class Group extends BaseGroup
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToMany(targetEntity="UploadedFile", mappedBy="group")
     */
    protected $files;

    public function __construct()
    {
        $this->files = new ArrayCollection();
    }

    /**s
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Group
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }


    /**
     * @return mixed
     */
    public function getFiles()
    {
        return $this->files;
    }

    /**
     * @param mixed $files
     * @return Group
     */
    public function setFiles($files)
    {
        $this->files = $files;
        return $this;
    }

    public function removeFile(UploadedFile $file)
    {
        $this->files->removeElement($file);
        $file->setGroup(null);
    }

    public function addFile(UploadedFile $file)
    {
        $file->setGroup($this);
        $this->files->add($file);
    }
}