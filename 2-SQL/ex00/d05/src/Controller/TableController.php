<?php

	namespace App\Controller;

	use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
	use Symfony\Component\HttpFoundation\Response;
	use Symfony\Component\Routing\Annotation\Route;
	use Doctrine\DBAL\Connection;

	class TableController extends AbstractController
	{
		private $connection;

		public function __construct(Connection $connection)
		{
			$this->connection = $connection;
		}

		#[Route('/e00', name: 'app_e00')]
		public function createTable(): Response
		{
			try {
				$sql = 'CREATE TABLE IF NOT EXISTS users (
							id INT AUTO_INCREMENT PRIMARY KEY,
							username VARCHAR(255) UNIQUE,
							name VARCHAR(255),
							email VARCHAR(255) UNIQUE,
							enable BOOLEAN,
							birthdate DATETIME,
							address TEXT
						)';
				
				$this->connection->executeStatement($sql);
				
				return new Response('<html><body>Success !</body></html>');
			} catch (\Exception $e) {
				return new Response('<html><body>Error : '.$e->getMessage().'</body></html>');
			}
		}
	}

?>