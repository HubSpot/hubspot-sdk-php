<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Sequences;

use HubspotSDK\Automation\Sequences\EmailSettingsResponse\Criteria;
use HubspotSDK\Automation\Sequences\EmailSettingsResponse\SellingStrategy;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type email_settings_response = array{
 *   criteria: value-of<Criteria>, sellingStrategy: value-of<SellingStrategy>
 * }
 */
final class EmailSettingsResponse implements BaseModel
{
    /** @use SdkModel<email_settings_response> */
    use SdkModel;

    /** @var value-of<Criteria> $criteria */
    #[Api(enum: Criteria::class)]
    public string $criteria;

    /** @var value-of<SellingStrategy> $sellingStrategy */
    #[Api(enum: SellingStrategy::class)]
    public string $sellingStrategy;

    /**
     * `new EmailSettingsResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EmailSettingsResponse::with(criteria: ..., sellingStrategy: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EmailSettingsResponse)->withCriteria(...)->withSellingStrategy(...)
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
     * @param Criteria|value-of<Criteria> $criteria
     * @param SellingStrategy|value-of<SellingStrategy> $sellingStrategy
     */
    public static function with(
        Criteria|string $criteria,
        SellingStrategy|string $sellingStrategy
    ): self {
        $obj = new self;

        $obj['criteria'] = $criteria;
        $obj['sellingStrategy'] = $sellingStrategy;

        return $obj;
    }

    /**
     * @param Criteria|value-of<Criteria> $criteria
     */
    public function withCriteria(Criteria|string $criteria): self
    {
        $obj = clone $this;
        $obj['criteria'] = $criteria;

        return $obj;
    }

    /**
     * @param SellingStrategy|value-of<SellingStrategy> $sellingStrategy
     */
    public function withSellingStrategy(
        SellingStrategy|string $sellingStrategy
    ): self {
        $obj = clone $this;
        $obj['sellingStrategy'] = $sellingStrategy;

        return $obj;
    }
}
