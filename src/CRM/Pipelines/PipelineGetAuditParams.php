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
 * $params = (new PipelineGetAuditParams); // set properties as needed
 * $client->crm.pipelines->getAudit(...$params->toArray());
 * ```
 * Return an audit of all changes to the pipeline.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->crm.pipelines->getAudit(...$params->toArray());`
 *
 * @see HubspotSDK\CRM\Pipelines->getAudit
 *
 * @phpstan-type pipeline_get_audit_params = array{objectType: string}
 */
final class PipelineGetAuditParams implements BaseModel
{
    /** @use SdkModel<pipeline_get_audit_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $objectType;

    /**
     * `new PipelineGetAuditParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PipelineGetAuditParams::with(objectType: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PipelineGetAuditParams)->withObjectType(...)
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
    public static function with(string $objectType): self
    {
        $obj = new self;

        $obj->objectType = $objectType;

        return $obj;
    }

    public function withObjectType(string $objectType): self
    {
        $obj = clone $this;
        $obj->objectType = $objectType;

        return $obj;
    }
}
