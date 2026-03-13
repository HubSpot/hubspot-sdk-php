<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Automation\Actions;

use HubspotSDK\Automation\Actions\PublicActionRevision;
use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Automation\Actions\RevisionsContract;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class RevisionsService implements RevisionsContract
{
    /**
     * @api
     */
    public RevisionsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new RevisionsRawService($client);
    }

    /**
     * @api
     *
     * Retrieve the versions of a definition by ID.
     *
     * @param string $definitionID path param: The ID of the definition
     * @param int $appID path param: The ID of the app
     * @param string $after Query param: The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     * @param int $limit query param: The maximum number of results to display per page
     * @param RequestOpts|null $requestOptions
     *
     * @return Page<PublicActionRevision>
     *
     * @throws APIException
     */
    public function list(
        string $definitionID,
        int $appID,
        ?string $after = null,
        ?int $limit = null,
        RequestOptions|array|null $requestOptions = null,
    ): Page {
        $params = Util::removeNulls(
            ['appID' => $appID, 'after' => $after, 'limit' => $limit]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($definitionID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a specific revision of a definition by revision ID.
     *
     * @param string $revisionID the ID of the revision
     * @param int $appID the ID of the app
     * @param string $definitionID the ID of the definition
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        string $revisionID,
        int $appID,
        string $definitionID,
        RequestOptions|array|null $requestOptions = null,
    ): PublicActionRevision {
        $params = Util::removeNulls(
            ['appID' => $appID, 'definitionID' => $definitionID]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get($revisionID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
