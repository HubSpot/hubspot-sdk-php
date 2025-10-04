<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Emails;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Emails\MarketingEmailsEmailUpdateRequest\Language;
use HubspotSDK\Marketing\Emails\MarketingEmailsEmailUpdateRequest\State;
use HubspotSDK\Marketing\Emails\MarketingEmailsEmailUpdateRequest\Subcategory;

/**
 * @phpstan-type marketing_emails_email_update_request = array{
 *   activeDomain?: string,
 *   archived?: bool,
 *   businessUnitID?: int,
 *   campaign?: string,
 *   content?: MarketingEmailsPublicEmailContent,
 *   from?: MarketingEmailsPublicEmailFromDetails,
 *   jitterSendTime?: bool,
 *   language?: value-of<Language>,
 *   name?: string,
 *   publishDate?: \DateTimeInterface,
 *   rssData?: MarketingEmailsPublicRssEmailDetails,
 *   sendOnPublish?: bool,
 *   state?: value-of<State>,
 *   subcategory?: value-of<Subcategory>,
 *   subject?: string,
 *   subscriptionDetails?: MarketingEmailsPublicEmailSubscriptionDetails,
 *   testing?: MarketingEmailsPublicEmailTestingDetails,
 *   to?: MarketingEmailsPublicEmailToDetails,
 *   webversion?: MarketingEmailsPublicWebversionDetails,
 * }
 */
final class MarketingEmailsEmailUpdateRequest implements BaseModel
{
    /** @use SdkModel<marketing_emails_email_update_request> */
    use SdkModel;

    #[Api(optional: true)]
    public ?string $activeDomain;

    #[Api(optional: true)]
    public ?bool $archived;

    #[Api('businessUnitId', optional: true)]
    public ?int $businessUnitID;

    #[Api(optional: true)]
    public ?string $campaign;

    #[Api(optional: true)]
    public ?MarketingEmailsPublicEmailContent $content;

    #[Api(optional: true)]
    public ?MarketingEmailsPublicEmailFromDetails $from;

    #[Api(optional: true)]
    public ?bool $jitterSendTime;

    /** @var value-of<Language>|null $language */
    #[Api(enum: Language::class, optional: true)]
    public ?string $language;

    #[Api(optional: true)]
    public ?string $name;

    #[Api(optional: true)]
    public ?\DateTimeInterface $publishDate;

    #[Api(optional: true)]
    public ?MarketingEmailsPublicRssEmailDetails $rssData;

    #[Api(optional: true)]
    public ?bool $sendOnPublish;

    /** @var value-of<State>|null $state */
    #[Api(enum: State::class, optional: true)]
    public ?string $state;

    /** @var value-of<Subcategory>|null $subcategory */
    #[Api(enum: Subcategory::class, optional: true)]
    public ?string $subcategory;

    #[Api(optional: true)]
    public ?string $subject;

    #[Api(optional: true)]
    public ?MarketingEmailsPublicEmailSubscriptionDetails $subscriptionDetails;

    #[Api(optional: true)]
    public ?MarketingEmailsPublicEmailTestingDetails $testing;

    #[Api(optional: true)]
    public ?MarketingEmailsPublicEmailToDetails $to;

    #[Api(optional: true)]
    public ?MarketingEmailsPublicWebversionDetails $webversion;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Language|value-of<Language> $language
     * @param State|value-of<State> $state
     * @param Subcategory|value-of<Subcategory> $subcategory
     */
    public static function with(
        ?string $activeDomain = null,
        ?bool $archived = null,
        ?int $businessUnitID = null,
        ?string $campaign = null,
        ?MarketingEmailsPublicEmailContent $content = null,
        ?MarketingEmailsPublicEmailFromDetails $from = null,
        ?bool $jitterSendTime = null,
        Language|string|null $language = null,
        ?string $name = null,
        ?\DateTimeInterface $publishDate = null,
        ?MarketingEmailsPublicRssEmailDetails $rssData = null,
        ?bool $sendOnPublish = null,
        State|string|null $state = null,
        Subcategory|string|null $subcategory = null,
        ?string $subject = null,
        ?MarketingEmailsPublicEmailSubscriptionDetails $subscriptionDetails = null,
        ?MarketingEmailsPublicEmailTestingDetails $testing = null,
        ?MarketingEmailsPublicEmailToDetails $to = null,
        ?MarketingEmailsPublicWebversionDetails $webversion = null,
    ): self {
        $obj = new self;

        null !== $activeDomain && $obj->activeDomain = $activeDomain;
        null !== $archived && $obj->archived = $archived;
        null !== $businessUnitID && $obj->businessUnitID = $businessUnitID;
        null !== $campaign && $obj->campaign = $campaign;
        null !== $content && $obj->content = $content;
        null !== $from && $obj->from = $from;
        null !== $jitterSendTime && $obj->jitterSendTime = $jitterSendTime;
        null !== $language && $obj['language'] = $language;
        null !== $name && $obj->name = $name;
        null !== $publishDate && $obj->publishDate = $publishDate;
        null !== $rssData && $obj->rssData = $rssData;
        null !== $sendOnPublish && $obj->sendOnPublish = $sendOnPublish;
        null !== $state && $obj['state'] = $state;
        null !== $subcategory && $obj['subcategory'] = $subcategory;
        null !== $subject && $obj->subject = $subject;
        null !== $subscriptionDetails && $obj->subscriptionDetails = $subscriptionDetails;
        null !== $testing && $obj->testing = $testing;
        null !== $to && $obj->to = $to;
        null !== $webversion && $obj->webversion = $webversion;

        return $obj;
    }

