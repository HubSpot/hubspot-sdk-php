<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Automation\Workflows\APIEnrolledArgumentPropertyFilterDataSource\Type;
use HubspotSDK\Automation\Workflows\APISort\Order;
use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type APIEnrolledArgumentPropertyFilterDataSourceShape = array{
 *   argumentName: string,
 *   name: string,
 *   propertyName: string,
 *   type: value-of<Type>,
 *   sortBy?: APISort|null,
 * }
 */
final class APIEnrolledArgumentPropertyFilterDataSource implements BaseModel
{
    /** @use SdkModel<APIEnrolledArgumentPropertyFilterDataSourceShape> */
    use SdkModel;

    #[Required]
    public string $argumentName;

    #[Required]
    public string $name;

    #[Required]
    public string $propertyName;

    /** @var value-of<Type> $type */
    #[Required(enum: Type::class)]
    public string $type;

    #[Optional]
    public ?APISort $sortBy;

    /**
     * `new APIEnrolledArgumentPropertyFilterDataSource()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * APIEnrolledArgumentPropertyFilterDataSource::with(
     *   argumentName: ..., name: ..., propertyName: ..., type: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new APIEnrolledArgumentPropertyFilterDataSource)
     *   ->withArgumentName(...)
     *   ->withName(...)
     *   ->withPropertyName(...)
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
        string $argumentName,
        string $name,
        string $propertyName,
        Type|string $type = 'ENROLLED_ARGUMENT_PROPERTY_FILTER',
        APISort|array|null $sortBy = null,
    ): self {
        $obj = new self;

        $obj['argumentName'] = $argumentName;
        $obj['name'] = $name;
        $obj['propertyName'] = $propertyName;
        $obj['type'] = $type;

        null !== $sortBy && $obj['sortBy'] = $sortBy;

        return $obj;
    }

    public function withArgumentName(string $argumentName): self
    {
        $obj = clone $this;
        $obj['argumentName'] = $argumentName;

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
