<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Lists;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkResponse;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\Contracts\ResponseConverter;

/**
 * The response object containing the lists found for a multi-list fetch.
 *
 * @phpstan-type ListsByIDResponseShape = array{lists: list<PublicObjectList>}
 */
final class ListsByIDResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<ListsByIDResponseShape> */
    use SdkModel;

    use SdkResponse;

    /**
     * The object list definitions.
     *
     * @var list<PublicObjectList> $lists
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
     * @param list<PublicObjectList> $lists
     */
    public static function with(array $lists): self
    {
        $obj = new self;

        $obj->lists = $lists;

        return $obj;
    }

    /**
     * The object list definitions.
     *
     * @param list<PublicObjectList> $lists
     */
    public function withLists(array $lists): self
    {
        $obj = clone $this;
        $obj->lists = $lists;

        return $obj;
    }
}
