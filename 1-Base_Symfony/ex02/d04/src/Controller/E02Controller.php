<?php

namespace App\Controller;

use App\Form\MessageType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class E02Controller extends AbstractController
{
    #[Route('/e02', name: 'app_e02')]
    public function index(Request $request): Response
    {
        $form = $this->createForm(MessageType::class);
        $form->handleRequest($request);

        $fileName = $this->getParameter('notes_file_name');
        $filePath = $this->getParameter('kernel.project_dir') . '/' . $fileName;

        $lastLine = null;

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            if (!file_exists($filePath))
                file_put_contents($filePath, '');

            $line = $data['message'];
            if ($data['includeTimestamp'])
                $line .= ' [' . date('Y-m-d H:i:s') . ']';
            $line .= PHP_EOL;

            file_put_contents($filePath, $line, FILE_APPEND);

            $lastLine = trim($line);

            return $this->redirectToRoute('app_e02', [
                'message' => $data['message'],
                'includeTimestamp' => $data['includeTimestamp'] ? 'yes' : 'no',
                'last' => urlencode($lastLine),
            ]);
        }

        if ($request->query->has('last'))
            $lastLine = urldecode($request->query->get('last'));

        return $this->render('e02/index.html.twig', [
            'form' => $form->createView(),
            'lastLine' => $lastLine,
        ]);
    }
}

?>