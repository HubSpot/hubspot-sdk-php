<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Automation;

use HubspotSDK\Automation\Sequences\PublicSequenceLiteResponse;
use HubspotSDK\Automation\Sequences\PublicSequenceResponse;
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
    public SequencesRawService $raw;

    /**
     * @api
     */
    public EnrollmentsService $enrollments;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new SequencesRawService($client);
        $this->enrollments = new EnrollmentsService($client);
    }

    /**
     * @api
     *
     * Retrieve a list of sequences that belong to a specific user.
     *
     * @return Page<PublicSequenceLiteResponse>
     *
     * @throws APIException
     */
    public function list(
        string $userID,
        ?string $after = null,
        ?int $limit = null,
        ?string $name = null,
        ?RequestOptions $requestOptions = null,
    ): Page {
        $params = [
            'userID' => $userID, 'after' => $after, 'limit' => $limit, 'name' => $name,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
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
        string $userID,
        ?RequestOptions $requestOptions = null
    ): PublicSequenceResponse {
        $params = ['userID' => $userID];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get($sequenceID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
