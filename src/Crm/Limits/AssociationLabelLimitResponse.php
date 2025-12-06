<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Limits;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Objects\Schemas\ObjectsSchemasObjectTypeDefinition;
use HubspotSDK\ObjectTypeDefinitionLabels;

/**
 * @phpstan-type AssociationLabelLimitResponseShape = array{
 *   allLabels: list<string>,
 *   fromObjectType: ObjectsSchemasObjectTypeDefinition,
 *   limit: int,
 *   percentage: float,
 *   toObjectType: ObjectsSchemasObjectTypeDefinition,
 *   usage: int,
 * }
 */
final class AssociationLabelLimitResponse implements BaseModel
{
    /** @use SdkModel<AssociationLabelLimitResponseShape> */
    use SdkModel;

    /**
     * A list of all association labels.
     *
     * @var list<string> $allLabels
     */
    #[Api(list: 'string')]
    public array $allLabels;

    /**
     * Defines an object type.
     */
    #[Api]
    public ObjectsSchemasObjectTypeDefinition $fromObjectType;

    /**
     * The maximum number of association labels allowed.
     */
    #[Api]
    public int $limit;

    /**
     * The percentage of the association label limit that has been used.
     */
    #[Api]
    public float $percentage;

    /**
     * Defines an object type.
     */
    #[Api]
    public ObjectsSchemasObjectTypeDefinition $toObjectType;

    /**
     * The current number of association labels used.
     */
    #[Api]
    public int $usage;

    /**
     * `new AssociationLabelLimitResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AssociationLabelLimitResponse::with(
     *   allLabels: ...,
     *   fromObjectType: ...,
     *   limit: ...,
     *   percentage: ...,
     *   toObjectType: ...,
     *   usage: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AssociationLabelLimitResponse)
     *   ->withAllLabels(...)
     *   ->withFromObjectType(...)
     *   ->withLimit(...)
     *   ->withPercentage(...)
     *   ->withToObjectType(...)
     *   ->withUsage(...)
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
     * @param list<string> $allLabels
     * @param ObjectsSchemasObjectTypeDefinition|array{
     *   id: string,
     *   labels: ObjectTypeDefinitionLabels,
     *   name: string,
     *   requiredProperties: list<string>,
     *   archived?: bool|null,
     *   createdAt?: \DateTimeInterface|null,
     *   description?: string|null,
     *   fullyQualifiedName?: string|null,
     *   objectTypeId?: string|null,
     *   portalId?: int|null,
     *   primaryDisplayProperty?: string|null,
     *   searchableProperties?: list<string>|null,
     *   secondaryDisplayProperties?: list<string>|null,
     *   updatedAt?: \DateTimeInterface|null,
     * } $fromObjectType
     * @param ObjectsSchemasObjectTypeDefinition|array{
     *   id: string,
     *   labels: ObjectTypeDefinitionLabels,
     *   name: string,
     *   requiredProperties: list<string>,
     *   archived?: bool|null,
     *   createdAt?: \DateTimeInterface|null,
     *   description?: string|null,
     *   fullyQualifiedName?: string|null,
     *   objectTypeId?: string|null,
     *   portalId?: int|null,
     *   primaryDisplayProperty?: string|null,
     *   searchableProperties?: list<string>|null,
     *   secondaryDisplayProperties?: list<string>|null,
     *   updatedAt?: \DateTimeInterface|null,
     * } $toObjectType
     */
    public static function with(
        array $allLabels,
        ObjectsSchemasObjectTypeDefinition|array $fromObjectType,
        int $limit,
        float $percentage,
        ObjectsSchemasObjectTypeDefinition|array $toObjectType,
        int $usage,
    ): self {
        $obj = new self;

        $obj['allLabels'] = $allLabels;
        $obj['fromObjectType'] = $fromObjectType;
        $obj['limit'] = $limit;
        $obj['percentage'] = $percentage;
        $obj['toObjectType'] = $toObjectType;
        $obj['usage'] = $usage;

        return $obj;
    }

    /**
     * A list of all association labels.
     *
     * @param list<string> $allLabels
     */
    public function withAllLabels(array $allLabels): self
    {
        $obj = clone $this;
        $obj['allLabels'] = $allLabels;

        return $obj;
    }

    /**
     * Defines an object type.
     *
     * @param ObjectsSchemasObjectTypeDefinition|array{
     *   id: string,
     *   labels: ObjectTypeDefinitionLabels,
     *   name: string,
     *   requiredProperties: list<string>,
     *   archived?: bool|null,
     *   createdAt?: \DateTimeInterface|null,
     *   description?: string|null,
     *   fullyQualifiedName?: string|null,
     *   objectTypeId?: string|null,
     *   portalId?: int|null,
     *   primaryDisplayProperty?: string|null,
     *   searchableProperties?: list<string>|null,
     *   secondaryDisplayProperties?: list<string>|null,
     *   updatedAt?: \DateTimeInterface|null,
     * } $fromObjectType
     */
    public function withFromObjectType(
        ObjectsSchemasObjectTypeDefinition|array $fromObjectType
    ): self {
        $obj = clone $this;
        $obj['fromObjectType'] = $fromObjectType;

        return $obj;
    }

    /**
     * The maximum number of association labels allowed.
     */
    public function withLimit(int $limit): self
    {
        $obj = clone $this;
        $obj['limit'] = $limit;

        return $obj;
    }

    /**
     * The percentage of the association label limit that has been used.
     */
    public function withPercentage(float $percentage): self
    {
        $obj = clone $this;
        $obj['percentage'] = $percentage;

        return $obj;
    }

    /**
     * Defines an object type.
     *
     * @param ObjectsSchemasObjectTypeDefinition|array{
     *   id: string,
     *   labels: ObjectTypeDefinitionLabels,
     *   name: string,
     *   requiredProperties: list<string>,
     *   archived?: bool|null,
     *   createdAt?: \DateTimeInterface|null,
     *   description?: string|null,
     *   fullyQualifiedName?: string|null,
     *   objectTypeId?: string|null,
     *   portalId?: int|null,
     *   primaryDisplayProperty?: string|null,
     *   searchableProperties?: list<string>|null,
     *   secondaryDisplayProperties?: list<string>|null,
     *   updatedAt?: \DateTimeInterface|null,
     * } $toObjectType
     */
    public function withToObjectType(
        ObjectsSchemasObjectTypeDefinition|array $toObjectType
    ): self {
        $obj = clone $this;
        $obj['toObjectType'] = $toObjectType;

        return $obj;
    }

    /**
     * The current number of association labels used.
     */
    public function withUsage(int $usage): self
    {
        $obj = clone $this;
        $obj['usage'] = $usage;

        return $obj;
    }
}
