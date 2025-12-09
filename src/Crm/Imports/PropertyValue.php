<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Imports;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Imports\PropertyValue\DataSensitivity;
use HubspotSDK\Crm\Imports\PropertyValue\Source;

/**
 * Represents a single custom property of a marketing event, storing its name, value, metadata (like source, timestamp, and sensitivity), and related audit information for tracking changes.
 *
 * @phpstan-type PropertyValueShape = array{
 *   dataSensitivity: value-of<DataSensitivity>,
 *   isEncrypted: bool,
 *   isLargeValue: bool,
 *   name: string,
 *   persistenceTimestamp: int,
 *   requestId: string,
 *   selectedByUser: bool,
 *   selectedByUserTimestamp: int,
 *   source: value-of<Source>,
 *   sourceId: string,
 *   sourceLabel: string,
 *   sourceMetadata: string,
 *   sourceVid: list<int>,
 *   timestamp: int,
 *   unit: string,
 *   updatedByUserId: int,
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

    #[Required]
    public bool $isLargeValue;

    /**
     * The unique property name.
     */
    #[Required]
    public string $name;

    #[Required]
    public int $persistenceTimestamp;

    /**
     * A unique ID associated with this request.
     */
    #[Required]
    public string $requestId;

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
    #[Required]
    public string $sourceId;

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
    #[Required]
    public int $updatedByUserId;

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
     *   requestId: ...,
     *   selectedByUser: ...,
     *   selectedByUserTimestamp: ...,
     *   source: ...,
     *   sourceId: ...,
     *   sourceLabel: ...,
     *   sourceMetadata: ...,
     *   sourceVid: ...,
     *   timestamp: ...,
     *   unit: ...,
     *   updatedByUserId: ...,
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
        string $requestId,
        bool $selectedByUser,
        int $selectedByUserTimestamp,
        Source|string $source,
        string $sourceId,
        string $sourceLabel,
        string $sourceMetadata,
        array $sourceVid,
        int $timestamp,
        string $unit,
        int $updatedByUserId,
        bool $useTimestampAsPersistenceTimestamp,
        string $value,
    ): self {
        $obj = new self;

        $obj['dataSensitivity'] = $dataSensitivity;
        $obj['isEncrypted'] = $isEncrypted;
        $obj['isLargeValue'] = $isLargeValue;
        $obj['name'] = $name;
        $obj['persistenceTimestamp'] = $persistenceTimestamp;
        $obj['requestId'] = $requestId;
        $obj['selectedByUser'] = $selectedByUser;
        $obj['selectedByUserTimestamp'] = $selectedByUserTimestamp;
        $obj['source'] = $source;
        $obj['sourceId'] = $sourceId;
        $obj['sourceLabel'] = $sourceLabel;
        $obj['sourceMetadata'] = $sourceMetadata;
        $obj['sourceVid'] = $sourceVid;
        $obj['timestamp'] = $timestamp;
        $obj['unit'] = $unit;
        $obj['updatedByUserId'] = $updatedByUserId;
        $obj['useTimestampAsPersistenceTimestamp'] = $useTimestampAsPersistenceTimestamp;
        $obj['value'] = $value;

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
        $obj['isEncrypted'] = $isEncrypted;

        return $obj;
    }

    public function withIsLargeValue(bool $isLargeValue): self
    {
        $obj = clone $this;
        $obj['isLargeValue'] = $isLargeValue;

        return $obj;
    }

    /**
     * The unique property name.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    public function withPersistenceTimestamp(int $persistenceTimestamp): self
    {
        $obj = clone $this;
        $obj['persistenceTimestamp'] = $persistenceTimestamp;

        return $obj;
    }

    /**
     * A unique ID associated with this request.
     */
    public function withRequestID(string $requestID): self
    {
        $obj = clone $this;
        $obj['requestId'] = $requestID;

        return $obj;
    }

    /**
     * Whether the value was selected by a user.
     */
    public function withSelectedByUser(bool $selectedByUser): self
    {
        $obj = clone $this;
        $obj['selectedByUser'] = $selectedByUser;

        return $obj;
    }

    /**
     * The timestamp when the value was selected by a user, if applicable.
     */
    public function withSelectedByUserTimestamp(
        int $selectedByUserTimestamp
    ): self {
        $obj = clone $this;
        $obj['selectedByUserTimestamp'] = $selectedByUserTimestamp;

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
        $obj['sourceId'] = $sourceID;

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
     * Metadata providing additional context about the source.
     */
    public function withSourceMetadata(string $sourceMetadata): self
    {
        $obj = clone $this;
        $obj['sourceMetadata'] = $sourceMetadata;

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
        $obj['sourceVid'] = $sourceVid;

        return $obj;
    }

    /**
     * When the value was set, as a 64-bit integer.
     */
    public function withTimestamp(int $timestamp): self
    {
        $obj = clone $this;
        $obj['timestamp'] = $timestamp;

        return $obj;
    }

    /**
     * The unit of measurement or context for the value.
     */
    public function withUnit(string $unit): self
    {
        $obj = clone $this;
        $obj['unit'] = $unit;

        return $obj;
    }

    /**
     * The ID of the user who updated the property.
     */
    public function withUpdatedByUserID(int $updatedByUserID): self
    {
        $obj = clone $this;
        $obj['updatedByUserId'] = $updatedByUserID;

        return $obj;
    }

    public function withUseTimestampAsPersistenceTimestamp(
        bool $useTimestampAsPersistenceTimestamp
    ): self {
        $obj = clone $this;
        $obj['useTimestampAsPersistenceTimestamp'] = $useTimestampAsPersistenceTimestamp;

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
}
