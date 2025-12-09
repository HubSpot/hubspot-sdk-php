<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Extensions\Calling;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Extensions\Calling\Transcripts\Speaker;
use HubspotSDK\Crm\Extensions\Calling\Transcripts\TranscriptCreateResponse;
use HubspotSDK\Crm\Extensions\Calling\Transcripts\TranscriptResponse;
use HubspotSDK\RequestOptions;

interface TranscriptsContract
{
    /**
     * @api
     *
     * @param list<array{
     *   endTimeMillis: int,
     *   speaker: array{id: string, name: string, email?: string}|Speaker,
     *   startTimeMillis: int,
     *   text: string,
     *   languageCode?: string,
     * }> $transcriptCreateUtterances
     *
     * @throws APIException
     */
    public function create(
        int $engagementID,
        array $transcriptCreateUtterances,
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
