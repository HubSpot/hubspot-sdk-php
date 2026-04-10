<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Exports;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Crm\Exports\PublicExportResponse\ExportState;
use HubSpotSDK\Crm\Exports\PublicExportResponse\ExportType;

/**
 * @phpstan-type PublicExportResponseShape = array{
 *   id: string,
 *   createdAt: \DateTimeInterface,
 *   exportState: ExportState|value-of<ExportState>,
 *   exportType: ExportType|value-of<ExportType>,
 *   objectProperties: list<string>,
 *   objectType: string,
 *   updatedAt: \DateTimeInterface,
 *   exportName?: string|null,
 *   recordCount?: int|null,
 * }
 */
final class PublicExportResponse implements BaseModel
{
    /** @use SdkModel<PublicExportResponseShape> */
    use SdkModel;

    /**
     * The unique ID of the export.
     */
    #[Required]
    public string $id;

    /**
     * The timestamp when the export was created, in ISO 8601 format.
     */
    #[Required]
    public \DateTimeInterface $createdAt;

    /**
     * The current state of the export process.
     *
     * @var value-of<ExportState> $exportState
     */
    #[Required(enum: ExportState::class)]
    public string $exportState;

    /**
     * The type of export, which can be either VIEW or LIST.
     *
     * @var value-of<ExportType> $exportType
     */
    #[Required(enum: ExportType::class)]
    public string $exportType;

    /**
     * The list of properties exported for the associated object.
     *
     * @var list<string> $objectProperties
     */
    #[Required(list: 'string')]
    public array $objectProperties;

    /**
     * The associated CRM object being exported.
     */
    #[Required]
    public string $objectType;

    /**
     * The timestamp when the export was last updated, in ISO 8601 format.
     */
    #[Required]
    public \DateTimeInterface $updatedAt;

    /**
     * The name assigned to the export.
     */
    #[Optional]
    public ?string $exportName;

    /**
     * The total number of records included in the export.
     */
    #[Optional]
    public ?int $recordCount;

    /**
     * `new PublicExportResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicExportResponse::with(
     *   id: ...,
     *   createdAt: ...,
     *   exportState: ...,
     *   exportType: ...,
     *   objectProperties: ...,
     *   objectType: ...,
     *   updatedAt: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicExportResponse)
     *   ->withID(...)
     *   ->withCreatedAt(...)
     *   ->withExportState(...)
     *   ->withExportType(...)
     *   ->withObjectProperties(...)
     *   ->withObjectType(...)
     *   ->withUpdatedAt(...)
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
     * @param ExportState|value-of<ExportState> $exportState
     * @param ExportType|value-of<ExportType> $exportType
     * @param list<string> $objectProperties
     */
    public static function with(
        string $id,
        \DateTimeInterface $createdAt,
        ExportState|string $exportState,
        ExportType|string $exportType,
        array $objectProperties,
        string $objectType,
        \DateTimeInterface $updatedAt,
        ?string $exportName = null,
        ?int $recordCount = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['createdAt'] = $createdAt;
        $self['exportState'] = $exportState;
        $self['exportType'] = $exportType;
        $self['objectProperties'] = $objectProperties;
        $self['objectType'] = $objectType;
        $self['updatedAt'] = $updatedAt;

        null !== $exportName && $self['exportName'] = $exportName;
        null !== $recordCount && $self['recordCount'] = $recordCount;

        return $self;
    }

    /**
     * The unique ID of the export.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * The timestamp when the export was created, in ISO 8601 format.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * The current state of the export process.
     *
     * @param ExportState|value-of<ExportState> $exportState
     */
    public function withExportState(ExportState|string $exportState): self
    {
        $self = clone $this;
        $self['exportState'] = $exportState;

        return $self;
    }

    /**
     * The type of export, which can be either VIEW or LIST.
     *
     * @param ExportType|value-of<ExportType> $exportType
     */
    public function withExportType(ExportType|string $exportType): self
    {
        $self = clone $this;
        $self['exportType'] = $exportType;

        return $self;
    }

    /**
     * The list of properties exported for the associated object.
     *
     * @param list<string> $objectProperties
     */
    public function withObjectProperties(array $objectProperties): self
    {
        $self = clone $this;
        $self['objectProperties'] = $objectProperties;

        return $self;
    }

    /**
     * The associated CRM object being exported.
     */
    public function withObjectType(string $objectType): self
    {
        $self = clone $this;
        $self['objectType'] = $objectType;

        return $self;
    }

    /**
     * The timestamp when the export was last updated, in ISO 8601 format.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * The name assigned to the export.
     */
    public function withExportName(string $exportName): self
    {
        $self = clone $this;
        $self['exportName'] = $exportName;

        return $self;
    }

    /**
     * The total number of records included in the export.
     */
    public function withRecordCount(int $recordCount): self
    {
        $self = clone $this;
        $self['recordCount'] = $recordCount;

        return $self;
    }
}
