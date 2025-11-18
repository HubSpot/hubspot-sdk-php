<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\Actors;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Retrieve details of a single actor using the actor ID.
 *
 * @see HubspotSDK\Services\Conversations\ActorsService::get()
 *
 * @phpstan-type ActorGetParamsShape = array{property?: string}
 */
final class ActorGetParams implements BaseModel
{
    /** @use SdkModel<ActorGetParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * A specific property to include in the actor response.
     */
    #[Api(optional: true)]
    public ?string $property;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $property = null): self
    {
        $obj = new self;

        null !== $property && $obj->property = $property;

        return $obj;
    }

    /**
     * A specific property to include in the actor response.
     */
    public function withProperty(string $property): self
    {
        $obj = clone $this;
        $obj->property = $property;

        return $obj;
    }
}
