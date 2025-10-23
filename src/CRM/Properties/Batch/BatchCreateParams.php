<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Properties\Batch;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\CRM\Properties\PropertyCreate;

/**
 * Create a batch of properties using the same rules as when creating an individual property.
 *
 * @see HubspotSDK\CRM\Properties\Batch->create
 *
 * @phpstan-type batch_create_params = array{inputs: list<PropertyCreate>}
 */
final class BatchCreateParams implements BaseModel
{
    /** @use SdkModel<batch_create_params> */
    use SdkModel;
    use SdkParams;

    /** @var list<PropertyCreate> $inputs */
    #[Api(list: PropertyCreate::class)]
    public array $inputs;

    /**
     * `new BatchCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchCreateParams::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchCreateParams)->withInputs(...)
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
     * @param list<PropertyCreate> $inputs
     */
    public static function with(array $inputs): self
    {
        $obj = new self;

        $obj->inputs = $inputs;

        return $obj;
    }

    /**
     * @param list<PropertyCreate> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj->inputs = $inputs;

        return $obj;
    }
}
