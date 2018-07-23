<?php
/**
 * Created by PhpStorm.
 * User: sERAPH1
 * Date: 23/07/2018
 * Time: 10:29
 */

namespace Seraph\Bundle\MediaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity
 * @ORM\Table(name="uploaded_file")
 * @Vich\Uploadable
 */
class UploadedFile
{
    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $name;

    /**
     * @ORM\UploadableField(mapping="uploaded_file_name", fileNameProperty="name")
     */
    protected $file;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $updateAt;

    /**
     * @ORM\ManyToOne(targetEntity="Group", inversedBy="")
     * @ORM\JoinColumn(name="group_id", referencedColumnName="id")
     */
    protected $group;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $user;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return UploadedFile
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @param mixed $file
     * @return UploadedFile
     */
    public function setFile(File $file = null)
    {
        $this->file = $file;

        if($file){
            $this->updateAt = new \DateTime('now');
        }
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUpdateAt()
    {
        return $this->updateAt;
    }

    /**
     * @param mixed $updateAt
     * @return UploadedFile
     */
    public function setUpdateAt($updateAt)
    {
        $this->updateAt = $updateAt;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * @param mixed $group
     * @return UploadedFile
     */
    public function setGroup($group)
    {
        $this->group = $group;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     * @return UploadedFile
     */
    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }
}