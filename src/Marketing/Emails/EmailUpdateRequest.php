<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Emails;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Emails\EmailUpdateRequest\Language;
use HubspotSDK\Marketing\Emails\EmailUpdateRequest\State;
use HubspotSDK\Marketing\Emails\EmailUpdateRequest\Subcategory;

/**
 * Properties of a marketing email you can update via the API.
 *
 * @phpstan-import-type PublicEmailContentShape from \HubspotSDK\Marketing\Emails\PublicEmailContent
 * @phpstan-import-type PublicEmailFromDetailsShape from \HubspotSDK\Marketing\Emails\PublicEmailFromDetails
 * @phpstan-import-type PublicRssEmailDetailsShape from \HubspotSDK\Marketing\Emails\PublicRssEmailDetails
 * @phpstan-import-type PublicEmailSubscriptionDetailsShape from \HubspotSDK\Marketing\Emails\PublicEmailSubscriptionDetails
 * @phpstan-import-type PublicEmailTestingDetailsShape from \HubspotSDK\Marketing\Emails\PublicEmailTestingDetails
 * @phpstan-import-type PublicEmailToDetailsShape from \HubspotSDK\Marketing\Emails\PublicEmailToDetails
 * @phpstan-import-type PublicWebversionDetailsShape from \HubspotSDK\Marketing\Emails\PublicWebversionDetails
 *
 * @phpstan-type EmailUpdateRequestShape = array{
 *   activeDomain?: string|null,
 *   archived?: bool|null,
 *   businessUnitID?: int|null,
 *   campaign?: string|null,
 *   content?: null|PublicEmailContent|PublicEmailContentShape,
 *   folderIDV2?: int|null,
 *   from?: null|PublicEmailFromDetails|PublicEmailFromDetailsShape,
 *   jitterSendTime?: bool|null,
 *   language?: null|Language|value-of<Language>,
 *   name?: string|null,
 *   publishDate?: \DateTimeInterface|null,
 *   rssData?: null|PublicRssEmailDetails|PublicRssEmailDetailsShape,
 *   sendOnPublish?: bool|null,
 *   state?: null|State|value-of<State>,
 *   subcategory?: null|Subcategory|value-of<Subcategory>,
 *   subject?: string|null,
 *   subscriptionDetails?: null|PublicEmailSubscriptionDetails|PublicEmailSubscriptionDetailsShape,
 *   testing?: null|PublicEmailTestingDetails|PublicEmailTestingDetailsShape,
 *   to?: null|PublicEmailToDetails|PublicEmailToDetailsShape,
 *   webversion?: null|PublicWebversionDetails|PublicWebversionDetailsShape,
 * }
 */
final class EmailUpdateRequest implements BaseModel
{
    /** @use SdkModel<EmailUpdateRequestShape> */
    use SdkModel;

    /**
     * The active domain of the email.
     */
    #[Optional]
    public ?string $activeDomain;

    /**
     * Determines if the email is archived or not.
     */
    #[Optional]
    public ?bool $archived;

    #[Optional('businessUnitId')]
    public ?int $businessUnitID;

    /**
     * The ID of the campaign this email is associated to.
     */
    #[Optional]
    public ?string $campaign;

    /**
     * Data structure representing the content of the email.
     */
    #[Optional]
    public ?PublicEmailContent $content;

    #[Optional('folderIdV2')]
    public ?int $folderIDV2;

    /**
     * Data structure representing the from fields on the email.
     */
    #[Optional]
    public ?PublicEmailFromDetails $from;

    #[Optional]
    public ?bool $jitterSendTime;

    /** @var value-of<Language>|null $language */
    #[Optional(enum: Language::class)]
    public ?string $language;

    /**
     * The name of the email, as displayed on the email dashboard.
     */
    #[Optional]
    public ?string $name;

    /**
     * The date and time the email is scheduled for, in ISO8601 representation. This is only used in local time or scheduled emails.
     */
    #[Optional]
    public ?\DateTimeInterface $publishDate;

    /**
     * RSS related data if it is a blog or rss email.
     */
    #[Optional]
    public ?PublicRssEmailDetails $rssData;

