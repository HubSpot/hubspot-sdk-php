<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Marketing\Transactional;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Transactional\SmtpAPITokenView;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

use const HubspotSDK\Core\OMIT as omit;

interface SmtpTokensContract
{
    /**
     * @api
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
    ): SmtpAPITokenView;

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
    ): SmtpAPITokenView;

    /**
     * @api
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
    ): Page;

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
    ): Page;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $tokenID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @throws APIException
     */
    public function get(
        string $tokenID,
        ?RequestOptions $requestOptions = null
    ): SmtpAPITokenView;

    /**
     * @api
     *
     * @throws APIException
     */
    public function resetPassword(
        string $tokenID,
        ?RequestOptions $requestOptions = null
    ): SmtpAPITokenView;
}
