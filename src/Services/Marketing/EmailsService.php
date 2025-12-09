<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Marketing;

use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Emails\EmailCloneParams;
use HubspotSDK\Marketing\Emails\EmailCreateAbTestVariationParams;
use HubspotSDK\Marketing\Emails\EmailCreateParams;
use HubspotSDK\Marketing\Emails\EmailCreateParams\Language;
use HubspotSDK\Marketing\Emails\EmailCreateParams\State;
use HubspotSDK\Marketing\Emails\EmailCreateParams\Subcategory;
use HubspotSDK\Marketing\Emails\EmailDeleteParams;
use HubspotSDK\Marketing\Emails\EmailGetAbTestVariationParams;
use HubspotSDK\Marketing\Emails\EmailGetParams;
use HubspotSDK\Marketing\Emails\EmailGetRevisionParams;
use HubspotSDK\Marketing\Emails\EmailListParams;
use HubspotSDK\Marketing\Emails\EmailListParams\Type;
use HubspotSDK\Marketing\Emails\EmailListRevisionsParams;
use HubspotSDK\Marketing\Emails\EmailRestoreRevisionParams;
use HubspotSDK\Marketing\Emails\EmailRestoreRevisionToDraftParams;
use HubspotSDK\Marketing\Emails\EmailUpdateDraftParams;
use HubspotSDK\Marketing\Emails\EmailUpdateParams;
use HubspotSDK\Marketing\Emails\PublicEmail;
use HubspotSDK\Marketing\Emails\PublicEmailContent;
use HubspotSDK\Marketing\Emails\PublicEmailFromDetails;
use HubspotSDK\Marketing\Emails\PublicEmailRecipients;
use HubspotSDK\Marketing\Emails\PublicEmailStyleSettings;
use HubspotSDK\Marketing\Emails\PublicEmailSubscriptionDetails;
use HubspotSDK\Marketing\Emails\PublicEmailTestingDetails;
use HubspotSDK\Marketing\Emails\PublicEmailTestingDetails\AbSampleSizeDefault;
use HubspotSDK\Marketing\Emails\PublicEmailTestingDetails\AbSamplingDefault;
use HubspotSDK\Marketing\Emails\PublicEmailTestingDetails\AbStatus;
use HubspotSDK\Marketing\Emails\PublicEmailTestingDetails\AbSuccessMetric;
use HubspotSDK\Marketing\Emails\PublicEmailToDetails;
use HubspotSDK\Marketing\Emails\PublicRssEmailDetails;
use HubspotSDK\Marketing\Emails\PublicWebversionDetails;
use HubspotSDK\Marketing\Emails\VersionPublicEmail;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Marketing\EmailsContract;
use HubspotSDK\Services\Marketing\Emails\StatisticsService;

