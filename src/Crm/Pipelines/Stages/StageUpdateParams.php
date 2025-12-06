<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Pipelines\Stages;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Perform a partial update on a specific stage of a pipeline.
 *
 * @see HubspotSDK\Services\Crm\Pipelines\StagesService::update()
 *
 * @phpstan-type StageUpdateParamsShape = array{
 *   objectType: string,
 *   pipelineId: string,
 *   metadata: array<string,string>,
 *   archived?: bool,
 *   displayOrder?: int,
 *   label?: string,
 * }
 */
final class StageUpdateParams implements BaseModel
{
    /** @use SdkModel<StageUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $objectType;

    #[Api]
    public string $pipelineId;

    /**
     * A JSON object containing properties that are not present on all object pipelines.
     *
     * For `deals` pipelines, the `probability` field is required (`{ "probability": 0.5 }`), and represents the likelihood a deal will close. Possible values are between 0.0 and 1.0 in increments of 0.1.
     *
     * For `tickets` pipelines, the `ticketState` field is optional (`{ "ticketState": "OPEN" }`), and represents whether the ticket remains open or has been closed by a member of your Support team. Possible values are `OPEN` or `CLOSED`.
     *
     * @var array<string,string> $metadata
     */
    #[Api(map: 'string')]
    public array $metadata;

    /**
     * Whether the pipeline is archived.
     */
    #[Api(optional: true)]
    public ?bool $archived;

    /**
     * The order for displaying this pipeline stage. If two pipeline stages have a matching `displayOrder`, they will be sorted alphabetically by label.
     */
    #[Api(optional: true)]
    public ?int $displayOrder;

    /**
     * A label used to organize pipeline stages in HubSpot's UI. Each pipeline stage's label must be unique within that pipeline.
     */
    #[Api(optional: true)]
    public ?string $label;

    /**
     * `new StageUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * StageUpdateParams::with(objectType: ..., pipelineId: ..., metadata: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new StageUpdateParams)
     *   ->withObjectType(...)
     *   ->withPipelineID(...)
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
        array $metadata,
        ?bool $archived = null,
        ?int $displayOrder = null,
        ?string $label = null,
    ): self {
        $obj = new self;

        $obj['objectType'] = $objectType;
        $obj['pipelineId'] = $pipelineId;
        $obj['metadata'] = $metadata;

        null !== $archived && $obj['archived'] = $archived;
        null !== $displayOrder && $obj['displayOrder'] = $displayOrder;
        null !== $label && $obj['label'] = $label;

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

    /**
     * Whether the pipeline is archived.
     */
    public function withArchived(bool $archived): self
    {
        $obj = clone $this;
        $obj['archived'] = $archived;

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
}
