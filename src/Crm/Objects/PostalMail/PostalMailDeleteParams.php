<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Objects\PostalMail;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Objects\SimplePublicObjectID;

/**
 * Archive a batch of postal mail objects using their IDs.
 *
 * @see HubspotSDK\Services\Crm\Objects\PostalMailService::delete()
 *
 * @phpstan-import-type SimplePublicObjectIDShape from \HubspotSDK\Crm\Objects\SimplePublicObjectID
 *
 * @phpstan-type PostalMailDeleteParamsShape = array{
 *   inputs: list<SimplePublicObjectID|SimplePublicObjectIDShape>
 * }
 */
final class PostalMailDeleteParams implements BaseModel
{
    /** @use SdkModel<PostalMailDeleteParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<SimplePublicObjectID> $inputs */
    #[Required(list: SimplePublicObjectID::class)]
    public array $inputs;

    /**
     * `new PostalMailDeleteParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PostalMailDeleteParams::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PostalMailDeleteParams)->withInputs(...)
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
