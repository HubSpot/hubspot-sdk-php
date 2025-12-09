<?php

declare(strict_types=1);

namespace HubspotSDK\Settings\Currencies;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type CompanyCurrencyShape = array{
 *   id: string, createdAt: \DateTimeInterface
 * }
 */
final class CompanyCurrency implements BaseModel
{
    /** @use SdkModel<CompanyCurrencyShape> */
    use SdkModel;

    /**
     * The currency code for the company currency.
     */
    #[Required]
    public string $id;

    /**
     * The date the company currency was created.
     */
    #[Required]
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

        $obj['id'] = $id;
        $obj['createdAt'] = $createdAt;

        return $obj;
    }

    /**
     * The currency code for the company currency.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * The date the company currency was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

        return $obj;
    }
}
