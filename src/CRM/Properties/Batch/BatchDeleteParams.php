<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Properties\Batch;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\PropertyName;

/**
 * Archive a provided list of properties. This method will return a 204 No Content response on success regardless of the initial state of the property (e.g. active, already archived, non-existent).
 *
 * @see HubspotSDK\CRM\Properties\Batch->delete
 *
 * @phpstan-type BatchDeleteParamsShape = array{inputs: list<PropertyName>}
 */
final class BatchDeleteParams implements BaseModel
{
    /** @use SdkModel<BatchDeleteParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<PropertyName> $inputs */
    #[Api(list: PropertyName::class)]
    public array $inputs;

    /**
     * `new BatchDeleteParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchDeleteParams::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchDeleteParams)->withInputs(...)
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
     * @param list<PropertyName> $inputs
     */
    public static function with(array $inputs): self
    {
        $obj = new self;

        $obj->inputs = $inputs;

        return $obj;
    }

    /**
     * @param list<PropertyName> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj->inputs = $inputs;

        return $obj;
    }
}
