<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Automation\Actions;

use HubSpotSDK\Automation\Actions\PublicActionRevision;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Page;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
interface RevisionsContract
{
    /**
     * @api
     *
     * @param string $definitionID Path param
     * @param int $appID Path param
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
    ): Page;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        string $revisionID,
        int $appID,
        string $definitionID,
        RequestOptions|array|null $requestOptions = null,
    ): PublicActionRevision;
}
