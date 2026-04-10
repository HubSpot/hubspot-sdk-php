<?php

declare(strict_types=1);

namespace HubSpotSDK\Marketing\Emails;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Marketing\Emails\EmailUpdateDraftParams\Language;
use HubSpotSDK\Marketing\Emails\EmailUpdateDraftParams\State;
use HubSpotSDK\Marketing\Emails\EmailUpdateDraftParams\Subcategory;

/**
 * Create or update the draft version of a marketing email. If no draft exists, the system creates a draft from the current “live” email then applies the request body to that draft. The draft version only lives on the buffer—the email is not cloned.
 *
 * @see HubSpotSDK\Services\Marketing\EmailsService::updateDraft()
 *
 * @phpstan-import-type PublicEmailContentShape from \HubSpotSDK\Marketing\Emails\PublicEmailContent
 * @phpstan-import-type PublicEmailFromDetailsShape from \HubSpotSDK\Marketing\Emails\PublicEmailFromDetails
 * @phpstan-import-type PublicRssEmailDetailsShape from \HubSpotSDK\Marketing\Emails\PublicRssEmailDetails
 * @phpstan-import-type PublicEmailSubscriptionDetailsShape from \HubSpotSDK\Marketing\Emails\PublicEmailSubscriptionDetails
 * @phpstan-import-type PublicEmailTestingDetailsShape from \HubSpotSDK\Marketing\Emails\PublicEmailTestingDetails
 * @phpstan-import-type PublicEmailToDetailsShape from \HubSpotSDK\Marketing\Emails\PublicEmailToDetails
 * @phpstan-import-type PublicWebversionDetailsShape from \HubSpotSDK\Marketing\Emails\PublicWebversionDetails
 *
 * @phpstan-type EmailUpdateDraftParamsShape = array{
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
final class EmailUpdateDraftParams implements BaseModel
{
    /** @use SdkModel<EmailUpdateDraftParamsShape> */
    use SdkModel;
    use SdkParams;

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

    /**
     * The ID of the business unit associated with the email.
     */
    #[Optional('businessUnitId')]
    public ?int $businessUnitID;

    /**
     * The ID of the campaign this email is associated to.
     */
    #[Optional]
    public ?string $campaign;

    #[Optional]
    public ?PublicEmailContent $content;

    /**
     * The ID of the folder where the email will be stored.
     */
    #[Optional('folderIdV2')]
    public ?int $folderIDV2;

    #[Optional]
    public ?PublicEmailFromDetails $from;

    /**
     * Determines whether the email send time should be randomized to avoid sending all emails at the exact same time.
     */
    #[Optional]
    public ?bool $jitterSendTime;

    /**
     * The language code for the email, such as 'en' for English.
     *
     * @var value-of<Language>|null $language
     */
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

    #[Optional]
    public ?PublicEmailSubscriptionDetails $subscriptionDetails;

    #[Optional]
    public ?PublicEmailTestingDetails $testing;

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
     * @param PublicEmailContent|PublicEmailContentShape|null $content
     * @param PublicEmailFromDetails|PublicEmailFromDetailsShape|null $from
     * @param Language|value-of<Language>|null $language
     * @param PublicRssEmailDetails|PublicRssEmailDetailsShape|null $rssData
     * @param State|value-of<State>|null $state
     * @param Subcategory|value-of<Subcategory>|null $subcategory
     * @param PublicEmailSubscriptionDetails|PublicEmailSubscriptionDetailsShape|null $subscriptionDetails
     * @param PublicEmailTestingDetails|PublicEmailTestingDetailsShape|null $testing
     * @param PublicEmailToDetails|PublicEmailToDetailsShape|null $to
     * @param PublicWebversionDetails|PublicWebversionDetailsShape|null $webversion
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

    /**
     * The ID of the business unit associated with the email.
     */
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
     * @param PublicEmailContent|PublicEmailContentShape $content
     */
    public function withContent(PublicEmailContent|array $content): self
    {
        $self = clone $this;
        $self['content'] = $content;

        return $self;
    }

    /**
     * The ID of the folder where the email will be stored.
     */
    public function withFolderIdv2(int $folderIDV2): self
    {
        $self = clone $this;
        $self['folderIDV2'] = $folderIDV2;

        return $self;
    }

    /**
     * @param PublicEmailFromDetails|PublicEmailFromDetailsShape $from
     */
    public function withFrom(PublicEmailFromDetails|array $from): self
    {
        $self = clone $this;
        $self['from'] = $from;

        return $self;
    }

    /**
     * Determines whether the email send time should be randomized to avoid sending all emails at the exact same time.
     */
    public function withJitterSendTime(bool $jitterSendTime): self
    {
        $self = clone $this;
        $self['jitterSendTime'] = $jitterSendTime;

        return $self;
    }

    /**
     * The language code for the email, such as 'en' for English.
     *
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
     * @param PublicRssEmailDetails|PublicRssEmailDetailsShape $rssData
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
     * @param PublicEmailSubscriptionDetails|PublicEmailSubscriptionDetailsShape $subscriptionDetails
     */
    public function withSubscriptionDetails(
        PublicEmailSubscriptionDetails|array $subscriptionDetails
    ): self {
        $self = clone $this;
        $self['subscriptionDetails'] = $subscriptionDetails;

        return $self;
    }

    /**
     * @param PublicEmailTestingDetails|PublicEmailTestingDetailsShape $testing
     */
    public function withTesting(PublicEmailTestingDetails|array $testing): self
    {
        $self = clone $this;
        $self['testing'] = $testing;

        return $self;
    }

    /**
     * @param PublicEmailToDetails|PublicEmailToDetailsShape $to
     */
    public function withTo(PublicEmailToDetails|array $to): self
    {
        $self = clone $this;
        $self['to'] = $to;

        return $self;
    }

    /**
     * @param PublicWebversionDetails|PublicWebversionDetailsShape $webversion
     */
    public function withWebversion(
        PublicWebversionDetails|array $webversion
    ): self {
        $self = clone $this;
        $self['webversion'] = $webversion;

        return $self;
    }
}
