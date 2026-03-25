<?php

declare(strict_types=1);

namespace HubspotSDK\Settings\Currencies;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\PublicObjectID;

/**
 * @phpstan-import-type PublicObjectIDShape from \HubspotSDK\PublicObjectID
 *
 * @phpstan-type BatchInputPublicObjectIDShape = array{
 *   inputs: list<PublicObjectID|PublicObjectIDShape>
 * }
 */
final class BatchInputPublicObjectID implements BaseModel
{
    /** @use SdkModel<BatchInputPublicObjectIDShape> */
    use SdkModel;

    /** @var list<PublicObjectID> $inputs */
    #[Required(list: PublicObjectID::class)]
    public array $inputs;

    /**
     * `new BatchInputPublicObjectID()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchInputPublicObjectID::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchInputPublicObjectID)->withInputs(...)
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
     * @param list<PublicObjectID|PublicObjectIDShape> $inputs
     */
    public static function with(array $inputs): self
    {
        $self = new self;

        $self['inputs'] = $inputs;

        return $self;
    }

    /**
     * @param list<PublicObjectID|PublicObjectIDShape> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }
}
