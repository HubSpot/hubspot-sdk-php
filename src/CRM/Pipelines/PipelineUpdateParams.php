<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Pipelines;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new PipelineUpdateParams); // set properties as needed
 * $client->crm.pipelines->update(...$params->toArray());
 * ```
 * Update a pipeline stage.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->crm.pipelines->update(...$params->toArray());`
 *
 * @see HubspotSDK\CRM\Pipelines->update
 *
 * @phpstan-type pipeline_update_params = array{
 *   objectType: string,
 *   pipelineID: string,
 *   archived?: bool,
 *   displayOrder?: int,
 *   label?: string,
 *   metadata?: array<string, string>,
 * }
 */
final class PipelineUpdateParams implements BaseModel
{
    /** @use SdkModel<pipeline_update_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $objectType;

    #[Api]
    public string $pipelineID;

    #[Api(optional: true)]
    public ?bool $archived;

    #[Api(optional: true)]
    public ?int $displayOrder;

    #[Api(optional: true)]
    public ?string $label;

    /** @var array<string, string>|null $metadata */
    #[Api(map: 'string', optional: true)]
    public ?array $metadata;

    /**
     * `new PipelineUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PipelineUpdateParams::with(objectType: ..., pipelineID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PipelineUpdateParams)->withObjectType(...)->withPipelineID(...)
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
        string $pipelineID,
        ?bool $archived = null,
        ?int $displayOrder = null,
        ?string $label = null,
        ?array $metadata = null,
    ): self {
        $obj = new self;

        $obj->objectType = $objectType;
        $obj->pipelineID = $pipelineID;

        null !== $archived && $obj->archived = $archived;
        null !== $displayOrder && $obj->displayOrder = $displayOrder;
        null !== $label && $obj->label = $label;
        null !== $metadata && $obj->metadata = $metadata;

        return $obj;
    }

    public function withObjectType(string $objectType): self
    {
        $obj = clone $this;
        $obj->objectType = $objectType;

        return $obj;
    }

    public function withPipelineID(string $pipelineID): self
    {
        $obj = clone $this;
        $obj->pipelineID = $pipelineID;

        return $obj;
    }

    public function withArchived(bool $archived): self
    {
        $obj = clone $this;
        $obj->archived = $archived;

        return $obj;
    }

    public function withDisplayOrder(int $displayOrder): self
    {
        $obj = clone $this;
        $obj->displayOrder = $displayOrder;

        return $obj;
    }

    public function withLabel(string $label): self
    {
        $obj = clone $this;
        $obj->label = $label;

        return $obj;
    }

    /**
     * @param array<string, string> $metadata
     */
    public function withMetadata(array $metadata): self
    {
        $obj = clone $this;
        $obj->metadata = $metadata;

        return $obj;
    }
}
