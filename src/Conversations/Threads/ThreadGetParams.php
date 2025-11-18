<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\Threads;

use HubspotSDK\Conversations\Threads\ThreadGetParams\Association;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Retrieve a single thread by its ID.
 *
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

    /**
     * Whether to return only results that have been archived. Default is false.
     */
    #[Api(optional: true)]
    public ?bool $archived;

    /**
     * You can specify an association type here of `TICKET`. If this is set the response will included a thread associations object and associated ticket id if present. If there are no associations to a ticket with this conversation, then the thread associations object will not be present on the response.
     *
     * @var list<value-of<Association>>|null $association
     */
    #[Api(list: Association::class, optional: true)]
    public ?array $association;

    /**
     * A specific property to include in the thread response.
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
     *
     * @param list<Association|value-of<Association>> $association
     */
    public static function with(
        ?bool $archived = null,
        ?array $association = null,
        ?string $property = null
    ): self {
        $obj = new self;

        null !== $archived && $obj->archived = $archived;
        null !== $association && $obj['association'] = $association;
        null !== $property && $obj->property = $property;

        return $obj;
    }

    /**
     * Whether to return only results that have been archived. Default is false.
     */
    public function withArchived(bool $archived): self
    {
        $obj = clone $this;
        $obj->archived = $archived;

        return $obj;
    }

    /**
     * You can specify an association type here of `TICKET`. If this is set the response will included a thread associations object and associated ticket id if present. If there are no associations to a ticket with this conversation, then the thread associations object will not be present on the response.
     *
     * @param list<Association|value-of<Association>> $association
     */
    public function withAssociation(array $association): self
    {
        $obj = clone $this;
        $obj['association'] = $association;

        return $obj;
    }

    /**
     * A specific property to include in the thread response.
     */
    public function withProperty(string $property): self
    {
        $obj = clone $this;
        $obj->property = $property;

        return $obj;
    }
}
