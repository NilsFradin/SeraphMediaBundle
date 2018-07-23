<?php
/**
 * Created by PhpStorm.
 * User: sERAPH1
 * Date: 23/07/2018
 * Time: 14:55
 */

namespace Seraph\Bundle\MediaBundle\Controller;

use Doctrine\Common\Persistence\ManagerRegistry;
use Seraph\Bundle\MediaBundle\Entity\UploadedFile;
use Seraph\Bundle\MediaBundle\Form\UploadedFileType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class UploadedFileController extends Controller
{
    /**
     * @Route(name="seraph-list-file", path="/media/file/list"
     */
    public function listFile(ManagerRegistry $registry)
    {
        $repository = $registry->getRepository(UploadedFile::class);
        $files = $repository->findAll();

        return $this->render('@SeraphMedia/back/file/list.html.twig', array('files' => $files));
    }

    /**
     * @Route(name="seraph-add-file", path="/media/file/add")
     */
    public function addFile(ManagerRegistry $registry, Request $request)
    {
        $file = new UploadedFile();

        $form = $this->createForm(UploadedFileType::class, $file);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $registry->getManager()->persist($file);
            $registry->getManager()->flush();

            return $this->redirectToRoute('seraph-list-file');
        }

        return $this->render('@SeraphMedia/back/file/modify.html.twig', array('form' => $form->createView()));
    }

    /**
     * @Route(name="seraph-edit-file", path="/media/file/edit/{id_file}")
     */
    public function editFile(ManagerRegistry $registry, Request $request, $id_file)
    {
        $repository = $registry->getRepository(UploadedFile::class);
        $file = $repository->find($id_file);

        $form = $this->createForm(UploadedFileType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $registry->getManager()->persist($file);
            $registry->getManager()->flush();

            return $this->redirectToRoute('seraph-list-file');
        }

        return $this->render('@SeraphMedia/back/file/modify.html.twig', array('form' => $form->createView()));
    }

    /**
     * @Route(name="seraph-delete-file", path="/media/file/delete/{id_file}")
     */
    public function deleteFile(ManagerRegistry $registry, $id_file)
    {
        $repository = $registry->getRepository(UploadedFile::class);
        $file = $repository->find($id_file);

        $registry->getManager()->remove($file);
        $registry->getManager()->flush();

        return $this->redirectToRoute('seraph-list-file');
    }
}