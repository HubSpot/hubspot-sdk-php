<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\CRM;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\CRM\PropertyValidations\CollectionResponsePublicPropertyValidationRuleMapNoPaging;
use HubspotSDK\CRM\PropertyValidations\CollectionResponsePublicPropertyValidationRuleNoPaging;
use HubspotSDK\RequestOptions;

interface PropertyValidationsContract
{
    /**
     * @api
     *
     * @throws APIException
     */
    public function list(
        string $objectTypeID,
        ?RequestOptions $requestOptions = null
    ): CollectionResponsePublicPropertyValidationRuleMapNoPaging;

    /**
     * @api
     *
     * @param string $objectTypeID
     *
     * @throws APIException
     */
    public function get(
        string $propertyName,
        $objectTypeID,
        ?RequestOptions $requestOptions = null,
    ): CollectionResponsePublicPropertyValidationRuleNoPaging;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getRaw(
        string $propertyName,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): CollectionResponsePublicPropertyValidationRuleNoPaging;
}
