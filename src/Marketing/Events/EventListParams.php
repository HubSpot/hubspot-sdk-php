<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Events;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Returns all Marketing Events available on the portal, along with their properties, regardless of whether they were created manually or through the application.
 *
 * The marketing events returned by this endpoint are sorted by objectId.
 *
 * @see HubspotSDK\Marketing\Events->list
 *
 * @phpstan-type event_list_params = array{after?: string, limit?: int}
 */
final class EventListParams implements BaseModel
{
    /** @use SdkModel<event_list_params> */
    use SdkModel;
    use SdkParams;

    /**
     * The cursor indicating the position of the last retrieved item.
     */
    #[Api(optional: true)]
    public ?string $after;

    /**
     * The limit for response size. The default value is 10, the max number is 100.
     */
    #[Api(optional: true)]
    public ?int $limit;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $after = null, ?int $limit = null): self
    {
        $obj = new self;

        null !== $after && $obj->after = $after;
        null !== $limit && $obj->limit = $limit;

        return $obj;
    }

    /**
     * The cursor indicating the position of the last retrieved item.
     */
    public function withAfter(string $after): self
    {
        $obj = clone $this;
        $obj->after = $after;

        return $obj;
    }

    /**
     * The limit for response size. The default value is 10, the max number is 100.
     */
    public function withLimit(int $limit): self
    {
        $obj = clone $this;
        $obj->limit = $limit;

        return $obj;
    }
}
