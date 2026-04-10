<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Crm\Extensions\Calling;

use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Crm\Extensions\Calling\CompletedThirdPartyCallResponse;
use HubSpotSDK\Crm\Extensions\Calling\Transcripts\TranscriptCreateInboundCallParams;
use HubSpotSDK\Crm\Extensions\Calling\Transcripts\TranscriptCreateParams;
use HubSpotSDK\Crm\Extensions\Calling\Transcripts\TranscriptCreateResponse;
use HubSpotSDK\Crm\Extensions\Calling\Transcripts\TranscriptResponse;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
interface TranscriptsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|TranscriptCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TranscriptCreateResponse>
     *
     * @throws APIException
     */
    public function create(
        array|TranscriptCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $transcriptID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|TranscriptCreateInboundCallParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CompletedThirdPartyCallResponse>
     *
     * @throws APIException
     */
    public function createInboundCall(
        array|TranscriptCreateInboundCallParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TranscriptResponse>
     *
     * @throws APIException
     */
    public function get(
        string $transcriptID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