    public function withActiveDomain(string $activeDomain): self
    {
        $obj = clone $this;
        $obj->activeDomain = $activeDomain;

        return $obj;
    }

    public function withArchived(bool $archived): self
    {
        $obj = clone $this;
        $obj->archived = $archived;

        return $obj;
    }

    public function withBusinessUnitID(int $businessUnitID): self
    {
        $obj = clone $this;
        $obj->businessUnitID = $businessUnitID;

        return $obj;
    }

    public function withCampaign(string $campaign): self
    {
        $obj = clone $this;
        $obj->campaign = $campaign;

        return $obj;
    }

    public function withContent(
        MarketingEmailsPublicEmailContent $content
    ): self {
        $obj = clone $this;
        $obj->content = $content;

        return $obj;
    }

    public function withFrom(MarketingEmailsPublicEmailFromDetails $from): self
    {
        $obj = clone $this;
        $obj->from = $from;

        return $obj;
    }

    public function withJitterSendTime(bool $jitterSendTime): self
    {
        $obj = clone $this;
        $obj->jitterSendTime = $jitterSendTime;

        return $obj;
    }

    /**
     * @param Language|value-of<Language> $language
     */
    public function withLanguage(Language|string $language): self
    {
        $obj = clone $this;
        $obj['language'] = $language;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    public function withPublishDate(\DateTimeInterface $publishDate): self
    {
        $obj = clone $this;
        $obj->publishDate = $publishDate;

        return $obj;
    }

    public function withRssData(
        MarketingEmailsPublicRssEmailDetails $rssData
    ): self {
        $obj = clone $this;
        $obj->rssData = $rssData;

        return $obj;
    }

    public function withSendOnPublish(bool $sendOnPublish): self
    {
        $obj = clone $this;
        $obj->sendOnPublish = $sendOnPublish;

        return $obj;
    }

    /**
     * @param State|value-of<State> $state
     */
    public function withState(State|string $state): self
    {
        $obj = clone $this;
        $obj['state'] = $state;

        return $obj;
    }

    /**
     * @param Subcategory|value-of<Subcategory> $subcategory
     */
    public function withSubcategory(Subcategory|string $subcategory): self
    {
        $obj = clone $this;
        $obj['subcategory'] = $subcategory;

        return $obj;
    }

    public function withSubject(string $subject): self
    {
        $obj = clone $this;
        $obj->subject = $subject;

        return $obj;
    }

    public function withSubscriptionDetails(
        MarketingEmailsPublicEmailSubscriptionDetails $subscriptionDetails
    ): self {
        $obj = clone $this;
        $obj->subscriptionDetails = $subscriptionDetails;

        return $obj;
    }

    public function withTesting(
        MarketingEmailsPublicEmailTestingDetails $testing
    ): self {
        $obj = clone $this;
        $obj->testing = $testing;

        return $obj;
    }

    public function withTo(MarketingEmailsPublicEmailToDetails $to): self
    {
        $obj = clone $this;
        $obj->to = $to;

        return $obj;
    }

    public function withWebversion(
        MarketingEmailsPublicWebversionDetails $webversion
    ): self {
        $obj = clone $this;
        $obj->webversion = $webversion;

        return $obj;
    }
}
