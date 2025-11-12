<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Marketing\Transactional;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Transactional\SmtpAPITokenView;
use HubspotSDK\Marketing\Transactional\SmtpTokens\SmtpTokenCreateParams;
use HubspotSDK\Marketing\Transactional\SmtpTokens\SmtpTokenListParams;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Marketing\Transactional\SmtpTokensContract;

final class SmtpTokensService implements SmtpTokensContract
{
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
     *
     * @throws APIException
     */
    public function create(
        array|SmtpTokenCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): SmtpAPITokenView {
        [$parsed, $options] = SmtpTokenCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'marketing/v3/transactional/smtp-tokens',
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
     *   after?: string, campaignName?: string, emailCampaignId?: string, limit?: int
     * }|SmtpTokenListParams $params
     *
     * @return Page<SmtpAPITokenView>
     *
     * @throws APIException
     */
    public function list(
        array|SmtpTokenListParams $params,
        ?RequestOptions $requestOptions = null
    ): Page {
        [$parsed, $options] = SmtpTokenListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'marketing/v3/transactional/smtp-tokens',
            query: $parsed,
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
     * @throws APIException
     */
    public function delete(
        string $tokenID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['marketing/v3/transactional/smtp-tokens/%1$s', $tokenID],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Query a single token by ID.
     *
     * @throws APIException
     */
    public function get(
        string $tokenID,
        ?RequestOptions $requestOptions = null
    ): SmtpAPITokenView {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['marketing/v3/transactional/smtp-tokens/%1$s', $tokenID],
            options: $requestOptions,
            convert: SmtpAPITokenView::class,
        );
    }

    /**
     * @api
     *
     * Allows the creation of a replacement password for a given token. Once the password is successfully reset, the old password for the token will be invalid.
     *
     * @throws APIException
     */
    public function resetPassword(
        string $tokenID,
        ?RequestOptions $requestOptions = null
    ): SmtpAPITokenView {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: [
                'marketing/v3/transactional/smtp-tokens/%1$s/password-reset', $tokenID,
            ],
            options: $requestOptions,
            convert: SmtpAPITokenView::class,
        );
    }
}
