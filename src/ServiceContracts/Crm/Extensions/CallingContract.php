<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Extensions;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Extensions\Calling\RecordingSettingsResponse;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface CallingContract
{
    /**
     * @api
     *
     * @param string $urlToRetrieveAuthedRecording the URL used to access authenticated call recordings
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        int $appID,
        string $urlToRetrieveAuthedRecording,
        RequestOptions|array|null $requestOptions = null,
    ): RecordingSettingsResponse;

    /**
     * @api
     *
     * @param string $urlToRetrieveAuthedRecording the URL used to access authenticated call recordings
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        int $appID,
        ?string $urlToRetrieveAuthedRecording = null,
        RequestOptions|array|null $requestOptions = null,
    ): RecordingSettingsResponse;

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
    ): RecordingSettingsResponse;

    /**
     * @api
     *
     * @param int $engagementID the unique identifier for the engagement associated with the call recording
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function markReady(
        int $engagementID,
        RequestOptions|array|null $requestOptions = null
    ): mixed;
}
