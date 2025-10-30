<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Objects\Products;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Read a page of products. Control what is returned via the `properties` query param.
 *
 * @see HubspotSDK\CRM\Objects\Products->list
 *
 * @phpstan-type ProductListParamsShape = array{
 *   after?: string,
 *   archived?: bool,
 *   associations?: list<string>,
 *   limit?: int,
 *   properties?: list<string>,
 *   propertiesWithHistory?: list<string>,
 * }
 */
final class ProductListParams implements BaseModel
{
    /** @use SdkModel<ProductListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     */
    #[Api(optional: true)]
    public ?string $after;

    /**
     * Whether to return only results that have been archived.
     */
    #[Api(optional: true)]
    public ?bool $archived;

    /**
     * A comma separated list of object types to retrieve associated IDs for. If any of the specified associations do not exist, they will be ignored.
     *
     * @var list<string>|null $associations
     */
    #[Api(list: 'string', optional: true)]
    public ?array $associations;

    /**
     * The maximum number of results to display per page.
     */
    #[Api(optional: true)]
    public ?int $limit;

    /**
     * A comma separated list of the properties to be returned in the response. If any of the specified properties are not present on the requested object(s), they will be ignored.
     *
     * @var list<string>|null $properties
     */
    #[Api(list: 'string', optional: true)]
    public ?array $properties;

    /**
     * A comma separated list of the properties to be returned along with their history of previous values. If any of the specified properties are not present on the requested object(s), they will be ignored. Usage of this parameter will reduce the maximum number of products that can be read by a single request.
     *
     * @var list<string>|null $propertiesWithHistory
     */
    #[Api(list: 'string', optional: true)]
    public ?array $propertiesWithHistory;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string> $associations
     * @param list<string> $properties
     * @param list<string> $propertiesWithHistory
     */
    public static function with(
        ?string $after = null,
        ?bool $archived = null,
        ?array $associations = null,
        ?int $limit = null,
        ?array $properties = null,
        ?array $propertiesWithHistory = null,
    ): self {
        $obj = new self;

        null !== $after && $obj->after = $after;
        null !== $archived && $obj->archived = $archived;
        null !== $associations && $obj->associations = $associations;
        null !== $limit && $obj->limit = $limit;
        null !== $properties && $obj->properties = $properties;
        null !== $propertiesWithHistory && $obj->propertiesWithHistory = $propertiesWithHistory;

        return $obj;
    }

    /**
     * The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     */
    public function withAfter(string $after): self
    {
        $obj = clone $this;
        $obj->after = $after;

        return $obj;
    }

    /**
     * Whether to return only results that have been archived.
     */
    public function withArchived(bool $archived): self
    {
        $obj = clone $this;
        $obj->archived = $archived;

        return $obj;
    }

    /**
     * A comma separated list of object types to retrieve associated IDs for. If any of the specified associations do not exist, they will be ignored.
     *
     * @param list<string> $associations
     */
    public function withAssociations(array $associations): self
    {
        $obj = clone $this;
        $obj->associations = $associations;

        return $obj;
    }

    /**
     * The maximum number of results to display per page.
     */
    public function withLimit(int $limit): self
    {
        $obj = clone $this;
        $obj->limit = $limit;

        return $obj;
    }

    /**
     * A comma separated list of the properties to be returned in the response. If any of the specified properties are not present on the requested object(s), they will be ignored.
     *
     * @param list<string> $properties
     */
    public function withProperties(array $properties): self
    {
        $obj = clone $this;
        $obj->properties = $properties;

        return $obj;
    }

    /**
     * A comma separated list of the properties to be returned along with their history of previous values. If any of the specified properties are not present on the requested object(s), they will be ignored. Usage of this parameter will reduce the maximum number of products that can be read by a single request.
     *
     * @param list<string> $propertiesWithHistory
     */
    public function withPropertiesWithHistory(
        array $propertiesWithHistory
    ): self {
        $obj = clone $this;
        $obj->propertiesWithHistory = $propertiesWithHistory;

        return $obj;
    }
}
