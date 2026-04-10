<?php

declare(strict_types=1);

namespace HubSpotSDK;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\PropertyValue\DataSensitivity;
use HubSpotSDK\PropertyValue\Source;

/**
 * Represents a single custom property of a marketing event, storing its name, value, metadata (like source, timestamp, and sensitivity), and related audit information for tracking changes.
 *
 * @phpstan-type PropertyValueShape = array{
 *   dataSensitivity: DataSensitivity|value-of<DataSensitivity>,
 *   isEncrypted: bool,
 *   isLargeValue: bool,
 *   name: string,
 *   persistenceTimestamp: int,
 *   requestID: string,
 *   selectedByUser: bool,
 *   selectedByUserTimestamp: int,
 *   source: Source|value-of<Source>,
 *   sourceID: string,
 *   sourceLabel: string,
 *   sourceMetadata: string,
 *   sourceUpstreamDeployable: string,
 *   sourceVid: list<int>,
 *   timestamp: int,
 *   unit: string,
 *   updatedByUserID: int,
 *   useTimestampAsPersistenceTimestamp: bool,
 *   value: string,
 * }
 */
final class PropertyValue implements BaseModel
{
    /** @use SdkModel<PropertyValueShape> */
    use SdkModel;

    /**
     * The sensitivity level of the property, such as "non_sensitive", "sensitive", and "highly_sensitive".
     *
     * @var value-of<DataSensitivity> $dataSensitivity
     */
    #[Required(enum: DataSensitivity::class)]
    public string $dataSensitivity;

    /**
     * Whether the property value is encrypted.
     */
    #[Required]
    public bool $isEncrypted;

    /**
     * Indicates if the value exceeds normal size limits.
     */
    #[Required]
    public bool $isLargeValue;

    /**
     * The unique property name.
     */
    #[Required]
    public string $name;

    /**
     * When the value was persisted to database, in epoch milliseconds.
     */
    #[Required]
    public int $persistenceTimestamp;

    /**
     * A unique ID associated with this request.
     */
    #[Required('requestId')]
    public string $requestID;

    /**
     * Whether the value was selected by a user.
     */
    #[Required]
    public bool $selectedByUser;

    /**
     * The timestamp when the value was selected by a user, if applicable.
     */
    #[Required]
    public int $selectedByUserTimestamp;

    /**
     * The origin of the property value, such as "IMPORT" or "API".
     *
     * @var value-of<Source> $source
     */
    #[Required(enum: Source::class)]
    public string $source;

    /**
     * The ID of the property source indicating where it was created.
     */
    #[Required('sourceId')]
    public string $sourceID;

    /**
     * A human-readable label.
     */
    #[Required]
    public string $sourceLabel;

    /**
     * Metadata providing additional context about the source.
     */
    #[Required]
    public string $sourceMetadata;

    #[Required]
    public string $sourceUpstreamDeployable;

    /**
     * The unique identifier associated with the source.
     *
     * @var list<int> $sourceVid
     */
    #[Required(list: 'int')]
    public array $sourceVid;

    /**
     * When the value was set, as a 64-bit integer.
     */
    #[Required]
    public int $timestamp;

    /**
     * The unit of measurement or context for the value.
     */
    #[Required]
    public string $unit;

    /**
     * The ID of the user who updated the property.
     */
    #[Required('updatedByUserId')]
    public int $updatedByUserID;

    /**
     * Flag indicating whether to use the timestamp field as the persistence timestamp.
     */
    #[Required]
    public bool $useTimestampAsPersistenceTimestamp;

    /**
     * The property value.
     */
    #[Required]
    public string $value;

