<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Conversations;

use HubspotSDK\Client;
use HubspotSDK\Conversations\VisitorIdentification\IdentificationTokenResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Conversations\VisitorIdentificationContract;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
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
     * This endpoint generates an identification token for a website visitor who has been authenticated using your own system. An identification token returned from this API can be used to pass information about your already-authenticated visitor to the chat widget, so that it treats the visitor as a known contact. This allows support agents to recognize and assist the visitor more effectively.
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
    ): IdentificationTokenResponse {
        $params = Util::removeNulls(
            ['email' => $email, 'firstName' => $firstName, 'lastName' => $lastName]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->generateToken(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
