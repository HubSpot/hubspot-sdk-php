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
        $self = new self;

        $self['sourceType'] = $sourceType;
        $self['timestamp'] = $timestamp;
        $self['value'] = $value;

        null !== $sourceID && $self['sourceID'] = $sourceID;
        null !== $sourceLabel && $self['sourceLabel'] = $sourceLabel;
        null !== $updatedByUserID && $self['updatedByUserID'] = $updatedByUserID;

        return $self;
    }

    /**
     * The property type.
     */
    public function withSourceType(string $sourceType): self
    {
        $self = clone $this;
        $self['sourceType'] = $sourceType;

        return $self;
    }

    /**
     * The timestamp when the property was updated, in ISO 8601 format.
     */
    public function withTimestamp(\DateTimeInterface $timestamp): self
    {
        $self = clone $this;
        $self['timestamp'] = $timestamp;

        return $self;
    }

    /**
     * The property value.
     */
    public function withValue(string $value): self
    {
        $self = clone $this;
        $self['value'] = $value;

        return $self;
    }

    /**
     * The unique ID of the property.
     */
    public function withSourceID(string $sourceID): self
    {
        $self = clone $this;
        $self['sourceID'] = $sourceID;

        return $self;
    }

    /**
     * A human-readable label.
     */
    public function withSourceLabel(string $sourceLabel): self
    {
        $self = clone $this;
        $self['sourceLabel'] = $sourceLabel;

        return $self;
    }

    /**
     * The ID of the user who last updated the property.
     */
    public function withUpdatedByUserID(int $updatedByUserID): self
    {
        $self = clone $this;
        $self['updatedByUserID'] = $updatedByUserID;

        return $self;
    }
}
