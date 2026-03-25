<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\Extensions\Calling;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Crm\Extensions\Calling\CompletedThirdPartyCallResponse;
use HubspotSDK\Crm\Extensions\Calling\FormattedPhoneNumber;
use HubspotSDK\Crm\Extensions\Calling\Transcripts\TranscriptCreateInboundCallParams\FinalCallStatus;
use HubspotSDK\Crm\Extensions\Calling\Transcripts\TranscriptCreateResponse;
use HubspotSDK\Crm\Extensions\Calling\Transcripts\TranscriptCreateUtterance;
use HubspotSDK\Crm\Extensions\Calling\Transcripts\TranscriptResponse;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\Extensions\Calling\TranscriptsContract;

/**
 * @phpstan-import-type TranscriptCreateUtteranceShape from \HubspotSDK\Crm\Extensions\Calling\Transcripts\TranscriptCreateUtterance
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 * @phpstan-import-type FormattedPhoneNumberShape from \HubspotSDK\Crm\Extensions\Calling\FormattedPhoneNumber
 */
final class TranscriptsService implements TranscriptsContract
{
    /**
     * @api
     */
    public TranscriptsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new TranscriptsRawService($client);
    }

    /**
     * @api
     *
     * @param list<TranscriptCreateUtterance|TranscriptCreateUtteranceShape> $transcriptCreateUtterances
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        int $engagementID,
        array $transcriptCreateUtterances,
        RequestOptions|array|null $requestOptions = null,
    ): TranscriptCreateResponse {
        $params = Util::removeNulls(
            [
                'engagementID' => $engagementID,
                'transcriptCreateUtterances' => $transcriptCreateUtterances,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $transcriptID,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($transcriptID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @param array<string,string> $engagementProperties
     * @param FinalCallStatus|value-of<FinalCallStatus> $finalCallStatus
     * @param FormattedPhoneNumber|FormattedPhoneNumberShape $fromNumber
     * @param list<int> $potentialRecipientUserIDs
     * @param FormattedPhoneNumber|FormattedPhoneNumberShape $toNumber
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createInboundCall(
        bool $createEngagement,
        array $engagementProperties,
        string $externalCallID,
        FinalCallStatus|string $finalCallStatus,
        FormattedPhoneNumber|array $fromNumber,
        array $potentialRecipientUserIDs,
        FormattedPhoneNumber|array $toNumber,
        ?\DateTimeInterface $callStartedTimestamp = null,
        ?int $durationSeconds = null,
        ?int $userID = null,
        RequestOptions|array|null $requestOptions = null,
    ): CompletedThirdPartyCallResponse {
        $params = Util::removeNulls(
            [
                'createEngagement' => $createEngagement,
                'engagementProperties' => $engagementProperties,
                'externalCallID' => $externalCallID,
                'finalCallStatus' => $finalCallStatus,
                'fromNumber' => $fromNumber,
                'potentialRecipientUserIDs' => $potentialRecipientUserIDs,
                'toNumber' => $toNumber,
                'callStartedTimestamp' => $callStartedTimestamp,
                'durationSeconds' => $durationSeconds,
                'userID' => $userID,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createInboundCall(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        string $transcriptID,
        RequestOptions|array|null $requestOptions = null
    ): TranscriptResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get($transcriptID, requestOptions: $requestOptions);

        return $response->parse();
    }
}
