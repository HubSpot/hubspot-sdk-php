<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Conversations;

use HubSpotSDK\Client;
use HubSpotSDK\Conversations\VisitorIdentification\IdentificationTokenResponse;
use HubSpotSDK\Conversations\VisitorIdentification\VisitorIdentificationGenerateTokenParams;
use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\Conversations\VisitorIdentificationRawContract;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
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
     * Generate an identification token for a website visitor who has been authenticated using your own system. An identification token returned from this API can be used to pass information about your already-authenticated visitor to the chat widget, so that it treats the visitor as a known contact. This allows support agents to recognize and assist the visitor more effectively.
     *
     * @param array{
     *   email: string,
     *   hsCustomerAgentContext: array<string,string>,
     *   firstName?: string,
     *   lastName?: string,
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
