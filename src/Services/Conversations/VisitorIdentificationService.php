<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Conversations;

use HubspotSDK\Client;
use HubspotSDK\Conversations\VisitorIdentification\IdentificationTokenResponse;
use HubspotSDK\Conversations\VisitorIdentification\VisitorIdentificationGenerateTokenParams;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Conversations\VisitorIdentificationContract;

use const HubspotSDK\Core\OMIT as omit;

final class VisitorIdentificationService implements VisitorIdentificationContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Generates a new visitor identification token. This token will be unique every time this endpoint is called, even if called with the same email address. This token is temporary and will expire after 12 hours
     *
     * @param string $email The email of the visitor that you wish to identify
     * @param string $firstName The first name of the visitor that you wish to identify. This value will only be set in HubSpot for new contacts and existing contacts where first name is unknown. Optional.
     * @param string $lastName The last name of the visitor that you wish to identify. This value will only be set in HubSpot for new contacts and existing contacts where last name is unknown. Optional.
     *
     * @throws APIException
     */
    public function generateToken(
        $email,
        $firstName = omit,
        $lastName = omit,
        ?RequestOptions $requestOptions = null,
    ): IdentificationTokenResponse {
        $params = [
            'email' => $email, 'firstName' => $firstName, 'lastName' => $lastName,
        ];

        return $this->generateTokenRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function generateTokenRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): IdentificationTokenResponse {
        [
            $parsed, $options,
        ] = VisitorIdentificationGenerateTokenParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'visitor-identification/v3/tokens/create',
            body: (object) $parsed,
            options: $options,
            convert: IdentificationTokenResponse::class,
        );
    }
}
