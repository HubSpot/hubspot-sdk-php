<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Extensions\Calling;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Extensions\Calling\RecordingSettingsResponse;
use HubspotSDK\RequestOptions;

interface RecordingSettingsContract
{
    /**
     * @api
     *
     * @throws APIException
     */
    public function create(
        int $appID,
        string $urlToRetrieveAuthedRecording,
        ?RequestOptions $requestOptions = null,
    ): RecordingSettingsResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function update(
        int $appID,
        ?string $urlToRetrieveAuthedRecording = null,
        ?RequestOptions $requestOptions = null,
    ): RecordingSettingsResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function get(
        int $appID,
        ?RequestOptions $requestOptions = null
    ): RecordingSettingsResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function markReady(
        int $engagementID,
        ?RequestOptions $requestOptions = null
    ): mixed;
}
