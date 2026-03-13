<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Extensions\VideoConferencing;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Extensions\VideoConferencing\ExternalSettings;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface SettingsContract
{
    /**
     * @api
     *
     * @param string $createMeetingURL the URL that HubSpot will send requests to create a new video conference
     * @param string $deleteMeetingURL the URL that HubSpot will send notifications of meetings that have been deleted in HubSpot
     * @param string $updateMeetingURL The URL that HubSpot will send updates to existing meetings. Typically called when the user changes the topic or times of a meeting.
     * @param string $userVerifyURL the URL that HubSpot will use to verify that a user exists in the video conference application
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        int $appID,
        string $createMeetingURL,
        ?string $deleteMeetingURL = null,
        ?string $fetchAccountsUri = null,
        ?string $updateMeetingURL = null,
        ?string $userVerifyURL = null,
        RequestOptions|array|null $requestOptions = null,
    ): ExternalSettings;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        int $appID,
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
        int $appID,
        RequestOptions|array|null $requestOptions = null
    ): ExternalSettings;
}
