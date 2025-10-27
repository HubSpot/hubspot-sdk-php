<?php

declare(strict_types=1);

namespace HubspotSDK\Settings\Currencies;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkResponse;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type company_currency = array{
 *   id: string, createdAt: \DateTimeInterface
 * }
 */
final class CompanyCurrency implements BaseModel, ResponseConverter
{
    /** @use SdkModel<company_currency> */
    use SdkModel;

    use SdkResponse;

    #[Api]
    public string $id;

    #[Api]
    public \DateTimeInterface $createdAt;

    /**
     * `new CompanyCurrency()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CompanyCurrency::with(id: ..., createdAt: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CompanyCurrency)->withID(...)->withCreatedAt(...)
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
    public static function with(string $id, \DateTimeInterface $createdAt): self
    {
        $obj = new self;

        $obj->id = $id;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }
}
