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
        $obj = new self;

        $obj['id'] = $id;
        $obj['createdAt'] = $createdAt;
        $obj['errorType'] = $errorType;
        $obj['sourceData'] = $sourceData;

        null !== $errorMessage && $obj['errorMessage'] = $errorMessage;
        null !== $extraContext && $obj['extraContext'] = $extraContext;
        null !== $invalidPropertyValue && $obj['invalidPropertyValue'] = $invalidPropertyValue;
        null !== $invalidValue && $obj['invalidValue'] = $invalidValue;
        null !== $invalidValueToDisplay && $obj['invalidValueToDisplay'] = $invalidValueToDisplay;
        null !== $knownColumnNumber && $obj['knownColumnNumber'] = $knownColumnNumber;
        null !== $objectType && $obj['objectType'] = $objectType;
        null !== $objectTypeID && $obj['objectTypeID'] = $objectTypeID;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    public function withCreatedAt(int $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

        return $obj;
    }

    /**
     * @param ErrorType|value-of<ErrorType> $errorType
     */
    public function withErrorType(ErrorType|string $errorType): self
    {
        $obj = clone $this;
        $obj['errorType'] = $errorType;

        return $obj;
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
        $obj = clone $this;
        $obj['sourceData'] = $sourceData;

        return $obj;
    }

    public function withErrorMessage(string $errorMessage): self
    {
        $obj = clone $this;
        $obj['errorMessage'] = $errorMessage;

        return $obj;
    }

    public function withExtraContext(string $extraContext): self
    {
        $obj = clone $this;
        $obj['extraContext'] = $extraContext;

        return $obj;
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
        $obj = clone $this;
        $obj['invalidPropertyValue'] = $invalidPropertyValue;

        return $obj;
    }

    public function withInvalidValue(string $invalidValue): self
    {
        $obj = clone $this;
        $obj['invalidValue'] = $invalidValue;

        return $obj;
    }

    public function withInvalidValueToDisplay(
        string $invalidValueToDisplay
    ): self {
        $obj = clone $this;
        $obj['invalidValueToDisplay'] = $invalidValueToDisplay;

        return $obj;
    }

    public function withKnownColumnNumber(int $knownColumnNumber): self
    {
        $obj = clone $this;
        $obj['knownColumnNumber'] = $knownColumnNumber;

        return $obj;
    }

    /**
     * @param ObjectType|value-of<ObjectType> $objectType
     */
    public function withObjectType(ObjectType|string $objectType): self
    {
        $obj = clone $this;
        $obj['objectType'] = $objectType;

        return $obj;
    }

    public function withObjectTypeID(string $objectTypeID): self
    {
        $obj = clone $this;
        $obj['objectTypeID'] = $objectTypeID;

        return $obj;
    }
}
