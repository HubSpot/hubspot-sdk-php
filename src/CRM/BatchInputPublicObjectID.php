<?php

declare(strict_types=1);

namespace HubspotSDK\CRM;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\PublicObjectID;

/**
 * @phpstan-type batch_input_public_object_id = array{inputs: list<PublicObjectID>}
 */
final class BatchInputPublicObjectID implements BaseModel
{
    /** @use SdkModel<batch_input_public_object_id> */
    use SdkModel;

    /** @var list<PublicObjectID> $inputs */
    #[Api(list: PublicObjectID::class)]
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
     * @param list<PublicObjectID> $inputs
     */
    public static function with(array $inputs): self
    {
        $obj = new self;

        $obj->inputs = $inputs;

        return $obj;
    }

    /**
     * @param list<PublicObjectID> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj->inputs = $inputs;

        return $obj;
    }
}
