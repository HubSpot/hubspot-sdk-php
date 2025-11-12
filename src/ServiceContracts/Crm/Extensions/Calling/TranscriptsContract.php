<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Extensions\Calling;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Extensions\Calling\Transcripts\TranscriptCreateParams;
use HubspotSDK\Crm\Extensions\Calling\Transcripts\TranscriptCreateResponse;
use HubspotSDK\Crm\Extensions\Calling\Transcripts\TranscriptResponse;
use HubspotSDK\RequestOptions;

interface TranscriptsContract
{
    /**
     * @api
     *
     * @param array<mixed>|TranscriptCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|TranscriptCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): TranscriptCreateResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $transcriptID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @throws APIException
     */
    public function get(
        string $transcriptID,
        ?RequestOptions $requestOptions = null
    ): TranscriptResponse;
}
