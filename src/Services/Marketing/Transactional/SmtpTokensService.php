<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Marketing\Transactional;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Transactional\SmtpAPITokenView;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Marketing\Transactional\SmtpTokensContract;

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
     *
     * @throws APIException
     */
    public function create(
        string $campaignName,
        bool $createContact,
        ?RequestOptions $requestOptions = null,
    ): SmtpAPITokenView {
        $params = [
            'campaignName' => $campaignName, 'createContact' => $createContact,
        ];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
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
        ?string $after = null,
        ?string $campaignName = null,
        ?string $emailCampaignID = null,
        ?int $limit = null,
        ?RequestOptions $requestOptions = null,
    ): Page {
        $params = [
            'after' => $after,
            'campaignName' => $campaignName,
            'emailCampaignID' => $emailCampaignID,
            'limit' => $limit,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete a single token by ID.
     *
     * @param string $tokenID identifier generated when a token is created
     *
     * @throws APIException
     */
    public function delete(
        string $tokenID,
        ?RequestOptions $requestOptions = null
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
     * @param string $tokenID identifier generated when a token is created
     *
     * @throws APIException
     */
    public function get(
        string $tokenID,
        ?RequestOptions $requestOptions = null
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
     * @param string $tokenID identifier generated when a token is created
     *
     * @throws APIException
     */
    public function resetPassword(
        string $tokenID,
        ?RequestOptions $requestOptions = null
    ): SmtpAPITokenView {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->resetPassword($tokenID, requestOptions: $requestOptions);

        return $response->parse();
    }
}
