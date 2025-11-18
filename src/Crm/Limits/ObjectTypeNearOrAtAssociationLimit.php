<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Limits;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ObjectTypeNearOrAtAssociationLimitShape = array{
 *   hasRecordsAtLimit: bool,
 *   hasRecordsNearLimit: bool,
 *   objectTypeId: string,
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
    #[Api]
    public bool $hasRecordsAtLimit;

    /**
     * Indicates whether there are records that are approaching the association limit.
     */
    #[Api]
    public bool $hasRecordsNearLimit;

    /**
     * The unique identifier for the object type.
     */
    #[Api]
    public string $objectTypeId;

    /**
     * The plural form of the label for the object type.
     */
    #[Api]
    public string $pluralLabel;

    /**
     * The singular form of the label for the object type.
     */
    #[Api]
    public string $singularLabel;

    /**
     * `new ObjectTypeNearOrAtAssociationLimit()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ObjectTypeNearOrAtAssociationLimit::with(
     *   hasRecordsAtLimit: ...,
     *   hasRecordsNearLimit: ...,
     *   objectTypeId: ...,
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
        string $objectTypeId,
        string $pluralLabel,
        string $singularLabel,
    ): self {
        $obj = new self;

        $obj->hasRecordsAtLimit = $hasRecordsAtLimit;
        $obj->hasRecordsNearLimit = $hasRecordsNearLimit;
        $obj->objectTypeId = $objectTypeId;
        $obj->pluralLabel = $pluralLabel;
        $obj->singularLabel = $singularLabel;

        return $obj;
    }

    /**
     * Indicates whether there are records that have reached the association limit.
     */
    public function withHasRecordsAtLimit(bool $hasRecordsAtLimit): self
    {
        $obj = clone $this;
        $obj->hasRecordsAtLimit = $hasRecordsAtLimit;

        return $obj;
    }

    /**
     * Indicates whether there are records that are approaching the association limit.
     */
    public function withHasRecordsNearLimit(bool $hasRecordsNearLimit): self
    {
        $obj = clone $this;
        $obj->hasRecordsNearLimit = $hasRecordsNearLimit;

        return $obj;
    }

    /**
     * The unique identifier for the object type.
     */
    public function withObjectTypeID(string $objectTypeID): self
    {
        $obj = clone $this;
        $obj->objectTypeId = $objectTypeID;

        return $obj;
    }

    /**
     * The plural form of the label for the object type.
     */
    public function withPluralLabel(string $pluralLabel): self
    {
        $obj = clone $this;
        $obj->pluralLabel = $pluralLabel;

        return $obj;
    }

    /**
     * The singular form of the label for the object type.
     */
    public function withSingularLabel(string $singularLabel): self
    {
        $obj = clone $this;
        $obj->singularLabel = $singularLabel;

        return $obj;
    }
}
