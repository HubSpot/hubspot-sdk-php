<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Lists;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Lists\PublicListConversionDate\ConversionType;
use HubspotSDK\Crm\Lists\PublicListConversionInactivity\TimeUnit;

/**
 * @phpstan-type PublicListConversionResponseShape = array{
 *   listID: string,
 *   convertedAt?: \DateTimeInterface|null,
 *   requestedConversionTime?: null|PublicListConversionDate|PublicListConversionInactivity,
 * }
 */
final class PublicListConversionResponse implements BaseModel
{
    /** @use SdkModel<PublicListConversionResponseShape> */
    use SdkModel;

    #[Required('listId')]
    public string $listID;

    #[Optional]
    public ?\DateTimeInterface $convertedAt;

    #[Optional]
    public PublicListConversionDate|PublicListConversionInactivity|null $requestedConversionTime;

    /**
     * `new PublicListConversionResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicListConversionResponse::with(listID: ...)
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
        string $listID,
        ?\DateTimeInterface $convertedAt = null,
        PublicListConversionDate|array|PublicListConversionInactivity|null $requestedConversionTime = null,
    ): self {
        $obj = new self;

        $obj['listID'] = $listID;

        null !== $convertedAt && $obj['convertedAt'] = $convertedAt;
        null !== $requestedConversionTime && $obj['requestedConversionTime'] = $requestedConversionTime;

        return $obj;
    }

    public function withListID(string $listID): self
    {
        $obj = clone $this;
        $obj['listID'] = $listID;

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
