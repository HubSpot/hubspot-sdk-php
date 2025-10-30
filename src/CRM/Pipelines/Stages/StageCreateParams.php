<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Pipelines\Stages;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Create a new stage associated with the pipeline identified by `{pipelineId}`. The entire stage object, including its unique ID, will be returned in the response.
 *
 * @see HubspotSDK\CRM\Pipelines\Stages->create
 *
 * @phpstan-type StageCreateParamsShape = array{
 *   objectType: string,
 *   displayOrder: int,
 *   label: string,
 *   metadata?: array<string, string>,
 * }
 */
final class StageCreateParams implements BaseModel
{
    /** @use SdkModel<StageCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $objectType;

    /**
     * The order for displaying this pipeline stage. If two pipeline stages have a matching `displayOrder`, they will be sorted alphabetically by label.
     */
    #[Api]
    public int $displayOrder;

    /**
     * A label used to organize pipeline stages in HubSpot's UI. Each pipeline stage's label must be unique within that pipeline.
     */
    #[Api]
    public string $label;

    /**
     * A JSON object containing properties that are not present on all object pipelines.
     *
     * For `deals` pipelines, the `probability` field is required (`{ "probability": 0.5 }`), and represents the likelihood a deal will close. Possible values are between 0.0 and 1.0 in increments of 0.1.
     *
     * For `tickets` pipelines, the `ticketState` field is optional (`{ "ticketState": "OPEN" }`), and represents whether the ticket remains open or has been closed by a member of your Support team. Possible values are `OPEN` or `CLOSED`.
     *
     * @var array<string, string>|null $metadata
     */
    #[Api(map: 'string', optional: true)]
    public ?array $metadata;

    /**
     * `new StageCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * StageCreateParams::with(objectType: ..., displayOrder: ..., label: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new StageCreateParams)
     *   ->withObjectType(...)
     *   ->withDisplayOrder(...)
     *   ->withLabel(...)
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
     * @param array<string, string> $metadata
     */
    public static function with(
        string $objectType,
        int $displayOrder,
        string $label,
        ?array $metadata = null
    ): self {
        $obj = new self;

        $obj->objectType = $objectType;
        $obj->displayOrder = $displayOrder;
        $obj->label = $label;

        null !== $metadata && $obj->metadata = $metadata;

        return $obj;
    }

    public function withObjectType(string $objectType): self
    {
        $obj = clone $this;
        $obj->objectType = $objectType;

        return $obj;
    }

    /**
     * The order for displaying this pipeline stage. If two pipeline stages have a matching `displayOrder`, they will be sorted alphabetically by label.
     */
    public function withDisplayOrder(int $displayOrder): self
    {
        $obj = clone $this;
        $obj->displayOrder = $displayOrder;

        return $obj;
    }

    /**
     * A label used to organize pipeline stages in HubSpot's UI. Each pipeline stage's label must be unique within that pipeline.
     */
    public function withLabel(string $label): self
    {
        $obj = clone $this;
        $obj->label = $label;

        return $obj;
    }

    /**
     * A JSON object containing properties that are not present on all object pipelines.
     *
     * For `deals` pipelines, the `probability` field is required (`{ "probability": 0.5 }`), and represents the likelihood a deal will close. Possible values are between 0.0 and 1.0 in increments of 0.1.
     *
     * For `tickets` pipelines, the `ticketState` field is optional (`{ "ticketState": "OPEN" }`), and represents whether the ticket remains open or has been closed by a member of your Support team. Possible values are `OPEN` or `CLOSED`.
     *
     * @param array<string, string> $metadata
     */
    public function withMetadata(array $metadata): self
    {
        $obj = clone $this;
        $obj->metadata = $metadata;

        return $obj;
    }
}
