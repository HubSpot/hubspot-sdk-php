<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\Extensions\Calling;

use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Extensions\Calling\CompletedThirdPartyCallResponse;
use HubspotSDK\Crm\Extensions\Calling\FormattedPhoneNumber;
use HubspotSDK\Crm\Extensions\Calling\Transcripts\TranscriptCreateInboundCallParams;
use HubspotSDK\Crm\Extensions\Calling\Transcripts\TranscriptCreateInboundCallParams\FinalCallStatus;
use HubspotSDK\Crm\Extensions\Calling\Transcripts\TranscriptCreateParams;
use HubspotSDK\Crm\Extensions\Calling\Transcripts\TranscriptCreateResponse;
use HubspotSDK\Crm\Extensions\Calling\Transcripts\TranscriptCreateUtterance;
use HubspotSDK\Crm\Extensions\Calling\Transcripts\TranscriptResponse;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\Extensions\Calling\TranscriptsRawContract;

/**
 * @phpstan-import-type TranscriptCreateUtteranceShape from \HubspotSDK\Crm\Extensions\Calling\Transcripts\TranscriptCreateUtterance
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 * @phpstan-import-type FormattedPhoneNumberShape from \HubspotSDK\Crm\Extensions\Calling\FormattedPhoneNumber
 */
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
     *   transcriptCreateUtterances: list<TranscriptCreateUtterance|TranscriptCreateUtteranceShape>,
     * }|TranscriptCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TranscriptCreateResponse>
     *
     * @throws APIException
     */
    public function create(
        array|TranscriptCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TranscriptCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'crm/extensions/calling/2026-03/transcripts',
            body: (object) $parsed,
            options: $options,
            convert: TranscriptCreateResponse::class,
        );
    }

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
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['crm/extensions/calling/2026-03/transcripts/%1$s', $transcriptID],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * @param array{
     *   createEngagement: bool,
     *   engagementProperties: array<string,string>,
     *   externalCallID: string,
     *   finalCallStatus: value-of<FinalCallStatus>,
     *   fromNumber: FormattedPhoneNumber|FormattedPhoneNumberShape,
     *   potentialRecipientUserIDs: list<int>,
     *   toNumber: FormattedPhoneNumber|FormattedPhoneNumberShape,
     *   callStartedTimestamp?: \DateTimeInterface,
     *   durationSeconds?: int,
     *   userID?: int,
     * }|TranscriptCreateInboundCallParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CompletedThirdPartyCallResponse>
     *
     * @throws APIException
     */
    public function createInboundCall(
        array|TranscriptCreateInboundCallParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TranscriptCreateInboundCallParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'crm/extensions/calling/2026-03/inbound-call',
            body: (object) $parsed,
            options: $options,
            convert: CompletedThirdPartyCallResponse::class,
        );
    }

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
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['crm/extensions/calling/2026-03/transcripts/%1$s', $transcriptID],
            options: $requestOptions,
            convert: TranscriptResponse::class,
        );
    }
}
