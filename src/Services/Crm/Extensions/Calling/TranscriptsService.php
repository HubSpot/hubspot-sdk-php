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
use HubspotSDK\ServiceContracts\Crm\Extensions\Calling\TranscriptsContract;

final class TranscriptsService implements TranscriptsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * @param array{
     *   engagementId: int,
     *   transcriptCreateUtterances: list<array{
     *     endTimeMillis: int,
     *     speaker: array<mixed>|Speaker,
     *     startTimeMillis: int,
     *     text: string,
     *     languageCode?: string,
     *   }>,
     * }|TranscriptCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|TranscriptCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): TranscriptCreateResponse {
        [$parsed, $options] = TranscriptCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<TranscriptCreateResponse> */
        $response = $this->client->request(
            method: 'post',
            path: 'crm/v3/extensions/calling/transcripts',
            body: (object) $parsed,
            options: $options,
            convert: TranscriptCreateResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $transcriptID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        /** @var BaseResponse<mixed> */
        $response = $this->client->request(
            method: 'delete',
            path: ['crm/v3/extensions/calling/transcripts/%1$s', $transcriptID],
            options: $requestOptions,
            convert: null,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * @throws APIException
     */
    public function get(
        string $transcriptID,
        ?RequestOptions $requestOptions = null
    ): TranscriptResponse {
        /** @var BaseResponse<TranscriptResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['crm/v3/extensions/calling/transcripts/%1$s', $transcriptID],
            options: $requestOptions,
            convert: TranscriptResponse::class,
        );

        return $response->parse();
    }
}
