<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Pipelines;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Delete a pipeline identified by its unique pipelineId.
 *
 * @see HubspotSDK\Services\Crm\PipelinesService::delete()
 *
 * @phpstan-type PipelineDeleteParamsShape = array{
 *   objectType: string,
 *   validateDealStageUsagesBeforeDelete?: bool|null,
 *   validateReferencesBeforeDelete?: bool|null,
 * }
 */
final class PipelineDeleteParams implements BaseModel
{
    /** @use SdkModel<PipelineDeleteParamsShape> */
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
     * `new PipelineDeleteParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PipelineDeleteParams::with(objectType: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PipelineDeleteParams)->withObjectType(...)
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
    ): self {
        $self = new self;

        $self['objectType'] = $objectType;

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
}
