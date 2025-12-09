<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Lists;

use HubspotSDK\Core\Attributes\Required;
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
 * The response for a list create request.
 *
 * @phpstan-type ListCreateResponseShape = array{list: PublicObjectList}
 */
final class ListCreateResponse implements BaseModel
{
    /** @use SdkModel<ListCreateResponseShape> */
    use SdkModel;

    /**
     * An object list definition.
     */
    #[Required]
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
     *   listID: string,
     *   listVersion: int,
     *   name: string,
     *   objectTypeID: string,
     *   processingStatus: string,
     *   processingType: string,
     *   createdAt?: \DateTimeInterface|null,
     *   createdByID?: string|null,
     *   deletedAt?: \DateTimeInterface|null,
     *   filterBranch?: PublicOrFilterBranch|PublicAndFilterBranch|PublicNotAllFilterBranch|PublicNotAnyFilterBranch|PublicRestrictedFilterBranch|PublicUnifiedEventsFilterBranch|PublicPropertyAssociationFilterBranch|PublicAssociationFilterBranch|null,
     *   filtersUpdatedAt?: \DateTimeInterface|null,
     *   listPermissions?: PublicListPermissions|null,
     *   membershipSettings?: PublicMembershipSettings|null,
     *   size?: int|null,
     *   updatedAt?: \DateTimeInterface|null,
     *   updatedByID?: string|null,
     * } $list
     */
    public static function with(PublicObjectList|array $list): self
    {
        $self = new self;

        $self['list'] = $list;

        return $self;
    }

    /**
     * An object list definition.
     *
     * @param PublicObjectList|array{
     *   listID: string,
     *   listVersion: int,
     *   name: string,
     *   objectTypeID: string,
     *   processingStatus: string,
     *   processingType: string,
     *   createdAt?: \DateTimeInterface|null,
     *   createdByID?: string|null,
     *   deletedAt?: \DateTimeInterface|null,
     *   filterBranch?: PublicOrFilterBranch|PublicAndFilterBranch|PublicNotAllFilterBranch|PublicNotAnyFilterBranch|PublicRestrictedFilterBranch|PublicUnifiedEventsFilterBranch|PublicPropertyAssociationFilterBranch|PublicAssociationFilterBranch|null,
     *   filtersUpdatedAt?: \DateTimeInterface|null,
     *   listPermissions?: PublicListPermissions|null,
     *   membershipSettings?: PublicMembershipSettings|null,
     *   size?: int|null,
     *   updatedAt?: \DateTimeInterface|null,
     *   updatedByID?: string|null,
     * } $list
     */
    public function withList(PublicObjectList|array $list): self
    {
        $self = clone $this;
        $self['list'] = $list;

        return $self;
    }
}
