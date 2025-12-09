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
 *   archived?: bool,
 *   association?: list<Association|value-of<Association>>,
 *   property?: string,
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
        $obj = new self;

        null !== $archived && $obj['archived'] = $archived;
        null !== $association && $obj['association'] = $association;
        null !== $property && $obj['property'] = $property;

        return $obj;
    }

    public function withArchived(bool $archived): self
    {
        $obj = clone $this;
        $obj['archived'] = $archived;

        return $obj;
    }

    /**
     * @param list<Association|value-of<Association>> $association
     */
    public function withAssociation(array $association): self
    {
        $obj = clone $this;
        $obj['association'] = $association;

        return $obj;
    }

    public function withProperty(string $property): self
    {
        $obj = clone $this;
        $obj['property'] = $property;

        return $obj;
    }
}
