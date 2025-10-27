<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Conversations;

use HubspotSDK\Conversations\VisitorIdentification\IdentificationTokenResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;

use const HubspotSDK\Core\OMIT as omit;

interface VisitorIdentificationContract
{
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
        $email,
        $firstName = omit,
        $lastName = omit,
        ?RequestOptions $requestOptions = null,
    ): IdentificationTokenResponse;

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
    ): IdentificationTokenResponse;
}
