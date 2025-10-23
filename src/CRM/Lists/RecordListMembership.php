<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Lists;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Lists record is member of.
 *
 * @phpstan-type record_list_membership = array{
 *   firstAddedTimestamp: \DateTimeInterface,
 *   lastAddedTimestamp: \DateTimeInterface,
 *   listID: string,
 *   listVersion: int,
 *   isPublicList?: bool,
 * }
 */
final class RecordListMembership implements BaseModel
{
    /** @use SdkModel<record_list_membership> */
    use SdkModel;

    #[Api]
    public \DateTimeInterface $firstAddedTimestamp;

    #[Api]
    public \DateTimeInterface $lastAddedTimestamp;

    #[Api('listId')]
    public string $listID;

    #[Api]
    public int $listVersion;

    #[Api(optional: true)]
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
        $obj = new self;

        $obj->firstAddedTimestamp = $firstAddedTimestamp;
        $obj->lastAddedTimestamp = $lastAddedTimestamp;
        $obj->listID = $listID;
        $obj->listVersion = $listVersion;

        null !== $isPublicList && $obj->isPublicList = $isPublicList;

        return $obj;
    }

    public function withFirstAddedTimestamp(
        \DateTimeInterface $firstAddedTimestamp
    ): self {
        $obj = clone $this;
        $obj->firstAddedTimestamp = $firstAddedTimestamp;

        return $obj;
    }

    public function withLastAddedTimestamp(
        \DateTimeInterface $lastAddedTimestamp
    ): self {
        $obj = clone $this;
        $obj->lastAddedTimestamp = $lastAddedTimestamp;

        return $obj;
    }

    public function withListID(string $listID): self
    {
        $obj = clone $this;
        $obj->listID = $listID;

        return $obj;
    }

    public function withListVersion(int $listVersion): self
    {
        $obj = clone $this;
        $obj->listVersion = $listVersion;

        return $obj;
    }

    public function withIsPublicList(bool $isPublicList): self
    {
        $obj = clone $this;
        $obj->isPublicList = $isPublicList;

        return $obj;
    }
}
