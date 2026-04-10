<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Conversations;

use HubSpotSDK\Conversations\VisitorIdentification\IdentificationTokenResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
interface VisitorIdentificationContract
{
    /**
     * @api
     *
     * @param string $email The email of the visitor that you wish to identify
     * @param string $firstName The first name of the visitor that you wish to identify. This value will only be set in HubSpot for new contacts and existing contacts where first name is unknown. Optional.
     * @param string $lastName The last name of the visitor that you wish to identify. This value will only be set in HubSpot for new contacts and existing contacts where last name is unknown. Optional.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function generateToken(
        string $email,
        ?string $firstName = null,
        ?string $lastName = null,
        RequestOptions|array|null $requestOptions = null,
    ): IdentificationTokenResponse;
}
