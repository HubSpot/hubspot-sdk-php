<?php

declare(strict_types=1);

namespace HubspotSDK\CRM;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type crm_object_type_definition = array{
 *   id: string,
 *   labels: CRMObjectTypeDefinitionLabels,
 *   name: string,
 *   requiredProperties: list<string>,
 *   archived?: bool,
 *   createdAt?: \DateTimeInterface,
 *   fullyQualifiedName?: string,
 *   objectTypeID?: string,
 *   portalID?: int,
 *   primaryDisplayProperty?: string,
 *   searchableProperties?: list<string>,
 *   secondaryDisplayProperties?: list<string>,
 *   updatedAt?: \DateTimeInterface,
 * }
 */
final class CRMObjectTypeDefinition implements BaseModel
{
    /** @use SdkModel<crm_object_type_definition> */
    use SdkModel;

    #[Api]
    public string $id;

    #[Api]
    public CRMObjectTypeDefinitionLabels $labels;

    #[Api]
    public string $name;

    /** @var list<string> $requiredProperties */
    #[Api(list: 'string')]
    public array $requiredProperties;

    #[Api(optional: true)]
    public ?bool $archived;

    #[Api(optional: true)]
    public ?\DateTimeInterface $createdAt;

    #[Api(optional: true)]
    public ?string $fullyQualifiedName;

    #[Api('objectTypeId', optional: true)]
    public ?string $objectTypeID;

    #[Api('portalId', optional: true)]
    public ?int $portalID;

    #[Api(optional: true)]
    public ?string $primaryDisplayProperty;

    /** @var list<string>|null $searchableProperties */
    #[Api(list: 'string', optional: true)]
    public ?array $searchableProperties;

    /** @var list<string>|null $secondaryDisplayProperties */
    #[Api(list: 'string', optional: true)]
    public ?array $secondaryDisplayProperties;

    #[Api(optional: true)]
    public ?\DateTimeInterface $updatedAt;

    /**
     * `new CRMObjectTypeDefinition()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CRMObjectTypeDefinition::with(
     *   id: ..., labels: ..., name: ..., requiredProperties: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CRMObjectTypeDefinition)
     *   ->withID(...)
     *   ->withLabels(...)
     *   ->withName(...)
     *   ->withRequiredProperties(...)
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
     * @param list<string> $requiredProperties
     * @param list<string> $searchableProperties
     * @param list<string> $secondaryDisplayProperties
     */
    public static function with(
        string $id,
        CRMObjectTypeDefinitionLabels $labels,
        string $name,
        array $requiredProperties,
        ?bool $archived = null,
        ?\DateTimeInterface $createdAt = null,
        ?string $fullyQualifiedName = null,
        ?string $objectTypeID = null,
        ?int $portalID = null,
        ?string $primaryDisplayProperty = null,
        ?array $searchableProperties = null,
        ?array $secondaryDisplayProperties = null,
        ?\DateTimeInterface $updatedAt = null,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->labels = $labels;
        $obj->name = $name;
        $obj->requiredProperties = $requiredProperties;

        null !== $archived && $obj->archived = $archived;
        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $fullyQualifiedName && $obj->fullyQualifiedName = $fullyQualifiedName;
        null !== $objectTypeID && $obj->objectTypeID = $objectTypeID;
        null !== $portalID && $obj->portalID = $portalID;
        null !== $primaryDisplayProperty && $obj->primaryDisplayProperty = $primaryDisplayProperty;
        null !== $searchableProperties && $obj->searchableProperties = $searchableProperties;
        null !== $secondaryDisplayProperties && $obj->secondaryDisplayProperties = $secondaryDisplayProperties;
        null !== $updatedAt && $obj->updatedAt = $updatedAt;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    public function withLabels(CRMObjectTypeDefinitionLabels $labels): self
    {
        $obj = clone $this;
        $obj->labels = $labels;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * @param list<string> $requiredProperties
     */
    public function withRequiredProperties(array $requiredProperties): self
    {
        $obj = clone $this;
        $obj->requiredProperties = $requiredProperties;

        return $obj;
    }

    public function withArchived(bool $archived): self
    {
        $obj = clone $this;
        $obj->archived = $archived;

        return $obj;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    public function withFullyQualifiedName(string $fullyQualifiedName): self
    {
        $obj = clone $this;
        $obj->fullyQualifiedName = $fullyQualifiedName;

        return $obj;
    }

    public function withObjectTypeID(string $objectTypeID): self
    {
        $obj = clone $this;
        $obj->objectTypeID = $objectTypeID;

        return $obj;
    }

    public function withPortalID(int $portalID): self
    {
        $obj = clone $this;
        $obj->portalID = $portalID;

        return $obj;
    }

    public function withPrimaryDisplayProperty(
        string $primaryDisplayProperty
    ): self {
        $obj = clone $this;
        $obj->primaryDisplayProperty = $primaryDisplayProperty;

        return $obj;
    }

    /**
     * @param list<string> $searchableProperties
     */
    public function withSearchableProperties(array $searchableProperties): self
    {
        $obj = clone $this;
        $obj->searchableProperties = $searchableProperties;

        return $obj;
    }

    /**
     * @param list<string> $secondaryDisplayProperties
     */
    public function withSecondaryDisplayProperties(
        array $secondaryDisplayProperties
    ): self {
        $obj = clone $this;
        $obj->secondaryDisplayProperties = $secondaryDisplayProperties;

        return $obj;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }
}
