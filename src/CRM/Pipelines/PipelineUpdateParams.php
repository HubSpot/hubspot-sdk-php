<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Pipelines;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Perform a partial update of the pipeline identified by `{pipelineId}`. The updated pipeline will be returned in the response.
 *
 * @see HubspotSDK\CRM\Pipelines->update
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

    #[Api]
    public string $objectType;

    #[Api(optional: true)]
    public ?bool $validateDealStageUsagesBeforeDelete;

    #[Api(optional: true)]
    public ?bool $validateReferencesBeforeDelete;

    /**
     * Whether the pipeline is archived. This property should only be provided when restoring an archived pipeline. If it's provided in any other call, the request will fail and a `400 Bad Request` will be returned.
     */
    #[Api(optional: true)]
    public ?bool $archived;

    /**
     * The order for displaying this pipeline. If two pipelines have a matching `displayOrder`, they will be sorted alphabetically by label.
     */
    #[Api(optional: true)]
    public ?int $displayOrder;

    /**
     * A unique label used to organize pipelines in HubSpot's UI.
     */
    #[Api(optional: true)]
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
        $obj = new self;

        $obj->objectType = $objectType;

        null !== $validateDealStageUsagesBeforeDelete && $obj->validateDealStageUsagesBeforeDelete = $validateDealStageUsagesBeforeDelete;
        null !== $validateReferencesBeforeDelete && $obj->validateReferencesBeforeDelete = $validateReferencesBeforeDelete;
        null !== $archived && $obj->archived = $archived;
        null !== $displayOrder && $obj->displayOrder = $displayOrder;
        null !== $label && $obj->label = $label;

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

    /**
     * Whether the pipeline is archived. This property should only be provided when restoring an archived pipeline. If it's provided in any other call, the request will fail and a `400 Bad Request` will be returned.
     */
    public function withArchived(bool $archived): self
    {
        $obj = clone $this;
        $obj->archived = $archived;

        return $obj;
    }

    /**
     * The order for displaying this pipeline. If two pipelines have a matching `displayOrder`, they will be sorted alphabetically by label.
     */
    public function withDisplayOrder(int $displayOrder): self
    {
        $obj = clone $this;
        $obj->displayOrder = $displayOrder;

        return $obj;
    }

    /**
     * A unique label used to organize pipelines in HubSpot's UI.
     */
    public function withLabel(string $label): self
    {
        $obj = clone $this;
        $obj->label = $label;

        return $obj;
    }
}