final class EmailsService implements EmailsContract
{
    /**
     * @api
     */
    public StatisticsService $statistics;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->statistics = new StatisticsService($client);
    }

    /**
     * @api
     *
     * Use this endpoint to create a new marketing email.
     *
     * @param array{
     *   name: string,
     *   activeDomain?: string,
     *   archived?: bool,
     *   businessUnitID?: int,
     *   campaign?: string,
     *   content?: array{
     *     flexAreas?: array<string,mixed>,
     *     plainTextVersion?: string,
     *     smartFields?: array<string,mixed>,
     *     styleSettings?: array<mixed>|PublicEmailStyleSettings,
     *     templatePath?: string,
     *     themeSettingsValues?: array<string,mixed>,
     *     widgetContainers?: array<string,mixed>,
     *     widgets?: array<string,mixed>,
     *   }|PublicEmailContent,
     *   feedbackSurveyID?: string,
     *   folderIDV2?: int,
     *   from?: array{
     *     customReplyTo?: string, fromName?: string, replyTo?: string
     *   }|PublicEmailFromDetails,
     *   jitterSendTime?: bool,
     *   language?: value-of<Language>,
     *   publishDate?: string|\DateTimeInterface,
     *   rssData?: array{
     *     blogEmailType?: string,
     *     blogImageMaxWidth?: int,
     *     blogLayout?: string,
     *     hubspotBlogID?: string,
     *     maxEntries?: int,
     *     rssEntryTemplate?: string,
     *     timing?: array<string,mixed>,
     *     url?: string,
     *     useHeadlineAsSubject?: bool,
     *   }|PublicRssEmailDetails,
     *   sendOnPublish?: bool,
     *   state?: value-of<State>,
     *   subcategory?: value-of<Subcategory>,
     *   subject?: string,
     *   subscriptionDetails?: array{
     *     officeLocationID?: string,
     *     preferencesGroupID?: string,
     *     subscriptionID?: string,
     *     subscriptionName?: string,
     *   }|PublicEmailSubscriptionDetails,
     *   testing?: array{
     *     abSampleSizeDefault?: 'automated_loser_variant'|'automated_master'|'automated_variant'|'loser_variant'|'mab_master'|'mab_variant'|'master'|'variant'|AbSampleSizeDefault,
     *     abSamplingDefault?: 'automated_loser_variant'|'automated_master'|'automated_variant'|'loser_variant'|'mab_master'|'mab_variant'|'master'|'variant'|AbSamplingDefault,
     *     abStatus?: 'automated_loser_variant'|'automated_master'|'automated_variant'|'loser_variant'|'mab_master'|'mab_variant'|'master'|'variant'|AbStatus,
     *     abSuccessMetric?: 'CLICKS_BY_DELIVERED'|'CLICKS_BY_OPENS'|'OPENS_BY_DELIVERED'|AbSuccessMetric,
     *     abTestPercentage?: int,
     *     hoursToWait?: int,
     *     isAbVariation?: bool,
     *     testID?: string,
     *   }|PublicEmailTestingDetails,
     *   to?: array{
     *     contactIDs?: array<mixed>|PublicEmailRecipients,
     *     contactIlsLists?: array<mixed>|PublicEmailRecipients,
     *     contactLists?: array<mixed>|PublicEmailRecipients,
     *     limitSendFrequency?: bool,
     *     suppressGraymail?: bool,
     *   }|PublicEmailToDetails,
     *   webversion?: array{
     *     domain?: string,
     *     enabled?: bool,
     *     expiresAt?: string|\DateTimeInterface,
     *     isPageRedirected?: bool,
     *     metaDescription?: string,
     *     pageExpiryEnabled?: bool,
     *     redirectToPageID?: string,
     *     redirectToURL?: string,
     *     slug?: string,
     *     title?: string,
     *     url?: string,
     *   }|PublicWebversionDetails,
     * }|EmailCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|EmailCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): PublicEmail {
        [$parsed, $options] = EmailCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<PublicEmail> */
        $response = $this->client->request(
            method: 'post',
            path: 'marketing/v3/emails/',
            body: (object) $parsed,
            options: $options,
            convert: PublicEmail::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Change properties of a marketing email.
     *
     * @param array{
     *   archived?: bool,
     *   activeDomain?: string,
     *   businessUnitID?: int,
     *   campaign?: string,
     *   content?: array{
     *     flexAreas?: array<string,mixed>,
     *     plainTextVersion?: string,
     *     smartFields?: array<string,mixed>,
     *     styleSettings?: array<mixed>|PublicEmailStyleSettings,
     *     templatePath?: string,
     *     themeSettingsValues?: array<string,mixed>,
     *     widgetContainers?: array<string,mixed>,
     *     widgets?: array<string,mixed>,
     *   }|PublicEmailContent,
     *   folderIDV2?: int,
     *   from?: array{
     *     customReplyTo?: string, fromName?: string, replyTo?: string
     *   }|PublicEmailFromDetails,
     *   jitterSendTime?: bool,
     *   language?: value-of<EmailUpdateParams\Language>,
     *   name?: string,
     *   publishDate?: string|\DateTimeInterface,
     *   rssData?: array{
     *     blogEmailType?: string,
     *     blogImageMaxWidth?: int,
     *     blogLayout?: string,
     *     hubspotBlogID?: string,
     *     maxEntries?: int,
     *     rssEntryTemplate?: string,
     *     timing?: array<string,mixed>,
     *     url?: string,
     *     useHeadlineAsSubject?: bool,
     *   }|PublicRssEmailDetails,
     *   sendOnPublish?: bool,
     *   state?: value-of<EmailUpdateParams\State>,
     *   subcategory?: value-of<EmailUpdateParams\Subcategory>,
     *   subject?: string,
     *   subscriptionDetails?: array{
     *     officeLocationID?: string,
     *     preferencesGroupID?: string,
     *     subscriptionID?: string,
     *     subscriptionName?: string,
     *   }|PublicEmailSubscriptionDetails,
     *   testing?: array{
     *     abSampleSizeDefault?: 'automated_loser_variant'|'automated_master'|'automated_variant'|'loser_variant'|'mab_master'|'mab_variant'|'master'|'variant'|AbSampleSizeDefault,
     *     abSamplingDefault?: 'automated_loser_variant'|'automated_master'|'automated_variant'|'loser_variant'|'mab_master'|'mab_variant'|'master'|'variant'|AbSamplingDefault,
     *     abStatus?: 'automated_loser_variant'|'automated_master'|'automated_variant'|'loser_variant'|'mab_master'|'mab_variant'|'master'|'variant'|AbStatus,
     *     abSuccessMetric?: 'CLICKS_BY_DELIVERED'|'CLICKS_BY_OPENS'|'OPENS_BY_DELIVERED'|AbSuccessMetric,
     *     abTestPercentage?: int,
     *     hoursToWait?: int,
     *     isAbVariation?: bool,
     *     testID?: string,
     *   }|PublicEmailTestingDetails,
     *   to?: array{
     *     contactIDs?: array<mixed>|PublicEmailRecipients,
     *     contactIlsLists?: array<mixed>|PublicEmailRecipients,
     *     contactLists?: array<mixed>|PublicEmailRecipients,
     *     limitSendFrequency?: bool,
     *     suppressGraymail?: bool,
     *   }|PublicEmailToDetails,
     *   webversion?: array{
     *     domain?: string,
     *     enabled?: bool,
     *     expiresAt?: string|\DateTimeInterface,
     *     isPageRedirected?: bool,
     *     metaDescription?: string,
     *     pageExpiryEnabled?: bool,
     *     redirectToPageID?: string,
     *     redirectToURL?: string,
     *     slug?: string,
     *     title?: string,
     *     url?: string,
     *   }|PublicWebversionDetails,
     * }|EmailUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $emailID,
        array|EmailUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): PublicEmail {
        [$parsed, $options] = EmailUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $query_params = ['archived'];

        /** @var BaseResponse<PublicEmail> */
        $response = $this->client->request(
            method: 'patch',
            path: ['marketing/v3/emails/%1$s', $emailID],
            query: array_diff_key($parsed, $query_params),
            body: (object) array_diff_key($parsed, $query_params),
            options: $options,
            convert: PublicEmail::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * The results can be filtered, allowing you to find a specific set of emails. See the table below for a full list of filtering options.
     *
     * @param array{
     *   after?: string,
     *   archived?: bool,
     *   campaign?: string,
     *   createdAfter?: string|\DateTimeInterface,
     *   createdAt?: string|\DateTimeInterface,
     *   createdBefore?: string|\DateTimeInterface,
     *   includedProperties?: list<string>,
     *   includeStats?: bool,
     *   isPublished?: bool,
     *   limit?: int,
     *   marketingCampaignNames?: bool,
     *   publishedAfter?: string|\DateTimeInterface,
     *   publishedAt?: string|\DateTimeInterface,
     *   publishedBefore?: string|\DateTimeInterface,
     *   sort?: list<string>,
     *   type?: value-of<Type>,
     *   updatedAfter?: string|\DateTimeInterface,
     *   updatedAt?: string|\DateTimeInterface,
     *   updatedBefore?: string|\DateTimeInterface,
     *   workflowNames?: bool,
     * }|EmailListParams $params
     *
     * @return Page<PublicEmail>
     *
     * @throws APIException
     */
    public function list(
        array|EmailListParams $params,
        ?RequestOptions $requestOptions = null
    ): Page {
        [$parsed, $options] = EmailListParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<Page<PublicEmail>> */
        $response = $this->client->request(
            method: 'get',
            path: 'marketing/v3/emails/',
            query: $parsed,
            options: $options,
            convert: PublicEmail::class,
            page: Page::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete a marketing email by its ID
     *
     * @param array{archived?: bool}|EmailDeleteParams $params
     *
     * @throws APIException
     */
    public function delete(
        string $emailID,
        array|EmailDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        [$parsed, $options] = EmailDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<mixed> */
        $response = $this->client->request(
            method: 'delete',
            path: ['marketing/v3/emails/%1$s', $emailID],
            query: $parsed,
            options: $options,
            convert: null,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * This will create a duplicate email with the same properties as the original, with the exception of a unique ID.
     *
     * @param array{
     *   id: string, cloneName?: string, language?: string
     * }|EmailCloneParams $params
     *
     * @throws APIException
     */
    public function clone(
        array|EmailCloneParams $params,
        ?RequestOptions $requestOptions = null
    ): PublicEmail {
        [$parsed, $options] = EmailCloneParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<PublicEmail> */
        $response = $this->client->request(
            method: 'post',
            path: 'marketing/v3/emails/clone',
            body: (object) $parsed,
            options: $options,
            convert: PublicEmail::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Create a variation of a marketing email for an A/B test. The new variation will be created as a draft. If an active variation already exists, a new one won't be created.
     *
     * @param array{
     *   contentID: string, variationName: string
     * }|EmailCreateAbTestVariationParams $params
     *
     * @throws APIException
     */
    public function createAbTestVariation(
        array|EmailCreateAbTestVariationParams $params,
        ?RequestOptions $requestOptions = null,
    ): PublicEmail {
        [$parsed, $options] = EmailCreateAbTestVariationParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<PublicEmail> */
        $response = $this->client->request(
            method: 'post',
            path: 'marketing/v3/emails/ab-test/create-variation',
            body: (object) $parsed,
            options: $options,
            convert: PublicEmail::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Get the details for a marketing email.
     *
     * @param array{
     *   archived?: bool,
     *   includedProperties?: list<string>,
     *   includeStats?: bool,
     *   marketingCampaignNames?: bool,
     *   workflowNames?: bool,
     * }|EmailGetParams $params
     *
     * @throws APIException
     */
    public function get(
        string $emailID,
        array|EmailGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): PublicEmail {
        [$parsed, $options] = EmailGetParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<PublicEmail> */
        $response = $this->client->request(
            method: 'get',
            path: ['marketing/v3/emails/%1$s', $emailID],
            query: $parsed,
            options: $options,
            convert: PublicEmail::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * This endpoint lets you obtain the variation of an A/B marketing email. If the email is variation A (master) it will return variation B (variant) and vice versa.
     *
     * @param array{
     *   archived?: bool,
     *   includedProperties?: list<string>,
     *   includeStats?: bool,
     *   marketingCampaignNames?: bool,
     *   workflowNames?: bool,
     * }|EmailGetAbTestVariationParams $params
     *
     * @throws APIException
     */
    public function getAbTestVariation(
        string $emailID,
        array|EmailGetAbTestVariationParams $params,
        ?RequestOptions $requestOptions = null,
    ): PublicEmail {
        [$parsed, $options] = EmailGetAbTestVariationParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<PublicEmail> */
        $response = $this->client->request(
            method: 'get',
            path: ['marketing/v3/emails/%1$s/ab-test/get-variation', $emailID],
            query: $parsed,
            options: $options,
            convert: PublicEmail::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Get the draft version of an email (if it exists). If no draft version exists, the published email is returned.
     *
     * @throws APIException
     */
    public function getDraft(
        string $emailID,
        ?RequestOptions $requestOptions = null
    ): PublicEmail {
        /** @var BaseResponse<PublicEmail> */
        $response = $this->client->request(
            method: 'get',
            path: ['marketing/v3/emails/%1$s/draft', $emailID],
            options: $requestOptions,
            convert: PublicEmail::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Get a specific revision of a marketing email.
     *
     * @param array{emailID: string}|EmailGetRevisionParams $params
     *
     * @throws APIException
     */
    public function getRevision(
        string $revisionID,
        array|EmailGetRevisionParams $params,
        ?RequestOptions $requestOptions = null,
    ): VersionPublicEmail {
        [$parsed, $options] = EmailGetRevisionParams::parseRequest(
            $params,
            $requestOptions,
        );
        $emailID = $parsed['emailID'];
        unset($parsed['emailID']);

        /** @var BaseResponse<VersionPublicEmail> */
        $response = $this->client->request(
            method: 'get',
            path: ['marketing/v3/emails/%1$s/revisions/%2$s', $emailID, $revisionID],
            options: $options,
            convert: VersionPublicEmail::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Get a list of all versions of a marketing email, with each entry including the full state of that particular version. To view the most recent version, sort by the updatedAt parameter.
     *
     * @param array{
     *   after?: string, before?: string, limit?: int
     * }|EmailListRevisionsParams $params
     *
     * @return Page<VersionPublicEmail>
     *
     * @throws APIException
     */
    public function listRevisions(
        string $emailID,
        array|EmailListRevisionsParams $params,
        ?RequestOptions $requestOptions = null,
    ): Page {
        [$parsed, $options] = EmailListRevisionsParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<Page<VersionPublicEmail>> */
        $response = $this->client->request(
            method: 'get',
            path: ['marketing/v3/emails/%1$s/revisions', $emailID],
            query: $parsed,
            options: $options,
            convert: VersionPublicEmail::class,
            page: Page::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * If you have a Marketing Hub Enterprise account or the transactional email add-on, you can use this endpoint to publish an automated email or send/schedule a regular email.
     *
     * @throws APIException
     */
    public function publish(
        string $emailID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        /** @var BaseResponse<mixed> */
        $response = $this->client->request(
            method: 'post',
            path: ['marketing/v3/emails/%1$s/publish', $emailID],
            options: $requestOptions,
            convert: null,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Resets the draft back to a copy of the live object.
     *
     * @throws APIException
     */
    public function resetDraft(
        string $emailID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        /** @var BaseResponse<mixed> */
        $response = $this->client->request(
            method: 'post',
            path: ['marketing/v3/emails/%1$s/draft/reset', $emailID],
            options: $requestOptions,
            convert: null,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Restores a previous revision of a marketing email. The current revision becomes old, and the restored revision is given a new version number.
     *
     * @param array{emailID: string}|EmailRestoreRevisionParams $params
     *
     * @throws APIException
     */
    public function restoreRevision(
        string $revisionID,
        array|EmailRestoreRevisionParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        [$parsed, $options] = EmailRestoreRevisionParams::parseRequest(
            $params,
            $requestOptions,
        );
        $emailID = $parsed['emailID'];
        unset($parsed['emailID']);

        /** @var BaseResponse<mixed> */
        $response = $this->client->request(
            method: 'post',
            path: [
                'marketing/v3/emails/%1$s/revisions/%2$s/restore', $emailID, $revisionID,
            ],
            options: $options,
            convert: null,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Restores a previous revision of a marketing email to DRAFT state. If there is currently something in the draft for that object, it is overwritten.
     *
     * @param array{emailID: string}|EmailRestoreRevisionToDraftParams $params
     *
     * @throws APIException
     */
    public function restoreRevisionToDraft(
        int $revisionID,
        array|EmailRestoreRevisionToDraftParams $params,
        ?RequestOptions $requestOptions = null,
    ): PublicEmail {
        [$parsed, $options] = EmailRestoreRevisionToDraftParams::parseRequest(
            $params,
            $requestOptions,
        );
        $emailID = $parsed['emailID'];
        unset($parsed['emailID']);

        /** @var BaseResponse<PublicEmail> */
        $response = $this->client->request(
            method: 'post',
            path: [
                'marketing/v3/emails/%1$s/revisions/%2$s/restore-to-draft',
                $emailID,
                $revisionID,
            ],
            options: $options,
            convert: PublicEmail::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * If you have a Marketing Hub Enterprise account or the transactional email add-on, you can use this endpoint to unpublish an automated email or cancel a regular email. If the email is already in the process of being sent, canceling might not be possible.
     *
     * @throws APIException
     */
    public function unpublish(
        string $emailID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        /** @var BaseResponse<mixed> */
        $response = $this->client->request(
            method: 'post',
            path: ['marketing/v3/emails/%1$s/unpublish', $emailID],
            options: $requestOptions,
            convert: null,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Create or update the draft version of a marketing email. If no draft exists, the system creates a draft from the current “live” email then applies the request body to that draft. The draft version only lives on the buffer—the email is not cloned.
     *
     * @param array{
     *   activeDomain?: string,
     *   archived?: bool,
     *   businessUnitID?: int,
     *   campaign?: string,
     *   content?: array{
     *     flexAreas?: array<string,mixed>,
     *     plainTextVersion?: string,
     *     smartFields?: array<string,mixed>,
     *     styleSettings?: array<mixed>|PublicEmailStyleSettings,
     *     templatePath?: string,
     *     themeSettingsValues?: array<string,mixed>,
     *     widgetContainers?: array<string,mixed>,
     *     widgets?: array<string,mixed>,
     *   }|PublicEmailContent,
     *   folderIDV2?: int,
     *   from?: array{
     *     customReplyTo?: string, fromName?: string, replyTo?: string
     *   }|PublicEmailFromDetails,
     *   jitterSendTime?: bool,
     *   language?: value-of<EmailUpdateDraftParams\Language>,
     *   name?: string,
     *   publishDate?: string|\DateTimeInterface,
     *   rssData?: array{
     *     blogEmailType?: string,
     *     blogImageMaxWidth?: int,
     *     blogLayout?: string,
     *     hubspotBlogID?: string,
     *     maxEntries?: int,
     *     rssEntryTemplate?: string,
     *     timing?: array<string,mixed>,
     *     url?: string,
     *     useHeadlineAsSubject?: bool,
     *   }|PublicRssEmailDetails,
     *   sendOnPublish?: bool,
     *   state?: value-of<EmailUpdateDraftParams\State>,
     *   subcategory?: value-of<EmailUpdateDraftParams\Subcategory>,
     *   subject?: string,
     *   subscriptionDetails?: array{
     *     officeLocationID?: string,
     *     preferencesGroupID?: string,
     *     subscriptionID?: string,
     *     subscriptionName?: string,
     *   }|PublicEmailSubscriptionDetails,
     *   testing?: array{
     *     abSampleSizeDefault?: 'automated_loser_variant'|'automated_master'|'automated_variant'|'loser_variant'|'mab_master'|'mab_variant'|'master'|'variant'|AbSampleSizeDefault,
     *     abSamplingDefault?: 'automated_loser_variant'|'automated_master'|'automated_variant'|'loser_variant'|'mab_master'|'mab_variant'|'master'|'variant'|AbSamplingDefault,
     *     abStatus?: 'automated_loser_variant'|'automated_master'|'automated_variant'|'loser_variant'|'mab_master'|'mab_variant'|'master'|'variant'|AbStatus,
     *     abSuccessMetric?: 'CLICKS_BY_DELIVERED'|'CLICKS_BY_OPENS'|'OPENS_BY_DELIVERED'|AbSuccessMetric,
     *     abTestPercentage?: int,
     *     hoursToWait?: int,
     *     isAbVariation?: bool,
     *     testID?: string,
     *   }|PublicEmailTestingDetails,
     *   to?: array{
     *     contactIDs?: array<mixed>|PublicEmailRecipients,
     *     contactIlsLists?: array<mixed>|PublicEmailRecipients,
     *     contactLists?: array<mixed>|PublicEmailRecipients,
     *     limitSendFrequency?: bool,
     *     suppressGraymail?: bool,
     *   }|PublicEmailToDetails,
     *   webversion?: array{
     *     domain?: string,
     *     enabled?: bool,
     *     expiresAt?: string|\DateTimeInterface,
     *     isPageRedirected?: bool,
     *     metaDescription?: string,
     *     pageExpiryEnabled?: bool,
     *     redirectToPageID?: string,
     *     redirectToURL?: string,
     *     slug?: string,
     *     title?: string,
     *     url?: string,
     *   }|PublicWebversionDetails,
     * }|EmailUpdateDraftParams $params
     *
     * @throws APIException
     */
    public function updateDraft(
        string $emailID,
        array|EmailUpdateDraftParams $params,
        ?RequestOptions $requestOptions = null,
    ): PublicEmail {
        [$parsed, $options] = EmailUpdateDraftParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<PublicEmail> */
        $response = $this->client->request(
            method: 'patch',
            path: ['marketing/v3/emails/%1$s/draft', $emailID],
            body: (object) $parsed,
            options: $options,
            convert: PublicEmail::class,
        );

        return $response->parse();
    }
}
