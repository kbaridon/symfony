<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

class ColorController extends AbstractController
{
    #[Route('/e03', name: 'app_e03')]
    public function index(ParameterBagInterface $params): Response
    {
        $count = (int) $params->get('e03.number_of_colors');

        $generateShades = function(array $rgb, int $n) {
            $shades = [];
            for ($i = 0; $i < $n; $i++) {
                $factor = $n === 1 ? 1 : $i / ($n - 1);
                $r = (int) round($rgb[0] * $factor);
                $g = (int) round($rgb[1] * $factor);
                $b = (int) round($rgb[2] * $factor);
                $hex = sprintf('#%02x%02x%02x', $r, $g, $b);

                $luminance = 0.299 * $r + 0.587 * $g + 0.114 * $b;
                $fg = $luminance > 186 ? '#000000' : '#ffffff';

                $shades[] = ['hex' => $hex, 'fg' => $fg];
            }
            return $shades;
        };

        $colors = [
            'Black' => $generateShades([0, 0, 0], $count),
            'Red'   => $generateShades([255, 0, 0], $count),
            'Blue'  => $generateShades([0, 0, 255], $count),
            'Green' => $generateShades([0, 128, 0], $count),
        ];

        return $this->render('color/index.html.twig', [
            'colors' => $colors,
            'count' => $count,
        ]);
    }
}
