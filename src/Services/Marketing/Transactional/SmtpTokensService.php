<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Marketing\Transactional;

use HubSpotSDK\Client;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Core\Util;
use HubSpotSDK\Marketing\Transactional\SmtpAPITokenView;
use HubSpotSDK\Page;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\Marketing\Transactional\SmtpTokensContract;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
final class SmtpTokensService implements SmtpTokensContract
{
    /**
     * @api
     */
    public SmtpTokensRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new SmtpTokensRawService($client);
    }

    /**
     * @api
     *
     * Create a SMTP API token.
     *
     * @param string $campaignName a name for the campaign tied to the SMTP API token
     * @param bool $createContact indicates whether a contact should be created for email recipients
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $campaignName,
        bool $createContact,
        RequestOptions|array|null $requestOptions = null,
    ): SmtpAPITokenView {
        $params = Util::removeNulls(
            ['campaignName' => $campaignName, 'createContact' => $createContact]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Query multiple SMTP API tokens by campaign name or a single token by emailCampaignId.
     *
     * @param string $after The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     * @param int $limit the maximum number of results to display per page
     * @param RequestOpts|null $requestOptions
     *
     * @return Page<SmtpAPITokenView>
     *
     * @throws APIException
     */
    public function list(
        ?string $after = null,
        ?string $campaignName = null,
        ?string $emailCampaignID = null,
        ?int $limit = null,
        RequestOptions|array|null $requestOptions = null,
    ): Page {
        $params = Util::removeNulls(
            [
                'after' => $after,
                'campaignName' => $campaignName,
                'emailCampaignID' => $emailCampaignID,
                'limit' => $limit,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete a single token by ID.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $tokenID,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($tokenID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Query a single token by ID.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        string $tokenID,
        RequestOptions|array|null $requestOptions = null
    ): SmtpAPITokenView {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get($tokenID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Allows the creation of a replacement password for a given token. Once the password is successfully reset, the old password for the token will be invalid.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function resetPassword(
        string $tokenID,
        RequestOptions|array|null $requestOptions = null
    ): SmtpAPITokenView {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->resetPassword($tokenID, requestOptions: $requestOptions);

        return $response->parse();
    }
}
