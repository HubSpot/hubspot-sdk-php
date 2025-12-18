<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Lists;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * The response for a list fetch request.
 *
 * @phpstan-import-type PublicObjectListShape from \HubspotSDK\Crm\Lists\PublicObjectList
 *
 * @phpstan-type ListFetchResponseShape = array{
 *   list: PublicObjectList|PublicObjectListShape
 * }
 */
final class ListFetchResponse implements BaseModel
{
    /** @use SdkModel<ListFetchResponseShape> */
    use SdkModel;

    /**
     * An object list definition.
     */
    #[Required]
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
     *
     * @param PublicObjectList|PublicObjectListShape $list
     */
    public static function with(PublicObjectList|array $list): self
    {
        $self = new self;

        $self['list'] = $list;

        return $self;
    }

    /**
     * An object list definition.
     *
     * @param PublicObjectList|PublicObjectListShape $list
     */
    public function withList(PublicObjectList|array $list): self
    {
        $self = clone $this;
        $self['list'] = $list;

        return $self;
    }
}
