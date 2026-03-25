<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Objects\Quotes\Basic;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Objects\SimplePublicObjectID;

/**
 * Archive multiple quotes by their IDs in a single request, effectively moving them to the recycling bin.
 *
 * @see HubspotSDK\Services\Crm\Objects\Quotes\BasicService::delete()
 *
 * @phpstan-import-type SimplePublicObjectIDShape from \HubspotSDK\Crm\Objects\SimplePublicObjectID
 *
 * @phpstan-type BasicDeleteParamsShape = array{
 *   inputs: list<SimplePublicObjectID|SimplePublicObjectIDShape>
 * }
 */
final class BasicDeleteParams implements BaseModel
{
    /** @use SdkModel<BasicDeleteParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<SimplePublicObjectID> $inputs */
    #[Required(list: SimplePublicObjectID::class)]
    public array $inputs;

    /**
     * `new BasicDeleteParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BasicDeleteParams::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BasicDeleteParams)->withInputs(...)
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
     * @param list<SimplePublicObjectID|SimplePublicObjectIDShape> $inputs
     */
    public static function with(array $inputs): self
    {
        $self = new self;

        $self['inputs'] = $inputs;

        return $self;
    }

    /**
     * @param list<SimplePublicObjectID|SimplePublicObjectIDShape> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }
}
