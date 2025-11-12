<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Events;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Events\PropertyValue\DataSensitivity;
use HubspotSDK\Marketing\Events\PropertyValue\Source;

/**
 * Represents a single custom property of a marketing event, storing its name, value, metadata (like source, timestamp, and sensitivity), and related audit information for tracking changes.
 *
 * @phpstan-type PropertyValueShape = array{
 *   name: string,
 *   sourceUpstreamDeployable: string,
 *   value: string,
 *   dataSensitivity?: value-of<DataSensitivity>|null,
 *   isEncrypted?: bool|null,
 *   isLargeValue?: bool|null,
 *   persistenceTimestamp?: int|null,
 *   requestId?: string|null,
 *   selectedByUser?: bool|null,
 *   selectedByUserTimestamp?: int|null,
 *   source?: value-of<Source>|null,
 *   sourceId?: string|null,
 *   sourceLabel?: string|null,
 *   sourceMetadata?: string|null,
 *   sourceVid?: list<int>|null,
 *   timestamp?: int|null,
 *   unit?: string|null,
 *   updatedByUserId?: int|null,
 *   useTimestampAsPersistenceTimestamp?: bool|null,
 * }
 */
final class PropertyValue implements BaseModel
{
    /** @use SdkModel<PropertyValueShape> */
    use SdkModel;

    /**
     * Name of custom property.
     */
    #[Api]
    public string $name;

    #[Api]
    public string $sourceUpstreamDeployable;

    /**
     * Custom property value.
     */
    #[Api]
    public string $value;

    /**
     * The sensitivity level of the property, such as "non_sensitive", "sensitive", and "highly_sensitive".
     *
     * @var value-of<DataSensitivity>|null $dataSensitivity
     */
    #[Api(enum: DataSensitivity::class, optional: true)]
    public ?string $dataSensitivity;

    /**
     * Whether the property value is encrypted.
     */
    #[Api(optional: true)]
    public ?bool $isEncrypted;

    #[Api(optional: true)]
    public ?bool $isLargeValue;

    #[Api(optional: true)]
    public ?int $persistenceTimestamp;

    /**
     * A unique ID associated with this request.
     */
    #[Api(optional: true)]
    public ?string $requestId;

    /**
     * Whether the value was selected by a user.
     */
    #[Api(optional: true)]
    public ?bool $selectedByUser;

    /**
     * The timestamp when the value was selected by a user, if applicable.
     */
    #[Api(optional: true)]
    public ?int $selectedByUserTimestamp;

    /**
     * The origin of the property value, such as "IMPORT" or "API".
     *
     * @var value-of<Source>|null $source
     */
    #[Api(enum: Source::class, optional: true)]
    public ?string $source;

    /**
     * The ID of the property source indicating where it was created.
     */
    #[Api(optional: true)]
    public ?string $sourceId;

    /**
     * A human-readable label.
     */
    #[Api(optional: true)]
    public ?string $sourceLabel;

    /**
     * Source metadata encoded as a base64 string. For example: `ZXhhbXBsZSBzdHJpbmc=`.
     */
    #[Api(optional: true)]
    public ?string $sourceMetadata;

    /**
     * The unique identifier associated with the source.
     *
     * @var list<int>|null $sourceVid
     */
    #[Api(list: 'int', optional: true)]
    public ?array $sourceVid;

    /**
     * When the value was set, as a 64-bit integer.
     */
    #[Api(optional: true)]
    public ?int $timestamp;

    /**
     * The unit of measurement or context for the value.
     */
    #[Api(optional: true)]
    public ?string $unit;

    /**
     * The ID of the user who updated the property.
     */
    #[Api(optional: true)]
    public ?int $updatedByUserId;

    #[Api(optional: true)]
    public ?bool $useTimestampAsPersistenceTimestamp;

    /**
     * `new PropertyValue()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PropertyValue::with(name: ..., sourceUpstreamDeployable: ..., value: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PropertyValue)
     *   ->withName(...)
     *   ->withSourceUpstreamDeployable(...)
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
     *
     * @param DataSensitivity|value-of<DataSensitivity> $dataSensitivity
     * @param Source|value-of<Source> $source
     * @param list<int> $sourceVid
     */
    public static function with(
        string $name,
        string $sourceUpstreamDeployable,
        string $value,
        DataSensitivity|string|null $dataSensitivity = null,
        ?bool $isEncrypted = null,
        ?bool $isLargeValue = null,
        ?int $persistenceTimestamp = null,
        ?string $requestId = null,
        ?bool $selectedByUser = null,
        ?int $selectedByUserTimestamp = null,
        Source|string|null $source = null,
        ?string $sourceId = null,
        ?string $sourceLabel = null,
        ?string $sourceMetadata = null,
        ?array $sourceVid = null,
        ?int $timestamp = null,
        ?string $unit = null,
        ?int $updatedByUserId = null,
        ?bool $useTimestampAsPersistenceTimestamp = null,
    ): self {
        $obj = new self;

        $obj->name = $name;
        $obj->sourceUpstreamDeployable = $sourceUpstreamDeployable;
        $obj->value = $value;

        null !== $dataSensitivity && $obj['dataSensitivity'] = $dataSensitivity;
        null !== $isEncrypted && $obj->isEncrypted = $isEncrypted;
        null !== $isLargeValue && $obj->isLargeValue = $isLargeValue;
        null !== $persistenceTimestamp && $obj->persistenceTimestamp = $persistenceTimestamp;
        null !== $requestId && $obj->requestId = $requestId;
        null !== $selectedByUser && $obj->selectedByUser = $selectedByUser;
        null !== $selectedByUserTimestamp && $obj->selectedByUserTimestamp = $selectedByUserTimestamp;
        null !== $source && $obj['source'] = $source;
        null !== $sourceId && $obj->sourceId = $sourceId;
        null !== $sourceLabel && $obj->sourceLabel = $sourceLabel;
        null !== $sourceMetadata && $obj->sourceMetadata = $sourceMetadata;
        null !== $sourceVid && $obj->sourceVid = $sourceVid;
        null !== $timestamp && $obj->timestamp = $timestamp;
        null !== $unit && $obj->unit = $unit;
        null !== $updatedByUserId && $obj->updatedByUserId = $updatedByUserId;
        null !== $useTimestampAsPersistenceTimestamp && $obj->useTimestampAsPersistenceTimestamp = $useTimestampAsPersistenceTimestamp;

        return $obj;
    }