    /**
     * `new PropertyValue()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PropertyValue::with(
     *   dataSensitivity: ...,
     *   isEncrypted: ...,
     *   isLargeValue: ...,
     *   name: ...,
     *   persistenceTimestamp: ...,
     *   requestID: ...,
     *   selectedByUser: ...,
     *   selectedByUserTimestamp: ...,
     *   source: ...,
     *   sourceID: ...,
     *   sourceLabel: ...,
     *   sourceMetadata: ...,
     *   sourceUpstreamDeployable: ...,
     *   sourceVid: ...,
     *   timestamp: ...,
     *   unit: ...,
     *   updatedByUserID: ...,
     *   useTimestampAsPersistenceTimestamp: ...,
     *   value: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PropertyValue)
     *   ->withDataSensitivity(...)
     *   ->withIsEncrypted(...)
     *   ->withIsLargeValue(...)
     *   ->withName(...)
     *   ->withPersistenceTimestamp(...)
     *   ->withRequestID(...)
     *   ->withSelectedByUser(...)
     *   ->withSelectedByUserTimestamp(...)
     *   ->withSource(...)
     *   ->withSourceID(...)
     *   ->withSourceLabel(...)
     *   ->withSourceMetadata(...)
     *   ->withSourceUpstreamDeployable(...)
     *   ->withSourceVid(...)
     *   ->withTimestamp(...)
     *   ->withUnit(...)
     *   ->withUpdatedByUserID(...)
     *   ->withUseTimestampAsPersistenceTimestamp(...)
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
        DataSensitivity|string $dataSensitivity,
        bool $isEncrypted,
        bool $isLargeValue,
        string $name,
        int $persistenceTimestamp,
        string $requestID,
        bool $selectedByUser,
        int $selectedByUserTimestamp,
        Source|string $source,
        string $sourceID,
        string $sourceLabel,
        string $sourceMetadata,
        string $sourceUpstreamDeployable,
        array $sourceVid,
        int $timestamp,
        string $unit,
        int $updatedByUserID,
        bool $useTimestampAsPersistenceTimestamp,
        string $value,
    ): self {
        $self = new self;

        $self['dataSensitivity'] = $dataSensitivity;
        $self['isEncrypted'] = $isEncrypted;
        $self['isLargeValue'] = $isLargeValue;
        $self['name'] = $name;
        $self['persistenceTimestamp'] = $persistenceTimestamp;
        $self['requestID'] = $requestID;
        $self['selectedByUser'] = $selectedByUser;
        $self['selectedByUserTimestamp'] = $selectedByUserTimestamp;
        $self['source'] = $source;
        $self['sourceID'] = $sourceID;
        $self['sourceLabel'] = $sourceLabel;
        $self['sourceMetadata'] = $sourceMetadata;
        $self['sourceUpstreamDeployable'] = $sourceUpstreamDeployable;
        $self['sourceVid'] = $sourceVid;
        $self['timestamp'] = $timestamp;
        $self['unit'] = $unit;
        $self['updatedByUserID'] = $updatedByUserID;
        $self['useTimestampAsPersistenceTimestamp'] = $useTimestampAsPersistenceTimestamp;
        $self['value'] = $value;

        return $self;
    }

    /**
     * The sensitivity level of the property, such as "non_sensitive", "sensitive", and "highly_sensitive".
     *
     * @param DataSensitivity|value-of<DataSensitivity> $dataSensitivity
     */
    public function withDataSensitivity(
        DataSensitivity|string $dataSensitivity
    ): self {
        $self = clone $this;
        $self['dataSensitivity'] = $dataSensitivity;

        return $self;
    }

    /**
     * Whether the property value is encrypted.
     */
    public function withIsEncrypted(bool $isEncrypted): self
    {
        $self = clone $this;
        $self['isEncrypted'] = $isEncrypted;

        return $self;
    }

    /**
     * Indicates if the value exceeds normal size limits.
     */
    public function withIsLargeValue(bool $isLargeValue): self
    {
        $self = clone $this;
        $self['isLargeValue'] = $isLargeValue;

        return $self;
    }

    /**
     * The unique property name.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * When the value was persisted to database, in epoch milliseconds.
     */
    public function withPersistenceTimestamp(int $persistenceTimestamp): self
    {
        $self = clone $this;
        $self['persistenceTimestamp'] = $persistenceTimestamp;

        return $self;
    }

    /**
     * A unique ID associated with this request.
     */
    public function withRequestID(string $requestID): self
    {
        $self = clone $this;
        $self['requestID'] = $requestID;

        return $self;
    }

    /**
     * Whether the value was selected by a user.
     */
    public function withSelectedByUser(bool $selectedByUser): self
    {
        $self = clone $this;
        $self['selectedByUser'] = $selectedByUser;

        return $self;
    }

    /**
     * The timestamp when the value was selected by a user, if applicable.
     */
    public function withSelectedByUserTimestamp(
        int $selectedByUserTimestamp
    ): self {
        $self = clone $this;
        $self['selectedByUserTimestamp'] = $selectedByUserTimestamp;

        return $self;
    }

    /**
     * The origin of the property value, such as "IMPORT" or "API".
     *
     * @param Source|value-of<Source> $source
     */
    public function withSource(Source|string $source): self
    {
        $self = clone $this;
        $self['source'] = $source;

        return $self;
    }

    /**
     * The ID of the property source indicating where it was created.
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
     * Metadata providing additional context about the source.
     */
    public function withSourceMetadata(string $sourceMetadata): self
    {
        $self = clone $this;
        $self['sourceMetadata'] = $sourceMetadata;

        return $self;
    }

    public function withSourceUpstreamDeployable(
        string $sourceUpstreamDeployable
    ): self {
        $self = clone $this;
        $self['sourceUpstreamDeployable'] = $sourceUpstreamDeployable;

        return $self;
    }

    /**
     * The unique identifier associated with the source.
     *
     * @param list<int> $sourceVid
     */
    public function withSourceVid(array $sourceVid): self
    {
        $self = clone $this;
        $self['sourceVid'] = $sourceVid;

        return $self;
    }

    /**
     * When the value was set, as a 64-bit integer.
     */
    public function withTimestamp(int $timestamp): self
    {
        $self = clone $this;
        $self['timestamp'] = $timestamp;

        return $self;
    }

    /**
     * The unit of measurement or context for the value.
     */
    public function withUnit(string $unit): self
    {
        $self = clone $this;
        $self['unit'] = $unit;

        return $self;
    }

    /**
     * The ID of the user who updated the property.
     */
    public function withUpdatedByUserID(int $updatedByUserID): self
    {
        $self = clone $this;
        $self['updatedByUserID'] = $updatedByUserID;

        return $self;
    }

    /**
     * Flag indicating whether to use the timestamp field as the persistence timestamp.
     */
    public function withUseTimestampAsPersistenceTimestamp(
        bool $useTimestampAsPersistenceTimestamp
    ): self {
        $self = clone $this;
        $self['useTimestampAsPersistenceTimestamp'] = $useTimestampAsPersistenceTimestamp;

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
}
