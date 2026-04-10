<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Marketing\Transactional;

use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Marketing\Transactional\SmtpAPITokenView;
use HubSpotSDK\Page;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
interface SmtpTokensContract
{
    /**
     * @api
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
    ): SmtpAPITokenView;

    /**
     * @api
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
    ): Page;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $tokenID,
        RequestOptions|array|null $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        string $tokenID,
        RequestOptions|array|null $requestOptions = null
    ): SmtpAPITokenView;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function resetPassword(
        string $tokenID,
        RequestOptions|array|null $requestOptions = null
    ): SmtpAPITokenView;
}