    /**
     * Name of custom property.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    public function withSourceUpstreamDeployable(
        string $sourceUpstreamDeployable
    ): self {
        $obj = clone $this;
        $obj->sourceUpstreamDeployable = $sourceUpstreamDeployable;

        return $obj;
    }

    /**
     * Custom property value.
     */
    public function withValue(string $value): self
    {
        $obj = clone $this;
        $obj->value = $value;

        return $obj;
    }

    /**
     * The sensitivity level of the property, such as "non_sensitive", "sensitive", and "highly_sensitive".
     *
     * @param DataSensitivity|value-of<DataSensitivity> $dataSensitivity
     */
    public function withDataSensitivity(
        DataSensitivity|string $dataSensitivity
    ): self {
        $obj = clone $this;
        $obj['dataSensitivity'] = $dataSensitivity;

        return $obj;
    }

    /**
     * Whether the property value is encrypted.
     */
    public function withIsEncrypted(bool $isEncrypted): self
    {
        $obj = clone $this;
        $obj->isEncrypted = $isEncrypted;

        return $obj;
    }

    public function withIsLargeValue(bool $isLargeValue): self
    {
        $obj = clone $this;
        $obj->isLargeValue = $isLargeValue;

        return $obj;
    }

    public function withPersistenceTimestamp(int $persistenceTimestamp): self
    {
        $obj = clone $this;
        $obj->persistenceTimestamp = $persistenceTimestamp;

        return $obj;
    }

    /**
     * A unique ID associated with this request.
     */
    public function withRequestID(string $requestID): self
    {
        $obj = clone $this;
        $obj->requestId = $requestID;

        return $obj;
    }

    /**
     * Whether the value was selected by a user.
     */
    public function withSelectedByUser(bool $selectedByUser): self
    {
        $obj = clone $this;
        $obj->selectedByUser = $selectedByUser;

        return $obj;
    }

    /**
     * The timestamp when the value was selected by a user, if applicable.
     */
    public function withSelectedByUserTimestamp(
        int $selectedByUserTimestamp
    ): self {
        $obj = clone $this;
        $obj->selectedByUserTimestamp = $selectedByUserTimestamp;

        return $obj;
    }

    /**
     * The origin of the property value, such as "IMPORT" or "API".
     *
     * @param Source|value-of<Source> $source
     */
    public function withSource(Source|string $source): self
    {
        $obj = clone $this;
        $obj['source'] = $source;

        return $obj;
    }

    /**
     * The ID of the property source indicating where it was created.
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
     * Source metadata encoded as a base64 string. For example: `ZXhhbXBsZSBzdHJpbmc=`.
     */
    public function withSourceMetadata(string $sourceMetadata): self
    {
        $obj = clone $this;
        $obj->sourceMetadata = $sourceMetadata;

        return $obj;
    }

    /**
     * The unique identifier associated with the source.
     *
     * @param list<int> $sourceVid
     */
    public function withSourceVid(array $sourceVid): self
    {
        $obj = clone $this;
        $obj->sourceVid = $sourceVid;

        return $obj;
    }

    /**
     * When the value was set, as a 64-bit integer.
     */
    public function withTimestamp(int $timestamp): self
    {
        $obj = clone $this;
        $obj->timestamp = $timestamp;

        return $obj;
    }

    /**
     * The unit of measurement or context for the value.
     */
    public function withUnit(string $unit): self
    {
        $obj = clone $this;
        $obj->unit = $unit;

        return $obj;
    }

    /**
     * The ID of the user who updated the property.
     */
    public function withUpdatedByUserID(int $updatedByUserID): self
    {
        $obj = clone $this;
        $obj->updatedByUserId = $updatedByUserID;

        return $obj;
    }

    public function withUseTimestampAsPersistenceTimestamp(
        bool $useTimestampAsPersistenceTimestamp
    ): self {
        $obj = clone $this;
        $obj->useTimestampAsPersistenceTimestamp = $useTimestampAsPersistenceTimestamp;

        return $obj;
    }
}
