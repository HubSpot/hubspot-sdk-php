<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Crm\Extensions\Calling;

use HubSpotSDK\Client;
use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Crm\Extensions\Calling\CompletedThirdPartyCallResponse;
use HubSpotSDK\Crm\Extensions\Calling\FormattedPhoneNumber;
use HubSpotSDK\Crm\Extensions\Calling\Transcripts\TranscriptCreateInboundCallParams;
use HubSpotSDK\Crm\Extensions\Calling\Transcripts\TranscriptCreateInboundCallParams\FinalCallStatus;
use HubSpotSDK\Crm\Extensions\Calling\Transcripts\TranscriptCreateParams;
use HubSpotSDK\Crm\Extensions\Calling\Transcripts\TranscriptCreateResponse;
use HubSpotSDK\Crm\Extensions\Calling\Transcripts\TranscriptCreateUtterance;
use HubSpotSDK\Crm\Extensions\Calling\Transcripts\TranscriptResponse;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\Crm\Extensions\Calling\TranscriptsRawContract;

/**
 * @phpstan-import-type TranscriptCreateUtteranceShape from \HubSpotSDK\Crm\Extensions\Calling\Transcripts\TranscriptCreateUtterance
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 * @phpstan-import-type FormattedPhoneNumberShape from \HubSpotSDK\Crm\Extensions\Calling\FormattedPhoneNumber
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
