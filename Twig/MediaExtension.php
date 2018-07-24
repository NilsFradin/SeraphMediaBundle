<?php
/**
 * Created by PhpStorm.
 * User: sERAPH1
 * Date: 24/07/2018
 * Time: 12:16
 */

namespace Seraph\Bundle\MediaBundle\Twig;


use Seraph\Bundle\MediaBundle\Entity\Group;
use Seraph\Bundle\MediaBundle\Entity\UploadedFile;
use Seraph\Bundle\MediaBundle\Entity\User;
use Symfony\Bridge\Doctrine\ManagerRegistry;

class MediaExtension extends \Twig_Extension
{
    public function getFunctions()
    {
        new \Twig_Function('seraph_get_media', array($this, 'getMedia'), array('needs_environement' => true, 'is_safe' => array('html')));
    }

    protected $registry;
    protected $twig;

    public function __construct(ManagerRegistry $registry, \Twig_Environment $twig)
    {
        $this->registry = $registry;
        $this->twig = $this;
    }

    public function getMedia(Group $group = null, User $user = null)
    {
        $repository = $this->registry->getRepository(UploadedFile::class);
        $qb = $repository->createQueryBuilder('u')
            ->andWhere('u.group = :group')
            ->setParameter('group', $group)
            ->andWhere('u.user = :user')
            ->setParameter('user', $user)
            ->getQuery();

        return $medias = $qb->execute();
    }

}