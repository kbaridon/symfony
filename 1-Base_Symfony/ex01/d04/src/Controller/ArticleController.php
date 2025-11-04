<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
	#[Route('/e01', name: 'main_page')]
	public function mainPage(): Response
	{
		$articles = ['gull', "coffee", "tea"];
		return $this->render('article/main.html.twig', [
			'articles' => $articles
		]);
	}

	#[Route('/e01/{article}', name: "show_article")]
	public function showArticle(string $article): Response
	{
		$validArticles = ['gull', 'coffee', 'tea'];
		if (!in_array($article, $validArticles))
			return $this->redirectToRoute('main_page');
		return $this->render('article/article.html.twig', [
			'article' => $article
		]);
	}
}

?>