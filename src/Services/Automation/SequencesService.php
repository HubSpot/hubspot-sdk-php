<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Automation;

use HubspotSDK\Automation\Sequences\PublicSequenceLiteResponse;
use HubspotSDK\Automation\Sequences\PublicSequenceResponse;
use HubspotSDK\Automation\Sequences\SequenceGetParams;
use HubspotSDK\Automation\Sequences\SequenceListParams;
use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Automation\SequencesContract;
use HubspotSDK\Services\Automation\Sequences\EnrollmentsService;

final class SequencesService implements SequencesContract
{
    /**
     * @api
     */
    public EnrollmentsService $enrollments;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->enrollments = new EnrollmentsService($client);
    }

    /**
     * @api
     *
     * Retrieve a list of sequences that belong to a specific user.
     *
     * @param array{
     *   userId: string, after?: string, limit?: int, name?: string
     * }|SequenceListParams $params
     *
     * @return Page<PublicSequenceLiteResponse>
     *
     * @throws APIException
     */
    public function list(
        array|SequenceListParams $params,
        ?RequestOptions $requestOptions = null
    ): Page {
        [$parsed, $options] = SequenceListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'automation/v4/sequences/',
            query: $parsed,
            options: $options,
            convert: PublicSequenceLiteResponse::class,
            page: Page::class,
        );
    }

    /**
     * @api
     *
     * Retrieve details of a specific sequence by its ID.
     *
     * @param array{userId: string}|SequenceGetParams $params
     *
     * @throws APIException
     */
    public function get(
        string $sequenceID,
        array|SequenceGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): PublicSequenceResponse {
        [$parsed, $options] = SequenceGetParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['automation/v4/sequences/%1$s', $sequenceID],
            query: $parsed,
            options: $options,
            convert: PublicSequenceResponse::class,
        );
    }
}
