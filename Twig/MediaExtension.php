<?php

namespace Seraph\Bundle\MediaBundle\Twig;

use Seraph\Bundle\MediaBundle\Entity\UploadedFile;
use Symfony\Bridge\Doctrine\ManagerRegistry;

class MediaExtension extends \Twig_Extension
{
    public function getFunctions()
    {
        return array(
            new \Twig_Function('seraph_get_media', array($this, 'getMedia'), array('needs_environement' => true, 'is_safe' => array('html')))
        );
    }

    protected $registry;
    protected $twig;

    public function __construct(ManagerRegistry $registry, \Twig_Environment $twig)
    {
        $this->registry = $registry;
        $this->twig = $this;
    }

    public function getMedia($group = null, $user = null)
    {
        $repository = $this->registry->getRepository(UploadedFile::class);
        $qb = $repository->createQueryBuilder('u');

        if ($user != null){
            $qb->andWhere('u.user = :user')
                ->setParameter('user', $user);
        }
        elseif($group != null){
            $qb->andWhere('u.group = :group')
                ->setParameter('group', $group)
                ->andWhere('u.user is null');
        }else{
            $qb->andWhere('u.group is null')
                ->andWhere('u.user is null');
        }

        $medias = $qb->getQuery()->execute();
        return $medias;
    }

}