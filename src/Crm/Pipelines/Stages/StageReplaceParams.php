<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Pipelines\Stages;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Replace all the properties of an existing pipeline stage with the values provided. The updated stage will be returned in the response.
 *
 * @see HubspotSDK\Services\Crm\Pipelines\StagesService::replace()
 *
 * @phpstan-type StageReplaceParamsShape = array{
 *   objectType: string,
 *   pipelineId: string,
 *   displayOrder: int,
 *   label: string,
 *   metadata: array<string,string>,
 * }
 */
final class StageReplaceParams implements BaseModel
{
    /** @use SdkModel<StageReplaceParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $objectType;

    #[Required]
    public string $pipelineId;

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
     * A JSON object containing properties that are not present on all object pipelines.
     *
     * For `deals` pipelines, the `probability` field is required (`{ "probability": 0.5 }`), and represents the likelihood a deal will close. Possible values are between 0.0 and 1.0 in increments of 0.1.
     *
     * For `tickets` pipelines, the `ticketState` field is optional (`{ "ticketState": "OPEN" }`), and represents whether the ticket remains open or has been closed by a member of your Support team. Possible values are `OPEN` or `CLOSED`.
     *
     * @var array<string,string> $metadata
     */
    #[Required(map: 'string')]
    public array $metadata;

    /**
     * `new StageReplaceParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * StageReplaceParams::with(
     *   objectType: ..., pipelineId: ..., displayOrder: ..., label: ..., metadata: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new StageReplaceParams)
     *   ->withObjectType(...)
     *   ->withPipelineID(...)
     *   ->withDisplayOrder(...)
     *   ->withLabel(...)
     *   ->withMetadata(...)
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
     * @param array<string,string> $metadata
     */
    public static function with(
        string $objectType,
        string $pipelineId,
        int $displayOrder,
        string $label,
        array $metadata,
    ): self {
        $obj = new self;

        $obj['objectType'] = $objectType;
        $obj['pipelineId'] = $pipelineId;
        $obj['displayOrder'] = $displayOrder;
        $obj['label'] = $label;
        $obj['metadata'] = $metadata;

        return $obj;
    }

    public function withObjectType(string $objectType): self
    {
        $obj = clone $this;
        $obj['objectType'] = $objectType;

        return $obj;
    }

    public function withPipelineID(string $pipelineID): self
    {
        $obj = clone $this;
        $obj['pipelineId'] = $pipelineID;

        return $obj;
    }

    /**
     * The order for displaying this pipeline stage. If two pipeline stages have a matching `displayOrder`, they will be sorted alphabetically by label.
     */
    public function withDisplayOrder(int $displayOrder): self
    {
        $obj = clone $this;
        $obj['displayOrder'] = $displayOrder;

        return $obj;
    }

    /**
     * A label used to organize pipeline stages in HubSpot's UI. Each pipeline stage's label must be unique within that pipeline.
     */
    public function withLabel(string $label): self
    {
        $obj = clone $this;
        $obj['label'] = $label;

        return $obj;
    }

    /**
     * A JSON object containing properties that are not present on all object pipelines.
     *
     * For `deals` pipelines, the `probability` field is required (`{ "probability": 0.5 }`), and represents the likelihood a deal will close. Possible values are between 0.0 and 1.0 in increments of 0.1.
     *
     * For `tickets` pipelines, the `ticketState` field is optional (`{ "ticketState": "OPEN" }`), and represents whether the ticket remains open or has been closed by a member of your Support team. Possible values are `OPEN` or `CLOSED`.
     *
     * @param array<string,string> $metadata
     */
    public function withMetadata(array $metadata): self
    {
        $obj = clone $this;
        $obj['metadata'] = $metadata;

        return $obj;
    }
}
