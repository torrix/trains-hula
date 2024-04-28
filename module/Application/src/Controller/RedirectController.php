<?php

declare(strict_types=1);

namespace Application\Controller;

use Laminas\Http\Response;
use Laminas\Mvc\Controller\AbstractActionController;

class RedirectController extends AbstractActionController
{
    public function redirectAction(): Response
    {
        return $this->redirect()->toRoute('station', [
            'station' => $this->params()->fromPost('station'),
        ]);
    }
}
