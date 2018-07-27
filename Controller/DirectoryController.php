<?php
/**
 * Created by PhpStorm.
 * User: sERAPH1
 * Date: 27/07/2018
 * Time: 15:08
 */

namespace Seraph\Bundle\MediaBundle\Controller;


use Seraph\Bundle\MediaBundle\Entity\Directory;
use Seraph\Bundle\MediaBundle\Form\Type\DirectoryType;
use Symfony\Bridge\Doctrine\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DirectoryController extends Controller
{
    /**
     * @Route(name="seraph-list-directory", path="/media/directory/list")
     */
    public function listDirectory(ManagerRegistry $registry)
    {
        $repository = $registry->getRepository(Directory::class);
        $directories = $repository->findAll();

        return $this->render('', array('directories' => $directories));
    }

    /**
     * @Route(name="seraph-add-directory", path="/media/directory/add")
     */
    public function addDirectory(ManagerRegistry $registry, Request $request)
    {
        $directory = new Directory();
        $form = $this->createForm(DirectoryType::class, $directory);

        $em = $registry->getManager();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $em->persist($directory);
            $em->flush();

            return $this->redirectToRoute('seraph-list-directory');
        }
        return $this->render('', array('form' => $form->createView()));

    }

    /**
     * @Route(name="seraph-edit-directory", path="/media/directory/edit/{id_directory}")
     */
    public function editDirectory(ManagerRegistry $registry, Request $request, $id_directory)
    {
        $repository = $registry->getRepository(Directory::class);
        $directory = $repository->find($id_directory);

        $form = $this->createForm(DirectoryType::class, $directory);
        $em = $registry->getManager();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $em->persist($directory);
            $em->flush();

            return $this->redirectToRoute('seraph-list-directory');
        }
        return $this->render('', array('form' => $form->createView()));

    }

    /**
     * @Route(name="seraph-delete-directory", path="/media/directory/delete/{id_directory}")
     */
    public function deleteDirectory(ManagerRegistry $registry, $id_directory)
    {
        $repository = $registry->getRepository(Directory::class);
        $em = $registry->getManager();

        $directory = $repository->find($id_directory);
        $em->remove($directory);
        $em->flush();

        return $this->redirectToRoute('seraph-list-directory');
    }
}