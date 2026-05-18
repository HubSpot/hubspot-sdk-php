<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\PublicObjectID;

/**
 * @phpstan-import-type PublicObjectIDShape from \HubSpotSDK\PublicObjectID
 *
 * @phpstan-type PublicAssociationMultiArchiveShape = array{
 *   from: PublicObjectID|PublicObjectIDShape,
 *   to: list<PublicObjectID|PublicObjectIDShape>,
 * }
 */
final class PublicAssociationMultiArchive implements BaseModel
{
    /** @use SdkModel<PublicAssociationMultiArchiveShape> */
    use SdkModel;

    /**
     * Contains the Id of a Public Object.
     */
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
     * @param PublicObjectID|PublicObjectIDShape $from
     * @param list<PublicObjectID|PublicObjectIDShape> $to
     */
    public static function with(PublicObjectID|array $from, array $to): self
    {
        $self = new self;

        $self['from'] = $from;
        $self['to'] = $to;

        return $self;
    }

    /**
     * Contains the Id of a Public Object.
     *
     * @param PublicObjectID|PublicObjectIDShape $from
     */
    public function withFrom(PublicObjectID|array $from): self
    {
        $self = clone $this;
        $self['from'] = $from;

        return $self;
    }

    /**
     * @param list<PublicObjectID|PublicObjectIDShape> $to
     */
    public function withTo(array $to): self
    {
        $self = clone $this;
        $self['to'] = $to;

        return $self;
    }
}
