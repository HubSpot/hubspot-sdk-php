<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\Extensions\Calling;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Crm\Extensions\Calling\Transcripts\Speaker;
use HubspotSDK\Crm\Extensions\Calling\Transcripts\TranscriptCreateResponse;
use HubspotSDK\Crm\Extensions\Calling\Transcripts\TranscriptResponse;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\Extensions\Calling\TranscriptsContract;

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
     * @throws APIException
     */
    public function delete(
        string $transcriptID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($transcriptID, requestOptions: $requestOptions);

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
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get($transcriptID, requestOptions: $requestOptions);

        return $response->parse();
    }
}
