<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Lists;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * The response object containing the lists found for a multi-list fetch.
 *
 * @phpstan-type ListsByIDResponseShape = array{lists: list<mixed>}
 */
final class ListsByIDResponse implements BaseModel
{
    /** @use SdkModel<ListsByIDResponseShape> */
    use SdkModel;

    /**
     * The object list definitions.
     *
     * @var list<mixed> $lists
     */
    #[Api(list: PublicObjectList::class)]
    public array $lists;

    /**
     * `new ListsByIDResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ListsByIDResponse::with(lists: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ListsByIDResponse)->withLists(...)
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
     * @param list<mixed> $lists
     */
    public static function with(array $lists): self
    {
        $obj = new self;

        $obj['lists'] = $lists;

        return $obj;
    }

    /**
     * The object list definitions.
     *
     * @param list<mixed> $lists
     */
    public function withLists(array $lists): self
    {
        $obj = clone $this;
        $obj['lists'] = $lists;

        return $obj;
    }
}
