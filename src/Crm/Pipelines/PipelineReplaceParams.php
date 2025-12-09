<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Pipelines;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Replace all properties of an existing pipeline with the provided values.
 *
 * @see HubspotSDK\Services\Crm\PipelinesService::replace()
 *
 * @phpstan-type PipelineReplaceParamsShape = array{
 *   objectType: string,
 *   displayOrder: int,
 *   label: string,
 *   stages: list<PipelineStageInput|array{
 *     displayOrder: int, label: string, metadata: array<string,string>
 *   }>,
 *   validateDealStageUsagesBeforeDelete?: bool,
 *   validateReferencesBeforeDelete?: bool,
 * }
 */
final class PipelineReplaceParams implements BaseModel
{
    /** @use SdkModel<PipelineReplaceParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $objectType;

    /**
     * The order for displaying this pipeline. If two pipelines have a matching `displayOrder`, they will be sorted alphabetically by label.
     */
    #[Required]
    public int $displayOrder;

    /**
     * A unique label used to organize pipelines in HubSpot's UI.
     */
    #[Required]
    public string $label;

    /**
     * Pipeline stage inputs used to create the new or replacement pipeline.
     *
     * @var list<PipelineStageInput> $stages
     */
    #[Required(list: PipelineStageInput::class)]
    public array $stages;

    /**
     * Indicates whether to validate deal stage usages before deleting the pipeline.
     */
    #[Optional]
    public ?bool $validateDealStageUsagesBeforeDelete;

    /**
     * Indicates whether to validate references before deleting the pipeline.
     */
    #[Optional]
    public ?bool $validateReferencesBeforeDelete;

    /**
     * `new PipelineReplaceParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PipelineReplaceParams::with(
     *   objectType: ..., displayOrder: ..., label: ..., stages: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PipelineReplaceParams)
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
     * @param list<PipelineStageInput|array{
     *   displayOrder: int, label: string, metadata: array<string,string>
     * }> $stages
     */
    public static function with(
        string $objectType,
        int $displayOrder,
        string $label,
        array $stages,
        ?bool $validateDealStageUsagesBeforeDelete = null,
        ?bool $validateReferencesBeforeDelete = null,
    ): self {
        $obj = new self;

        $obj['objectType'] = $objectType;
        $obj['displayOrder'] = $displayOrder;
        $obj['label'] = $label;
        $obj['stages'] = $stages;

        null !== $validateDealStageUsagesBeforeDelete && $obj['validateDealStageUsagesBeforeDelete'] = $validateDealStageUsagesBeforeDelete;
        null !== $validateReferencesBeforeDelete && $obj['validateReferencesBeforeDelete'] = $validateReferencesBeforeDelete;

        return $obj;
    }

    public function withObjectType(string $objectType): self
    {
        $obj = clone $this;
        $obj['objectType'] = $objectType;

        return $obj;
    }

    /**
     * The order for displaying this pipeline. If two pipelines have a matching `displayOrder`, they will be sorted alphabetically by label.
     */
    public function withDisplayOrder(int $displayOrder): self
    {
        $obj = clone $this;
        $obj['displayOrder'] = $displayOrder;

        return $obj;
    }

    /**
     * A unique label used to organize pipelines in HubSpot's UI.
     */
    public function withLabel(string $label): self
    {
        $obj = clone $this;
        $obj['label'] = $label;

        return $obj;
    }

    /**
     * Pipeline stage inputs used to create the new or replacement pipeline.
     *
     * @param list<PipelineStageInput|array{
     *   displayOrder: int, label: string, metadata: array<string,string>
     * }> $stages
     */
    public function withStages(array $stages): self
    {
        $obj = clone $this;
        $obj['stages'] = $stages;

        return $obj;
    }

    /**
     * Indicates whether to validate deal stage usages before deleting the pipeline.
     */
    public function withValidateDealStageUsagesBeforeDelete(
        bool $validateDealStageUsagesBeforeDelete
    ): self {
        $obj = clone $this;
        $obj['validateDealStageUsagesBeforeDelete'] = $validateDealStageUsagesBeforeDelete;

        return $obj;
    }

    /**
     * Indicates whether to validate references before deleting the pipeline.
     */
    public function withValidateReferencesBeforeDelete(
        bool $validateReferencesBeforeDelete
    ): self {
        $obj = clone $this;
        $obj['validateReferencesBeforeDelete'] = $validateReferencesBeforeDelete;

        return $obj;
    }
}
