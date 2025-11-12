<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Objects;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\CollectionResponseWithTotalSimplePublicObject;
use HubspotSDK\Crm\CreatedResponseSimplePublicObject;
use HubspotSDK\Crm\Objects\Courses\CourseCreateParams;
use HubspotSDK\Crm\Objects\Courses\CourseGetParams;
use HubspotSDK\Crm\Objects\Courses\CourseListParams;
use HubspotSDK\Crm\Objects\Courses\CourseSearchParams;
use HubspotSDK\Crm\Objects\Courses\CourseUpdateParams;
use HubspotSDK\Crm\SimplePublicObject;
use HubspotSDK\Crm\SimplePublicObjectWithAssociations;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

interface CoursesContract
{
    /**
     * @api
     *
     * @param array<mixed>|CourseCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|CourseCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): CreatedResponseSimplePublicObject;

    /**
     * @api
     *
     * @param array<mixed>|CourseUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $courseID,
        array|CourseUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): SimplePublicObject;

    /**
     * @api
     *
     * @param array<mixed>|CourseListParams $params
     *
     * @return Page<SimplePublicObjectWithAssociations>
     *
     * @throws APIException
     */
    public function list(
        array|CourseListParams $params,
        ?RequestOptions $requestOptions = null
    ): Page;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $courseID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|CourseGetParams $params
     *
     * @throws APIException
     */
    public function get(
        string $courseID,
        array|CourseGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): SimplePublicObjectWithAssociations;

    /**
     * @api
     *
     * @param array<mixed>|CourseSearchParams $params
     *
     * @throws APIException
     */
    public function search(
        array|CourseSearchParams $params,
        ?RequestOptions $requestOptions = null
    ): CollectionResponseWithTotalSimplePublicObject;
}
