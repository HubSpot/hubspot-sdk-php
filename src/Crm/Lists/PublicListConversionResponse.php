<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Lists;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type RequestedConversionTimeVariants from \HubSpotSDK\Crm\Lists\PublicListConversionResponse\RequestedConversionTime
 * @phpstan-import-type RequestedConversionTimeShape from \HubSpotSDK\Crm\Lists\PublicListConversionResponse\RequestedConversionTime
 *
 * @phpstan-type PublicListConversionResponseShape = array{
 *   listID: string,
 *   convertedAt?: \DateTimeInterface|null,
 *   requestedConversionTime?: RequestedConversionTimeShape|null,
 * }
 */
final class PublicListConversionResponse implements BaseModel
{
    /** @use SdkModel<PublicListConversionResponseShape> */
    use SdkModel;

    /**
     * The unique identifier of the list for which the conversion details are provided.
     */
    #[Required('listId')]
    public string $listID;

    /**
     * The date and time when the list was converted.
     */
    #[Optional]
    public ?\DateTimeInterface $convertedAt;

    /**
     * The scheduled time for the list conversion, which can be based on a specific date or inactivity period.
     *
     * @var RequestedConversionTimeVariants|null $requestedConversionTime
     */
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
     * @param RequestedConversionTimeShape|null $requestedConversionTime
     */
    public static function with(
        string $listID,
        ?\DateTimeInterface $convertedAt = null,
        PublicListConversionDate|array|PublicListConversionInactivity|null $requestedConversionTime = null,
    ): self {
        $self = new self;

        $self['listID'] = $listID;

        null !== $convertedAt && $self['convertedAt'] = $convertedAt;
        null !== $requestedConversionTime && $self['requestedConversionTime'] = $requestedConversionTime;

        return $self;
    }

    /**
     * The unique identifier of the list for which the conversion details are provided.
     */
    public function withListID(string $listID): self
    {
        $self = clone $this;
        $self['listID'] = $listID;

        return $self;
    }

    /**
     * The date and time when the list was converted.
     */
    public function withConvertedAt(\DateTimeInterface $convertedAt): self
    {
        $self = clone $this;
        $self['convertedAt'] = $convertedAt;

        return $self;
    }

    /**
     * The scheduled time for the list conversion, which can be based on a specific date or inactivity period.
     *
     * @param RequestedConversionTimeShape $requestedConversionTime
     */
    public function withRequestedConversionTime(
        PublicListConversionDate|array|PublicListConversionInactivity $requestedConversionTime,
    ): self {
        $self = clone $this;
        $self['requestedConversionTime'] = $requestedConversionTime;

        return $self;
    }
}