    /**
     * Determines whether the email will be sent immediately on publish.
     */
    #[Optional]
    public ?bool $sendOnPublish;

    /**
     * The email state.
     *
     * @var value-of<State>|null $state
     */
    #[Optional(enum: State::class)]
    public ?string $state;

    /**
     * The email subcategory.
     *
     * @var value-of<Subcategory>|null $subcategory
     */
    #[Optional(enum: Subcategory::class)]
    public ?string $subcategory;

    /**
     * The subject of the email.
     */
    #[Optional]
    public ?string $subject;

    /**
     * Data structure representing the subscription fields of the email.
     */
    #[Optional]
    public ?PublicEmailSubscriptionDetails $subscriptionDetails;

    /**
     * AB testing related data. This property is only returned for AB type emails.
     */
    #[Optional]
    public ?PublicEmailTestingDetails $testing;

    /**
     * Data structure representing the to fields of the email.
     */
    #[Optional]
    public ?PublicEmailToDetails $to;

    #[Optional]
    public ?PublicWebversionDetails $webversion;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param PublicEmailContentShape $content
     * @param PublicEmailFromDetailsShape $from
     * @param Language|value-of<Language> $language
     * @param PublicRssEmailDetailsShape $rssData
     * @param State|value-of<State> $state
     * @param Subcategory|value-of<Subcategory> $subcategory
     * @param PublicEmailSubscriptionDetailsShape $subscriptionDetails
     * @param PublicEmailTestingDetailsShape $testing
     * @param PublicEmailToDetailsShape $to
     * @param PublicWebversionDetailsShape $webversion
     */
    public static function with(
        ?string $activeDomain = null,
        ?bool $archived = null,
        ?int $businessUnitID = null,
        ?string $campaign = null,
        PublicEmailContent|array|null $content = null,
        ?int $folderIDV2 = null,
        PublicEmailFromDetails|array|null $from = null,
        ?bool $jitterSendTime = null,
        Language|string|null $language = null,
        ?string $name = null,
        ?\DateTimeInterface $publishDate = null,
        PublicRssEmailDetails|array|null $rssData = null,
        ?bool $sendOnPublish = null,
        State|string|null $state = null,
        Subcategory|string|null $subcategory = null,
        ?string $subject = null,
        PublicEmailSubscriptionDetails|array|null $subscriptionDetails = null,
        PublicEmailTestingDetails|array|null $testing = null,
        PublicEmailToDetails|array|null $to = null,
        PublicWebversionDetails|array|null $webversion = null,
    ): self {
        $self = new self;

        null !== $activeDomain && $self['activeDomain'] = $activeDomain;
        null !== $archived && $self['archived'] = $archived;
        null !== $businessUnitID && $self['businessUnitID'] = $businessUnitID;
        null !== $campaign && $self['campaign'] = $campaign;
        null !== $content && $self['content'] = $content;
        null !== $folderIDV2 && $self['folderIDV2'] = $folderIDV2;
        null !== $from && $self['from'] = $from;
        null !== $jitterSendTime && $self['jitterSendTime'] = $jitterSendTime;
        null !== $language && $self['language'] = $language;
        null !== $name && $self['name'] = $name;
        null !== $publishDate && $self['publishDate'] = $publishDate;
        null !== $rssData && $self['rssData'] = $rssData;
        null !== $sendOnPublish && $self['sendOnPublish'] = $sendOnPublish;
        null !== $state && $self['state'] = $state;
        null !== $subcategory && $self['subcategory'] = $subcategory;
        null !== $subject && $self['subject'] = $subject;
        null !== $subscriptionDetails && $self['subscriptionDetails'] = $subscriptionDetails;
        null !== $testing && $self['testing'] = $testing;
        null !== $to && $self['to'] = $to;
        null !== $webversion && $self['webversion'] = $webversion;

        return $self;
    }

    /**
     * The active domain of the email.
     */
    public function withActiveDomain(string $activeDomain): self
    {
        $self = clone $this;
        $self['activeDomain'] = $activeDomain;

        return $self;
    }

    /**
     * Determines if the email is archived or not.
     */
    public function withArchived(bool $archived): self
    {
        $self = clone $this;
        $self['archived'] = $archived;

        return $self;
    }

