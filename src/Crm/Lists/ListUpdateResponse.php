<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Lists;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type PublicObjectListShape from \HubSpotSDK\Crm\Lists\PublicObjectList
 *
 * @phpstan-type ListUpdateResponseShape = array{
 *   updatedList?: null|PublicObjectList|PublicObjectListShape
 * }
 */
final class ListUpdateResponse implements BaseModel
{
    /** @use SdkModel<ListUpdateResponseShape> */
    use SdkModel;

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
     * @param PublicObjectList|PublicObjectListShape|null $updatedList
     */
    public static function with(
        PublicObjectList|array|null $updatedList = null
    ): self {
        $self = new self;

        null !== $updatedList && $self['updatedList'] = $updatedList;

        return $self;
    }

    /**
     * @param PublicObjectList|PublicObjectListShape $updatedList
     */
    public function withUpdatedList(PublicObjectList|array $updatedList): self
    {
        $self = clone $this;
        $self['updatedList'] = $updatedList;

        return $self;
    }
}
