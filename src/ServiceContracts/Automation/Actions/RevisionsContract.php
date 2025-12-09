<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Automation\Actions;

use HubspotSDK\Automation\Actions\PublicActionRevision;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

interface RevisionsContract
{
    /**
     * @api
     *
     * @param string $definitionID path param: The ID of the definition
     * @param int $appID path param: The ID of the app
     * @param string $after Query param: The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     * @param int $limit query param: The maximum number of results to display per page
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
        ?RequestOptions $requestOptions = null,
    ): Page;

    /**
     * @api
     *
     * @param string $revisionID the ID of the revision
     * @param int $appID the ID of the app
     * @param string $definitionID the ID of the definition
     *
     * @throws APIException
     */
    public function get(
        string $revisionID,
        int $appID,
        string $definitionID,
        ?RequestOptions $requestOptions = null,
    ): PublicActionRevision;
}
