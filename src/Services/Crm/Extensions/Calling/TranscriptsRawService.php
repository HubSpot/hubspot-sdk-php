<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\Extensions\Calling;

use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Extensions\Calling\Transcripts\Speaker;
use HubspotSDK\Crm\Extensions\Calling\Transcripts\TranscriptCreateParams;
use HubspotSDK\Crm\Extensions\Calling\Transcripts\TranscriptCreateResponse;
use HubspotSDK\Crm\Extensions\Calling\Transcripts\TranscriptResponse;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\Extensions\Calling\TranscriptsRawContract;

final class TranscriptsRawService implements TranscriptsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * @param array{
     *   engagementID: int,
     *   transcriptCreateUtterances: list<array{
     *     endTimeMillis: int,
     *     speaker: array<string,mixed>|Speaker,
     *     startTimeMillis: int,
     *     text: string,
     *     languageCode?: string,
     *   }>,
     * }|TranscriptCreateParams $params
     *
     * @return BaseResponse<TranscriptCreateResponse>
     *
     * @throws APIException
     */
    public function create(
        array|TranscriptCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        [$parsed, $options] = TranscriptCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'crm/v3/extensions/calling/transcripts',
            body: (object) $parsed,
            options: $options,
            convert: TranscriptCreateResponse::class,
        );
    }

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
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['crm/v3/extensions/calling/transcripts/%1$s', $transcriptID],
            options: $requestOptions,
            convert: null,
        );
    }

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
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['crm/v3/extensions/calling/transcripts/%1$s', $transcriptID],
            options: $requestOptions,
            convert: TranscriptResponse::class,
        );
    }
}
