<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\Threads;

use HubspotSDK\Conversations\Threads\ThreadGetParams\Association;
use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @see HubspotSDK\Services\Conversations\ThreadsService::get()
 *
 * @phpstan-type ThreadGetParamsShape = array{
 *   archived?: bool|null,
 *   association?: list<Association|value-of<Association>>|null,
 *   property?: string|null,
 * }
 */
final class ThreadGetParams implements BaseModel
{
    /** @use SdkModel<ThreadGetParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Optional]
    public ?bool $archived;

    /** @var list<value-of<Association>>|null $association */
    #[Optional(list: Association::class)]
    public ?array $association;

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
     *
     * @param list<Association|value-of<Association>> $association
     */
    public static function with(
        ?bool $archived = null,
        ?array $association = null,
        ?string $property = null
    ): self {
        $self = new self;

        null !== $archived && $self['archived'] = $archived;
        null !== $association && $self['association'] = $association;
        null !== $property && $self['property'] = $property;

        return $self;
    }

    public function withArchived(bool $archived): self
    {
        $self = clone $this;
        $self['archived'] = $archived;

        return $self;
    }

    /**
     * @param list<Association|value-of<Association>> $association
     */
    public function withAssociation(array $association): self
    {
        $self = clone $this;
        $self['association'] = $association;

        return $self;
    }

    public function withProperty(string $property): self
    {
        $self = clone $this;
        $self['property'] = $property;

        return $self;
    }
}
