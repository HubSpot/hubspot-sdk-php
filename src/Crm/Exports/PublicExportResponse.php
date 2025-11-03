<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Exports;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
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
 *   exportName?: string,
 *   recordCount?: int,
 * }
 */
final class PublicExportResponse implements BaseModel
{
    /** @use SdkModel<PublicExportResponseShape> */
    use SdkModel;

    #[Api]
    public string $id;

    #[Api]
    public \DateTimeInterface $createdAt;

    /** @var value-of<ExportState> $exportState */
    #[Api(enum: ExportState::class)]
    public string $exportState;

    /** @var value-of<ExportType> $exportType */
    #[Api(enum: ExportType::class)]
    public string $exportType;

    /** @var list<string> $objectProperties */
    #[Api(list: 'string')]
    public array $objectProperties;

    #[Api]
    public string $objectType;

    #[Api]
    public \DateTimeInterface $updatedAt;

    #[Api(optional: true)]
    public ?string $exportName;

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

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    /**
     * @param ExportState|value-of<ExportState> $exportState
     */
    public function withExportState(ExportState|string $exportState): self
    {
        $obj = clone $this;
        $obj['exportState'] = $exportState;

        return $obj;
    }

    /**
     * @param ExportType|value-of<ExportType> $exportType
     */
    public function withExportType(ExportType|string $exportType): self
    {
        $obj = clone $this;
        $obj['exportType'] = $exportType;

        return $obj;
    }

    /**
     * @param list<string> $objectProperties
     */
    public function withObjectProperties(array $objectProperties): self
    {
        $obj = clone $this;
        $obj->objectProperties = $objectProperties;

        return $obj;
    }

    public function withObjectType(string $objectType): self
    {
        $obj = clone $this;
        $obj->objectType = $objectType;

        return $obj;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }

    public function withExportName(string $exportName): self
    {
        $obj = clone $this;
        $obj->exportName = $exportName;

        return $obj;
    }

    public function withRecordCount(int $recordCount): self
    {
        $obj = clone $this;
        $obj->recordCount = $recordCount;

        return $obj;
    }
}
