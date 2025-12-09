<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Properties;

use HubspotSDK\BatchResponseProperty;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\PropertyCreate\DataSensitivity;
use HubspotSDK\PropertyCreate\FieldType;
use HubspotSDK\PropertyCreate\Type;
use HubspotSDK\RequestOptions;

interface BatchContract
{
    /**
     * @api
     *
     * @param list<array{
     *   fieldType: 'booleancheckbox'|'calculation_equation'|'checkbox'|'date'|'file'|'html'|'number'|'phonenumber'|'radio'|'select'|'text'|'textarea'|FieldType,
     *   groupName: string,
     *   label: string,
     *   name: string,
     *   type: 'bool'|'date'|'datetime'|'enumeration'|'number'|'phone_number'|'string'|Type,
     *   calculationFormula?: string,
     *   dataSensitivity?: 'highly_sensitive'|'non_sensitive'|'sensitive'|DataSensitivity,
     *   description?: string,
     *   displayOrder?: int,
     *   externalOptions?: bool,
     *   formField?: bool,
     *   hasUniqueValue?: bool,
     *   hidden?: bool,
     *   options?: list<array{
     *     displayOrder: int,
     *     hidden: bool,
     *     label: string,
     *     value: string,
     *     description?: string,
     *   }>,
     *   referencedObjectType?: string,
     * }> $inputs
     *
     * @throws APIException
     */
    public function create(
        string $objectType,
        array $inputs,
        ?RequestOptions $requestOptions = null
    ): BatchResponseProperty;

    /**
     * @api
     *
     * @param list<array{name: string}> $inputs
     *
     * @throws APIException
     */
    public function delete(
        string $objectType,
        array $inputs,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param string $objectType Path param:
     * @param bool $archived Body param:
     * @param 'highly_sensitive'|'non_sensitive'|'sensitive'|\HubspotSDK\Crm\Properties\Batch\BatchGetParams\DataSensitivity $dataSensitivity Body param:
     * @param list<array{name: string}> $inputs Body param:
     * @param string $locale Query param:
     *
     * @throws APIException
     */
    public function get(
        string $objectType,
        bool $archived,
        string|\HubspotSDK\Crm\Properties\Batch\BatchGetParams\DataSensitivity $dataSensitivity,
        array $inputs,
        ?string $locale = null,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseProperty;
}
