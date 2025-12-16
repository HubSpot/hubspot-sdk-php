<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Lists;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type RequestedConversionTimeShape from \HubspotSDK\Crm\Lists\PublicListConversionResponse\RequestedConversionTime
 *
 * @phpstan-type PublicListConversionResponseShape = array{
 *   listID: string,
 *   convertedAt?: \DateTimeInterface|null,
 *   requestedConversionTime?: null|RequestedConversionTimeShape|PublicListConversionDate|PublicListConversionInactivity,
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
     * @param RequestedConversionTimeShape $requestedConversionTime
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

    public function withListID(string $listID): self
    {
        $self = clone $this;
        $self['listID'] = $listID;

        return $self;
    }

    public function withConvertedAt(\DateTimeInterface $convertedAt): self
    {
        $self = clone $this;
        $self['convertedAt'] = $convertedAt;

        return $self;
    }

    /**
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
