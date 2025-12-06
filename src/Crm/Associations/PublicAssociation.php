<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Associations;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\PublicObjectID;

/**
 * @phpstan-type PublicAssociationShape = array{
 *   from: PublicObjectID, to: PublicObjectID, type: string
 * }
 */
final class PublicAssociation implements BaseModel
{
    /** @use SdkModel<PublicAssociationShape> */
    use SdkModel;

    #[Api]
    public PublicObjectID $from;

    #[Api]
    public PublicObjectID $to;

    /**
     * The type of association between the 'from' and 'to' objects.
     */
    #[Api]
    public string $type;

    /**
     * `new PublicAssociation()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicAssociation::with(from: ..., to: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicAssociation)->withFrom(...)->withTo(...)->withType(...)
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
     * @param PublicObjectID|array{id: string} $from
     * @param PublicObjectID|array{id: string} $to
     */
    public static function with(
        PublicObjectID|array $from,
        PublicObjectID|array $to,
        string $type
    ): self {
        $obj = new self;

        $obj['from'] = $from;
        $obj['to'] = $to;
        $obj['type'] = $type;

        return $obj;
    }

    /**
     * @param PublicObjectID|array{id: string} $from
     */
    public function withFrom(PublicObjectID|array $from): self
    {
        $obj = clone $this;
        $obj['from'] = $from;

        return $obj;
    }

    /**
     * @param PublicObjectID|array{id: string} $to
     */
    public function withTo(PublicObjectID|array $to): self
    {
        $obj = clone $this;
        $obj['to'] = $to;

        return $obj;
    }

    /**
     * The type of association between the 'from' and 'to' objects.
     */
    public function withType(string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }
}
