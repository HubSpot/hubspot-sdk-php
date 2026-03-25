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

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
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
     * This endpoint generates an identification token for a website visitor who has been authenticated using your own system. An identification token returned from this API can be used to pass information about your already-authenticated visitor to the chat widget, so that it treats the visitor as a known contact. This allows support agents to recognize and assist the visitor more effectively.
     *
     * @param array{
     *   email: string, firstName?: string, lastName?: string
     * }|VisitorIdentificationGenerateTokenParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<IdentificationTokenResponse>
     *
     * @throws APIException
     */
    public function generateToken(
        array|VisitorIdentificationGenerateTokenParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = VisitorIdentificationGenerateTokenParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'visitor-identification/2026-03/tokens/create',
            body: (object) $parsed,
            options: $options,
            convert: IdentificationTokenResponse::class,
        );
    }
}
