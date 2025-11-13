<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Pipelines;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Delete a pipeline.
 *
 * @see HubspotSDK\Services\Crm\PipelinesService::delete()
 *
 * @phpstan-type PipelineDeleteParamsShape = array{
 *   objectType: string,
 *   validateDealStageUsagesBeforeDelete?: bool,
 *   validateReferencesBeforeDelete?: bool,
 * }
 */
final class PipelineDeleteParams implements BaseModel
{
    /** @use SdkModel<PipelineDeleteParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $objectType;

    #[Api(optional: true)]
    public ?bool $validateDealStageUsagesBeforeDelete;

    #[Api(optional: true)]
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
        $obj = new self;

        $obj->objectType = $objectType;

        null !== $validateDealStageUsagesBeforeDelete && $obj->validateDealStageUsagesBeforeDelete = $validateDealStageUsagesBeforeDelete;
        null !== $validateReferencesBeforeDelete && $obj->validateReferencesBeforeDelete = $validateReferencesBeforeDelete;

        return $obj;
    }

    public function withObjectType(string $objectType): self
    {
        $obj = clone $this;
        $obj->objectType = $objectType;

        return $obj;
    }

    public function withValidateDealStageUsagesBeforeDelete(
        bool $validateDealStageUsagesBeforeDelete
    ): self {
        $obj = clone $this;
        $obj->validateDealStageUsagesBeforeDelete = $validateDealStageUsagesBeforeDelete;

        return $obj;
    }

    public function withValidateReferencesBeforeDelete(
        bool $validateReferencesBeforeDelete
    ): self {
        $obj = clone $this;
        $obj->validateReferencesBeforeDelete = $validateReferencesBeforeDelete;

        return $obj;
    }
}
