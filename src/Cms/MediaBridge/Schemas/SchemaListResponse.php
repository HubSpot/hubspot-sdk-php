<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge\Schemas;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkResponse;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\Contracts\ResponseConverter;
use HubspotSDK\Crm\Objects\Schemas\ObjectSchema;
use HubspotSDK\Events\EventDefinitions\AssociationDefinition;
use HubspotSDK\ObjectTypeDefinitionLabels;
use HubspotSDK\Property;

/**
 * @phpstan-type SchemaListResponseShape = array{results: list<ObjectSchema>}
 */
final class SchemaListResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<SchemaListResponseShape> */
    use SdkModel;

    use SdkResponse;

    /** @var list<ObjectSchema> $results */
    #[Api(list: ObjectSchema::class)]
    public array $results;

    /**
     * `new SchemaListResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SchemaListResponse::with(results: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SchemaListResponse)->withResults(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<ObjectSchema|array{
     *   id: string,
     *   associations: list<AssociationDefinition>,
     *   labels: ObjectTypeDefinitionLabels,
     *   name: string,
     *   properties: list<Property>,
     *   requiredProperties: list<string>,
     *   archived?: bool|null,
     *   createdAt?: \DateTimeInterface|null,
     *   createdByUserId?: int|null,
     *   description?: string|null,
     *   fullyQualifiedName?: string|null,
     *   objectTypeId?: string|null,
     *   primaryDisplayProperty?: string|null,
     *   searchableProperties?: list<string>|null,
     *   secondaryDisplayProperties?: list<string>|null,
     *   updatedAt?: \DateTimeInterface|null,
     *   updatedByUserId?: int|null,
     * }> $results
     */
    public static function with(array $results): self
    {
        $obj = new self;

        $obj['results'] = $results;

        return $obj;
    }

    /**
     * @param list<ObjectSchema|array{
     *   id: string,
     *   associations: list<AssociationDefinition>,
     *   labels: ObjectTypeDefinitionLabels,
     *   name: string,
     *   properties: list<Property>,
     *   requiredProperties: list<string>,
     *   archived?: bool|null,
     *   createdAt?: \DateTimeInterface|null,
     *   createdByUserId?: int|null,
     *   description?: string|null,
     *   fullyQualifiedName?: string|null,
     *   objectTypeId?: string|null,
     *   primaryDisplayProperty?: string|null,
     *   searchableProperties?: list<string>|null,
     *   secondaryDisplayProperties?: list<string>|null,
     *   updatedAt?: \DateTimeInterface|null,
     *   updatedByUserId?: int|null,
     * }> $results
     */
    public function withResults(array $results): self
    {
        $obj = clone $this;
        $obj['results'] = $results;

        return $obj;
    }
}
