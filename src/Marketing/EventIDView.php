<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * The ID of a send event.
 *
 * @phpstan-type event_id_view = array{id: string, created: \DateTimeInterface}
 */
final class EventIDView implements BaseModel
{
    /** @use SdkModel<event_id_view> */
    use SdkModel;

    /**
     * Identifier of event.
     */
    #[Api]
    public string $id;

    /**
     * Time of event creation.
     */
    #[Api]
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
        $obj = new self;

        $obj->id = $id;
        $obj->created = $created;

        return $obj;
    }

    /**
     * Identifier of event.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * Time of event creation.
     */
    public function withCreated(\DateTimeInterface $created): self
    {
        $obj = clone $this;
        $obj->created = $created;

        return $obj;
    }
}
