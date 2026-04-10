<?php

namespace Tests;

use Http\Discovery\Psr17FactoryDiscovery;
use Http\Mock\Client;
use HubSpotSDK\Core\Util;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 *
 * @coversNothing
 */
class ClientTest extends TestCase
{
    public function testDefaultHeaders(): void
    {
        $transporter = new Client;
        $mockRsp = Psr17FactoryDiscovery::findResponseFactory()
            ->createResponse()
            ->withStatus(200)
            ->withHeader('Content-Type', 'application/json')
            ->withBody(Psr17FactoryDiscovery::findStreamFactory()->createStream(json_encode([], flags: Util::JSON_ENCODE_FLAGS) ?: ''))
        ;

        $transporter->setDefaultResponse($mockRsp);

        $client = new \HubSpotSDK\Client(
            baseUrl: 'http://localhost',
            accessToken: 'My Access Token',
            requestOptions: ['transporter' => $transporter],
        );

        $client->crm->objects->contacts->create(
            associations: [
                [
                    'to' => ['id' => 'id'],
                    'types' => [
                        [
                            'associationCategory' => 'HUBSPOT_DEFINED',
                            'associationTypeID' => 0,
                        ],
                    ],
                ],
            ],
            properties: ['foo' => 'string'],
        );

        $this->assertNotFalse($requested = $transporter->getRequests()[0] ?? false);

        foreach (['accept', 'content-type'] as $header) {
            $sent = $requested->getHeaderLine($header);
            $this->assertNotEmpty($sent);
        }
    }
}
