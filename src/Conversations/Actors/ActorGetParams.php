<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\Actors;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @see HubspotSDK\Services\Conversations\ActorsService::get()
 *
 * @phpstan-type ActorGetParamsShape = array{property?: string}
 */
final class ActorGetParams implements BaseModel
{
    /** @use SdkModel<ActorGetParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Optional]
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
        $self = new self;

        null !== $property && $self['property'] = $property;

        return $self;
    }

    public function withProperty(string $property): self
    {
        $self = clone $this;
        $self['property'] = $property;

        return $self;
    }
}
