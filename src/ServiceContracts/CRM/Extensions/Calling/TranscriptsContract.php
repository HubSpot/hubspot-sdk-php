<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\CRM\Extensions\Calling;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\CRM\Extensions\Calling\Transcripts\TranscriptCreateResponse;
use HubspotSDK\CRM\Extensions\Calling\Transcripts\TranscriptCreateUtterance;
use HubspotSDK\CRM\Extensions\Calling\Transcripts\TranscriptResponse;
use HubspotSDK\RequestOptions;

interface TranscriptsContract
{
    /**
     * @api
     *
     * @param int $engagementID
     * @param list<TranscriptCreateUtterance> $transcriptCreateUtterances
     *
     * @throws APIException
     */
    public function create(
        $engagementID,
        $transcriptCreateUtterances,
        ?RequestOptions $requestOptions = null,
    ): TranscriptCreateResponse;

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
