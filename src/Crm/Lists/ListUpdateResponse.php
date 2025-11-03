<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Lists;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkResponse;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\Contracts\ResponseConverter;

/**
 * The updated definition of the list in response to a list update request.
 *
 * @phpstan-type ListUpdateResponseShape = array{updatedList?: PublicObjectList}
 */
final class ListUpdateResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<ListUpdateResponseShape> */
    use SdkModel;

    use SdkResponse;

    /**
     * An object list definition.
     */
    #[Api(optional: true)]
    public ?PublicObjectList $updatedList;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?PublicObjectList $updatedList = null): self
    {
        $obj = new self;

        null !== $updatedList && $obj->updatedList = $updatedList;

        return $obj;
    }

    /**
     * An object list definition.
     */
    public function withUpdatedList(PublicObjectList $updatedList): self
    {
        $obj = clone $this;
        $obj->updatedList = $updatedList;

        return $obj;
    }
}
