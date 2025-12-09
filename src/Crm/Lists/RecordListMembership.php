<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Lists;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Lists record is member of.
 *
 * @phpstan-type RecordListMembershipShape = array{
 *   listID: string,
 *   listVersion: int,
 *   firstAddedTimestamp?: \DateTimeInterface|null,
 *   isPublicList?: bool|null,
 *   lastAddedTimestamp?: \DateTimeInterface|null,
 * }
 */
final class RecordListMembership implements BaseModel
{
    /** @use SdkModel<RecordListMembershipShape> */
    use SdkModel;

    #[Required('listId')]
    public string $listID;

    #[Required]
    public int $listVersion;

    #[Optional]
    public ?\DateTimeInterface $firstAddedTimestamp;

    #[Optional]
    public ?bool $isPublicList;

    #[Optional]
    public ?\DateTimeInterface $lastAddedTimestamp;

    /**
     * `new RecordListMembership()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RecordListMembership::with(listID: ..., listVersion: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new RecordListMembership)->withListID(...)->withListVersion(...)
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
    public static function with(
        string $listID,
        int $listVersion,
        ?\DateTimeInterface $firstAddedTimestamp = null,
        ?bool $isPublicList = null,
        ?\DateTimeInterface $lastAddedTimestamp = null,
    ): self {
        $self = new self;

        $self['listID'] = $listID;
        $self['listVersion'] = $listVersion;

        null !== $firstAddedTimestamp && $self['firstAddedTimestamp'] = $firstAddedTimestamp;
        null !== $isPublicList && $self['isPublicList'] = $isPublicList;
        null !== $lastAddedTimestamp && $self['lastAddedTimestamp'] = $lastAddedTimestamp;

        return $self;
    }

    public function withListID(string $listID): self
    {
        $self = clone $this;
        $self['listID'] = $listID;

        return $self;
    }

    public function withListVersion(int $listVersion): self
    {
        $self = clone $this;
        $self['listVersion'] = $listVersion;

        return $self;
    }

    public function withFirstAddedTimestamp(
        \DateTimeInterface $firstAddedTimestamp
    ): self {
        $self = clone $this;
        $self['firstAddedTimestamp'] = $firstAddedTimestamp;

        return $self;
    }

    public function withIsPublicList(bool $isPublicList): self
    {
        $self = clone $this;
        $self['isPublicList'] = $isPublicList;

        return $self;
    }

    public function withLastAddedTimestamp(
        \DateTimeInterface $lastAddedTimestamp
    ): self {
        $self = clone $this;
        $self['lastAddedTimestamp'] = $lastAddedTimestamp;

        return $self;
    }
}
