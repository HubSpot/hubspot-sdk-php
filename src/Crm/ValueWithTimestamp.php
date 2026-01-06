<?php

declare(strict_types=1);

namespace HubspotSDK\Crm;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Property model that includes timestamp.
 *
 * @phpstan-type ValueWithTimestampShape = array{
 *   sourceType: string,
 *   timestamp: \DateTimeInterface,
 *   value: string,
 *   sourceID?: string|null,
 *   sourceLabel?: string|null,
 *   updatedByUserID?: int|null,
 * }
 */
final class ValueWithTimestamp implements BaseModel
{
    /** @use SdkModel<ValueWithTimestampShape> */
    use SdkModel;

    /**
     * The property type.
     */
    #[Required]
    public string $sourceType;

    /**
     * The timestamp when the property was updated, in ISO 8601 format.
     */
    #[Required]
    public \DateTimeInterface $timestamp;

    /**
     * The property value.
     */
    #[Required]
    public string $value;

    /**
     * The unique ID of the property.
     */
    #[Optional('sourceId')]
    public ?string $sourceID;

    /**
     * A human-readable label.
     */
    #[Optional]
    public ?string $sourceLabel;

    /**
     * The ID of the user who last updated the property.
     */
    #[Optional('updatedByUserId')]
    public ?int $updatedByUserID;

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
        ?string $sourceID = null,
        ?string $sourceLabel = null,
        ?int $updatedByUserID = null,
    ): self {
        $obj = new self;

        $obj['sourceType'] = $sourceType;
        $obj['timestamp'] = $timestamp;
        $obj['value'] = $value;

        null !== $sourceID && $obj['sourceID'] = $sourceID;
        null !== $sourceLabel && $obj['sourceLabel'] = $sourceLabel;
        null !== $updatedByUserID && $obj['updatedByUserID'] = $updatedByUserID;

        return $obj;
    }

    /**
     * The property type.
     */
    public function withSourceType(string $sourceType): self
    {
        $obj = clone $this;
        $obj['sourceType'] = $sourceType;

        return $obj;
    }

    /**
     * The timestamp when the property was updated, in ISO 8601 format.
     */
    public function withTimestamp(\DateTimeInterface $timestamp): self
    {
        $obj = clone $this;
        $obj['timestamp'] = $timestamp;

        return $obj;
    }

    /**
     * The property value.
     */
    public function withValue(string $value): self
    {
        $obj = clone $this;
        $obj['value'] = $value;

        return $obj;
    }

    /**
     * The unique ID of the property.
     */
    public function withSourceID(string $sourceID): self
    {
        $obj = clone $this;
        $obj['sourceID'] = $sourceID;

        return $obj;
    }

    /**
     * A human-readable label.
     */
    public function withSourceLabel(string $sourceLabel): self
    {
        $obj = clone $this;
        $obj['sourceLabel'] = $sourceLabel;

        return $obj;
    }

    /**
     * The ID of the user who last updated the property.
     */
    public function withUpdatedByUserID(int $updatedByUserID): self
    {
        $obj = clone $this;
        $obj['updatedByUserID'] = $updatedByUserID;

        return $obj;
    }
}
