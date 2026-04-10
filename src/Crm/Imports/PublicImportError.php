<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Imports;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Crm\Imports\PublicImportError\ErrorType;
use HubSpotSDK\Crm\Imports\PublicImportError\ObjectType;
use HubSpotSDK\PropertyValue;

/**
 * @phpstan-import-type ImportRowCoreShape from \HubSpotSDK\Crm\Imports\ImportRowCore
 * @phpstan-import-type PropertyValueShape from \HubSpotSDK\PropertyValue
 *
 * @phpstan-type PublicImportErrorShape = array{
 *   id: string,
 *   createdAt: int,
 *   errorType: ErrorType|value-of<ErrorType>,
 *   sourceData: ImportRowCore|ImportRowCoreShape,
 *   errorMessage?: string|null,
 *   extraContext?: string|null,
 *   invalidPropertyValue?: null|PropertyValue|PropertyValueShape,
 *   invalidValue?: string|null,
 *   invalidValueToDisplay?: string|null,
 *   knownColumnNumber?: int|null,
 *   objectType?: null|ObjectType|value-of<ObjectType>,
 *   objectTypeID?: string|null,
 * }
 */
final class PublicImportError implements BaseModel
{
    /** @use SdkModel<PublicImportErrorShape> */
    use SdkModel;

    /**
     * A unique, stable identifier for this specific error.
     */
    #[Required]
    public string $id;

    /**
     * The epoch millisecond timestamp when this error was recorded.
     */
    #[Required]
    public int $createdAt;

    /**
     * The classification of what went wrong during import processing.
     *
     * @var value-of<ErrorType> $errorType
     */
    #[Required(enum: ErrorType::class)]
    public string $errorType;

    #[Required]
    public ImportRowCore $sourceData;

    /**
     * A human-readable error message.
     */
    #[Optional]
    public ?string $errorMessage;

    /**
     * Additional human-readable context about the error.
     */
    #[Optional]
    public ?string $extraContext;

    /**
     * Represents a single custom property of a marketing event, storing its name, value, metadata (like source, timestamp, and sensitivity), and related audit information for tracking changes.
     */
    #[Optional]
    public ?PropertyValue $invalidPropertyValue;

    /**
     * The raw string value from the import file that caused the validation failure.
     */
    #[Optional]
    public ?string $invalidValue;

    /**
     * A convenience accessor that returns either the value from `invalidPropertyValue` or `invalidValue`, whichever is present (preferring the property value).
     */
    #[Optional]
    public ?string $invalidValueToDisplay;

    /**
     * The zero-based column index in the import file where the error occurred.
     */
    #[Optional]
    public ?int $knownColumnNumber;

    /**
     * The CRM object type affected by this error.
     *
     * @var value-of<ObjectType>|null $objectType
     */
    #[Optional(enum: ObjectType::class)]
    public ?string $objectType;

    /**
     * The modern object type identifier for the CRM object affected by this error.
     */
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
     * @param ImportRowCore|ImportRowCoreShape $sourceData
     * @param PropertyValue|PropertyValueShape|null $invalidPropertyValue
     * @param ObjectType|value-of<ObjectType>|null $objectType
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

    /**
     * A unique, stable identifier for this specific error.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * The epoch millisecond timestamp when this error was recorded.
     */
    public function withCreatedAt(int $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * The classification of what went wrong during import processing.
     *
     * @param ErrorType|value-of<ErrorType> $errorType
     */
    public function withErrorType(ErrorType|string $errorType): self
    {
        $self = clone $this;
        $self['errorType'] = $errorType;

        return $self;
    }

    /**
     * @param ImportRowCore|ImportRowCoreShape $sourceData
     */
    public function withSourceData(ImportRowCore|array $sourceData): self
    {
        $self = clone $this;
        $self['sourceData'] = $sourceData;

        return $self;
    }

    /**
     * A human-readable error message.
     */
    public function withErrorMessage(string $errorMessage): self
    {
        $self = clone $this;
        $self['errorMessage'] = $errorMessage;

        return $self;
    }

    /**
     * Additional human-readable context about the error.
     */
    public function withExtraContext(string $extraContext): self
    {
        $self = clone $this;
        $self['extraContext'] = $extraContext;

        return $self;
    }

    /**
     * Represents a single custom property of a marketing event, storing its name, value, metadata (like source, timestamp, and sensitivity), and related audit information for tracking changes.
     *
     * @param PropertyValue|PropertyValueShape $invalidPropertyValue
     */
    public function withInvalidPropertyValue(
        PropertyValue|array $invalidPropertyValue
    ): self {
        $self = clone $this;
        $self['invalidPropertyValue'] = $invalidPropertyValue;

        return $self;
    }

    /**
     * The raw string value from the import file that caused the validation failure.
     */
    public function withInvalidValue(string $invalidValue): self
    {
        $self = clone $this;
        $self['invalidValue'] = $invalidValue;

        return $self;
    }

    /**
     * A convenience accessor that returns either the value from `invalidPropertyValue` or `invalidValue`, whichever is present (preferring the property value).
     */
    public function withInvalidValueToDisplay(
        string $invalidValueToDisplay
    ): self {
        $self = clone $this;
        $self['invalidValueToDisplay'] = $invalidValueToDisplay;

        return $self;
    }

    /**
     * The zero-based column index in the import file where the error occurred.
     */
    public function withKnownColumnNumber(int $knownColumnNumber): self
    {
        $self = clone $this;
        $self['knownColumnNumber'] = $knownColumnNumber;

        return $self;
    }

    /**
     * The CRM object type affected by this error.
     *
     * @param ObjectType|value-of<ObjectType> $objectType
     */
    public function withObjectType(ObjectType|string $objectType): self
    {
        $self = clone $this;
        $self['objectType'] = $objectType;

        return $self;
    }

    /**
     * The modern object type identifier for the CRM object affected by this error.
     */
    public function withObjectTypeID(string $objectTypeID): self
    {
        $self = clone $this;
        $self['objectTypeID'] = $objectTypeID;

        return $self;
    }
}
