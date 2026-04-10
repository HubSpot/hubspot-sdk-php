<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Limits;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ObjectTypeNearOrAtAssociationLimitShape = array{
 *   hasRecordsAtLimit: bool,
 *   hasRecordsNearLimit: bool,
 *   objectTypeID: string,
 *   pluralLabel: string,
 *   singularLabel: string,
 * }
 */
final class ObjectTypeNearOrAtAssociationLimit implements BaseModel
{
    /** @use SdkModel<ObjectTypeNearOrAtAssociationLimitShape> */
    use SdkModel;

    /**
     * Indicates whether there are records that have reached the association limit.
     */
    #[Required]
    public bool $hasRecordsAtLimit;

    /**
     * Indicates whether there are records that are approaching the association limit.
     */
    #[Required]
    public bool $hasRecordsNearLimit;

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
     * `new ObjectTypeNearOrAtAssociationLimit()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ObjectTypeNearOrAtAssociationLimit::with(
     *   hasRecordsAtLimit: ...,
     *   hasRecordsNearLimit: ...,
     *   objectTypeID: ...,
     *   pluralLabel: ...,
     *   singularLabel: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ObjectTypeNearOrAtAssociationLimit)
     *   ->withHasRecordsAtLimit(...)
     *   ->withHasRecordsNearLimit(...)
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
        bool $hasRecordsAtLimit,
        bool $hasRecordsNearLimit,
        string $objectTypeID,
        string $pluralLabel,
        string $singularLabel,
    ): self {
        $self = new self;

        $self['hasRecordsAtLimit'] = $hasRecordsAtLimit;
        $self['hasRecordsNearLimit'] = $hasRecordsNearLimit;
        $self['objectTypeID'] = $objectTypeID;
        $self['pluralLabel'] = $pluralLabel;
        $self['singularLabel'] = $singularLabel;

        return $self;
    }

    /**
     * Indicates whether there are records that have reached the association limit.
     */
    public function withHasRecordsAtLimit(bool $hasRecordsAtLimit): self
    {
        $self = clone $this;
        $self['hasRecordsAtLimit'] = $hasRecordsAtLimit;

        return $self;
    }

    /**
     * Indicates whether there are records that are approaching the association limit.
     */
    public function withHasRecordsNearLimit(bool $hasRecordsNearLimit): self
    {
        $self = clone $this;
        $self['hasRecordsNearLimit'] = $hasRecordsNearLimit;

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
}
