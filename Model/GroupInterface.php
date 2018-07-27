<?php

namespace Seraph\Bundle\MediaBundle\Model;


interface GroupInterface
{
    public function getFiles();

    public function setFiles($file);

    public function removeFile($file);

    public function addFile($file);
}