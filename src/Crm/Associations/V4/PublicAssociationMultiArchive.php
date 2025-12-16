<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Associations\V4;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\PublicObjectID;

/**
 * @phpstan-import-type PublicObjectIDShape from \HubspotSDK\PublicObjectID
 *
 * @phpstan-type PublicAssociationMultiArchiveShape = array{
 *   from: PublicObjectID|PublicObjectIDShape, to: list<PublicObjectIDShape>
 * }
 */
final class PublicAssociationMultiArchive implements BaseModel
{
    /** @use SdkModel<PublicAssociationMultiArchiveShape> */
    use SdkModel;

    #[Required]
    public PublicObjectID $from;

    /** @var list<PublicObjectID> $to */
    #[Required(list: PublicObjectID::class)]
    public array $to;

    /**
     * `new PublicAssociationMultiArchive()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicAssociationMultiArchive::with(from: ..., to: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicAssociationMultiArchive)->withFrom(...)->withTo(...)
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
     * @param PublicObjectIDShape $from
     * @param list<PublicObjectIDShape> $to
     */
    public static function with(PublicObjectID|array $from, array $to): self
    {
        $self = new self;

        $self['from'] = $from;
        $self['to'] = $to;

        return $self;
    }

    /**
     * @param PublicObjectIDShape $from
     */
    public function withFrom(PublicObjectID|array $from): self
    {
        $self = clone $this;
        $self['from'] = $from;

        return $self;
    }

    /**
     * @param list<PublicObjectIDShape> $to
     */
    public function withTo(array $to): self
    {
        $self = clone $this;
        $self['to'] = $to;

        return $self;
    }
}
