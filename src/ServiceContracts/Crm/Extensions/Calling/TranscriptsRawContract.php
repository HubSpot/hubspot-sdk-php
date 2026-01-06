<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Extensions\Calling;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Extensions\Calling\Transcripts\TranscriptCreateParams;
use HubspotSDK\Crm\Extensions\Calling\Transcripts\TranscriptCreateResponse;
use HubspotSDK\Crm\Extensions\Calling\Transcripts\TranscriptResponse;
use HubspotSDK\RequestOptions;

interface TranscriptsRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|TranscriptCreateParams $params
     *
     * @return BaseResponse<TranscriptCreateResponse>
     *
     * @throws APIException
     */
    public function create(
        array|TranscriptCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $transcriptID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @return BaseResponse<TranscriptResponse>
     *
     * @throws APIException
     */
    public function get(
        string $transcriptID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
