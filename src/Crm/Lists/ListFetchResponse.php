<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Lists;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type PublicObjectListShape from \HubSpotSDK\Crm\Lists\PublicObjectList
 *
 * @phpstan-type ListFetchResponseShape = array{
 *   list: PublicObjectList|PublicObjectListShape
 * }
 */
final class ListFetchResponse implements BaseModel
{
    /** @use SdkModel<ListFetchResponseShape> */
    use SdkModel;

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
     * @param PublicObjectList|PublicObjectListShape $list
     */
    public function withList(PublicObjectList|array $list): self
    {
        $self = clone $this;
        $self['list'] = $list;

        return $self;
    }
}
