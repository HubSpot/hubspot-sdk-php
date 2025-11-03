<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Lists;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkResponse;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\Contracts\ResponseConverter;

/**
 * The response for a list fetch request.
 *
 * @phpstan-type ListFetchResponseShape = array{list: PublicObjectList}
 */
final class ListFetchResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<ListFetchResponseShape> */
    use SdkModel;

    use SdkResponse;

    /**
     * An object list definition.
     */
    #[Api]
    public PublicObjectList $list;

    /**
     * `new ListFetchResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ListFetchResponse::with(list: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ListFetchResponse)->withList(...)
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
    public static function with(PublicObjectList $list): self
    {
        $obj = new self;

        $obj->list = $list;

        return $obj;
    }

    /**
     * An object list definition.
     */
    public function withList(PublicObjectList $list): self
    {
        $obj = clone $this;
        $obj->list = $list;

        return $obj;
    }
}
