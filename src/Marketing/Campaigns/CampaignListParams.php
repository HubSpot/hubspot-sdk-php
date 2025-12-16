<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Campaigns;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * This endpoint allows users to search for and return a page of campaigns based on various query parameters. Users can filter by name, sort, and paginate through the campaigns, as well as control which properties are returned in the response.
 *
 * @see HubspotSDK\Services\Marketing\CampaignsService::list()
 *
 * @phpstan-type CampaignListParamsShape = array{
 *   after?: string|null,
 *   limit?: int|null,
 *   name?: string|null,
 *   properties?: list<string>|null,
 *   sort?: string|null,
 * }
 */
final class CampaignListParams implements BaseModel
{
    /** @use SdkModel<CampaignListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * A cursor for pagination. If provided, the results will start after the given cursor.
     * Example: NTI1Cg%3D%3D.
     */
    #[Optional]
    public ?string $after;

    /**
     * The maximum number of results to return. Allowed values range from 1 to 100
     * Default: 50.
     */
    #[Optional]
    public ?int $limit;

    /**
     * A filter to return campaigns whose names contain the specified substring. This allows partial matching of campaign names, returning all campaigns that include the given substring in their name. If this parameter is not provided, the search will return all campaigns.
     */
    #[Optional]
    public ?string $name;

    /**
     * A comma-separated list of the properties to be returned in the response. If any of the specified properties has empty value on the requested object(s), they will be ignored and not returned in response. If this parameter is empty, the response will include an empty properties map.
     *
     * @var list<string>|null $properties
     */
    #[Optional(list: 'string')]
    public ?array $properties;

    /**
     * The field by which to sort the results. Allowed values are hs_name, createdAt, updatedAt. An optional '-' before the property name can denote descending order
     * Default: hs_name.
     */
    #[Optional]
    public ?string $sort;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string> $properties
     */
    public static function with(
        ?string $after = null,
        ?int $limit = null,
        ?string $name = null,
        ?array $properties = null,
        ?string $sort = null,
    ): self {
        $self = new self;

        null !== $after && $self['after'] = $after;
        null !== $limit && $self['limit'] = $limit;
        null !== $name && $self['name'] = $name;
        null !== $properties && $self['properties'] = $properties;
        null !== $sort && $self['sort'] = $sort;

        return $self;
    }

    /**
     * A cursor for pagination. If provided, the results will start after the given cursor.
     * Example: NTI1Cg%3D%3D.
     */
    public function withAfter(string $after): self
    {
        $self = clone $this;
        $self['after'] = $after;

        return $self;
    }

    /**
     * The maximum number of results to return. Allowed values range from 1 to 100
     * Default: 50.
     */
    public function withLimit(int $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }

    /**
     * A filter to return campaigns whose names contain the specified substring. This allows partial matching of campaign names, returning all campaigns that include the given substring in their name. If this parameter is not provided, the search will return all campaigns.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * A comma-separated list of the properties to be returned in the response. If any of the specified properties has empty value on the requested object(s), they will be ignored and not returned in response. If this parameter is empty, the response will include an empty properties map.
     *
     * @param list<string> $properties
     */
    public function withProperties(array $properties): self
    {
        $self = clone $this;
        $self['properties'] = $properties;

        return $self;
    }

    /**
     * The field by which to sort the results. Allowed values are hs_name, createdAt, updatedAt. An optional '-' before the property name can denote descending order
     * Default: hs_name.
     */
    public function withSort(string $sort): self
    {
        $self = clone $this;
        $self['sort'] = $sort;

        return $self;
    }
}
