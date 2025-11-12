<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Automation\Actions;

use HubspotSDK\Automation\Actions\PublicActionRevision;
use HubspotSDK\Automation\Actions\Revisions\RevisionGetParams;
use HubspotSDK\Automation\Actions\Revisions\RevisionListParams;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

interface RevisionsContract
{
    /**
     * @api
     *
     * @param array<mixed>|RevisionListParams $params
     *
     * @return Page<PublicActionRevision>
     *
     * @throws APIException
     */
    public function list(
        string $definitionID,
        array|RevisionListParams $params,
        ?RequestOptions $requestOptions = null,
    ): Page;

    /**
     * @api
     *
     * @param array<mixed>|RevisionGetParams $params
     *
     * @throws APIException
     */
    public function get(
        string $revisionID,
        array|RevisionGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): PublicActionRevision;
}
