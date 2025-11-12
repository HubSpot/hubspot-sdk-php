<?php

declare(strict_types=1);

namespace HubspotSDK\Crm;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Property model that includes timestamp.
 *
 * @phpstan-type ValueWithTimestampShape = array{
 *   sourceType: string,
 *   timestamp: \DateTimeInterface,
 *   value: string,
 *   sourceId?: string|null,
 *   sourceLabel?: string|null,
 *   updatedByUserId?: int|null,
 * }
 */
final class ValueWithTimestamp implements BaseModel
{
    /** @use SdkModel<ValueWithTimestampShape> */
    use SdkModel;

    /**
     * The property type.
     */
    #[Api]
    public string $sourceType;

    /**
     * The timestamp when the property was updated, in ISO 8601 format.
     */
    #[Api]
    public \DateTimeInterface $timestamp;

    /**
     * The property value.
     */
    #[Api]
    public string $value;

    /**
     * The unique ID of the property.
     */
    #[Api(optional: true)]
    public ?string $sourceId;

    /**
     * A human-readable label.
     */
    #[Api(optional: true)]
    public ?string $sourceLabel;

    /**
     * The ID of the user who last updated the property.
     */
    #[Api(optional: true)]
    public ?int $updatedByUserId;

    /**
     * `new ValueWithTimestamp()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ValueWithTimestamp::with(sourceType: ..., timestamp: ..., value: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ValueWithTimestamp)
     *   ->withSourceType(...)
     *   ->withTimestamp(...)
     *   ->withValue(...)
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
        string $sourceType,
        \DateTimeInterface $timestamp,
        string $value,
        ?string $sourceId = null,
        ?string $sourceLabel = null,
        ?int $updatedByUserId = null,
    ): self {
        $obj = new self;

        $obj->sourceType = $sourceType;
        $obj->timestamp = $timestamp;
        $obj->value = $value;

        null !== $sourceId && $obj->sourceId = $sourceId;
        null !== $sourceLabel && $obj->sourceLabel = $sourceLabel;
        null !== $updatedByUserId && $obj->updatedByUserId = $updatedByUserId;

        return $obj;
    }

    /**
     * The property type.
     */
    public function withSourceType(string $sourceType): self
    {
        $obj = clone $this;
        $obj->sourceType = $sourceType;

        return $obj;
    }

    /**
     * The timestamp when the property was updated, in ISO 8601 format.
     */
    public function withTimestamp(\DateTimeInterface $timestamp): self
    {
        $obj = clone $this;
        $obj->timestamp = $timestamp;

        return $obj;
    }

    /**
     * The property value.
     */
    public function withValue(string $value): self
    {
        $obj = clone $this;
        $obj->value = $value;

        return $obj;
    }

    /**
     * The unique ID of the property.
     */
    public function withSourceID(string $sourceID): self
    {
        $obj = clone $this;
        $obj->sourceId = $sourceID;

        return $obj;
    }

    /**
     * A human-readable label.
     */
    public function withSourceLabel(string $sourceLabel): self
    {
        $obj = clone $this;
        $obj->sourceLabel = $sourceLabel;

        return $obj;
    }

    /**
     * The ID of the user who last updated the property.
     */
    public function withUpdatedByUserID(int $updatedByUserID): self
    {
        $obj = clone $this;
        $obj->updatedByUserId = $updatedByUserID;

        return $obj;
    }
}
