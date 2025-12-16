<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Sequences;

use HubspotSDK\Automation\Sequences\EmailSettingsResponse\Criteria;
use HubspotSDK\Automation\Sequences\EmailSettingsResponse\SellingStrategy;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type EmailSettingsResponseShape = array{
 *   criteria: Criteria|value-of<Criteria>,
 *   sellingStrategy: SellingStrategy|value-of<SellingStrategy>,
 * }
 */
final class EmailSettingsResponse implements BaseModel
{
    /** @use SdkModel<EmailSettingsResponseShape> */
    use SdkModel;

    /** @var value-of<Criteria> $criteria */
    #[Required(enum: Criteria::class)]
    public string $criteria;

    /** @var value-of<SellingStrategy> $sellingStrategy */
    #[Required(enum: SellingStrategy::class)]
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
        $self = new self;

        $self['criteria'] = $criteria;
        $self['sellingStrategy'] = $sellingStrategy;

        return $self;
    }

    /**
     * @param Criteria|value-of<Criteria> $criteria
     */
    public function withCriteria(Criteria|string $criteria): self
    {
        $self = clone $this;
        $self['criteria'] = $criteria;

        return $self;
    }

    /**
     * @param SellingStrategy|value-of<SellingStrategy> $sellingStrategy
     */
    public function withSellingStrategy(
        SellingStrategy|string $sellingStrategy
    ): self {
        $self = clone $this;
        $self['sellingStrategy'] = $sellingStrategy;

        return $self;
    }
}
