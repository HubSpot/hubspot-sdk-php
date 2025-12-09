<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Lists;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\PublicAndFilterBranch;
use HubspotSDK\PublicAssociationFilterBranch;
use HubspotSDK\PublicNotAllFilterBranch;
use HubspotSDK\PublicNotAnyFilterBranch;
use HubspotSDK\PublicOrFilterBranch;
use HubspotSDK\PublicPropertyAssociationFilterBranch;
use HubspotSDK\PublicRestrictedFilterBranch;
use HubspotSDK\PublicUnifiedEventsFilterBranch;

/**
 * The updated definition of the list in response to a list update request.
 *
 * @phpstan-type ListUpdateResponseShape = array{
 *   updatedList?: PublicObjectList|null
 * }
 */
final class ListUpdateResponse implements BaseModel
{
    /** @use SdkModel<ListUpdateResponseShape> */
    use SdkModel;

    /**
     * An object list definition.
     */
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
     * @param PublicObjectList|array{
     *   listId: string,
     *   listVersion: int,
     *   name: string,
     *   objectTypeId: string,
     *   processingStatus: string,
     *   processingType: string,
     *   createdAt?: \DateTimeInterface|null,
     *   createdById?: string|null,
     *   deletedAt?: \DateTimeInterface|null,
     *   filterBranch?: PublicOrFilterBranch|PublicAndFilterBranch|PublicNotAllFilterBranch|PublicNotAnyFilterBranch|PublicRestrictedFilterBranch|PublicUnifiedEventsFilterBranch|PublicPropertyAssociationFilterBranch|PublicAssociationFilterBranch|null,
     *   filtersUpdatedAt?: \DateTimeInterface|null,
     *   listPermissions?: PublicListPermissions|null,
     *   membershipSettings?: PublicMembershipSettings|null,
     *   size?: int|null,
     *   updatedAt?: \DateTimeInterface|null,
     *   updatedById?: string|null,
     * } $updatedList
     */
    public static function with(
        PublicObjectList|array|null $updatedList = null
    ): self {
        $obj = new self;

        null !== $updatedList && $obj['updatedList'] = $updatedList;

        return $obj;
    }

    /**
     * An object list definition.
     *
     * @param PublicObjectList|array{
     *   listId: string,
     *   listVersion: int,
     *   name: string,
     *   objectTypeId: string,
     *   processingStatus: string,
     *   processingType: string,
     *   createdAt?: \DateTimeInterface|null,
     *   createdById?: string|null,
     *   deletedAt?: \DateTimeInterface|null,
     *   filterBranch?: PublicOrFilterBranch|PublicAndFilterBranch|PublicNotAllFilterBranch|PublicNotAnyFilterBranch|PublicRestrictedFilterBranch|PublicUnifiedEventsFilterBranch|PublicPropertyAssociationFilterBranch|PublicAssociationFilterBranch|null,
     *   filtersUpdatedAt?: \DateTimeInterface|null,
     *   listPermissions?: PublicListPermissions|null,
     *   membershipSettings?: PublicMembershipSettings|null,
     *   size?: int|null,
     *   updatedAt?: \DateTimeInterface|null,
     *   updatedById?: string|null,
     * } $updatedList
     */
    public function withUpdatedList(PublicObjectList|array $updatedList): self
    {
        $obj = clone $this;
        $obj['updatedList'] = $updatedList;

        return $obj;
    }
}
