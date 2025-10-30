<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Limits;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

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

    #[Api]
    public bool $hasRecordsAtLimit;

    #[Api]
    public bool $hasRecordsNearLimit;

    #[Api('objectTypeId')]
    public string $objectTypeID;

    #[Api]
    public string $pluralLabel;

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
        $obj = new self;

        $obj->hasRecordsAtLimit = $hasRecordsAtLimit;
        $obj->hasRecordsNearLimit = $hasRecordsNearLimit;
        $obj->objectTypeID = $objectTypeID;
        $obj->pluralLabel = $pluralLabel;
        $obj->singularLabel = $singularLabel;

        return $obj;
    }

    public function withHasRecordsAtLimit(bool $hasRecordsAtLimit): self
    {
        $obj = clone $this;
        $obj->hasRecordsAtLimit = $hasRecordsAtLimit;

        return $obj;
    }

    public function withHasRecordsNearLimit(bool $hasRecordsNearLimit): self
    {
        $obj = clone $this;
        $obj->hasRecordsNearLimit = $hasRecordsNearLimit;

        return $obj;
    }

    public function withObjectTypeID(string $objectTypeID): self
    {
        $obj = clone $this;
        $obj->objectTypeID = $objectTypeID;

        return $obj;
    }

    public function withPluralLabel(string $pluralLabel): self
    {
        $obj = clone $this;
        $obj->pluralLabel = $pluralLabel;

        return $obj;
    }

    public function withSingularLabel(string $singularLabel): self
    {
        $obj = clone $this;
        $obj->singularLabel = $singularLabel;

        return $obj;
    }
}
