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
 *   listId: string,
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

    #[Required]
    public string $listId;

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
     * RecordListMembership::with(listId: ..., listVersion: ...)
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
        string $listId,
        int $listVersion,
        ?\DateTimeInterface $firstAddedTimestamp = null,
        ?bool $isPublicList = null,
        ?\DateTimeInterface $lastAddedTimestamp = null,
    ): self {
        $obj = new self;

        $obj['listId'] = $listId;
        $obj['listVersion'] = $listVersion;

        null !== $firstAddedTimestamp && $obj['firstAddedTimestamp'] = $firstAddedTimestamp;
        null !== $isPublicList && $obj['isPublicList'] = $isPublicList;
        null !== $lastAddedTimestamp && $obj['lastAddedTimestamp'] = $lastAddedTimestamp;

        return $obj;
    }

    public function withListID(string $listID): self
    {
        $obj = clone $this;
        $obj['listId'] = $listID;

        return $obj;
    }

    public function withListVersion(int $listVersion): self
    {
        $obj = clone $this;
        $obj['listVersion'] = $listVersion;

        return $obj;
    }

    public function withFirstAddedTimestamp(
        \DateTimeInterface $firstAddedTimestamp
    ): self {
        $obj = clone $this;
        $obj['firstAddedTimestamp'] = $firstAddedTimestamp;

        return $obj;
    }

    public function withIsPublicList(bool $isPublicList): self
    {
        $obj = clone $this;
        $obj['isPublicList'] = $isPublicList;

        return $obj;
    }

    public function withLastAddedTimestamp(
        \DateTimeInterface $lastAddedTimestamp
    ): self {
        $obj = clone $this;
        $obj['lastAddedTimestamp'] = $lastAddedTimestamp;

        return $obj;
    }
}
