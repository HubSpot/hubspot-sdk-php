<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\Properties;

use HubspotSDK\BatchResponseProperty;
use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Properties\Batch\BatchCreateParams;
use HubspotSDK\Crm\Properties\Batch\BatchDeleteParams;
use HubspotSDK\Crm\Properties\Batch\BatchGetParams;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\Properties\BatchContract;

final class BatchService implements BatchContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a batch of properties using the same rules as when creating an individual property.
     *
     * @param array{
     *   inputs: list<array{
     *     fieldType: "booleancheckbox"|"calculation_equation"|"checkbox"|"date"|"file"|"html"|"number"|"phonenumber"|"radio"|"select"|"text"|"textarea",
     *     groupName: string,
     *     label: string,
     *     name: string,
     *     type: "bool"|"date"|"datetime"|"enumeration"|"number"|"phone_number"|"string",
     *     calculationFormula?: string,
     *     dataSensitivity?: "non_sensitive"|"sensitive"|"highly_sensitive",
     *     description?: string,
     *     displayOrder?: int,
     *     externalOptions?: bool,
     *     formField?: bool,
     *     hasUniqueValue?: bool,
     *     hidden?: bool,
     *     options?: list<array<mixed>>,
     *     referencedObjectType?: string,
     *   }>,
     * }|BatchCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        string $objectType,
        array|BatchCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseProperty {
        [$parsed, $options] = BatchCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['crm/v3/properties/%1$s/batch/create', $objectType],
            body: (object) $parsed,
            options: $options,
            convert: BatchResponseProperty::class,
        );
    }

    /**
     * @api
     *
     * Archive a provided list of properties. This method will return a 204 No Content response on success regardless of the initial state of the property (e.g. active, already archived, non-existent).
     *
     * @param array{inputs: list<array{name: string}>}|BatchDeleteParams $params
     *
     * @throws APIException
     */
    public function delete(
        string $objectType,
        array|BatchDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        [$parsed, $options] = BatchDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['crm/v3/properties/%1$s/batch/archive', $objectType],
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Read a provided list of properties.
     *
     * @param array{
     *   archived: bool,
     *   inputs: list<array{name: string}>,
     *   dataSensitivity?: "non_sensitive"|"sensitive"|"highly_sensitive",
     * }|BatchGetParams $params
     *
     * @throws APIException
     */
    public function get(
        string $objectType,
        array|BatchGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseProperty {
        [$parsed, $options] = BatchGetParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['crm/v3/properties/%1$s/batch/read', $objectType],
            body: (object) $parsed,
            options: $options,
            convert: BatchResponseProperty::class,
        );
    }
}
