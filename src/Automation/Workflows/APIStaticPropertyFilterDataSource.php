<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Automation\Workflows\APISort\Order;
use HubspotSDK\Automation\Workflows\APIStaticPropertyFilterDataSource\Type;
use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type APIStaticPropertyFilterDataSourceShape = array{
 *   name: string,
 *   propertyName: string,
 *   staticValue: string,
 *   type: value-of<Type>,
 *   sortBy?: APISort|null,
 * }
 */
final class APIStaticPropertyFilterDataSource implements BaseModel
{
    /** @use SdkModel<APIStaticPropertyFilterDataSourceShape> */
    use SdkModel;

    #[Required]
    public string $name;

    #[Required]
    public string $propertyName;

    #[Required]
    public string $staticValue;

    /** @var value-of<Type> $type */
    #[Required(enum: Type::class)]
    public string $type;

    #[Optional]
    public ?APISort $sortBy;

    /**
     * `new APIStaticPropertyFilterDataSource()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * APIStaticPropertyFilterDataSource::with(
     *   name: ..., propertyName: ..., staticValue: ..., type: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new APIStaticPropertyFilterDataSource)
     *   ->withName(...)
     *   ->withPropertyName(...)
     *   ->withStaticValue(...)
     *   ->withType(...)
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
     * @param Type|value-of<Type> $type
     * @param APISort|array{
     *   order: value-of<Order>, property: string, missing?: string|null
     * } $sortBy
     */
    public static function with(
        string $name,
        string $propertyName,
        string $staticValue,
        Type|string $type = 'STATIC_PROPERTY_FILTER',
        APISort|array|null $sortBy = null,
    ): self {
        $obj = new self;

        $obj['name'] = $name;
        $obj['propertyName'] = $propertyName;
        $obj['staticValue'] = $staticValue;
        $obj['type'] = $type;

        null !== $sortBy && $obj['sortBy'] = $sortBy;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    public function withPropertyName(string $propertyName): self
    {
        $obj = clone $this;
        $obj['propertyName'] = $propertyName;

        return $obj;
    }

    public function withStaticValue(string $staticValue): self
    {
        $obj = clone $this;
        $obj['staticValue'] = $staticValue;

        return $obj;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }

    /**
     * @param APISort|array{
     *   order: value-of<Order>, property: string, missing?: string|null
     * } $sortBy
     */
    public function withSortBy(APISort|array $sortBy): self
    {
        $obj = clone $this;
        $obj['sortBy'] = $sortBy;

        return $obj;
    }
}
