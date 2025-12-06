<?php

declare(strict_types=1);

namespace HubspotSDK\Events\EventDefinitions;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Events\EventDefinitions\NowReference\ReferenceType;

/**
 * @phpstan-type NowReferenceShape = array{
 *   referenceType: value-of<ReferenceType>,
 *   hour?: int|null,
 *   millisecond?: int|null,
 *   minute?: int|null,
 *   second?: int|null,
 * }
 */
final class NowReference implements BaseModel
{
    /** @use SdkModel<NowReferenceShape> */
    use SdkModel;

    /** @var value-of<ReferenceType> $referenceType */
    #[Api(enum: ReferenceType::class)]
    public string $referenceType;

    #[Api(optional: true)]
    public ?int $hour;

    #[Api(optional: true)]
    public ?int $millisecond;

    #[Api(optional: true)]
    public ?int $minute;

    #[Api(optional: true)]
    public ?int $second;

    /**
     * `new NowReference()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * NowReference::with(referenceType: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new NowReference)->withReferenceType(...)
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
     * @param ReferenceType|value-of<ReferenceType> $referenceType
     */
    public static function with(
        ReferenceType|string $referenceType = 'NOW',
        ?int $hour = null,
        ?int $millisecond = null,
        ?int $minute = null,
        ?int $second = null,
    ): self {
        $obj = new self;

        $obj['referenceType'] = $referenceType;

        null !== $hour && $obj['hour'] = $hour;
        null !== $millisecond && $obj['millisecond'] = $millisecond;
        null !== $minute && $obj['minute'] = $minute;
        null !== $second && $obj['second'] = $second;

        return $obj;
    }

    /**
     * @param ReferenceType|value-of<ReferenceType> $referenceType
     */
    public function withReferenceType(ReferenceType|string $referenceType): self
    {
        $obj = clone $this;
        $obj['referenceType'] = $referenceType;

        return $obj;
    }

    public function withHour(int $hour): self
    {
        $obj = clone $this;
        $obj['hour'] = $hour;

        return $obj;
    }

    public function withMillisecond(int $millisecond): self
    {
        $obj = clone $this;
        $obj['millisecond'] = $millisecond;

        return $obj;
    }

    public function withMinute(int $minute): self
    {
        $obj = clone $this;
        $obj['minute'] = $minute;

        return $obj;
    }

    public function withSecond(int $second): self
    {
        $obj = clone $this;
        $obj['second'] = $second;

        return $obj;
    }
}
