<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type EventIDViewShape = array{id: string, created: \DateTimeInterface}
 */
final class EventIDView implements BaseModel
{
    /** @use SdkModel<EventIDViewShape> */
    use SdkModel;

    /**
     * Identifier of event.
     */
    #[Required]
    public string $id;

    /**
     * Time of event creation.
     */
    #[Required]
    public \DateTimeInterface $created;

    /**
     * `new EventIDView()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EventIDView::with(id: ..., created: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EventIDView)->withID(...)->withCreated(...)
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
     */
    public static function with(string $id, \DateTimeInterface $created): self
    {
        $self = new self;

        $self['id'] = $id;
        $self['created'] = $created;

        return $self;
    }

    /**
     * Identifier of event.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Time of event creation.
     */
    public function withCreated(\DateTimeInterface $created): self
    {
        $self = clone $this;
        $self['created'] = $created;

        return $self;
    }
}
