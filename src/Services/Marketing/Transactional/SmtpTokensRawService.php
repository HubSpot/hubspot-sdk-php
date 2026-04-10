<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Marketing\Transactional;

use HubSpotSDK\Client;
use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Core\Util;
use HubSpotSDK\Marketing\Transactional\SmtpAPITokenView;
use HubSpotSDK\Marketing\Transactional\SmtpTokens\SmtpTokenCreateParams;
use HubSpotSDK\Marketing\Transactional\SmtpTokens\SmtpTokenListParams;
use HubSpotSDK\Page;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\Marketing\Transactional\SmtpTokensRawContract;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
final class SmtpTokensRawService implements SmtpTokensRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a SMTP API token.
     *
     * @param array{
     *   campaignName: string, createContact: bool
     * }|SmtpTokenCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SmtpAPITokenView>
     *
     * @throws APIException
     */
    public function create(
        array|SmtpTokenCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SmtpTokenCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'marketing/transactional/2026-03/smtp-tokens',
            body: (object) $parsed,
            options: $options,
            convert: SmtpAPITokenView::class,
        );
    }

    /**
     * @api
     *
     * Query multiple SMTP API tokens by campaign name or a single token by emailCampaignId.
     *
     * @param array{
     *   after?: string, campaignName?: string, emailCampaignID?: string, limit?: int
     * }|SmtpTokenListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page<SmtpAPITokenView>>
     *
     * @throws APIException
     */
    public function list(
        array|SmtpTokenListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SmtpTokenListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'marketing/transactional/2026-03/smtp-tokens',
            query: Util::array_transform_keys(
                $parsed,
                ['emailCampaignID' => 'emailCampaignId']
            ),
            options: $options,
            convert: SmtpAPITokenView::class,
            page: Page::class,
        );
    }

    /**
     * @api
     *
     * Delete a single token by ID.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $tokenID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['marketing/transactional/2026-03/smtp-tokens/%1$s', $tokenID],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Query a single token by ID.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SmtpAPITokenView>
     *
     * @throws APIException
     */
    public function get(
        string $tokenID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['marketing/transactional/2026-03/smtp-tokens/%1$s', $tokenID],
            options: $requestOptions,
            convert: SmtpAPITokenView::class,
        );
    }

    /**
     * @api
     *
     * Allows the creation of a replacement password for a given token. Once the password is successfully reset, the old password for the token will be invalid.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SmtpAPITokenView>
     *
     * @throws APIException
     */
    public function resetPassword(
        string $tokenID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: [
                'marketing/transactional/2026-03/smtp-tokens/%1$s/password-reset',
                $tokenID,
            ],
            options: $requestOptions,
            convert: SmtpAPITokenView::class,
        );
    }
}
