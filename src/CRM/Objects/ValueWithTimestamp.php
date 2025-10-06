<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Objects;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type value_with_timestamp = array{
 *   sourceType: string,
 *   timestamp: \DateTimeInterface,
 *   value: string,
 *   sourceID?: string,
 *   sourceLabel?: string,
 *   updatedByUserID?: int,
 * }
 */
final class ValueWithTimestamp implements BaseModel
{
    /** @use SdkModel<value_with_timestamp> */
    use SdkModel;

    #[Api]
    public string $sourceType;

    #[Api]
    public \DateTimeInterface $timestamp;

    #[Api]
    public string $value;

    #[Api('sourceId', optional: true)]
    public ?string $sourceID;

    #[Api(optional: true)]
    public ?string $sourceLabel;

    #[Api('updatedByUserId', optional: true)]
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

        $obj->sourceType = $sourceType;
        $obj->timestamp = $timestamp;
        $obj->value = $value;

        null !== $sourceID && $obj->sourceID = $sourceID;
        null !== $sourceLabel && $obj->sourceLabel = $sourceLabel;
        null !== $updatedByUserID && $obj->updatedByUserID = $updatedByUserID;

        return $obj;
    }

    public function withSourceType(string $sourceType): self
    {
        $obj = clone $this;
        $obj->sourceType = $sourceType;

        return $obj;
    }

    public function withTimestamp(\DateTimeInterface $timestamp): self
    {
        $obj = clone $this;
        $obj->timestamp = $timestamp;

        return $obj;
    }

    public function withValue(string $value): self
    {
        $obj = clone $this;
        $obj->value = $value;

        return $obj;
    }

    public function withSourceID(string $sourceID): self
    {
        $obj = clone $this;
        $obj->sourceID = $sourceID;

        return $obj;
    }

    public function withSourceLabel(string $sourceLabel): self
    {
        $obj = clone $this;
        $obj->sourceLabel = $sourceLabel;

        return $obj;
    }

    public function withUpdatedByUserID(int $updatedByUserID): self
    {
        $obj = clone $this;
        $obj->updatedByUserID = $updatedByUserID;

        return $obj;
    }
}
