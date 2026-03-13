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
use HubspotSDK\ServiceContracts\Automation\Actions\RevisionsRawContract;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class RevisionsRawService implements RevisionsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieve the versions of a definition by ID.
     *
     * @param string $definitionID path param: The ID of the definition
     * @param array{appID: int, after?: string, limit?: int}|RevisionListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page<PublicActionRevision>>
     *
     * @throws APIException
     */
    public function list(
        string $definitionID,
        array|RevisionListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = RevisionListParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);

        // @phpstan-ignore-next-line return.type
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
     * @param string $revisionID the ID of the revision
     * @param array{appID: int, definitionID: string}|RevisionGetParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicActionRevision>
     *
     * @throws APIException
     */
    public function get(
        string $revisionID,
        array|RevisionGetParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = RevisionGetParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);
        $definitionID = $parsed['definitionID'];
        unset($parsed['definitionID']);

        // @phpstan-ignore-next-line return.type
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
