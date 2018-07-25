<?php
/**
 * Created by PhpStorm.
 * User: sERAPH1
 * Date: 25/07/2018
 * Time: 10:26
 */

namespace Seraph\Bundle\MediaBundle\Model;


interface GroupInterface
{
    public function getFiles();

    public function setFiles($file);

    public function removeFile($file);

    public function addFile($file);
}