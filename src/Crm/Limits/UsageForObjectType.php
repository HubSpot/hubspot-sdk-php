<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Limits;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type UsageForObjectTypeShape = array{
 *   objectTypeID: string, pluralLabel: string, singularLabel: string, usage: int
 * }
 */
final class UsageForObjectType implements BaseModel
{
    /** @use SdkModel<UsageForObjectTypeShape> */
    use SdkModel;

    /**
     * The unique identifier for the object type.
     */
    #[Required('objectTypeId')]
    public string $objectTypeID;

    /**
     * The plural form of the label for the object type.
     */
    #[Required]
    public string $pluralLabel;

    /**
     * The singular form of the label for the object type.
     */
    #[Required]
    public string $singularLabel;

    /**
     * The number of records used for the object type.
     */
    #[Required]
    public int $usage;

    /**
     * `new UsageForObjectType()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * UsageForObjectType::with(
     *   objectTypeID: ..., pluralLabel: ..., singularLabel: ..., usage: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new UsageForObjectType)
     *   ->withObjectTypeID(...)
     *   ->withPluralLabel(...)
     *   ->withSingularLabel(...)
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
     */
    public static function with(
        string $objectTypeID,
        string $pluralLabel,
        string $singularLabel,
        int $usage
    ): self {
        $self = new self;

        $self['objectTypeID'] = $objectTypeID;
        $self['pluralLabel'] = $pluralLabel;
        $self['singularLabel'] = $singularLabel;
        $self['usage'] = $usage;

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
     * The plural form of the label for the object type.
     */
    public function withPluralLabel(string $pluralLabel): self
    {
        $self = clone $this;
        $self['pluralLabel'] = $pluralLabel;

        return $self;
    }

    /**
     * The singular form of the label for the object type.
     */
    public function withSingularLabel(string $singularLabel): self
    {
        $self = clone $this;
        $self['singularLabel'] = $singularLabel;

        return $self;
    }

    /**
     * The number of records used for the object type.
     */
    public function withUsage(int $usage): self
    {
        $self = clone $this;
        $self['usage'] = $usage;

        return $self;
    }
}
