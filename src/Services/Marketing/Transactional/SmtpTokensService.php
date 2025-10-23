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

use const HubspotSDK\Core\OMIT as omit;

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
     * @param string $campaignName a name for the campaign tied to the SMTP API token
     * @param bool $createContact indicates whether a contact should be created for email recipients
     *
     * @throws APIException
     */
    public function create(
        $campaignName,
        $createContact,
        ?RequestOptions $requestOptions = null
    ): SmtpAPITokenView {
        $params = [
            'campaignName' => $campaignName, 'createContact' => $createContact,
        ];

        return $this->createRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): SmtpAPITokenView {
        [$parsed, $options] = SmtpTokenCreateParams::parseRequest(
            $params,
            $requestOptions
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
     * @param string $after starting point to get the next set of results
     * @param string $campaignName a name for the campaign tied to the SMTP API token
     * @param string $emailCampaignID identifier assigned to the campaign provided during the token creation
     * @param int $limit maximum number of tokens to return
     *
     * @return Page<SmtpAPITokenView>
     *
     * @throws APIException
     */
    public function list(
        $after = omit,
        $campaignName = omit,
        $emailCampaignID = omit,
        $limit = omit,
        ?RequestOptions $requestOptions = null,
    ): Page {
        $params = [
            'after' => $after,
            'campaignName' => $campaignName,
            'emailCampaignID' => $emailCampaignID,
            'limit' => $limit,
        ];

        return $this->listRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return Page<SmtpAPITokenView>
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): Page {
        [$parsed, $options] = SmtpTokenListParams::parseRequest(
            $params,
            $requestOptions
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
