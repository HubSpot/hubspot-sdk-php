<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Imports;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Imports\PublicImportError\ErrorType;
use HubspotSDK\Crm\Imports\PublicImportError\ObjectType;
use HubspotSDK\Marketing\Events\PropertyValue;
use HubspotSDK\Marketing\Events\PropertyValue\DataSensitivity;
use HubspotSDK\Marketing\Events\PropertyValue\Source;

/**
 * @phpstan-type PublicImportErrorShape = array{
 *   id: string,
 *   createdAt: int,
 *   errorType: value-of<ErrorType>,
 *   sourceData: ImportRowCore,
 *   errorMessage?: string|null,
 *   extraContext?: string|null,
 *   invalidPropertyValue?: \HubspotSDK\Marketing\Events\PropertyValue|null,
 *   invalidValue?: string|null,
 *   invalidValueToDisplay?: string|null,
 *   knownColumnNumber?: int|null,
 *   objectType?: value-of<ObjectType>|null,
 *   objectTypeID?: string|null,
 * }
 */
final class PublicImportError implements BaseModel
{
    /** @use SdkModel<PublicImportErrorShape> */
    use SdkModel;

    #[Required]
    public string $id;

    #[Required]
    public int $createdAt;

    /** @var value-of<ErrorType> $errorType */
    #[Required(enum: ErrorType::class)]
    public string $errorType;

    #[Required]
    public ImportRowCore $sourceData;

    #[Optional]
    public ?string $errorMessage;

    #[Optional]
    public ?string $extraContext;

    /**
     * Represents a single custom property of a marketing event, storing its name, value, metadata (like source, timestamp, and sensitivity), and related audit information for tracking changes.
     */
    #[Optional]
    public ?PropertyValue $invalidPropertyValue;

    #[Optional]
    public ?string $invalidValue;

    #[Optional]
    public ?string $invalidValueToDisplay;

    #[Optional]
    public ?int $knownColumnNumber;

    /** @var value-of<ObjectType>|null $objectType */
    #[Optional(enum: ObjectType::class)]
    public ?string $objectType;

    #[Optional('objectTypeId')]
    public ?string $objectTypeID;

    /**
     * `new PublicImportError()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicImportError::with(
     *   id: ..., createdAt: ..., errorType: ..., sourceData: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicImportError)
     *   ->withID(...)
     *   ->withCreatedAt(...)
     *   ->withErrorType(...)
     *   ->withSourceData(...)
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
     * @param ErrorType|value-of<ErrorType> $errorType
     * @param ImportRowCore|array{
     *   containsEncryptedProperties: bool,
     *   fileID: int,
     *   lineNumber: int,
     *   rowData: list<string>,
     *   pageName?: string|null,
     * } $sourceData
     * @param PropertyValue|array{
     *   dataSensitivity: value-of<DataSensitivity>,
     *   isEncrypted: bool,
     *   isLargeValue: bool,
     *   name: string,
     *   persistenceTimestamp: int,
     *   requestID: string,
     *   selectedByUser: bool,
     *   selectedByUserTimestamp: int,
     *   source: value-of<Source>,
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
     * } $invalidPropertyValue
     * @param ObjectType|value-of<ObjectType> $objectType
     */
    public static function with(
        string $id,
        int $createdAt,
        ErrorType|string $errorType,
        ImportRowCore|array $sourceData,
        ?string $errorMessage = null,
        ?string $extraContext = null,
        PropertyValue|array|null $invalidPropertyValue = null,
        ?string $invalidValue = null,
        ?string $invalidValueToDisplay = null,
        ?int $knownColumnNumber = null,
        ObjectType|string|null $objectType = null,
        ?string $objectTypeID = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['createdAt'] = $createdAt;
        $self['errorType'] = $errorType;
        $self['sourceData'] = $sourceData;

        null !== $errorMessage && $self['errorMessage'] = $errorMessage;
        null !== $extraContext && $self['extraContext'] = $extraContext;
        null !== $invalidPropertyValue && $self['invalidPropertyValue'] = $invalidPropertyValue;
        null !== $invalidValue && $self['invalidValue'] = $invalidValue;
        null !== $invalidValueToDisplay && $self['invalidValueToDisplay'] = $invalidValueToDisplay;
        null !== $knownColumnNumber && $self['knownColumnNumber'] = $knownColumnNumber;
        null !== $objectType && $self['objectType'] = $objectType;
        null !== $objectTypeID && $self['objectTypeID'] = $objectTypeID;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withCreatedAt(int $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * @param ErrorType|value-of<ErrorType> $errorType
     */
    public function withErrorType(ErrorType|string $errorType): self
    {
        $self = clone $this;
        $self['errorType'] = $errorType;

        return $self;
    }

    /**
     * @param ImportRowCore|array{
     *   containsEncryptedProperties: bool,
     *   fileID: int,
     *   lineNumber: int,
     *   rowData: list<string>,
     *   pageName?: string|null,
     * } $sourceData
     */
    public function withSourceData(ImportRowCore|array $sourceData): self
    {
        $self = clone $this;
        $self['sourceData'] = $sourceData;

        return $self;
    }

    public function withErrorMessage(string $errorMessage): self
    {
        $self = clone $this;
        $self['errorMessage'] = $errorMessage;

        return $self;
    }

    public function withExtraContext(string $extraContext): self
    {
        $self = clone $this;
        $self['extraContext'] = $extraContext;

        return $self;
    }

    /**
     * Represents a single custom property of a marketing event, storing its name, value, metadata (like source, timestamp, and sensitivity), and related audit information for tracking changes.
     *
     * @param PropertyValue|array{
     *   dataSensitivity: value-of<DataSensitivity>,
     *   isEncrypted: bool,
     *   isLargeValue: bool,
     *   name: string,
     *   persistenceTimestamp: int,
     *   requestID: string,
     *   selectedByUser: bool,
     *   selectedByUserTimestamp: int,
     *   source: value-of<Source>,
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
     * } $invalidPropertyValue
     */
    public function withInvalidPropertyValue(
        PropertyValue|array $invalidPropertyValue
    ): self {
        $self = clone $this;
        $self['invalidPropertyValue'] = $invalidPropertyValue;

        return $self;
    }

    public function withInvalidValue(string $invalidValue): self
    {
        $self = clone $this;
        $self['invalidValue'] = $invalidValue;

        return $self;
    }

    public function withInvalidValueToDisplay(
        string $invalidValueToDisplay
    ): self {
        $self = clone $this;
        $self['invalidValueToDisplay'] = $invalidValueToDisplay;

        return $self;
    }

    public function withKnownColumnNumber(int $knownColumnNumber): self
    {
        $self = clone $this;
        $self['knownColumnNumber'] = $knownColumnNumber;

        return $self;
    }

    /**
     * @param ObjectType|value-of<ObjectType> $objectType
     */
    public function withObjectType(ObjectType|string $objectType): self
    {
        $self = clone $this;
        $self['objectType'] = $objectType;

        return $self;
    }

    public function withObjectTypeID(string $objectTypeID): self
    {
        $self = clone $this;
        $self['objectTypeID'] = $objectTypeID;

        return $self;
    }
}
