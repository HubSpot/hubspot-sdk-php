<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Conversations;

use HubspotSDK\Client;
use HubspotSDK\Conversations\VisitorIdentification\IdentificationTokenResponse;
use HubspotSDK\Conversations\VisitorIdentification\VisitorIdentificationGenerateTokenParams;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Conversations\VisitorIdentificationRawContract;

final class VisitorIdentificationRawService implements VisitorIdentificationRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * @param array{
     *   email: string, firstName?: string, lastName?: string
     * }|VisitorIdentificationGenerateTokenParams $params
     *
     * @return BaseResponse<IdentificationTokenResponse>
     *
     * @throws APIException
     */
    public function generateToken(
        array|VisitorIdentificationGenerateTokenParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = VisitorIdentificationGenerateTokenParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'visitor-identification/v3/tokens/create',
            body: (object) $parsed,
            options: $options,
            convert: IdentificationTokenResponse::class,
        );
    }
}
