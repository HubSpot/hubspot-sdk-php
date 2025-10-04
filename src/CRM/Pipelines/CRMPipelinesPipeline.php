<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Pipelines;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkResponse;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type crm_pipelines_pipeline = array{
 *   id: string,
 *   archived: bool,
 *   createdAt: \DateTimeInterface,
 *   displayOrder: int,
 *   label: string,
 *   stages: list<CRMPipelinesPipelineStage>,
 *   updatedAt: \DateTimeInterface,
 *   archivedAt?: \DateTimeInterface,
 * }
 */
final class CRMPipelinesPipeline implements BaseModel, ResponseConverter
{
    /** @use SdkModel<crm_pipelines_pipeline> */
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

    /** @var list<CRMPipelinesPipelineStage> $stages */
    #[Api(list: CRMPipelinesPipelineStage::class)]
    public array $stages;

    #[Api]
    public \DateTimeInterface $updatedAt;

    #[Api(optional: true)]
    public ?\DateTimeInterface $archivedAt;

    /**
     * `new CRMPipelinesPipeline()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CRMPipelinesPipeline::with(
     *   id: ...,
     *   archived: ...,
     *   createdAt: ...,
     *   displayOrder: ...,
     *   label: ...,
     *   stages: ...,
     *   updatedAt: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CRMPipelinesPipeline)
     *   ->withID(...)
     *   ->withArchived(...)
     *   ->withCreatedAt(...)
     *   ->withDisplayOrder(...)
     *   ->withLabel(...)
     *   ->withStages(...)
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
     * @param list<CRMPipelinesPipelineStage> $stages
     */
    public static function with(
        string $id,
        bool $archived,
        \DateTimeInterface $createdAt,
        int $displayOrder,
        string $label,
        array $stages,
        \DateTimeInterface $updatedAt,
        ?\DateTimeInterface $archivedAt = null,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->archived = $archived;
        $obj->createdAt = $createdAt;
        $obj->displayOrder = $displayOrder;
        $obj->label = $label;
        $obj->stages = $stages;
        $obj->updatedAt = $updatedAt;

        null !== $archivedAt && $obj->archivedAt = $archivedAt;

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

    /**
     * @param list<CRMPipelinesPipelineStage> $stages
     */
    public function withStages(array $stages): self
    {
        $obj = clone $this;
        $obj->stages = $stages;

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
}
