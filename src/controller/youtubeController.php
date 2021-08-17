<?php

namespace Myyoutubemc\Controller;

use GuzzleHttp\Subscriber\Redirect;
use Myyoutubemc\Entity\YoutubeComment;
use Myyoutubemc\Forms\YoutubeType;
use PrestaShopBundle\Controller\Admin\FrameworkBundleAdminController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class YoutubeController extends FrameworkBundleAdminController
{

    public function demoAction()
    {
        return new Response('Hello Youtubers');
        // return $this->render('@Modules/your-module/templates/admin/demo.html.twig');
    }
    public function listAction()
    {
        $em = $this->getDoctrine()->getManager();
        $data = $em->getRepository(YoutubeComment::class)->findAll();
        return $this->render(
            '@Modules/myyoutubemc/templates/admin/list.html.twig',
            [
                'data' => $data
            ]
        );
    }


    // delete
    public function deleteAction(int $id)
    {
        $em = $this->getDoctrine()->getManager();
        $youtubeComment = $em->getRepository(YoutubeComment::class)->findOneBy(['id' => $id]);
        if ($youtubeComment) {
            $em->remove($youtubeComment);
            $em->flush();
            $this->addFlash(
                'success',
                'Comment deleted successfully'
            );
        }

        return $this->redirectToRoute('youtube-list');
    }
    public function createAction(Request $request)
    {
        // logic to store the data to the DB
        $em = $this->getDoctrine()->getManager();
        // if edit
        if ($id = $request->get('id')) {
            dump($request->get('id'));
            $youtubeComment = $this->getDoctrine()
            ->getRepository(YoutubeComment::class)
            ->find($id);
            
            // $em->getRepository(YoutubeComment::class)->findOneBy(["id_product_comment" => $id]);
            dump($youtubeComment);
            $form = $this->createForm(YoutubeType::class, $youtubeComment);
        } else
            $form = $this->createForm(YoutubeType::class);
        $form->handleRequest($request);

        // logic of form handling
        if (
            $form->isSubmitted()
            && $form->isValid()
        ) {
            // prepare the object that will be saved to the DB
            $youtubeComment = new YoutubeComment();
            $youtubeComment->setProductId($form->get('id_product')->getData());
            $youtubeComment->setCustomerName($form->get('customer_name')->getData());
            $youtubeComment->setTitle($form->get('title')->getData());
            $youtubeComment->setContent($form->get('content')->getData());
            $youtubeComment->setGrade($form->get('grade')->getData());

            // persist the data
            $em->persist($youtubeComment);
            $em->flush();
        }

        return $this->render(
            '@Modules/myyoutubemc/templates/admin/create.html.twig',
            [
                'form' => $form->createView()
            ]
        );
    }
}
