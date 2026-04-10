<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Automation\Actions;

use HubSpotSDK\Automation\Actions\PublicActionRevision;
use HubSpotSDK\Automation\Actions\Revisions\RevisionGetParams;
use HubSpotSDK\Automation\Actions\Revisions\RevisionListParams;
use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Page;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
interface RevisionsRawContract
{
    /**
     * @api
     *
     * @param string $definitionID Path param
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
