<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\ObjectTypeDefinitionLabels;

/**
 * @phpstan-type object_type_definition_patch = array{
 *   clearDescription: bool,
 *   allowsSensitiveProperties?: bool,
 *   description?: string,
 *   labels?: ObjectTypeDefinitionLabels,
 *   primaryDisplayProperty?: string,
 *   requiredProperties?: list<string>,
 *   restorable?: bool,
 *   searchableProperties?: list<string>,
 *   secondaryDisplayProperties?: list<string>,
 * }
 */
final class ObjectTypeDefinitionPatch implements BaseModel
{
    /** @use SdkModel<object_type_definition_patch> */
    use SdkModel;

    #[Api]
    public bool $clearDescription;

    #[Api(optional: true)]
    public ?bool $allowsSensitiveProperties;

    #[Api(optional: true)]
    public ?string $description;

    #[Api(optional: true)]
    public ?ObjectTypeDefinitionLabels $labels;

    #[Api(optional: true)]
    public ?string $primaryDisplayProperty;

    /** @var list<string>|null $requiredProperties */
    #[Api(list: 'string', optional: true)]
    public ?array $requiredProperties;

    #[Api(optional: true)]
    public ?bool $restorable;

    /** @var list<string>|null $searchableProperties */
    #[Api(list: 'string', optional: true)]
    public ?array $searchableProperties;

    /** @var list<string>|null $secondaryDisplayProperties */
    #[Api(list: 'string', optional: true)]
    public ?array $secondaryDisplayProperties;

    /**
     * `new ObjectTypeDefinitionPatch()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ObjectTypeDefinitionPatch::with(clearDescription: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ObjectTypeDefinitionPatch)->withClearDescription(...)
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
        bool $clearDescription,
        ?bool $allowsSensitiveProperties = null,
        ?string $description = null,
        ?ObjectTypeDefinitionLabels $labels = null,
        ?string $primaryDisplayProperty = null,
        ?array $requiredProperties = null,
        ?bool $restorable = null,
        ?array $searchableProperties = null,
        ?array $secondaryDisplayProperties = null,
    ): self {
        $obj = new self;

        $obj->clearDescription = $clearDescription;

        null !== $allowsSensitiveProperties && $obj->allowsSensitiveProperties = $allowsSensitiveProperties;
        null !== $description && $obj->description = $description;
        null !== $labels && $obj->labels = $labels;
        null !== $primaryDisplayProperty && $obj->primaryDisplayProperty = $primaryDisplayProperty;
        null !== $requiredProperties && $obj->requiredProperties = $requiredProperties;
        null !== $restorable && $obj->restorable = $restorable;
        null !== $searchableProperties && $obj->searchableProperties = $searchableProperties;
        null !== $secondaryDisplayProperties && $obj->secondaryDisplayProperties = $secondaryDisplayProperties;

        return $obj;
    }

    public function withClearDescription(bool $clearDescription): self
    {
        $obj = clone $this;
        $obj->clearDescription = $clearDescription;

        return $obj;
    }

    public function withAllowsSensitiveProperties(
        bool $allowsSensitiveProperties
    ): self {
        $obj = clone $this;
        $obj->allowsSensitiveProperties = $allowsSensitiveProperties;

        return $obj;
    }

    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj->description = $description;

        return $obj;
    }

    public function withLabels(ObjectTypeDefinitionLabels $labels): self
    {
        $obj = clone $this;
        $obj->labels = $labels;

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
     * @param list<string> $requiredProperties
     */
    public function withRequiredProperties(array $requiredProperties): self
    {
        $obj = clone $this;
        $obj->requiredProperties = $requiredProperties;

        return $obj;
    }

    public function withRestorable(bool $restorable): self
    {
        $obj = clone $this;
        $obj->restorable = $restorable;

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
}
