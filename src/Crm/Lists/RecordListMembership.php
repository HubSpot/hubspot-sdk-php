<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Lists;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type RecordListMembershipShape = array{
 *   firstAddedTimestamp: \DateTimeInterface,
 *   lastAddedTimestamp: \DateTimeInterface,
 *   listID: string,
 *   listVersion: int,
 *   isPublicList?: bool|null,
 * }
 */
final class RecordListMembership implements BaseModel
{
    /** @use SdkModel<RecordListMembershipShape> */
    use SdkModel;

    /**
     * The timestamp when the record was first added to the list.
     */
    #[Required]
    public \DateTimeInterface $firstAddedTimestamp;

    /**
     * The timestamp when the record was last added to the list.
     */
    #[Required]
    public \DateTimeInterface $lastAddedTimestamp;

    /**
     * The unique identifier of the list.
     */
    #[Required('listId')]
    public string $listID;

    /**
     * The version number of the list.
     */
    #[Required]
    public int $listVersion;

    /**
     * Indicates whether the list is public.
     */
    #[Optional]
    public ?bool $isPublicList;

    /**
     * `new RecordListMembership()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RecordListMembership::with(
     *   firstAddedTimestamp: ...,
     *   lastAddedTimestamp: ...,
     *   listID: ...,
     *   listVersion: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new RecordListMembership)
     *   ->withFirstAddedTimestamp(...)
     *   ->withLastAddedTimestamp(...)
     *   ->withListID(...)
     *   ->withListVersion(...)
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
        \DateTimeInterface $firstAddedTimestamp,
        \DateTimeInterface $lastAddedTimestamp,
        string $listID,
        int $listVersion,
        ?bool $isPublicList = null,
    ): self {
        $self = new self;

        $self['firstAddedTimestamp'] = $firstAddedTimestamp;
        $self['lastAddedTimestamp'] = $lastAddedTimestamp;
        $self['listID'] = $listID;
        $self['listVersion'] = $listVersion;

        null !== $isPublicList && $self['isPublicList'] = $isPublicList;

        return $self;
    }

    /**
     * The timestamp when the record was first added to the list.
     */
    public function withFirstAddedTimestamp(
        \DateTimeInterface $firstAddedTimestamp
    ): self {
        $self = clone $this;
        $self['firstAddedTimestamp'] = $firstAddedTimestamp;

        return $self;
    }

    /**
     * The timestamp when the record was last added to the list.
     */
    public function withLastAddedTimestamp(
        \DateTimeInterface $lastAddedTimestamp
    ): self {
        $self = clone $this;
        $self['lastAddedTimestamp'] = $lastAddedTimestamp;

        return $self;
    }

    /**
     * The unique identifier of the list.
     */
    public function withListID(string $listID): self
    {
        $self = clone $this;
        $self['listID'] = $listID;

        return $self;
    }

    /**
     * The version number of the list.
     */
    public function withListVersion(int $listVersion): self
    {
        $self = clone $this;
        $self['listVersion'] = $listVersion;

        return $self;
    }

    /**
     * Indicates whether the list is public.
     */
    public function withIsPublicList(bool $isPublicList): self
    {
        $self = clone $this;
        $self['isPublicList'] = $isPublicList;

        return $self;
    }
}
