<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Conversations;

use HubspotSDK\Client;
use HubspotSDK\Conversations\VisitorIdentification\IdentificationTokenResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Conversations\VisitorIdentificationContract;

final class VisitorIdentificationService implements VisitorIdentificationContract
{
    /**
     * @api
     */
    public VisitorIdentificationRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new VisitorIdentificationRawService($client);
    }

    /**
     * @api
     *
     * @param string $email The email of the visitor that you wish to identify
     * @param string $firstName The first name of the visitor that you wish to identify. This value will only be set in HubSpot for new contacts and existing contacts where first name is unknown. Optional.
     * @param string $lastName The last name of the visitor that you wish to identify. This value will only be set in HubSpot for new contacts and existing contacts where last name is unknown. Optional.
     *
     * @throws APIException
     */
    public function generateToken(
        string $email,
        ?string $firstName = null,
        ?string $lastName = null,
        ?RequestOptions $requestOptions = null,
    ): IdentificationTokenResponse {
        $params = Util::removeNulls(
            ['email' => $email, 'firstName' => $firstName, 'lastName' => $lastName]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->generateToken(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
