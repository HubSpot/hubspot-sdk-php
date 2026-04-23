<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Limits;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type LimitsObjectTypeDefinitionShape = array{
 *   objectTypeID: string, pluralLabel: string, singularLabel: string
 * }
 */
final class LimitsObjectTypeDefinition implements BaseModel
{
    /** @use SdkModel<LimitsObjectTypeDefinitionShape> */
    use SdkModel;

    /**
     * The unique identifier for the object type.
     */
    #[Required('objectTypeId')]
    public string $objectTypeID;

    /**
     * The plural form label for the object type.
     */
    #[Required]
    public string $pluralLabel;

    /**
     * The singular form label for the object type.
     */
    #[Required]
    public string $singularLabel;

    /**
     * `new LimitsObjectTypeDefinition()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * LimitsObjectTypeDefinition::with(
     *   objectTypeID: ..., pluralLabel: ..., singularLabel: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new LimitsObjectTypeDefinition)
     *   ->withObjectTypeID(...)
     *   ->withPluralLabel(...)
     *   ->withSingularLabel(...)
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
     */
    public static function with(
        string $objectTypeID,
        string $pluralLabel,
        string $singularLabel
    ): self {
        $self = new self;

        $self['objectTypeID'] = $objectTypeID;
        $self['pluralLabel'] = $pluralLabel;
        $self['singularLabel'] = $singularLabel;

        return $self;
    }

    /**
     * The unique identifier for the object type.
     */
    public function withObjectTypeID(string $objectTypeID): self
    {
        $self = clone $this;
        $self['objectTypeID'] = $objectTypeID;

        return $self;
    }

    /**
     * The plural form label for the object type.
     */
    public function withPluralLabel(string $pluralLabel): self
    {
        $self = clone $this;
        $self['pluralLabel'] = $pluralLabel;

        return $self;
    }

    /**
     * The singular form label for the object type.
     */
    public function withSingularLabel(string $singularLabel): self
    {
        $self = clone $this;
        $self['singularLabel'] = $singularLabel;

        return $self;
    }
}
