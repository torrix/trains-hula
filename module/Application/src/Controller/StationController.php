<?php

declare(strict_types=1);

namespace Application\Controller;

use Application\Helper\OpenLDBWS;
use Laminas\Mvc\Controller\AbstractActionController;
use SoapFault;

class StationController extends AbstractActionController
{
    public function indexAction()
    {
        $stationCode = strtoupper($this->params()->fromRoute('station', $_ENV['DEFAULT_STATION_CODE']));
        // TODO: redirect if lowercase

        $train = new OpenLDBWS($_ENV['OPEN_LDBWS_TOKEN']);

        try {
            $response = $train->getDepBoardWithDetails(10, $stationCode);
        } catch (SoapFault $soapFault) {
            return ['error' => 'Something went wrong: ' . $soapFault->getMessage()];
        }

        $trainServices = $response->GetStationBoardResult->trainServices->service ?? [];
        $busServices = $response->GetStationBoardResult->busServices->service ?? [];

        return [
            'stationCode' => $stationCode,
            'locationName' => $response->GetStationBoardResult->locationName,
            'messages' => $response->GetStationBoardResult->nrccMessages->message ?? [],
            'trainServices' => is_array($trainServices) ? $trainServices : [$trainServices],
            'busServices' => is_array($busServices) ? $busServices : [$busServices],
        ];
    }
}
