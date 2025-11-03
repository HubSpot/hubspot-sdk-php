<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Automation\Actions;

use HubspotSDK\Automation\Actions\PublicActionRevision;
use HubspotSDK\Automation\Actions\Revisions\RevisionGetParams;
use HubspotSDK\Automation\Actions\Revisions\RevisionListParams;
use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Automation\Actions\RevisionsContract;

use const HubspotSDK\Core\OMIT as omit;

final class RevisionsService implements RevisionsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieve the versions of a definition by ID.
     *
     * @param int $appID
     * @param string $after The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     * @param int $limit the maximum number of results to display per page
     *
     * @return Page<PublicActionRevision>
     *
     * @throws APIException
     */
    public function list(
        string $definitionID,
        $appID,
        $after = omit,
        $limit = omit,
        ?RequestOptions $requestOptions = null,
    ): Page {
        $params = ['appID' => $appID, 'after' => $after, 'limit' => $limit];

        return $this->listRaw($definitionID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return Page<PublicActionRevision>
     *
     * @throws APIException
     */
    public function listRaw(
        string $definitionID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): Page {
        [$parsed, $options] = RevisionListParams::parseRequest(
            $params,
            $requestOptions
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: [
                'automation/v4/actions/%1$s/%2$s/revisions', $appID, $definitionID,
            ],
            query: $parsed,
            options: $options,
            convert: PublicActionRevision::class,
            page: Page::class,
        );
    }

    /**
     * @api
     *
     * Retrieve a specific revision of a definition by revision ID.
     *
     * @param int $appID
     * @param string $definitionID
     *
     * @throws APIException
     */
    public function get(
        string $revisionID,
        $appID,
        $definitionID,
        ?RequestOptions $requestOptions = null,
    ): PublicActionRevision {
        $params = ['appID' => $appID, 'definitionID' => $definitionID];

        return $this->getRaw($revisionID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getRaw(
        string $revisionID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): PublicActionRevision {
        [$parsed, $options] = RevisionGetParams::parseRequest(
            $params,
            $requestOptions
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);
        $definitionID = $parsed['definitionID'];
        unset($parsed['definitionID']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: [
                'automation/v4/actions/%1$s/%2$s/revisions/%3$s',
                $appID,
                $definitionID,
                $revisionID,
            ],
            options: $options,
            convert: PublicActionRevision::class,
        );
    }
}
