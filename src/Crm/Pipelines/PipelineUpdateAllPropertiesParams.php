<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Pipelines;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Replace a pipeline.
 *
 * @see HubspotSDK\Services\Crm\PipelinesService::updateAllProperties()
 *
 * @phpstan-import-type PipelineStageInputShape from \HubspotSDK\Crm\Pipelines\PipelineStageInput
 *
 * @phpstan-type PipelineUpdateAllPropertiesParamsShape = array{
 *   objectType: string,
 *   displayOrder: int,
 *   label: string,
 *   stages: list<PipelineStageInput|PipelineStageInputShape>,
 *   validateDealStageUsagesBeforeDelete?: bool|null,
 *   validateReferencesBeforeDelete?: bool|null,
 * }
 */
final class PipelineUpdateAllPropertiesParams implements BaseModel
{
    /** @use SdkModel<PipelineUpdateAllPropertiesParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $objectType;

    /**
     * The order for displaying this pipeline stage. If two pipeline stages have a matching `displayOrder`, they will be sorted alphabetically by label.
     */
    #[Required]
    public int $displayOrder;

    /**
     * A label used to organize pipeline stages in HubSpot's UI. Each pipeline stage's label must be unique within that pipeline.
     */
    #[Required]
    public string $label;

    /**
     * The stages associated with the pipeline. They can be retrieved and updated via the pipeline stages endpoints.
     *
     * @var list<PipelineStageInput> $stages
     */
    #[Required(list: PipelineStageInput::class)]
    public array $stages;

    #[Optional]
    public ?bool $validateDealStageUsagesBeforeDelete;

    #[Optional]
    public ?bool $validateReferencesBeforeDelete;

    /**
     * `new PipelineUpdateAllPropertiesParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PipelineUpdateAllPropertiesParams::with(
     *   objectType: ..., displayOrder: ..., label: ..., stages: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PipelineUpdateAllPropertiesParams)
     *   ->withObjectType(...)
     *   ->withDisplayOrder(...)
     *   ->withLabel(...)
     *   ->withStages(...)
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
     * @param list<PipelineStageInput|PipelineStageInputShape> $stages
     */
    public static function with(
        string $objectType,
        int $displayOrder,
        string $label,
        array $stages,
        ?bool $validateDealStageUsagesBeforeDelete = null,
        ?bool $validateReferencesBeforeDelete = null,
    ): self {
        $self = new self;

        $self['objectType'] = $objectType;
        $self['displayOrder'] = $displayOrder;
        $self['label'] = $label;
        $self['stages'] = $stages;

        null !== $validateDealStageUsagesBeforeDelete && $self['validateDealStageUsagesBeforeDelete'] = $validateDealStageUsagesBeforeDelete;
        null !== $validateReferencesBeforeDelete && $self['validateReferencesBeforeDelete'] = $validateReferencesBeforeDelete;

        return $self;
    }

    public function withObjectType(string $objectType): self
    {
        $self = clone $this;
        $self['objectType'] = $objectType;

        return $self;
    }

    /**
     * The order for displaying this pipeline stage. If two pipeline stages have a matching `displayOrder`, they will be sorted alphabetically by label.
     */
    public function withDisplayOrder(int $displayOrder): self
    {
        $self = clone $this;
        $self['displayOrder'] = $displayOrder;

        return $self;
    }

    /**
     * A label used to organize pipeline stages in HubSpot's UI. Each pipeline stage's label must be unique within that pipeline.
     */
    public function withLabel(string $label): self
    {
        $self = clone $this;
        $self['label'] = $label;

        return $self;
    }

    /**
     * The stages associated with the pipeline. They can be retrieved and updated via the pipeline stages endpoints.
     *
     * @param list<PipelineStageInput|PipelineStageInputShape> $stages
     */
    public function withStages(array $stages): self
    {
        $self = clone $this;
        $self['stages'] = $stages;

        return $self;
    }

    public function withValidateDealStageUsagesBeforeDelete(
        bool $validateDealStageUsagesBeforeDelete
    ): self {
        $self = clone $this;
        $self['validateDealStageUsagesBeforeDelete'] = $validateDealStageUsagesBeforeDelete;

        return $self;
    }

    public function withValidateReferencesBeforeDelete(
        bool $validateReferencesBeforeDelete
    ): self {
        $self = clone $this;
        $self['validateReferencesBeforeDelete'] = $validateReferencesBeforeDelete;

        return $self;
    }
}
