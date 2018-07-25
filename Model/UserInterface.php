<?php
/**
 * Created by PhpStorm.
 * User: sERAPH1
 * Date: 25/07/2018
 * Time: 10:25
 */

namespace Seraph\Bundle\MediaBundle\Model;


interface UserInterface
{
    public function getFiles();

    public function setFiles($file);

    public function removeFile($file);

    public function addFile($file);
}