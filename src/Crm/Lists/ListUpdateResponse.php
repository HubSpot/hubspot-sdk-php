<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Lists;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * The updated definition of the list in response to a list update request.
 *
 * @phpstan-import-type PublicObjectListShape from \HubspotSDK\Crm\Lists\PublicObjectList
 *
 * @phpstan-type ListUpdateResponseShape = array{
 *   updatedList?: null|PublicObjectList|PublicObjectListShape
 * }
 */
final class ListUpdateResponse implements BaseModel
{
    /** @use SdkModel<ListUpdateResponseShape> */
    use SdkModel;

    /**
     * An object list definition.
     */
    #[Optional]
    public ?PublicObjectList $updatedList;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param PublicObjectListShape $updatedList
     */
    public static function with(
        PublicObjectList|array|null $updatedList = null
    ): self {
        $self = new self;

        null !== $updatedList && $self['updatedList'] = $updatedList;

        return $self;
    }

    /**
     * An object list definition.
     *
     * @param PublicObjectListShape $updatedList
     */
    public function withUpdatedList(PublicObjectList|array $updatedList): self
    {
        $self = clone $this;
        $self['updatedList'] = $updatedList;

        return $self;
    }
}
