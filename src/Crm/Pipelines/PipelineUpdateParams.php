<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Pipelines;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @see HubspotSDK\Services\Crm\PipelinesService::update()
 *
 * @phpstan-type PipelineUpdateParamsShape = array{
 *   objectType: string,
 *   pipelineID: string,
 *   metadata: array<string,string>,
 *   archived?: bool|null,
 *   displayOrder?: int|null,
 *   label?: string|null,
 * }
 */
final class PipelineUpdateParams implements BaseModel
{
    /** @use SdkModel<PipelineUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $objectType;

    #[Required]
    public string $pipelineID;

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
     * Whether the pipeline is archived.
     */
    #[Optional]
    public ?bool $archived;

    /**
     * The order for displaying this pipeline stage. If two pipeline stages have a matching `displayOrder`, they will be sorted alphabetically by label.
     */
    #[Optional]
    public ?int $displayOrder;

    /**
     * A label used to organize pipeline stages in HubSpot's UI. Each pipeline stage's label must be unique within that pipeline.
     */
    #[Optional]
    public ?string $label;

    /**
     * `new PipelineUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PipelineUpdateParams::with(objectType: ..., pipelineID: ..., metadata: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PipelineUpdateParams)
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
        string $pipelineID,
        array $metadata,
        ?bool $archived = null,
        ?int $displayOrder = null,
        ?string $label = null,
    ): self {
        $self = new self;

        $self['objectType'] = $objectType;
        $self['pipelineID'] = $pipelineID;
        $self['metadata'] = $metadata;

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

    public function withPipelineID(string $pipelineID): self
    {
        $self = clone $this;
        $self['pipelineID'] = $pipelineID;

        return $self;
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
        $self = clone $this;
        $self['metadata'] = $metadata;

        return $self;
    }

    /**
     * Whether the pipeline is archived.
     */
    public function withArchived(bool $archived): self
    {
        $self = clone $this;
        $self['archived'] = $archived;

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
}
