<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Automation;

use HubspotSDK\Automation\Sequences\CollectionResponseWithTotalPublicSequenceLiteResponseForwardPaging;
use HubspotSDK\Automation\Sequences\PublicSequenceResponse;
use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
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
     * @throws APIException
     */
    public function list(
        ?RequestOptions $requestOptions = null
    ): CollectionResponseWithTotalPublicSequenceLiteResponseForwardPaging {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'automation/v4/sequences/',
            options: $requestOptions,
            convert: CollectionResponseWithTotalPublicSequenceLiteResponseForwardPaging::class,
        );
    }

    /**
     * @api
     *
     * Retrieve details of a specific sequence by its ID.
     *
     * @throws APIException
     */
    public function get(
        string $sequenceID,
        ?RequestOptions $requestOptions = null
    ): PublicSequenceResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['automation/v4/sequences/%1$s', $sequenceID],
            options: $requestOptions,
            convert: PublicSequenceResponse::class,
        );
    }
}
