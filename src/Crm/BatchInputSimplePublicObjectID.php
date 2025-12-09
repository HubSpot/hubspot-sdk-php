<?php

declare(strict_types=1);

namespace HubspotSDK\Crm;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type BatchInputSimplePublicObjectIDShape = array{
 *   inputs: list<SimplePublicObjectID>
 * }
 */
final class BatchInputSimplePublicObjectID implements BaseModel
{
    /** @use SdkModel<BatchInputSimplePublicObjectIDShape> */
    use SdkModel;

    /** @var list<SimplePublicObjectID> $inputs */
    #[Required(list: SimplePublicObjectID::class)]
    public array $inputs;

    /**
     * `new BatchInputSimplePublicObjectID()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchInputSimplePublicObjectID::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchInputSimplePublicObjectID)->withInputs(...)
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
     * @param list<SimplePublicObjectID|array{id: string}> $inputs
     */
    public static function with(array $inputs): self
    {
        $self = new self;

        $self['inputs'] = $inputs;

        return $self;
    }

    /**
     * @param list<SimplePublicObjectID|array{id: string}> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }
}
