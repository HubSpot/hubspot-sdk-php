<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Properties\Batch;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\PropertyName;

/**
 * Archive a provided list of properties. This method will return a 204 No Content response on success regardless of the initial state of the property (e.g. active, already archived, non-existent).
 *
 * @see HubSpotSDK\Services\Crm\Properties\BatchService::delete()
 *
 * @phpstan-import-type PropertyNameShape from \HubSpotSDK\PropertyName
 *
 * @phpstan-type BatchDeleteParamsShape = array{
 *   inputs: list<PropertyName|PropertyNameShape>
 * }
 */
final class BatchDeleteParams implements BaseModel
{
    /** @use SdkModel<BatchDeleteParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<PropertyName> $inputs */
    #[Required(list: PropertyName::class)]
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
     * @param list<PropertyName|PropertyNameShape> $inputs
     */
    public static function with(array $inputs): self
    {
        $self = new self;

        $self['inputs'] = $inputs;

        return $self;
    }

    /**
     * @param list<PropertyName|PropertyNameShape> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }
}
