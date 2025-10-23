<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Lists;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkResponse;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type public_list_conversion_response = array{
 *   listID: string,
 *   convertedAt?: \DateTimeInterface,
 *   requestedConversionTime?: PublicListConversionDate|PublicListConversionInactivity,
 * }
 */
final class PublicListConversionResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<public_list_conversion_response> */
    use SdkModel;

    use SdkResponse;

    #[Api('listId')]
    public string $listID;

    #[Api(optional: true)]
    public ?\DateTimeInterface $convertedAt;

    #[Api(optional: true)]
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
     */
    public static function with(
        string $listID,
        ?\DateTimeInterface $convertedAt = null,
        PublicListConversionDate|PublicListConversionInactivity|null $requestedConversionTime = null,
    ): self {
        $obj = new self;

        $obj->listID = $listID;

        null !== $convertedAt && $obj->convertedAt = $convertedAt;
        null !== $requestedConversionTime && $obj->requestedConversionTime = $requestedConversionTime;

        return $obj;
    }

    public function withListID(string $listID): self
    {
        $obj = clone $this;
        $obj->listID = $listID;

        return $obj;
    }

    public function withConvertedAt(\DateTimeInterface $convertedAt): self
    {
        $obj = clone $this;
        $obj->convertedAt = $convertedAt;

        return $obj;
    }

    public function withRequestedConversionTime(
        PublicListConversionDate|PublicListConversionInactivity $requestedConversionTime,
    ): self {
        $obj = clone $this;
        $obj->requestedConversionTime = $requestedConversionTime;

        return $obj;
    }
}
