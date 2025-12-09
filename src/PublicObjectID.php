<?php

declare(strict_types=1);

namespace HubspotSDK;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicObjectIDShape = array{id: string}
 */
final class PublicObjectID implements BaseModel
{
    /** @use SdkModel<PublicObjectIDShape> */
    use SdkModel;

    /**
     * The unique ID that identifies an object.
     */
    #[Required]
    public string $id;

    /**
     * `new PublicObjectID()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicObjectID::with(id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicObjectID)->withID(...)
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
    public static function with(string $id): self
    {
        $obj = new self;

        $obj['id'] = $id;

        return $obj;
    }

    /**
     * The unique ID that identifies an object.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }
}
