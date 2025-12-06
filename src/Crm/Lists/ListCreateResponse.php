<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Lists;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkResponse;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\Contracts\ResponseConverter;
use HubspotSDK\PublicAndFilterBranch;
use HubspotSDK\PublicAssociationFilterBranch;
use HubspotSDK\PublicNotAllFilterBranch;
use HubspotSDK\PublicNotAnyFilterBranch;
use HubspotSDK\PublicOrFilterBranch;
use HubspotSDK\PublicPropertyAssociationFilterBranch;
use HubspotSDK\PublicRestrictedFilterBranch;
use HubspotSDK\PublicUnifiedEventsFilterBranch;

/**
 * The response for a list create request.
 *
 * @phpstan-type ListCreateResponseShape = array{list: PublicObjectList}
 */
final class ListCreateResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<ListCreateResponseShape> */
    use SdkModel;

    use SdkResponse;

    /**
     * An object list definition.
     */
    #[Api]
    public PublicObjectList $list;

    /**
     * `new ListCreateResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ListCreateResponse::with(list: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ListCreateResponse)->withList(...)
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
     * } $list
     */
    public static function with(PublicObjectList|array $list): self
    {
        $obj = new self;

        $obj['list'] = $list;

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
     * } $list
     */
    public function withList(PublicObjectList|array $list): self
    {
        $obj = clone $this;
        $obj['list'] = $list;

        return $obj;
    }
}
