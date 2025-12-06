<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Lists;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkResponse;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\Contracts\ResponseConverter;
use HubspotSDK\Crm\Lists\PublicListConversionDate\ConversionType;
use HubspotSDK\Crm\Lists\PublicListConversionInactivity\TimeUnit;

/**
 * @phpstan-type PublicListConversionResponseShape = array{
 *   listId: string,
 *   convertedAt?: \DateTimeInterface|null,
 *   requestedConversionTime?: null|PublicListConversionDate|PublicListConversionInactivity,
 * }
 */
final class PublicListConversionResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<PublicListConversionResponseShape> */
    use SdkModel;

    use SdkResponse;

    #[Api]
    public string $listId;

    #[Api(optional: true)]
    public ?\DateTimeInterface $convertedAt;

    #[Api(optional: true)]
    public PublicListConversionDate|PublicListConversionInactivity|null $requestedConversionTime;

    /**
     * `new PublicListConversionResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicListConversionResponse::with(listId: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicListConversionResponse)->withListID(...)
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
     * @param PublicListConversionDate|array{
     *   conversionType: value-of<ConversionType>, day: int, month: int, year: int
     * }|PublicListConversionInactivity|array{
     *   conversionType: value-of<PublicListConversionInactivity\ConversionType>,
     *   offset: int,
     *   timeUnit: value-of<TimeUnit>,
     * } $requestedConversionTime
     */
    public static function with(
        string $listId,
        ?\DateTimeInterface $convertedAt = null,
        PublicListConversionDate|array|PublicListConversionInactivity|null $requestedConversionTime = null,
    ): self {
        $obj = new self;

        $obj['listId'] = $listId;

        null !== $convertedAt && $obj['convertedAt'] = $convertedAt;
        null !== $requestedConversionTime && $obj['requestedConversionTime'] = $requestedConversionTime;

        return $obj;
    }

    public function withListID(string $listID): self
    {
        $obj = clone $this;
        $obj['listId'] = $listID;

        return $obj;
    }

    public function withConvertedAt(\DateTimeInterface $convertedAt): self
    {
        $obj = clone $this;
        $obj['convertedAt'] = $convertedAt;

        return $obj;
    }

    /**
     * @param PublicListConversionDate|array{
     *   conversionType: value-of<ConversionType>, day: int, month: int, year: int
     * }|PublicListConversionInactivity|array{
     *   conversionType: value-of<PublicListConversionInactivity\ConversionType>,
     *   offset: int,
     *   timeUnit: value-of<TimeUnit>,
     * } $requestedConversionTime
     */
    public function withRequestedConversionTime(
        PublicListConversionDate|array|PublicListConversionInactivity $requestedConversionTime,
    ): self {
        $obj = clone $this;
        $obj['requestedConversionTime'] = $requestedConversionTime;

        return $obj;
    }
}
