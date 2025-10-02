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
 * $params = (new PipelineReplaceParams); // set properties as needed
 * $client->crm.pipelines->replace(...$params->toArray());
 * ```
 * Replace a pipeline stage.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->crm.pipelines->replace(...$params->toArray());`
 *
 * @see HubspotSDK\CRM\Pipelines->replace
 *
 * @phpstan-type pipeline_replace_params = array{
 *   objectType: string,
 *   pipelineID: string,
 *   displayOrder: int,
 *   label: string,
 *   metadata?: array<string, string>,
 * }
 */
final class PipelineReplaceParams implements BaseModel
{
    /** @use SdkModel<pipeline_replace_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $objectType;

    #[Api]
    public string $pipelineID;

    #[Api]
    public int $displayOrder;

    #[Api]
    public string $label;

    /** @var array<string, string>|null $metadata */
    #[Api(map: 'string', optional: true)]
    public ?array $metadata;

    /**
     * `new PipelineReplaceParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PipelineReplaceParams::with(
     *   objectType: ..., pipelineID: ..., displayOrder: ..., label: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PipelineReplaceParams)
     *   ->withObjectType(...)
     *   ->withPipelineID(...)
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
        string $pipelineID,
        int $displayOrder,
        string $label,
        ?array $metadata = null,
    ): self {
        $obj = new self;

        $obj->objectType = $objectType;
        $obj->pipelineID = $pipelineID;
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

    public function withPipelineID(string $pipelineID): self
    {
        $obj = clone $this;
        $obj->pipelineID = $pipelineID;

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
