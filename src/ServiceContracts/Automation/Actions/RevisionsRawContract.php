<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Automation\Actions;

use HubspotSDK\Automation\Actions\PublicActionRevision;
use HubspotSDK\Automation\Actions\Revisions\RevisionGetParams;
use HubspotSDK\Automation\Actions\Revisions\RevisionListParams;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface RevisionsRawContract
{
    /**
     * @api
     *
     * @param string $definitionID path param: The ID of the definition
     * @param array<string,mixed>|RevisionListParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $revisionID the ID of the revision
     * @param array<string,mixed>|RevisionGetParams $params
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
    ): BaseResponse;
}
