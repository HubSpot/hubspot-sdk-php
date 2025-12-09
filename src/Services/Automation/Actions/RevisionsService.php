<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Automation\Actions;

use HubspotSDK\Automation\Actions\PublicActionRevision;
use HubspotSDK\Automation\Actions\Revisions\RevisionGetParams;
use HubspotSDK\Automation\Actions\Revisions\RevisionListParams;
use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Automation\Actions\RevisionsContract;

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
     * @param array{appID: int, after?: string, limit?: int}|RevisionListParams $params
     *
     * @return Page<PublicActionRevision>
     *
     * @throws APIException
     */
    public function list(
        string $definitionID,
        array|RevisionListParams $params,
        ?RequestOptions $requestOptions = null,
    ): Page {
        [$parsed, $options] = RevisionListParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);

        /** @var BaseResponse<Page<PublicActionRevision>> */
        $response = $this->client->request(
            method: 'get',
            path: [
                'automation/v4/actions/%1$s/%2$s/revisions', $appID, $definitionID,
            ],
            query: $parsed,
            options: $options,
            convert: PublicActionRevision::class,
            page: Page::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a specific revision of a definition by revision ID.
     *
     * @param array{appID: int, definitionID: string}|RevisionGetParams $params
     *
     * @throws APIException
     */
    public function get(
        string $revisionID,
        array|RevisionGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): PublicActionRevision {
        [$parsed, $options] = RevisionGetParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);
        $definitionID = $parsed['definitionID'];
        unset($parsed['definitionID']);

        /** @var BaseResponse<PublicActionRevision> */
        $response = $this->client->request(
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

        return $response->parse();
    }
}
