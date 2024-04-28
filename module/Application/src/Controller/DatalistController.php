<?php

declare(strict_types=1);

namespace Application\Controller;

use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;

class DatalistController extends AbstractActionController
{
    public function searchAction()
    {
        $query = $this->params()->fromQuery('station');

        $results = [];
        if (($handle = fopen("data/stations.csv", "r")) !== false) {
            while (($data = fgetcsv($handle, 1000, ",")) !== false) {
                $results[$data[0]] = $data[1];
            }
            fclose($handle);
        }
        $view = new ViewModel([
            'results' => $results,
        ]);
        $view->setTerminal(true);

        return $view;
    }
}
