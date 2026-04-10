<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Automation\Actions;

use HubSpotSDK\Automation\Actions\PublicActionRevision;
use HubSpotSDK\Automation\Actions\Revisions\RevisionGetParams;
use HubSpotSDK\Automation\Actions\Revisions\RevisionListParams;
use HubSpotSDK\Client;
use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Page;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\Automation\Actions\RevisionsRawContract;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
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
     * @param string $definitionID Path param
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
                'automation/actions/2026-03/%1$s/%2$s/revisions', $appID, $definitionID,
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
                'automation/actions/2026-03/%1$s/%2$s/revisions/%3$s',
                $appID,
                $definitionID,
                $revisionID,
            ],
            options: $options,
            convert: PublicActionRevision::class,
        );
    }
}
