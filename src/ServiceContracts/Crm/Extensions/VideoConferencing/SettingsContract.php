<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Extensions\VideoConferencing;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Extensions\VideoConferencing\ExternalSettings;
use HubspotSDK\RequestOptions;

use const HubspotSDK\Core\OMIT as omit;

interface SettingsContract
{
    /**
     * @api
     *
     * @param string $createMeetingURL the URL that HubSpot will send requests to create a new video conference
     * @param string $deleteMeetingURL the URL that HubSpot will send notifications of meetings that have been deleted in HubSpot
     * @param string $fetchAccountsUri
     * @param string $updateMeetingURL The URL that HubSpot will send updates to existing meetings. Typically called when the user changes the topic or times of a meeting.
     * @param string $userVerifyURL the URL that HubSpot will use to verify that a user exists in the video conference application
     *
     * @throws APIException
     */
    public function update(
        int $appID,
        $createMeetingURL,
        $deleteMeetingURL = omit,
        $fetchAccountsUri = omit,
        $updateMeetingURL = omit,
        $userVerifyURL = omit,
        ?RequestOptions $requestOptions = null,
    ): ExternalSettings;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateRaw(
        int $appID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): ExternalSettings;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        int $appID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @throws APIException
     */
    public function get(
        int $appID,
        ?RequestOptions $requestOptions = null
    ): ExternalSettings;
}