    public function withBusinessUnitID(int $businessUnitID): self
    {
        $self = clone $this;
        $self['businessUnitID'] = $businessUnitID;

        return $self;
    }

    /**
     * The ID of the campaign this email is associated to.
     */
    public function withCampaign(string $campaign): self
    {
        $self = clone $this;
        $self['campaign'] = $campaign;

        return $self;
    }

    /**
     * Data structure representing the content of the email.
     *
     * @param PublicEmailContentShape $content
     */
    public function withContent(PublicEmailContent|array $content): self
    {
        $self = clone $this;
        $self['content'] = $content;

        return $self;
    }

    public function withFolderIdv2(int $folderIDV2): self
    {
        $self = clone $this;
        $self['folderIDV2'] = $folderIDV2;

        return $self;
    }

    /**
     * Data structure representing the from fields on the email.
     *
     * @param PublicEmailFromDetailsShape $from
     */
    public function withFrom(PublicEmailFromDetails|array $from): self
    {
        $self = clone $this;
        $self['from'] = $from;

        return $self;
    }

    public function withJitterSendTime(bool $jitterSendTime): self
    {
        $self = clone $this;
        $self['jitterSendTime'] = $jitterSendTime;

        return $self;
    }

    /**
     * @param Language|value-of<Language> $language
     */
    public function withLanguage(Language|string $language): self
    {
        $self = clone $this;
        $self['language'] = $language;

        return $self;
    }

    /**
     * The name of the email, as displayed on the email dashboard.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * The date and time the email is scheduled for, in ISO8601 representation. This is only used in local time or scheduled emails.
     */
    public function withPublishDate(\DateTimeInterface $publishDate): self
    {
        $self = clone $this;
        $self['publishDate'] = $publishDate;

        return $self;
    }

    /**
     * RSS related data if it is a blog or rss email.
     *
     * @param PublicRssEmailDetailsShape $rssData
     */
    public function withRssData(PublicRssEmailDetails|array $rssData): self
    {
        $self = clone $this;
        $self['rssData'] = $rssData;

        return $self;
    }

    /**
     * Determines whether the email will be sent immediately on publish.
     */
    public function withSendOnPublish(bool $sendOnPublish): self
    {
        $self = clone $this;
        $self['sendOnPublish'] = $sendOnPublish;

        return $self;
    }

    /**
     * The email state.
     *
     * @param State|value-of<State> $state
     */
    public function withState(State|string $state): self
    {
        $self = clone $this;
        $self['state'] = $state;

        return $self;
    }

    /**
     * The email subcategory.
     *
     * @param Subcategory|value-of<Subcategory> $subcategory
     */
    public function withSubcategory(Subcategory|string $subcategory): self
    {
        $self = clone $this;
        $self['subcategory'] = $subcategory;

        return $self;
    }

    /**
     * The subject of the email.
     */
    public function withSubject(string $subject): self
    {
        $self = clone $this;
        $self['subject'] = $subject;

        return $self;
    }

    /**
     * Data structure representing the subscription fields of the email.
     *
     * @param PublicEmailSubscriptionDetailsShape $subscriptionDetails
     */
    public function withSubscriptionDetails(
        PublicEmailSubscriptionDetails|array $subscriptionDetails
    ): self {
        $self = clone $this;
        $self['subscriptionDetails'] = $subscriptionDetails;

        return $self;
    }

    /**
     * AB testing related data. This property is only returned for AB type emails.
     *
     * @param PublicEmailTestingDetailsShape $testing
     */
    public function withTesting(PublicEmailTestingDetails|array $testing): self
    {
        $self = clone $this;
        $self['testing'] = $testing;

        return $self;
    }

    /**
     * Data structure representing the to fields of the email.
     *
     * @param PublicEmailToDetailsShape $to
     */
    public function withTo(PublicEmailToDetails|array $to): self
    {
        $self = clone $this;
        $self['to'] = $to;

        return $self;
    }

    /**
     * @param PublicWebversionDetailsShape $webversion
     */
    public function withWebversion(
        PublicWebversionDetails|array $webversion
    ): self {
        $self = clone $this;
        $self['webversion'] = $webversion;

        return $self;
    }
}
