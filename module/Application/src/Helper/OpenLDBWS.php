<?php

namespace Application\Helper;

use SoapClient;
use SoapFault;
use SoapHeader;
use SoapVar;

class OpenLDBWS
{
    private const WSDL = 'https://lite.realtime.nationalrail.co.uk/OpenLDBWS/wsdl.aspx';

    private SoapClient $soapClient;

    public function __construct(
        private $accessKey = null,
    )
    {
        $this->soapClient = new SoapClient(self::WSDL,);

        $this->soapClient->__setSoapHeaders(
            new SoapHeader(
                'http://thalesgroup.com/RTTI/2010-11-01/ldb/commontypes',
                'AccessToken',
                new SoapVar(['ns2:TokenValue' => $this->accessKey], SOAP_ENC_OBJECT)
            )
        );
    }

    public function getDepBoardWithDetails(
        $numRows,
        $crs,
    )
    {
        $response = $this->soapClient->GetDepBoardWithDetails([
            'numRows' => $numRows,
            'crs' => $crs,
        ]);

        return $response ?? false;
    }
}
