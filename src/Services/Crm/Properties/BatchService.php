<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\Properties;

use HubspotSDK\BatchResponseProperty;
use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\PropertyCreate\DataSensitivity;
use HubspotSDK\PropertyCreate\FieldType;
use HubspotSDK\PropertyCreate\Type;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\Properties\BatchContract;

final class BatchService implements BatchContract
{
    /**
     * @api
     */
    public BatchRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new BatchRawService($client);
    }

    /**
     * @api
     *
     * Create a batch of properties using the same rules as when creating an individual property.
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
    ): BatchResponseProperty {
        $params = Util::removeNulls(['inputs' => $inputs]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create($objectType, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Archive a provided list of properties. This method will return a 204 No Content response on success regardless of the initial state of the property (e.g. active, already archived, non-existent).
     *
     * @param list<array{name: string}> $inputs
     *
     * @throws APIException
     */
    public function delete(
        string $objectType,
        array $inputs,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = Util::removeNulls(['inputs' => $inputs]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($objectType, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Read a provided list of properties.
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
    ): BatchResponseProperty {
        $params = Util::removeNulls(
            [
                'archived' => $archived,
                'dataSensitivity' => $dataSensitivity,
                'inputs' => $inputs,
                'locale' => $locale,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get($objectType, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
