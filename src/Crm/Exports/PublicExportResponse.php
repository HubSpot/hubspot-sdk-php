<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Exports;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkResponse;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\Contracts\ResponseConverter;
use HubspotSDK\Crm\Exports\PublicExportResponse\ExportState;
use HubspotSDK\Crm\Exports\PublicExportResponse\ExportType;

/**
 * @phpstan-type PublicExportResponseShape = array{
 *   id: string,
 *   createdAt: \DateTimeInterface,
 *   exportState: value-of<ExportState>,
 *   exportType: value-of<ExportType>,
 *   objectProperties: list<string>,
 *   objectType: string,
 *   updatedAt: \DateTimeInterface,
 *   exportName?: string|null,
 *   recordCount?: int|null,
 * }
 */
final class PublicExportResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<PublicExportResponseShape> */
    use SdkModel;

    use SdkResponse;

    /**
     * The unique ID of the export.
     */
    #[Api]
    public string $id;

    /**
     * The timestamp when the export was created, in ISO 8601 format.
     */
    #[Api]
    public \DateTimeInterface $createdAt;

    /**
     * The current state of the export process.
     *
     * @var value-of<ExportState> $exportState
     */
    #[Api(enum: ExportState::class)]
    public string $exportState;

    /**
     * The type of export, which can be either VIEW or LIST.
     *
     * @var value-of<ExportType> $exportType
     */
    #[Api(enum: ExportType::class)]
    public string $exportType;

    /**
     * The list of properties exported for the associated object.
     *
     * @var list<string> $objectProperties
     */
    #[Api(list: 'string')]
    public array $objectProperties;

    /**
     * The associated CRM object being exported.
     */
    #[Api]
    public string $objectType;

    /**
     * The timestamp when the export was last updated, in ISO 8601 format.
     */
    #[Api]
    public \DateTimeInterface $updatedAt;

    /**
     * The name assigned to the export.
     */
    #[Api(optional: true)]
    public ?string $exportName;

    /**
     * The total number of records included in the export.
     */
    #[Api(optional: true)]
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
        $obj = new self;

        $obj->id = $id;
        $obj->createdAt = $createdAt;
        $obj['exportState'] = $exportState;
        $obj['exportType'] = $exportType;
        $obj->objectProperties = $objectProperties;
        $obj->objectType = $objectType;
        $obj->updatedAt = $updatedAt;

        null !== $exportName && $obj->exportName = $exportName;
        null !== $recordCount && $obj->recordCount = $recordCount;

        return $obj;
    }

    /**
     * The unique ID of the export.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * The timestamp when the export was created, in ISO 8601 format.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    /**
     * The current state of the export process.
     *
     * @param ExportState|value-of<ExportState> $exportState
     */
    public function withExportState(ExportState|string $exportState): self
    {
        $obj = clone $this;
        $obj['exportState'] = $exportState;

        return $obj;
    }

    /**
     * The type of export, which can be either VIEW or LIST.
     *
     * @param ExportType|value-of<ExportType> $exportType
     */
    public function withExportType(ExportType|string $exportType): self
    {
        $obj = clone $this;
        $obj['exportType'] = $exportType;

        return $obj;
    }

    /**
     * The list of properties exported for the associated object.
     *
     * @param list<string> $objectProperties
     */
    public function withObjectProperties(array $objectProperties): self
    {
        $obj = clone $this;
        $obj->objectProperties = $objectProperties;

        return $obj;
    }

    /**
     * The associated CRM object being exported.
     */
    public function withObjectType(string $objectType): self
    {
        $obj = clone $this;
        $obj->objectType = $objectType;

        return $obj;
    }

    /**
     * The timestamp when the export was last updated, in ISO 8601 format.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }

    /**
     * The name assigned to the export.
     */
    public function withExportName(string $exportName): self
    {
        $obj = clone $this;
        $obj->exportName = $exportName;

        return $obj;
    }

    /**
     * The total number of records included in the export.
     */
    public function withRecordCount(int $recordCount): self
    {
        $obj = clone $this;
        $obj->recordCount = $recordCount;

        return $obj;
    }
}
