<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Limits;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type LimitAndUsageForObjectTypeShape = array{
 *   limit: int,
 *   objectTypeID: string,
 *   percentage: float,
 *   pluralLabel: string,
 *   singularLabel: string,
 *   usage: int,
 * }
 */
final class LimitAndUsageForObjectType implements BaseModel
{
    /** @use SdkModel<LimitAndUsageForObjectTypeShape> */
    use SdkModel;

    /**
     * The maximum allowed count for the object type.
     */
    #[Required]
    public int $limit;

    /**
     * The unique identifier for the object type.
     */
    #[Required('objectTypeId')]
    public string $objectTypeID;

    /**
     * The percentage of the limit that has been used.
     */
    #[Required]
    public float $percentage;

    /**
     * The plural label for the object type.
     */
    #[Required]
    public string $pluralLabel;

    /**
     * The singular label for the object type.
     */
    #[Required]
    public string $singularLabel;

    /**
     * The current usage count for the object type.
     */
    #[Required]
    public int $usage;

    /**
     * `new LimitAndUsageForObjectType()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * LimitAndUsageForObjectType::with(
     *   limit: ...,
     *   objectTypeID: ...,
     *   percentage: ...,
     *   pluralLabel: ...,
     *   singularLabel: ...,
     *   usage: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new LimitAndUsageForObjectType)
     *   ->withLimit(...)
     *   ->withObjectTypeID(...)
     *   ->withPercentage(...)
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
        int $limit,
        string $objectTypeID,
        float $percentage,
        string $pluralLabel,
        string $singularLabel,
        int $usage,
    ): self {
        $self = new self;

        $self['limit'] = $limit;
        $self['objectTypeID'] = $objectTypeID;
        $self['percentage'] = $percentage;
        $self['pluralLabel'] = $pluralLabel;
        $self['singularLabel'] = $singularLabel;
        $self['usage'] = $usage;

        return $self;
    }

    /**
     * The maximum allowed count for the object type.
     */
    public function withLimit(int $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

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
     * The percentage of the limit that has been used.
     */
    public function withPercentage(float $percentage): self
    {
        $self = clone $this;
        $self['percentage'] = $percentage;

        return $self;
    }

    /**
     * The plural label for the object type.
     */
    public function withPluralLabel(string $pluralLabel): self
    {
        $self = clone $this;
        $self['pluralLabel'] = $pluralLabel;

        return $self;
    }

    /**
     * The singular label for the object type.
     */
    public function withSingularLabel(string $singularLabel): self
    {
        $self = clone $this;
        $self['singularLabel'] = $singularLabel;

        return $self;
    }

    /**
     * The current usage count for the object type.
     */
    public function withUsage(int $usage): self
    {
        $self = clone $this;
        $self['usage'] = $usage;

        return $self;
    }
}
