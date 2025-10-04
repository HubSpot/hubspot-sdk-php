<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Pipelines;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkResponse;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\Contracts\ResponseConverter;
use HubspotSDK\CRM\Pipelines\CRMPipelinesPipelineStage\WritePermissions;

/**
 * @phpstan-type crm_pipelines_pipeline_stage = array{
 *   id: string,
 *   archived: bool,
 *   createdAt: \DateTimeInterface,
 *   displayOrder: int,
 *   label: string,
 *   updatedAt: \DateTimeInterface,
 *   archivedAt?: \DateTimeInterface,
 *   metadata?: array<string, string>,
 *   writePermissions?: value-of<WritePermissions>,
 * }
 */
final class CRMPipelinesPipelineStage implements BaseModel, ResponseConverter
{
    /** @use SdkModel<crm_pipelines_pipeline_stage> */
    use SdkModel;

    use SdkResponse;

    #[Api]
    public string $id;

    #[Api]
    public bool $archived;

    #[Api]
    public \DateTimeInterface $createdAt;

    #[Api]
    public int $displayOrder;

    #[Api]
    public string $label;

    #[Api]
    public \DateTimeInterface $updatedAt;

    #[Api(optional: true)]
    public ?\DateTimeInterface $archivedAt;

    /** @var array<string, string>|null $metadata */
    #[Api(map: 'string', optional: true)]
    public ?array $metadata;

    /** @var value-of<WritePermissions>|null $writePermissions */
    #[Api(enum: WritePermissions::class, optional: true)]
    public ?string $writePermissions;

    /**
     * `new CRMPipelinesPipelineStage()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CRMPipelinesPipelineStage::with(
     *   id: ...,
     *   archived: ...,
     *   createdAt: ...,
     *   displayOrder: ...,
     *   label: ...,
     *   updatedAt: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CRMPipelinesPipelineStage)
     *   ->withID(...)
     *   ->withArchived(...)
     *   ->withCreatedAt(...)
     *   ->withDisplayOrder(...)
     *   ->withLabel(...)
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
     * @param array<string, string> $metadata
     * @param WritePermissions|value-of<WritePermissions> $writePermissions
     */
    public static function with(
        string $id,
        bool $archived,
        \DateTimeInterface $createdAt,
        int $displayOrder,
        string $label,
        \DateTimeInterface $updatedAt,
        ?\DateTimeInterface $archivedAt = null,
        ?array $metadata = null,
        WritePermissions|string|null $writePermissions = null,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->archived = $archived;
        $obj->createdAt = $createdAt;
        $obj->displayOrder = $displayOrder;
        $obj->label = $label;
        $obj->updatedAt = $updatedAt;

        null !== $archivedAt && $obj->archivedAt = $archivedAt;
        null !== $metadata && $obj->metadata = $metadata;
        null !== $writePermissions && $obj['writePermissions'] = $writePermissions;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    public function withArchived(bool $archived): self
    {
        $obj = clone $this;
        $obj->archived = $archived;

        return $obj;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    public function withDisplayOrder(int $displayOrder): self
    {
        $obj = clone $this;
        $obj->displayOrder = $displayOrder;

        return $obj;
    }

    public function withLabel(string $label): self
    {
        $obj = clone $this;
        $obj->label = $label;

        return $obj;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }

    public function withArchivedAt(\DateTimeInterface $archivedAt): self
    {
        $obj = clone $this;
        $obj->archivedAt = $archivedAt;

        return $obj;
    }

    /**
     * @param array<string, string> $metadata
     */
    public function withMetadata(array $metadata): self
    {
        $obj = clone $this;
        $obj->metadata = $metadata;

        return $obj;
    }

    /**
     * @param WritePermissions|value-of<WritePermissions> $writePermissions
     */
    public function withWritePermissions(
        WritePermissions|string $writePermissions
    ): self {
        $obj = clone $this;
        $obj['writePermissions'] = $writePermissions;

        return $obj;
    }
}
