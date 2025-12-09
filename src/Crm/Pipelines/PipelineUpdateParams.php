<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Pipelines;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Perform a partial update of the pipeline identified by `{pipelineId}`. The updated pipeline will be returned in the response.
 *
 * @see HubspotSDK\Services\Crm\PipelinesService::update()
 *
 * @phpstan-type PipelineUpdateParamsShape = array{
 *   objectType: string,
 *   validateDealStageUsagesBeforeDelete?: bool,
 *   validateReferencesBeforeDelete?: bool,
 *   archived?: bool,
 *   displayOrder?: int,
 *   label?: string,
 * }
 */
final class PipelineUpdateParams implements BaseModel
{
    /** @use SdkModel<PipelineUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $objectType;

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
     * Whether the pipeline is archived. This property should only be provided when restoring an archived pipeline. If it's provided in any other call, the request will fail and a `400 Bad Request` will be returned.
     */
    #[Optional]
    public ?bool $archived;

    /**
     * The order for displaying this pipeline. If two pipelines have a matching `displayOrder`, they will be sorted alphabetically by label.
     */
    #[Optional]
    public ?int $displayOrder;

    /**
     * A unique label used to organize pipelines in HubSpot's UI.
     */
    #[Optional]
    public ?string $label;

    /**
     * `new PipelineUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PipelineUpdateParams::with(objectType: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PipelineUpdateParams)->withObjectType(...)
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
     */
    public static function with(
        string $objectType,
        ?bool $validateDealStageUsagesBeforeDelete = null,
        ?bool $validateReferencesBeforeDelete = null,
        ?bool $archived = null,
        ?int $displayOrder = null,
        ?string $label = null,
    ): self {
        $self = new self;

        $self['objectType'] = $objectType;

        null !== $validateDealStageUsagesBeforeDelete && $self['validateDealStageUsagesBeforeDelete'] = $validateDealStageUsagesBeforeDelete;
        null !== $validateReferencesBeforeDelete && $self['validateReferencesBeforeDelete'] = $validateReferencesBeforeDelete;
        null !== $archived && $self['archived'] = $archived;
        null !== $displayOrder && $self['displayOrder'] = $displayOrder;
        null !== $label && $self['label'] = $label;

        return $self;
    }

    public function withObjectType(string $objectType): self
    {
        $self = clone $this;
        $self['objectType'] = $objectType;

        return $self;
    }

    /**
     * Indicates whether to validate deal stage usages before deleting the pipeline.
     */
    public function withValidateDealStageUsagesBeforeDelete(
        bool $validateDealStageUsagesBeforeDelete
    ): self {
        $self = clone $this;
        $self['validateDealStageUsagesBeforeDelete'] = $validateDealStageUsagesBeforeDelete;

        return $self;
    }

    /**
     * Indicates whether to validate references before deleting the pipeline.
     */
    public function withValidateReferencesBeforeDelete(
        bool $validateReferencesBeforeDelete
    ): self {
        $self = clone $this;
        $self['validateReferencesBeforeDelete'] = $validateReferencesBeforeDelete;

        return $self;
    }

    /**
     * Whether the pipeline is archived. This property should only be provided when restoring an archived pipeline. If it's provided in any other call, the request will fail and a `400 Bad Request` will be returned.
     */
    public function withArchived(bool $archived): self
    {
        $self = clone $this;
        $self['archived'] = $archived;

        return $self;
    }

    /**
     * The order for displaying this pipeline. If two pipelines have a matching `displayOrder`, they will be sorted alphabetically by label.
     */
    public function withDisplayOrder(int $displayOrder): self
    {
        $self = clone $this;
        $self['displayOrder'] = $displayOrder;

        return $self;
    }

    /**
     * A unique label used to organize pipelines in HubSpot's UI.
     */
    public function withLabel(string $label): self
    {
        $self = clone $this;
        $self['label'] = $label;

        return $self;
    }
}
