<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Cms\Blogs\Posts;

use HubSpotSDK\Cms\Blogs\Posts\Revisions\RevisionGetPreviousVersionParams;
use HubSpotSDK\Cms\Blogs\Posts\Revisions\RevisionGetPreviousVersionsParams;
use HubSpotSDK\Cms\Blogs\Posts\Revisions\RevisionRestorePreviousVersionParams;
use HubSpotSDK\Cms\Blogs\Posts\Revisions\RevisionRestorePreviousVersionToDraftParams;
use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
interface RevisionsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|RevisionGetPreviousVersionParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function getPreviousVersion(
        string $revisionID,
        array|RevisionGetPreviousVersionParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|RevisionGetPreviousVersionsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function getPreviousVersions(
        string $objectID,
        array|RevisionGetPreviousVersionsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|RevisionRestorePreviousVersionParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function restorePreviousVersion(
        string $revisionID,
        array|RevisionRestorePreviousVersionParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|RevisionRestorePreviousVersionToDraftParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function restorePreviousVersionToDraft(
        int $revisionID,
        array|RevisionRestorePreviousVersionToDraftParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
