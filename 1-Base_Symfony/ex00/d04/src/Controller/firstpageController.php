<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class firstpageController
{
	#[Route('/e00/firstpage')]
	public function string(): Response
	{
		return new Response(
			'<html><body>Hello world!</body></html>'
		);
	}
}

?>