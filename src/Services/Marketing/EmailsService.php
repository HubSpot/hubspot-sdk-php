<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Marketing;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Marketing\Emails\EmailCreateParams\Language;
use HubspotSDK\Marketing\Emails\EmailCreateParams\State;
use HubspotSDK\Marketing\Emails\EmailCreateParams\Subcategory;
use HubspotSDK\Marketing\Emails\EmailListParams\Type;
use HubspotSDK\Marketing\Emails\PublicButtonStyleSettings;
use HubspotSDK\Marketing\Emails\PublicDividerStyleSettings;
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
use HubspotSDK\Marketing\Emails\PublicFontStyle;
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
    public EmailsRawService $raw;

    /**
     * @api
     */
    public StatisticsService $statistics;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new EmailsRawService($client);
        $this->statistics = new StatisticsService($client);
    }

    /**
     * @api
     *
     * Use this endpoint to create a new marketing email.
     *
     * @param string $name the name of the email, as displayed on the email dashboard
     * @param string $activeDomain the active domain of the email
     * @param bool $archived determines if the email is archived or not
     * @param string $campaign the ID of the campaign this email is associated to
     * @param array{
     *   flexAreas?: array<string,mixed>,
     *   plainTextVersion?: string,
     *   smartFields?: array<string,mixed>,
     *   styleSettings?: array{
     *     backgroundColor?: string,
     *     backgroundImage?: string,
     *     backgroundImageType?: string,
     *     bodyBorderColor?: string,
     *     bodyBorderColorChoice?: string,
     *     bodyBorderWidth?: float,
     *     bodyColor?: string,
     *     buttonStyleSettings?: array{
     *       backgroundColor?: mixed,
     *       cornerRadius?: int,
     *       fontStyle?: array{
     *         bold?: bool,
     *         color?: string,
     *         font?: string,
     *         italic?: bool,
     *         size?: int,
     *         underline?: bool,
     *       }|PublicFontStyle,
     *     }|PublicButtonStyleSettings,
     *     colorPickerFavorite1?: string,
     *     colorPickerFavorite2?: string,
     *     colorPickerFavorite3?: string,
     *     colorPickerFavorite4?: string,
     *     colorPickerFavorite5?: string,
     *     colorPickerFavorite6?: string,
     *     dividerStyleSettings?: array{
     *       color?: mixed, height?: int, lineType?: string
     *     }|PublicDividerStyleSettings,
     *     emailBodyPadding?: string,
     *     emailBodyWidth?: string,
     *     headingOneFont?: array{
     *       bold?: bool,
     *       color?: string,
     *       font?: string,
     *       italic?: bool,
     *       size?: int,
     *       underline?: bool,
     *     }|PublicFontStyle,
     *     headingTwoFont?: array{
     *       bold?: bool,
     *       color?: string,
     *       font?: string,
     *       italic?: bool,
     *       size?: int,
     *       underline?: bool,
     *     }|PublicFontStyle,
     *     linksFont?: array{
     *       bold?: bool,
     *       color?: string,
     *       font?: string,
     *       italic?: bool,
     *       size?: int,
     *       underline?: bool,
     *     }|PublicFontStyle,
     *     primaryAccentColor?: string,
     *     primaryFont?: string,
     *     primaryFontColor?: string,
     *     primaryFontLineHeight?: string,
     *     primaryFontSize?: float,
     *     secondaryAccentColor?: string,
     *     secondaryFont?: string,
     *     secondaryFontColor?: string,
     *     secondaryFontLineHeight?: string,
     *     secondaryFontSize?: float,
     *   }|PublicEmailStyleSettings,
     *   templatePath?: string,
     *   themeSettingsValues?: array<string,mixed>,
     *   widgetContainers?: array<string,mixed>,
     *   widgets?: array<string,mixed>,
     * }|PublicEmailContent $content Data structure representing the content of the email
     * @param string $feedbackSurveyID the ID of the feedback survey linked to the email
     * @param array{
     *   customReplyTo?: string, fromName?: string, replyTo?: string
     * }|PublicEmailFromDetails $from Data structure representing the from fields on the email
     * @param 'af'|'af-na'|'af-za'|'agq'|'agq-cm'|'ak'|'ak-gh'|'am'|'am-et'|'ann'|'ann-ng'|'ar'|'ar-001'|'ar-ae'|'ar-bh'|'ar-dj'|'ar-dz'|'ar-eg'|'ar-eh'|'ar-er'|'ar-il'|'ar-iq'|'ar-jo'|'ar-km'|'ar-kw'|'ar-lb'|'ar-ly'|'ar-ma'|'ar-mr'|'ar-om'|'ar-ps'|'ar-qa'|'ar-sa'|'ar-sd'|'ar-so'|'ar-ss'|'ar-sy'|'ar-td'|'ar-tn'|'ar-ye'|'as'|'as-in'|'asa'|'asa-tz'|'ast'|'ast-es'|'az'|'az-az'|'bas'|'bas-cm'|'be'|'be-by'|'bem'|'bem-zm'|'bez'|'bez-tz'|'bg'|'bg-bg'|'bgc'|'bgc-in'|'bho'|'bho-in'|'bm'|'bm-ml'|'bn'|'bn-bd'|'bn-in'|'bo'|'bo-cn'|'bo-in'|'br'|'br-fr'|'brx'|'brx-in'|'bs'|'bs-ba'|'ca'|'ca-ad'|'ca-es'|'ca-fr'|'ca-it'|'ccp'|'ccp-bd'|'ccp-in'|'ce'|'ce-ru'|'ceb'|'ceb-ph'|'cgg'|'cgg-ug'|'chr'|'chr-us'|'ckb'|'ckb-iq'|'ckb-ir'|'cs'|'cs-cz'|'cu'|'cu-ru'|'cv'|'cv-ru'|'cy'|'cy-gb'|'da'|'da-dk'|'da-gl'|'dav'|'dav-ke'|'de'|'de-at'|'de-be'|'de-ch'|'de-de'|'de-gr'|'de-it'|'de-li'|'de-lu'|'dje'|'dje-ne'|'doi'|'doi-in'|'dsb'|'dsb-de'|'dua'|'dua-cm'|'dyo'|'dyo-sn'|'dz'|'dz-bt'|'ebu'|'ebu-ke'|'ee'|'ee-gh'|'ee-tg'|'el'|'el-cy'|'el-gr'|'en'|'en-001'|'en-150'|'en-ae'|'en-ag'|'en-ai'|'en-as'|'en-at'|'en-au'|'en-bb'|'en-be'|'en-bi'|'en-bm'|'en-bs'|'en-bw'|'en-bz'|'en-ca'|'en-cc'|'en-ch'|'en-ck'|'en-cm'|'en-cn'|'en-cx'|'en-cy'|'en-de'|'en-dg'|'en-dk'|'en-dm'|'en-ee'|'en-eg'|'en-er'|'en-es'|'en-fi'|'en-fj'|'en-fk'|'en-fm'|'en-fr'|'en-gb'|'en-gd'|'en-gg'|'en-gh'|'en-gi'|'en-gm'|'en-gu'|'en-gy'|'en-hk'|'en-ie'|'en-il'|'en-im'|'en-in'|'en-io'|'en-je'|'en-jm'|'en-ke'|'en-ki'|'en-kn'|'en-ky'|'en-lc'|'en-lr'|'en-ls'|'en-lu'|'en-mg'|'en-mh'|'en-mo'|'en-mp'|'en-ms'|'en-mt'|'en-mu'|'en-mv'|'en-mw'|'en-mx'|'en-my'|'en-na'|'en-nf'|'en-ng'|'en-nl'|'en-nr'|'en-nu'|'en-nz'|'en-pg'|'en-ph'|'en-pk'|'en-pn'|'en-pr'|'en-pt'|'en-pw'|'en-rw'|'en-sb'|'en-sc'|'en-sd'|'en-se'|'en-sg'|'en-sh'|'en-si'|'en-sl'|'en-ss'|'en-sx'|'en-sz'|'en-tc'|'en-tk'|'en-tn'|'en-to'|'en-tt'|'en-tv'|'en-tz'|'en-ug'|'en-um'|'en-us'|'en-vc'|'en-vg'|'en-vi'|'en-vu'|'en-ws'|'en-za'|'en-zm'|'en-zw'|'eo'|'eo-001'|'es'|'es-419'|'es-ar'|'es-bo'|'es-br'|'es-bz'|'es-cl'|'es-co'|'es-cr'|'es-cu'|'es-do'|'es-ea'|'es-ec'|'es-es'|'es-gq'|'es-gt'|'es-hn'|'es-ic'|'es-mx'|'es-ni'|'es-pa'|'es-pe'|'es-ph'|'es-pr'|'es-py'|'es-sv'|'es-us'|'es-uy'|'es-ve'|'et'|'et-ee'|'eu'|'eu-es'|'ewo'|'ewo-cm'|'fa'|'fa-af'|'fa-ir'|'ff'|'ff-bf'|'ff-cm'|'ff-gh'|'ff-gm'|'ff-gn'|'ff-gw'|'ff-lr'|'ff-mr'|'ff-ne'|'ff-ng'|'ff-sl'|'ff-sn'|'fi'|'fi-fi'|'fil'|'fil-ph'|'fo'|'fo-dk'|'fo-fo'|'fr'|'fr-be'|'fr-bf'|'fr-bi'|'fr-bj'|'fr-bl'|'fr-ca'|'fr-cd'|'fr-cf'|'fr-cg'|'fr-ch'|'fr-ci'|'fr-cm'|'fr-dj'|'fr-dz'|'fr-fr'|'fr-ga'|'fr-gf'|'fr-gn'|'fr-gp'|'fr-gq'|'fr-ht'|'fr-km'|'fr-lu'|'fr-ma'|'fr-mc'|'fr-mf'|'fr-mg'|'fr-ml'|'fr-mq'|'fr-mr'|'fr-mu'|'fr-nc'|'fr-ne'|'fr-pf'|'fr-pm'|'fr-re'|'fr-rw'|'fr-sc'|'fr-sn'|'fr-sy'|'fr-td'|'fr-tg'|'fr-tn'|'fr-vu'|'fr-wf'|'fr-yt'|'frr'|'frr-de'|'fur'|'fur-it'|'fy'|'fy-nl'|'ga'|'ga-gb'|'ga-ie'|'gd'|'gd-gb'|'gl'|'gl-es'|'gsw'|'gsw-ch'|'gsw-fr'|'gsw-li'|'gu'|'gu-in'|'guz'|'guz-ke'|'gv'|'gv-im'|'ha'|'ha-gh'|'ha-ne'|'ha-ng'|'haw'|'haw-us'|'he'|'he-il'|'hi'|'hi-in'|'hr'|'hr-ba'|'hr-hr'|'hsb'|'hsb-de'|'hu'|'hu-hu'|'hy'|'hy-am'|'ia'|'ia-001'|'id'|'id-id'|'ig'|'ig-ng'|'ii'|'ii-cn'|'is'|'is-is'|'it'|'it-ch'|'it-it'|'it-sm'|'it-va'|'ja'|'ja-jp'|'jgo'|'jgo-cm'|'jmc'|'jmc-tz'|'jv'|'jv-id'|'ka'|'ka-ge'|'kab'|'kab-dz'|'kam'|'kam-ke'|'kde'|'kde-tz'|'kea'|'kea-cv'|'kgp'|'kgp-br'|'kh'|'khq'|'khq-ml'|'ki'|'ki-ke'|'kk'|'kk-kz'|'kkj'|'kkj-cm'|'kl'|'kl-gl'|'kln'|'kln-ke'|'km'|'km-kh'|'kn'|'kn-in'|'ko'|'ko-kp'|'ko-kr'|'kok'|'kok-in'|'ks'|'ks-in'|'ksb'|'ksb-tz'|'ksf'|'ksf-cm'|'ksh'|'ksh-de'|'ku'|'ku-tr'|'kw'|'kw-gb'|'ky'|'ky-kg'|'lag'|'lag-tz'|'lb'|'lb-lu'|'lg'|'lg-ug'|'lkt'|'lkt-us'|'ln'|'ln-ao'|'ln-cd'|'ln-cf'|'ln-cg'|'lo'|'lo-la'|'lrc'|'lrc-iq'|'lrc-ir'|'lt'|'lt-lt'|'lu'|'lu-cd'|'luo'|'luo-ke'|'luy'|'luy-ke'|'lv'|'lv-lv'|'mai'|'mai-in'|'mas'|'mas-ke'|'mas-tz'|'mdf'|'mdf-ru'|'mer'|'mer-ke'|'mfe'|'mfe-mu'|'mg'|'mg-mg'|'mgh'|'mgh-mz'|'mgo'|'mgo-cm'|'mi'|'mi-nz'|'mk'|'mk-mk'|'ml'|'ml-in'|'mn'|'mn-mn'|'mni'|'mni-in'|'mr'|'mr-in'|'ms'|'ms-bn'|'ms-id'|'ms-my'|'ms-sg'|'mt'|'mt-mt'|'mua'|'mua-cm'|'my'|'my-mm'|'mzn'|'mzn-ir'|'naq'|'naq-na'|'nb'|'nb-no'|'nb-sj'|'nd'|'nd-zw'|'nds'|'nds-de'|'nds-nl'|'ne'|'ne-in'|'ne-np'|'nl'|'nl-aw'|'nl-be'|'nl-bq'|'nl-ch'|'nl-cw'|'nl-lu'|'nl-nl'|'nl-sr'|'nl-sx'|'nmg'|'nmg-cm'|'nn'|'nn-no'|'nnh'|'nnh-cm'|'no'|'no-no'|'nus'|'nus-ss'|'nyn'|'nyn-ug'|'oc'|'oc-es'|'oc-fr'|'om'|'om-et'|'om-ke'|'or'|'or-in'|'os'|'os-ge'|'os-ru'|'pa'|'pa-in'|'pa-pk'|'pcm'|'pcm-ng'|'pis'|'pis-sb'|'pl'|'pl-pl'|'prg'|'prg-001'|'ps'|'ps-af'|'ps-pk'|'pt'|'pt-ao'|'pt-br'|'pt-ch'|'pt-cv'|'pt-gq'|'pt-gw'|'pt-lu'|'pt-mo'|'pt-mz'|'pt-pt'|'pt-st'|'pt-tl'|'qu'|'qu-bo'|'qu-ec'|'qu-pe'|'raj'|'raj-in'|'rm'|'rm-ch'|'rn'|'rn-bi'|'ro'|'ro-md'|'ro-ro'|'rof'|'rof-tz'|'ru'|'ru-by'|'ru-kg'|'ru-kz'|'ru-md'|'ru-ru'|'ru-ua'|'rw'|'rw-rw'|'rwk'|'rwk-tz'|'sa'|'sa-in'|'sah'|'sah-ru'|'saq'|'saq-ke'|'sat'|'sat-in'|'sbp'|'sbp-tz'|'sc'|'sc-it'|'sd'|'sd-in'|'sd-pk'|'se'|'se-fi'|'se-no'|'se-se'|'seh'|'seh-mz'|'ses'|'ses-ml'|'sg'|'sg-cf'|'shi'|'shi-ma'|'si'|'si-lk'|'sk'|'sk-sk'|'sl'|'sl-si'|'smn'|'smn-fi'|'sms'|'sms-fi'|'sn'|'sn-zw'|'so'|'so-dj'|'so-et'|'so-ke'|'so-so'|'sq'|'sq-al'|'sq-mk'|'sq-xk'|'sr'|'sr-ba'|'sr-cs'|'sr-me'|'sr-rs'|'sr-xk'|'su'|'su-id'|'sv'|'sv-ax'|'sv-fi'|'sv-se'|'sw'|'sw-cd'|'sw-ke'|'sw-tz'|'sw-ug'|'sy'|'ta'|'ta-in'|'ta-lk'|'ta-my'|'ta-sg'|'te'|'te-in'|'teo'|'teo-ke'|'teo-ug'|'tg'|'tg-tj'|'th'|'th-th'|'ti'|'ti-er'|'ti-et'|'tk'|'tk-tm'|'tl'|'to'|'to-to'|'tok'|'tok-001'|'tr'|'tr-cy'|'tr-tr'|'tt'|'tt-ru'|'twq'|'twq-ne'|'tzm'|'tzm-ma'|'ug'|'ug-cn'|'uk'|'uk-ua'|'ur'|'ur-in'|'ur-pk'|'uz'|'uz-af'|'uz-uz'|'vai'|'vai-lr'|'vi'|'vi-vn'|'vo'|'vo-001'|'vun'|'vun-tz'|'wae'|'wae-ch'|'wo'|'wo-sn'|'xh'|'xh-za'|'xog'|'xog-ug'|'yav'|'yav-cm'|'yi'|'yi-001'|'yo'|'yo-bj'|'yo-ng'|'yrl'|'yrl-br'|'yrl-co'|'yrl-ve'|'yue'|'yue-cn'|'yue-hk'|'zgh'|'zgh-ma'|'zh'|'zh-cn'|'zh-hans'|'zh-hant'|'zh-hk'|'zh-mo'|'zh-sg'|'zh-tw'|'zu'|'zu-za'|Language $language
     * @param string|\DateTimeInterface $publishDate The date and time the email is scheduled for, in ISO8601 representation. This is only used in local time or scheduled emails.
     * @param array{
     *   blogEmailType?: string,
     *   blogImageMaxWidth?: int,
     *   blogLayout?: string,
     *   hubspotBlogID?: string,
     *   maxEntries?: int,
     *   rssEntryTemplate?: string,
     *   timing?: array<string,mixed>,
     *   url?: string,
     *   useHeadlineAsSubject?: bool,
     * }|PublicRssEmailDetails $rssData RSS related data if it is a blog or rss email
     * @param bool $sendOnPublish determines whether the email will be sent immediately on publish
     * @param 'AGENT_GENERATED'|'AUTOMATED'|'AUTOMATED_AB'|'AUTOMATED_AB_VARIANT'|'AUTOMATED_DRAFT'|'AUTOMATED_DRAFT_AB'|'AUTOMATED_DRAFT_ABVARIANT'|'AUTOMATED_FOR_FORM'|'AUTOMATED_FOR_FORM_BUFFER'|'AUTOMATED_FOR_FORM_DRAFT'|'AUTOMATED_FOR_FORM_LEGACY'|'AUTOMATED_LOSER_ABVARIANT'|'AUTOMATED_SENDING'|'BLOG_EMAIL_DRAFT'|'BLOG_EMAIL_PUBLISHED'|'DRAFT'|'DRAFT_AB'|'DRAFT_AB_VARIANT'|'ERROR'|'LOSER_AB_VARIANT'|'PAGE_STUB'|'PRE_PROCESSING'|'PROCESSING'|'PUBLISHED'|'PUBLISHED_AB'|'PUBLISHED_AB_VARIANT'|'PUBLISHED_OR_SCHEDULED'|'RSS_TO_EMAIL_DRAFT'|'RSS_TO_EMAIL_PUBLISHED'|'SCHEDULED'|'SCHEDULED_AB'|'SCHEDULED_OR_PUBLISHED'|State $state the email state
     * @param 'ab_loser_variant'|'ab_loser_variant_site_page'|'ab_master'|'ab_master_site_page'|'ab_variant'|'ab_variant_site_page'|'automated'|'automated_ab_master'|'automated_ab_variant'|'automated_for_crm'|'automated_for_custom_survey'|'automated_for_deal'|'automated_for_feedback_ces'|'automated_for_feedback_custom'|'automated_for_feedback_nps'|'automated_for_form'|'automated_for_form_buffer'|'automated_for_form_draft'|'automated_for_form_legacy'|'automated_for_leadflow'|'automated_for_ticket'|'batch'|'blog_article_instance_layout'|'blog_article_listing'|'blog_author_detail'|'blog_email'|'blog_email_child'|'case_study'|'case_study_instance_layout'|'case_study_listing'|'discardable_stub'|'imported_blog_post'|'kb_404_page'|'kb_article_instance_layout'|'kb_listing'|'kb_search_results'|'kb_support_form'|'landing_page'|'legacy_blog_post'|'legacy_page'|'localtime'|'marketing_single_send_api'|'membership_email_verification'|'membership_follow_up'|'membership_otp_login'|'membership_password_reset'|'membership_password_saved'|'membership_passwordless_auth'|'membership_registration'|'membership_registration_follow_up'|'membership_verification'|'normal_blog_post'|'optin_email'|'optin_followup_email'|'page_instance_layout'|'page_stub'|'performable_landing_page'|'performable_landing_page_cutover'|'podcast_instance_layout'|'podcast_listing'|'portal_content'|'resubscribe_confirmation_email'|'resubscribe_email'|'rss_to_email'|'rss_to_email_child'|'scp_instance_layout_page'|'scp_static_page'|'single_send_api'|'site_page'|'smtp_token'|'staged_page'|'ticket_closed_kickback_email'|'ticket_opened_kickback_email'|'UNKNOWN'|'unsubscribe_confirmation_email'|'web_interactive'|Subcategory $subcategory the email subcategory
     * @param string $subject the subject of the email
     * @param array{
     *   officeLocationID?: string,
     *   preferencesGroupID?: string,
     *   subscriptionID?: string,
     *   subscriptionName?: string,
     * }|PublicEmailSubscriptionDetails $subscriptionDetails Data structure representing the subscription fields of the email
     * @param array{
     *   abSampleSizeDefault?: 'automated_loser_variant'|'automated_master'|'automated_variant'|'loser_variant'|'mab_master'|'mab_variant'|'master'|'variant'|AbSampleSizeDefault,
     *   abSamplingDefault?: 'automated_loser_variant'|'automated_master'|'automated_variant'|'loser_variant'|'mab_master'|'mab_variant'|'master'|'variant'|AbSamplingDefault,
     *   abStatus?: 'automated_loser_variant'|'automated_master'|'automated_variant'|'loser_variant'|'mab_master'|'mab_variant'|'master'|'variant'|AbStatus,
     *   abSuccessMetric?: 'CLICKS_BY_DELIVERED'|'CLICKS_BY_OPENS'|'OPENS_BY_DELIVERED'|AbSuccessMetric,
     *   abTestPercentage?: int,
     *   hoursToWait?: int,
     *   isAbVariation?: bool,
     *   testID?: string,
     * }|PublicEmailTestingDetails $testing AB testing related data. This property is only returned for AB type emails.
     * @param array{
     *   contactIDs?: array{
     *     exclude?: list<string>, include?: list<string>
     *   }|PublicEmailRecipients,
     *   contactIlsLists?: array{
     *     exclude?: list<string>, include?: list<string>
     *   }|PublicEmailRecipients,
     *   contactLists?: array{
     *     exclude?: list<string>, include?: list<string>
     *   }|PublicEmailRecipients,
     *   limitSendFrequency?: bool,
     *   suppressGraymail?: bool,
     * }|PublicEmailToDetails $to Data structure representing the to fields of the email
     * @param array{
     *   domain?: string,
     *   enabled?: bool,
     *   expiresAt?: string|\DateTimeInterface,
     *   isPageRedirected?: bool,
     *   metaDescription?: string,
     *   pageExpiryEnabled?: bool,
     *   redirectToPageID?: string,
     *   redirectToURL?: string,
     *   slug?: string,
     *   title?: string,
     *   url?: string,
     * }|PublicWebversionDetails $webversion
     *
     * @throws APIException
     */
    public function create(
        string $name,
        ?string $activeDomain = null,
        ?bool $archived = null,
        ?int $businessUnitID = null,
        ?string $campaign = null,
        array|PublicEmailContent|null $content = null,
        ?string $feedbackSurveyID = null,
        ?int $folderIDV2 = null,
        array|PublicEmailFromDetails|null $from = null,
        ?bool $jitterSendTime = null,
        string|Language|null $language = null,
        string|\DateTimeInterface|null $publishDate = null,
        array|PublicRssEmailDetails|null $rssData = null,
        ?bool $sendOnPublish = null,
        string|State|null $state = null,
        string|Subcategory|null $subcategory = null,
        ?string $subject = null,
        array|PublicEmailSubscriptionDetails|null $subscriptionDetails = null,
        array|PublicEmailTestingDetails|null $testing = null,
        array|PublicEmailToDetails|null $to = null,
        array|PublicWebversionDetails|null $webversion = null,
        ?RequestOptions $requestOptions = null,
    ): PublicEmail {
        $params = Util::removeNulls(
            [
                'name' => $name,
                'activeDomain' => $activeDomain,
                'archived' => $archived,
                'businessUnitID' => $businessUnitID,
                'campaign' => $campaign,
                'content' => $content,
                'feedbackSurveyID' => $feedbackSurveyID,
                'folderIDV2' => $folderIDV2,
                'from' => $from,
                'jitterSendTime' => $jitterSendTime,
                'language' => $language,
                'publishDate' => $publishDate,
                'rssData' => $rssData,
                'sendOnPublish' => $sendOnPublish,
                'state' => $state,
                'subcategory' => $subcategory,
                'subject' => $subject,
                'subscriptionDetails' => $subscriptionDetails,
                'testing' => $testing,
                'to' => $to,
                'webversion' => $webversion,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Change properties of a marketing email.
     *
     * @param string $emailID Path param: The ID of the marketing email that should get updated
     * @param bool $archived body param: Determines if the email is archived or not
     * @param string $activeDomain body param: The active domain of the email
     * @param int $businessUnitID Body param:
     * @param string $campaign body param: The ID of the campaign this email is associated to
     * @param array{
     *   flexAreas?: array<string,mixed>,
     *   plainTextVersion?: string,
     *   smartFields?: array<string,mixed>,
     *   styleSettings?: array{
     *     backgroundColor?: string,
     *     backgroundImage?: string,
     *     backgroundImageType?: string,
     *     bodyBorderColor?: string,
     *     bodyBorderColorChoice?: string,
     *     bodyBorderWidth?: float,
     *     bodyColor?: string,
     *     buttonStyleSettings?: array{
     *       backgroundColor?: mixed,
     *       cornerRadius?: int,
     *       fontStyle?: array{
     *         bold?: bool,
     *         color?: string,
     *         font?: string,
     *         italic?: bool,
     *         size?: int,
     *         underline?: bool,
     *       }|PublicFontStyle,
     *     }|PublicButtonStyleSettings,
     *     colorPickerFavorite1?: string,
     *     colorPickerFavorite2?: string,
     *     colorPickerFavorite3?: string,
     *     colorPickerFavorite4?: string,
     *     colorPickerFavorite5?: string,
     *     colorPickerFavorite6?: string,
     *     dividerStyleSettings?: array{
     *       color?: mixed, height?: int, lineType?: string
     *     }|PublicDividerStyleSettings,
     *     emailBodyPadding?: string,
     *     emailBodyWidth?: string,
     *     headingOneFont?: array{
     *       bold?: bool,
     *       color?: string,
     *       font?: string,
     *       italic?: bool,
     *       size?: int,
     *       underline?: bool,
     *     }|PublicFontStyle,
     *     headingTwoFont?: array{
     *       bold?: bool,
     *       color?: string,
     *       font?: string,
     *       italic?: bool,
     *       size?: int,
     *       underline?: bool,
     *     }|PublicFontStyle,
     *     linksFont?: array{
     *       bold?: bool,
     *       color?: string,
     *       font?: string,
     *       italic?: bool,
     *       size?: int,
     *       underline?: bool,
     *     }|PublicFontStyle,
     *     primaryAccentColor?: string,
     *     primaryFont?: string,
     *     primaryFontColor?: string,
     *     primaryFontLineHeight?: string,
     *     primaryFontSize?: float,
     *     secondaryAccentColor?: string,
     *     secondaryFont?: string,
     *     secondaryFontColor?: string,
     *     secondaryFontLineHeight?: string,
     *     secondaryFontSize?: float,
     *   }|PublicEmailStyleSettings,
     *   templatePath?: string,
     *   themeSettingsValues?: array<string,mixed>,
     *   widgetContainers?: array<string,mixed>,
     *   widgets?: array<string,mixed>,
     * }|PublicEmailContent $content Body param: Data structure representing the content of the email
     * @param int $folderIDV2 Body param:
     * @param array{
     *   customReplyTo?: string, fromName?: string, replyTo?: string
     * }|PublicEmailFromDetails $from Body param: Data structure representing the from fields on the email
     * @param bool $jitterSendTime Body param:
     * @param 'af'|'af-na'|'af-za'|'agq'|'agq-cm'|'ak'|'ak-gh'|'am'|'am-et'|'ann'|'ann-ng'|'ar'|'ar-001'|'ar-ae'|'ar-bh'|'ar-dj'|'ar-dz'|'ar-eg'|'ar-eh'|'ar-er'|'ar-il'|'ar-iq'|'ar-jo'|'ar-km'|'ar-kw'|'ar-lb'|'ar-ly'|'ar-ma'|'ar-mr'|'ar-om'|'ar-ps'|'ar-qa'|'ar-sa'|'ar-sd'|'ar-so'|'ar-ss'|'ar-sy'|'ar-td'|'ar-tn'|'ar-ye'|'as'|'as-in'|'asa'|'asa-tz'|'ast'|'ast-es'|'az'|'az-az'|'bas'|'bas-cm'|'be'|'be-by'|'bem'|'bem-zm'|'bez'|'bez-tz'|'bg'|'bg-bg'|'bgc'|'bgc-in'|'bho'|'bho-in'|'bm'|'bm-ml'|'bn'|'bn-bd'|'bn-in'|'bo'|'bo-cn'|'bo-in'|'br'|'br-fr'|'brx'|'brx-in'|'bs'|'bs-ba'|'ca'|'ca-ad'|'ca-es'|'ca-fr'|'ca-it'|'ccp'|'ccp-bd'|'ccp-in'|'ce'|'ce-ru'|'ceb'|'ceb-ph'|'cgg'|'cgg-ug'|'chr'|'chr-us'|'ckb'|'ckb-iq'|'ckb-ir'|'cs'|'cs-cz'|'cu'|'cu-ru'|'cv'|'cv-ru'|'cy'|'cy-gb'|'da'|'da-dk'|'da-gl'|'dav'|'dav-ke'|'de'|'de-at'|'de-be'|'de-ch'|'de-de'|'de-gr'|'de-it'|'de-li'|'de-lu'|'dje'|'dje-ne'|'doi'|'doi-in'|'dsb'|'dsb-de'|'dua'|'dua-cm'|'dyo'|'dyo-sn'|'dz'|'dz-bt'|'ebu'|'ebu-ke'|'ee'|'ee-gh'|'ee-tg'|'el'|'el-cy'|'el-gr'|'en'|'en-001'|'en-150'|'en-ae'|'en-ag'|'en-ai'|'en-as'|'en-at'|'en-au'|'en-bb'|'en-be'|'en-bi'|'en-bm'|'en-bs'|'en-bw'|'en-bz'|'en-ca'|'en-cc'|'en-ch'|'en-ck'|'en-cm'|'en-cn'|'en-cx'|'en-cy'|'en-de'|'en-dg'|'en-dk'|'en-dm'|'en-ee'|'en-eg'|'en-er'|'en-es'|'en-fi'|'en-fj'|'en-fk'|'en-fm'|'en-fr'|'en-gb'|'en-gd'|'en-gg'|'en-gh'|'en-gi'|'en-gm'|'en-gu'|'en-gy'|'en-hk'|'en-ie'|'en-il'|'en-im'|'en-in'|'en-io'|'en-je'|'en-jm'|'en-ke'|'en-ki'|'en-kn'|'en-ky'|'en-lc'|'en-lr'|'en-ls'|'en-lu'|'en-mg'|'en-mh'|'en-mo'|'en-mp'|'en-ms'|'en-mt'|'en-mu'|'en-mv'|'en-mw'|'en-mx'|'en-my'|'en-na'|'en-nf'|'en-ng'|'en-nl'|'en-nr'|'en-nu'|'en-nz'|'en-pg'|'en-ph'|'en-pk'|'en-pn'|'en-pr'|'en-pt'|'en-pw'|'en-rw'|'en-sb'|'en-sc'|'en-sd'|'en-se'|'en-sg'|'en-sh'|'en-si'|'en-sl'|'en-ss'|'en-sx'|'en-sz'|'en-tc'|'en-tk'|'en-tn'|'en-to'|'en-tt'|'en-tv'|'en-tz'|'en-ug'|'en-um'|'en-us'|'en-vc'|'en-vg'|'en-vi'|'en-vu'|'en-ws'|'en-za'|'en-zm'|'en-zw'|'eo'|'eo-001'|'es'|'es-419'|'es-ar'|'es-bo'|'es-br'|'es-bz'|'es-cl'|'es-co'|'es-cr'|'es-cu'|'es-do'|'es-ea'|'es-ec'|'es-es'|'es-gq'|'es-gt'|'es-hn'|'es-ic'|'es-mx'|'es-ni'|'es-pa'|'es-pe'|'es-ph'|'es-pr'|'es-py'|'es-sv'|'es-us'|'es-uy'|'es-ve'|'et'|'et-ee'|'eu'|'eu-es'|'ewo'|'ewo-cm'|'fa'|'fa-af'|'fa-ir'|'ff'|'ff-bf'|'ff-cm'|'ff-gh'|'ff-gm'|'ff-gn'|'ff-gw'|'ff-lr'|'ff-mr'|'ff-ne'|'ff-ng'|'ff-sl'|'ff-sn'|'fi'|'fi-fi'|'fil'|'fil-ph'|'fo'|'fo-dk'|'fo-fo'|'fr'|'fr-be'|'fr-bf'|'fr-bi'|'fr-bj'|'fr-bl'|'fr-ca'|'fr-cd'|'fr-cf'|'fr-cg'|'fr-ch'|'fr-ci'|'fr-cm'|'fr-dj'|'fr-dz'|'fr-fr'|'fr-ga'|'fr-gf'|'fr-gn'|'fr-gp'|'fr-gq'|'fr-ht'|'fr-km'|'fr-lu'|'fr-ma'|'fr-mc'|'fr-mf'|'fr-mg'|'fr-ml'|'fr-mq'|'fr-mr'|'fr-mu'|'fr-nc'|'fr-ne'|'fr-pf'|'fr-pm'|'fr-re'|'fr-rw'|'fr-sc'|'fr-sn'|'fr-sy'|'fr-td'|'fr-tg'|'fr-tn'|'fr-vu'|'fr-wf'|'fr-yt'|'frr'|'frr-de'|'fur'|'fur-it'|'fy'|'fy-nl'|'ga'|'ga-gb'|'ga-ie'|'gd'|'gd-gb'|'gl'|'gl-es'|'gsw'|'gsw-ch'|'gsw-fr'|'gsw-li'|'gu'|'gu-in'|'guz'|'guz-ke'|'gv'|'gv-im'|'ha'|'ha-gh'|'ha-ne'|'ha-ng'|'haw'|'haw-us'|'he'|'he-il'|'hi'|'hi-in'|'hr'|'hr-ba'|'hr-hr'|'hsb'|'hsb-de'|'hu'|'hu-hu'|'hy'|'hy-am'|'ia'|'ia-001'|'id'|'id-id'|'ig'|'ig-ng'|'ii'|'ii-cn'|'is'|'is-is'|'it'|'it-ch'|'it-it'|'it-sm'|'it-va'|'ja'|'ja-jp'|'jgo'|'jgo-cm'|'jmc'|'jmc-tz'|'jv'|'jv-id'|'ka'|'ka-ge'|'kab'|'kab-dz'|'kam'|'kam-ke'|'kde'|'kde-tz'|'kea'|'kea-cv'|'kgp'|'kgp-br'|'kh'|'khq'|'khq-ml'|'ki'|'ki-ke'|'kk'|'kk-kz'|'kkj'|'kkj-cm'|'kl'|'kl-gl'|'kln'|'kln-ke'|'km'|'km-kh'|'kn'|'kn-in'|'ko'|'ko-kp'|'ko-kr'|'kok'|'kok-in'|'ks'|'ks-in'|'ksb'|'ksb-tz'|'ksf'|'ksf-cm'|'ksh'|'ksh-de'|'ku'|'ku-tr'|'kw'|'kw-gb'|'ky'|'ky-kg'|'lag'|'lag-tz'|'lb'|'lb-lu'|'lg'|'lg-ug'|'lkt'|'lkt-us'|'ln'|'ln-ao'|'ln-cd'|'ln-cf'|'ln-cg'|'lo'|'lo-la'|'lrc'|'lrc-iq'|'lrc-ir'|'lt'|'lt-lt'|'lu'|'lu-cd'|'luo'|'luo-ke'|'luy'|'luy-ke'|'lv'|'lv-lv'|'mai'|'mai-in'|'mas'|'mas-ke'|'mas-tz'|'mdf'|'mdf-ru'|'mer'|'mer-ke'|'mfe'|'mfe-mu'|'mg'|'mg-mg'|'mgh'|'mgh-mz'|'mgo'|'mgo-cm'|'mi'|'mi-nz'|'mk'|'mk-mk'|'ml'|'ml-in'|'mn'|'mn-mn'|'mni'|'mni-in'|'mr'|'mr-in'|'ms'|'ms-bn'|'ms-id'|'ms-my'|'ms-sg'|'mt'|'mt-mt'|'mua'|'mua-cm'|'my'|'my-mm'|'mzn'|'mzn-ir'|'naq'|'naq-na'|'nb'|'nb-no'|'nb-sj'|'nd'|'nd-zw'|'nds'|'nds-de'|'nds-nl'|'ne'|'ne-in'|'ne-np'|'nl'|'nl-aw'|'nl-be'|'nl-bq'|'nl-ch'|'nl-cw'|'nl-lu'|'nl-nl'|'nl-sr'|'nl-sx'|'nmg'|'nmg-cm'|'nn'|'nn-no'|'nnh'|'nnh-cm'|'no'|'no-no'|'nus'|'nus-ss'|'nyn'|'nyn-ug'|'oc'|'oc-es'|'oc-fr'|'om'|'om-et'|'om-ke'|'or'|'or-in'|'os'|'os-ge'|'os-ru'|'pa'|'pa-in'|'pa-pk'|'pcm'|'pcm-ng'|'pis'|'pis-sb'|'pl'|'pl-pl'|'prg'|'prg-001'|'ps'|'ps-af'|'ps-pk'|'pt'|'pt-ao'|'pt-br'|'pt-ch'|'pt-cv'|'pt-gq'|'pt-gw'|'pt-lu'|'pt-mo'|'pt-mz'|'pt-pt'|'pt-st'|'pt-tl'|'qu'|'qu-bo'|'qu-ec'|'qu-pe'|'raj'|'raj-in'|'rm'|'rm-ch'|'rn'|'rn-bi'|'ro'|'ro-md'|'ro-ro'|'rof'|'rof-tz'|'ru'|'ru-by'|'ru-kg'|'ru-kz'|'ru-md'|'ru-ru'|'ru-ua'|'rw'|'rw-rw'|'rwk'|'rwk-tz'|'sa'|'sa-in'|'sah'|'sah-ru'|'saq'|'saq-ke'|'sat'|'sat-in'|'sbp'|'sbp-tz'|'sc'|'sc-it'|'sd'|'sd-in'|'sd-pk'|'se'|'se-fi'|'se-no'|'se-se'|'seh'|'seh-mz'|'ses'|'ses-ml'|'sg'|'sg-cf'|'shi'|'shi-ma'|'si'|'si-lk'|'sk'|'sk-sk'|'sl'|'sl-si'|'smn'|'smn-fi'|'sms'|'sms-fi'|'sn'|'sn-zw'|'so'|'so-dj'|'so-et'|'so-ke'|'so-so'|'sq'|'sq-al'|'sq-mk'|'sq-xk'|'sr'|'sr-ba'|'sr-cs'|'sr-me'|'sr-rs'|'sr-xk'|'su'|'su-id'|'sv'|'sv-ax'|'sv-fi'|'sv-se'|'sw'|'sw-cd'|'sw-ke'|'sw-tz'|'sw-ug'|'sy'|'ta'|'ta-in'|'ta-lk'|'ta-my'|'ta-sg'|'te'|'te-in'|'teo'|'teo-ke'|'teo-ug'|'tg'|'tg-tj'|'th'|'th-th'|'ti'|'ti-er'|'ti-et'|'tk'|'tk-tm'|'tl'|'to'|'to-to'|'tok'|'tok-001'|'tr'|'tr-cy'|'tr-tr'|'tt'|'tt-ru'|'twq'|'twq-ne'|'tzm'|'tzm-ma'|'ug'|'ug-cn'|'uk'|'uk-ua'|'ur'|'ur-in'|'ur-pk'|'uz'|'uz-af'|'uz-uz'|'vai'|'vai-lr'|'vi'|'vi-vn'|'vo'|'vo-001'|'vun'|'vun-tz'|'wae'|'wae-ch'|'wo'|'wo-sn'|'xh'|'xh-za'|'xog'|'xog-ug'|'yav'|'yav-cm'|'yi'|'yi-001'|'yo'|'yo-bj'|'yo-ng'|'yrl'|'yrl-br'|'yrl-co'|'yrl-ve'|'yue'|'yue-cn'|'yue-hk'|'zgh'|'zgh-ma'|'zh'|'zh-cn'|'zh-hans'|'zh-hant'|'zh-hk'|'zh-mo'|'zh-sg'|'zh-tw'|'zu'|'zu-za'|\HubspotSDK\Marketing\Emails\EmailUpdateParams\Language $language Body param:
     * @param string $name body param: The name of the email, as displayed on the email dashboard
     * @param string|\DateTimeInterface $publishDate Body param: The date and time the email is scheduled for, in ISO8601 representation. This is only used in local time or scheduled emails.
     * @param array{
     *   blogEmailType?: string,
     *   blogImageMaxWidth?: int,
     *   blogLayout?: string,
     *   hubspotBlogID?: string,
     *   maxEntries?: int,
     *   rssEntryTemplate?: string,
     *   timing?: array<string,mixed>,
     *   url?: string,
     *   useHeadlineAsSubject?: bool,
     * }|PublicRssEmailDetails $rssData Body param: RSS related data if it is a blog or rss email
     * @param bool $sendOnPublish body param: Determines whether the email will be sent immediately on publish
     * @param 'AGENT_GENERATED'|'AUTOMATED'|'AUTOMATED_AB'|'AUTOMATED_AB_VARIANT'|'AUTOMATED_DRAFT'|'AUTOMATED_DRAFT_AB'|'AUTOMATED_DRAFT_ABVARIANT'|'AUTOMATED_FOR_FORM'|'AUTOMATED_FOR_FORM_BUFFER'|'AUTOMATED_FOR_FORM_DRAFT'|'AUTOMATED_FOR_FORM_LEGACY'|'AUTOMATED_LOSER_ABVARIANT'|'AUTOMATED_SENDING'|'BLOG_EMAIL_DRAFT'|'BLOG_EMAIL_PUBLISHED'|'DRAFT'|'DRAFT_AB'|'DRAFT_AB_VARIANT'|'ERROR'|'LOSER_AB_VARIANT'|'PAGE_STUB'|'PRE_PROCESSING'|'PROCESSING'|'PUBLISHED'|'PUBLISHED_AB'|'PUBLISHED_AB_VARIANT'|'PUBLISHED_OR_SCHEDULED'|'RSS_TO_EMAIL_DRAFT'|'RSS_TO_EMAIL_PUBLISHED'|'SCHEDULED'|'SCHEDULED_AB'|'SCHEDULED_OR_PUBLISHED'|\HubspotSDK\Marketing\Emails\EmailUpdateParams\State $state body param: The email state
     * @param 'ab_loser_variant'|'ab_loser_variant_site_page'|'ab_master'|'ab_master_site_page'|'ab_variant'|'ab_variant_site_page'|'automated'|'automated_ab_master'|'automated_ab_variant'|'automated_for_crm'|'automated_for_custom_survey'|'automated_for_deal'|'automated_for_feedback_ces'|'automated_for_feedback_custom'|'automated_for_feedback_nps'|'automated_for_form'|'automated_for_form_buffer'|'automated_for_form_draft'|'automated_for_form_legacy'|'automated_for_leadflow'|'automated_for_ticket'|'batch'|'blog_article_instance_layout'|'blog_article_listing'|'blog_author_detail'|'blog_email'|'blog_email_child'|'case_study'|'case_study_instance_layout'|'case_study_listing'|'discardable_stub'|'imported_blog_post'|'kb_404_page'|'kb_article_instance_layout'|'kb_listing'|'kb_search_results'|'kb_support_form'|'landing_page'|'legacy_blog_post'|'legacy_page'|'localtime'|'marketing_single_send_api'|'membership_email_verification'|'membership_follow_up'|'membership_otp_login'|'membership_password_reset'|'membership_password_saved'|'membership_passwordless_auth'|'membership_registration'|'membership_registration_follow_up'|'membership_verification'|'normal_blog_post'|'optin_email'|'optin_followup_email'|'page_instance_layout'|'page_stub'|'performable_landing_page'|'performable_landing_page_cutover'|'podcast_instance_layout'|'podcast_listing'|'portal_content'|'resubscribe_confirmation_email'|'resubscribe_email'|'rss_to_email'|'rss_to_email_child'|'scp_instance_layout_page'|'scp_static_page'|'single_send_api'|'site_page'|'smtp_token'|'staged_page'|'ticket_closed_kickback_email'|'ticket_opened_kickback_email'|'UNKNOWN'|'unsubscribe_confirmation_email'|'web_interactive'|\HubspotSDK\Marketing\Emails\EmailUpdateParams\Subcategory $subcategory body param: The email subcategory
     * @param string $subject body param: The subject of the email
     * @param array{
     *   officeLocationID?: string,
     *   preferencesGroupID?: string,
     *   subscriptionID?: string,
     *   subscriptionName?: string,
     * }|PublicEmailSubscriptionDetails $subscriptionDetails Body param: Data structure representing the subscription fields of the email
     * @param array{
     *   abSampleSizeDefault?: 'automated_loser_variant'|'automated_master'|'automated_variant'|'loser_variant'|'mab_master'|'mab_variant'|'master'|'variant'|AbSampleSizeDefault,
     *   abSamplingDefault?: 'automated_loser_variant'|'automated_master'|'automated_variant'|'loser_variant'|'mab_master'|'mab_variant'|'master'|'variant'|AbSamplingDefault,
     *   abStatus?: 'automated_loser_variant'|'automated_master'|'automated_variant'|'loser_variant'|'mab_master'|'mab_variant'|'master'|'variant'|AbStatus,
     *   abSuccessMetric?: 'CLICKS_BY_DELIVERED'|'CLICKS_BY_OPENS'|'OPENS_BY_DELIVERED'|AbSuccessMetric,
     *   abTestPercentage?: int,
     *   hoursToWait?: int,
     *   isAbVariation?: bool,
     *   testID?: string,
     * }|PublicEmailTestingDetails $testing Body param: AB testing related data. This property is only returned for AB type emails.
     * @param array{
     *   contactIDs?: array{
     *     exclude?: list<string>, include?: list<string>
     *   }|PublicEmailRecipients,
     *   contactIlsLists?: array{
     *     exclude?: list<string>, include?: list<string>
     *   }|PublicEmailRecipients,
     *   contactLists?: array{
     *     exclude?: list<string>, include?: list<string>
     *   }|PublicEmailRecipients,
     *   limitSendFrequency?: bool,
     *   suppressGraymail?: bool,
     * }|PublicEmailToDetails $to Body param: Data structure representing the to fields of the email
     * @param array{
     *   domain?: string,
     *   enabled?: bool,
     *   expiresAt?: string|\DateTimeInterface,
     *   isPageRedirected?: bool,
     *   metaDescription?: string,
     *   pageExpiryEnabled?: bool,
     *   redirectToPageID?: string,
     *   redirectToURL?: string,
     *   slug?: string,
     *   title?: string,
     *   url?: string,
     * }|PublicWebversionDetails $webversion Body param:
     *
     * @throws APIException
     */
    public function update(
        string $emailID,
        ?bool $archived = null,
        ?string $activeDomain = null,
        ?int $businessUnitID = null,
        ?string $campaign = null,
        array|PublicEmailContent|null $content = null,
        ?int $folderIDV2 = null,
        array|PublicEmailFromDetails|null $from = null,
        ?bool $jitterSendTime = null,
        string|\HubspotSDK\Marketing\Emails\EmailUpdateParams\Language|null $language = null,
        ?string $name = null,
        string|\DateTimeInterface|null $publishDate = null,
        array|PublicRssEmailDetails|null $rssData = null,
        ?bool $sendOnPublish = null,
        string|\HubspotSDK\Marketing\Emails\EmailUpdateParams\State|null $state = null,
        string|\HubspotSDK\Marketing\Emails\EmailUpdateParams\Subcategory|null $subcategory = null,
        ?string $subject = null,
        array|PublicEmailSubscriptionDetails|null $subscriptionDetails = null,
        array|PublicEmailTestingDetails|null $testing = null,
        array|PublicEmailToDetails|null $to = null,
        array|PublicWebversionDetails|null $webversion = null,
        ?RequestOptions $requestOptions = null,
    ): PublicEmail {
        $params = Util::removeNulls(
            [
                'archived' => $archived,
                'activeDomain' => $activeDomain,
                'businessUnitID' => $businessUnitID,
                'campaign' => $campaign,
                'content' => $content,
                'folderIDV2' => $folderIDV2,
                'from' => $from,
                'jitterSendTime' => $jitterSendTime,
                'language' => $language,
                'name' => $name,
                'publishDate' => $publishDate,
                'rssData' => $rssData,
                'sendOnPublish' => $sendOnPublish,
                'state' => $state,
                'subcategory' => $subcategory,
                'subject' => $subject,
                'subscriptionDetails' => $subscriptionDetails,
                'testing' => $testing,
                'to' => $to,
                'webversion' => $webversion,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($emailID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * The results can be filtered, allowing you to find a specific set of emails. See the table below for a full list of filtering options.
     *
     * @param string $after The cursor token value to get the next set of results. You can get this from the `paging.next.after` JSON property of a paged response containing more results.
     * @param bool $archived Specifies whether to return archived emails. Defaults to `false`.
     * @param string $campaign Filter by campaign GUID. All emails will be returned if not present.
     * @param string|\DateTimeInterface $createdAfter only return emails created after the specified time
     * @param string|\DateTimeInterface $createdAt only return emails created at exactly the specified time
     * @param string|\DateTimeInterface $createdBefore only return emails created before the specified time
     * @param list<string> $includedProperties limit the response to only include this specified list of properties
     * @param bool $includeStats include statistics with emails
     * @param bool $isPublished Filter by published/draft emails. All emails will be returned if not present.
     * @param int $limit The maximum number of results to return. Default is 10.
     * @param bool $marketingCampaignNames include the names for any associated marketing campaigns
     * @param list<string> $sort Specifies which fields to use for sorting results. Valid fields are `name`, `createdAt`, `updatedAt`, `createdBy`, `updatedBy`. `createdAt` will be used by default.
     * @param 'AB_EMAIL'|'AUTOMATED_AB_EMAIL'|'AUTOMATED_EMAIL'|'BATCH_EMAIL'|'BLOG_EMAIL'|'BLOG_EMAIL_CHILD'|'FEEDBACK_CES_EMAIL'|'FEEDBACK_CUSTOM_EMAIL'|'FEEDBACK_CUSTOM_SURVEY_EMAIL'|'FEEDBACK_NPS_EMAIL'|'FOLLOWUP_EMAIL'|'LEADFLOW_EMAIL'|'LOCALTIME_EMAIL'|'MARKETING_SINGLE_SEND_API'|'MEMBERSHIP_EMAIL_VERIFICATION_EMAIL'|'MEMBERSHIP_FOLLOW_UP_EMAIL'|'MEMBERSHIP_OTP_LOGIN_EMAIL'|'MEMBERSHIP_PASSWORD_RESET_EMAIL'|'MEMBERSHIP_PASSWORD_SAVED_EMAIL'|'MEMBERSHIP_PASSWORDLESS_AUTH_EMAIL'|'MEMBERSHIP_REGISTRATION_EMAIL'|'MEMBERSHIP_REGISTRATION_FOLLOW_UP_EMAIL'|'MEMBERSHIP_VERIFICATION_EMAIL'|'OPTIN_EMAIL'|'OPTIN_FOLLOWUP_EMAIL'|'RESUBSCRIBE_EMAIL'|'RSS_EMAIL'|'RSS_EMAIL_CHILD'|'SINGLE_SEND_API'|'SMTP_TOKEN'|'TICKET_EMAIL'|Type $type Email types to be filtered by. Multiple types can be included. All emails will be returned if not present.
     * @param string|\DateTimeInterface $updatedAfter only return emails last updated after the specified time
     * @param string|\DateTimeInterface $updatedAt only return emails last updated at exactly the specified time
     * @param string|\DateTimeInterface $updatedBefore only return emails last updated before the specified time
     * @param bool $workflowNames include the names of any workflows associated with the returned emails
     *
     * @return Page<PublicEmail>
     *
     * @throws APIException
     */
    public function list(
        ?string $after = null,
        ?bool $archived = null,
        ?string $campaign = null,
        string|\DateTimeInterface|null $createdAfter = null,
        string|\DateTimeInterface|null $createdAt = null,
        string|\DateTimeInterface|null $createdBefore = null,
        ?array $includedProperties = null,
        ?bool $includeStats = null,
        ?bool $isPublished = null,
        ?int $limit = null,
        ?bool $marketingCampaignNames = null,
        string|\DateTimeInterface|null $publishedAfter = null,
        string|\DateTimeInterface|null $publishedAt = null,
        string|\DateTimeInterface|null $publishedBefore = null,
        ?array $sort = null,
        string|Type|null $type = null,
        string|\DateTimeInterface|null $updatedAfter = null,
        string|\DateTimeInterface|null $updatedAt = null,
        string|\DateTimeInterface|null $updatedBefore = null,
        ?bool $workflowNames = null,
        ?RequestOptions $requestOptions = null,
    ): Page {
        $params = Util::removeNulls(
            [
                'after' => $after,
                'archived' => $archived,
                'campaign' => $campaign,
                'createdAfter' => $createdAfter,
                'createdAt' => $createdAt,
                'createdBefore' => $createdBefore,
                'includedProperties' => $includedProperties,
                'includeStats' => $includeStats,
                'isPublished' => $isPublished,
                'limit' => $limit,
                'marketingCampaignNames' => $marketingCampaignNames,
                'publishedAfter' => $publishedAfter,
                'publishedAt' => $publishedAt,
                'publishedBefore' => $publishedBefore,
                'sort' => $sort,
                'type' => $type,
                'updatedAfter' => $updatedAfter,
                'updatedAt' => $updatedAt,
                'updatedBefore' => $updatedBefore,
                'workflowNames' => $workflowNames,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete a marketing email by its ID
     *
     * @param string $emailID the ID of the marketing email to delete
     * @param bool $archived whether to return only results that have been archived
     *
     * @throws APIException
     */
    public function delete(
        string $emailID,
        ?bool $archived = null,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(['archived' => $archived]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($emailID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * This will create a duplicate email with the same properties as the original, with the exception of a unique ID.
     *
     * @param string $id the unique identifier of the email to be cloned
     * @param string $cloneName the name to assign to the cloned email
     * @param string $language the language code for the cloned email, such as 'en' for English
     *
     * @throws APIException
     */
    public function clone(
        string $id,
        ?string $cloneName = null,
        ?string $language = null,
        ?RequestOptions $requestOptions = null,
    ): PublicEmail {
        $params = Util::removeNulls(
            ['id' => $id, 'cloneName' => $cloneName, 'language' => $language]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->clone(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Create a variation of a marketing email for an A/B test. The new variation will be created as a draft. If an active variation already exists, a new one won't be created.
     *
     * @param string $contentID ID of the object to test
     * @param string $variationName name of A/B test variation
     *
     * @throws APIException
     */
    public function createAbTestVariation(
        string $contentID,
        string $variationName,
        ?RequestOptions $requestOptions = null,
    ): PublicEmail {
        $params = Util::removeNulls(
            ['contentID' => $contentID, 'variationName' => $variationName]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createAbTestVariation(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get the details for a marketing email.
     *
     * @param string $emailID the marketing email ID
     * @param bool $archived whether to return only results that have been archived
     * @param list<string> $includedProperties limit the response to only include the specified properties
     * @param bool $includeStats include statistics with email
     * @param bool $marketingCampaignNames if set to true, loads `campaignName` and `campaignUtm`
     * @param bool $workflowNames if set to true, loads workflows in which the email is used within a "send email" action
     *
     * @throws APIException
     */
    public function get(
        string $emailID,
        ?bool $archived = null,
        ?array $includedProperties = null,
        ?bool $includeStats = null,
        ?bool $marketingCampaignNames = null,
        ?bool $workflowNames = null,
        ?RequestOptions $requestOptions = null,
    ): PublicEmail {
        $params = Util::removeNulls(
            [
                'archived' => $archived,
                'includedProperties' => $includedProperties,
                'includeStats' => $includeStats,
                'marketingCampaignNames' => $marketingCampaignNames,
                'workflowNames' => $workflowNames,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get($emailID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * This endpoint lets you obtain the variation of an A/B marketing email. If the email is variation A (master) it will return variation B (variant) and vice versa.
     *
     * @param string $emailID the ID of an A/B marketing email
     * @param bool $archived Boolean variable to request archived email
     * @param list<string> $includedProperties List of properties to be returned in the API response
     * @param bool $includeStats Boolean variable to request stats to be returned in response
     * @param bool $marketingCampaignNames Boolean variable to request name of the campaign in response
     * @param bool $workflowNames Boolean variable to request name of the associated workflows in response
     *
     * @throws APIException
     */
    public function getAbTestVariation(
        string $emailID,
        ?bool $archived = null,
        ?array $includedProperties = null,
        ?bool $includeStats = null,
        ?bool $marketingCampaignNames = null,
        ?bool $workflowNames = null,
        ?RequestOptions $requestOptions = null,
    ): PublicEmail {
        $params = Util::removeNulls(
            [
                'archived' => $archived,
                'includedProperties' => $includedProperties,
                'includeStats' => $includeStats,
                'marketingCampaignNames' => $marketingCampaignNames,
                'workflowNames' => $workflowNames,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getAbTestVariation($emailID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get the draft version of an email (if it exists). If no draft version exists, the published email is returned.
     *
     * @param string $emailID the marketing email ID
     *
     * @throws APIException
     */
    public function getDraft(
        string $emailID,
        ?RequestOptions $requestOptions = null
    ): PublicEmail {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getDraft($emailID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get a specific revision of a marketing email.
     *
     * @param string $revisionID the ID of a revision
     * @param string $emailID the marketing email ID
     *
     * @throws APIException
     */
    public function getRevision(
        string $revisionID,
        string $emailID,
        ?RequestOptions $requestOptions = null
    ): VersionPublicEmail {
        $params = Util::removeNulls(['emailID' => $emailID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getRevision($revisionID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get a list of all versions of a marketing email, with each entry including the full state of that particular version. To view the most recent version, sort by the updatedAt parameter.
     *
     * @param string $emailID the marketing email ID
     * @param string $after The cursor token value to get the next set of results. You can get this from the `paging.next.after` JSON property of a paged response containing more results.
     * @param string $before The cursor token value to get the previous set of results. You can get this from the `paging.prev.before` JSON property of a paged response containing more results.
     * @param int $limit The maximum number of results to return. Default is 10.
     *
     * @return Page<VersionPublicEmail>
     *
     * @throws APIException
     */
    public function listRevisions(
        string $emailID,
        ?string $after = null,
        ?string $before = null,
        ?int $limit = null,
        ?RequestOptions $requestOptions = null,
    ): Page {
        $params = Util::removeNulls(
            ['after' => $after, 'before' => $before, 'limit' => $limit]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listRevisions($emailID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * If you have a Marketing Hub Enterprise account or the transactional email add-on, you can use this endpoint to publish an automated email or send/schedule a regular email.
     *
     * @param string $emailID the marketing email ID
     *
     * @throws APIException
     */
    public function publish(
        string $emailID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->publish($emailID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Resets the draft back to a copy of the live object.
     *
     * @param string $emailID the marketing email ID
     *
     * @throws APIException
     */
    public function resetDraft(
        string $emailID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->resetDraft($emailID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Restores a previous revision of a marketing email. The current revision becomes old, and the restored revision is given a new version number.
     *
     * @param string $revisionID the ID of a revision
     * @param string $emailID the marketing email ID
     *
     * @throws APIException
     */
    public function restoreRevision(
        string $revisionID,
        string $emailID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = Util::removeNulls(['emailID' => $emailID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->restoreRevision($revisionID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Restores a previous revision of a marketing email to DRAFT state. If there is currently something in the draft for that object, it is overwritten.
     *
     * @param int $revisionID the ID of a revision
     * @param string $emailID the marketing email ID
     *
     * @throws APIException
     */
    public function restoreRevisionToDraft(
        int $revisionID,
        string $emailID,
        ?RequestOptions $requestOptions = null
    ): PublicEmail {
        $params = Util::removeNulls(['emailID' => $emailID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->restoreRevisionToDraft($revisionID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * If you have a Marketing Hub Enterprise account or the transactional email add-on, you can use this endpoint to unpublish an automated email or cancel a regular email. If the email is already in the process of being sent, canceling might not be possible.
     *
     * @param string $emailID the ID of the email to unpublish
     *
     * @throws APIException
     */
    public function unpublish(
        string $emailID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->unpublish($emailID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Create or update the draft version of a marketing email. If no draft exists, the system creates a draft from the current “live” email then applies the request body to that draft. The draft version only lives on the buffer—the email is not cloned.
     *
     * @param string $emailID the marketing email ID
     * @param string $activeDomain the active domain of the email
     * @param bool $archived determines if the email is archived or not
     * @param string $campaign the ID of the campaign this email is associated to
     * @param array{
     *   flexAreas?: array<string,mixed>,
     *   plainTextVersion?: string,
     *   smartFields?: array<string,mixed>,
     *   styleSettings?: array{
     *     backgroundColor?: string,
     *     backgroundImage?: string,
     *     backgroundImageType?: string,
     *     bodyBorderColor?: string,
     *     bodyBorderColorChoice?: string,
     *     bodyBorderWidth?: float,
     *     bodyColor?: string,
     *     buttonStyleSettings?: array{
     *       backgroundColor?: mixed,
     *       cornerRadius?: int,
     *       fontStyle?: array{
     *         bold?: bool,
     *         color?: string,
     *         font?: string,
     *         italic?: bool,
     *         size?: int,
     *         underline?: bool,
     *       }|PublicFontStyle,
     *     }|PublicButtonStyleSettings,
     *     colorPickerFavorite1?: string,
     *     colorPickerFavorite2?: string,
     *     colorPickerFavorite3?: string,
     *     colorPickerFavorite4?: string,
     *     colorPickerFavorite5?: string,
     *     colorPickerFavorite6?: string,
     *     dividerStyleSettings?: array{
     *       color?: mixed, height?: int, lineType?: string
     *     }|PublicDividerStyleSettings,
     *     emailBodyPadding?: string,
     *     emailBodyWidth?: string,
     *     headingOneFont?: array{
     *       bold?: bool,
     *       color?: string,
     *       font?: string,
     *       italic?: bool,
     *       size?: int,
     *       underline?: bool,
     *     }|PublicFontStyle,
     *     headingTwoFont?: array{
     *       bold?: bool,
     *       color?: string,
     *       font?: string,
     *       italic?: bool,
     *       size?: int,
     *       underline?: bool,
     *     }|PublicFontStyle,
     *     linksFont?: array{
     *       bold?: bool,
     *       color?: string,
     *       font?: string,
     *       italic?: bool,
     *       size?: int,
     *       underline?: bool,
     *     }|PublicFontStyle,
     *     primaryAccentColor?: string,
     *     primaryFont?: string,
     *     primaryFontColor?: string,
     *     primaryFontLineHeight?: string,
     *     primaryFontSize?: float,
     *     secondaryAccentColor?: string,
     *     secondaryFont?: string,
     *     secondaryFontColor?: string,
     *     secondaryFontLineHeight?: string,
     *     secondaryFontSize?: float,
     *   }|PublicEmailStyleSettings,
     *   templatePath?: string,
     *   themeSettingsValues?: array<string,mixed>,
     *   widgetContainers?: array<string,mixed>,
     *   widgets?: array<string,mixed>,
     * }|PublicEmailContent $content Data structure representing the content of the email
     * @param array{
     *   customReplyTo?: string, fromName?: string, replyTo?: string
     * }|PublicEmailFromDetails $from Data structure representing the from fields on the email
     * @param 'af'|'af-na'|'af-za'|'agq'|'agq-cm'|'ak'|'ak-gh'|'am'|'am-et'|'ann'|'ann-ng'|'ar'|'ar-001'|'ar-ae'|'ar-bh'|'ar-dj'|'ar-dz'|'ar-eg'|'ar-eh'|'ar-er'|'ar-il'|'ar-iq'|'ar-jo'|'ar-km'|'ar-kw'|'ar-lb'|'ar-ly'|'ar-ma'|'ar-mr'|'ar-om'|'ar-ps'|'ar-qa'|'ar-sa'|'ar-sd'|'ar-so'|'ar-ss'|'ar-sy'|'ar-td'|'ar-tn'|'ar-ye'|'as'|'as-in'|'asa'|'asa-tz'|'ast'|'ast-es'|'az'|'az-az'|'bas'|'bas-cm'|'be'|'be-by'|'bem'|'bem-zm'|'bez'|'bez-tz'|'bg'|'bg-bg'|'bgc'|'bgc-in'|'bho'|'bho-in'|'bm'|'bm-ml'|'bn'|'bn-bd'|'bn-in'|'bo'|'bo-cn'|'bo-in'|'br'|'br-fr'|'brx'|'brx-in'|'bs'|'bs-ba'|'ca'|'ca-ad'|'ca-es'|'ca-fr'|'ca-it'|'ccp'|'ccp-bd'|'ccp-in'|'ce'|'ce-ru'|'ceb'|'ceb-ph'|'cgg'|'cgg-ug'|'chr'|'chr-us'|'ckb'|'ckb-iq'|'ckb-ir'|'cs'|'cs-cz'|'cu'|'cu-ru'|'cv'|'cv-ru'|'cy'|'cy-gb'|'da'|'da-dk'|'da-gl'|'dav'|'dav-ke'|'de'|'de-at'|'de-be'|'de-ch'|'de-de'|'de-gr'|'de-it'|'de-li'|'de-lu'|'dje'|'dje-ne'|'doi'|'doi-in'|'dsb'|'dsb-de'|'dua'|'dua-cm'|'dyo'|'dyo-sn'|'dz'|'dz-bt'|'ebu'|'ebu-ke'|'ee'|'ee-gh'|'ee-tg'|'el'|'el-cy'|'el-gr'|'en'|'en-001'|'en-150'|'en-ae'|'en-ag'|'en-ai'|'en-as'|'en-at'|'en-au'|'en-bb'|'en-be'|'en-bi'|'en-bm'|'en-bs'|'en-bw'|'en-bz'|'en-ca'|'en-cc'|'en-ch'|'en-ck'|'en-cm'|'en-cn'|'en-cx'|'en-cy'|'en-de'|'en-dg'|'en-dk'|'en-dm'|'en-ee'|'en-eg'|'en-er'|'en-es'|'en-fi'|'en-fj'|'en-fk'|'en-fm'|'en-fr'|'en-gb'|'en-gd'|'en-gg'|'en-gh'|'en-gi'|'en-gm'|'en-gu'|'en-gy'|'en-hk'|'en-ie'|'en-il'|'en-im'|'en-in'|'en-io'|'en-je'|'en-jm'|'en-ke'|'en-ki'|'en-kn'|'en-ky'|'en-lc'|'en-lr'|'en-ls'|'en-lu'|'en-mg'|'en-mh'|'en-mo'|'en-mp'|'en-ms'|'en-mt'|'en-mu'|'en-mv'|'en-mw'|'en-mx'|'en-my'|'en-na'|'en-nf'|'en-ng'|'en-nl'|'en-nr'|'en-nu'|'en-nz'|'en-pg'|'en-ph'|'en-pk'|'en-pn'|'en-pr'|'en-pt'|'en-pw'|'en-rw'|'en-sb'|'en-sc'|'en-sd'|'en-se'|'en-sg'|'en-sh'|'en-si'|'en-sl'|'en-ss'|'en-sx'|'en-sz'|'en-tc'|'en-tk'|'en-tn'|'en-to'|'en-tt'|'en-tv'|'en-tz'|'en-ug'|'en-um'|'en-us'|'en-vc'|'en-vg'|'en-vi'|'en-vu'|'en-ws'|'en-za'|'en-zm'|'en-zw'|'eo'|'eo-001'|'es'|'es-419'|'es-ar'|'es-bo'|'es-br'|'es-bz'|'es-cl'|'es-co'|'es-cr'|'es-cu'|'es-do'|'es-ea'|'es-ec'|'es-es'|'es-gq'|'es-gt'|'es-hn'|'es-ic'|'es-mx'|'es-ni'|'es-pa'|'es-pe'|'es-ph'|'es-pr'|'es-py'|'es-sv'|'es-us'|'es-uy'|'es-ve'|'et'|'et-ee'|'eu'|'eu-es'|'ewo'|'ewo-cm'|'fa'|'fa-af'|'fa-ir'|'ff'|'ff-bf'|'ff-cm'|'ff-gh'|'ff-gm'|'ff-gn'|'ff-gw'|'ff-lr'|'ff-mr'|'ff-ne'|'ff-ng'|'ff-sl'|'ff-sn'|'fi'|'fi-fi'|'fil'|'fil-ph'|'fo'|'fo-dk'|'fo-fo'|'fr'|'fr-be'|'fr-bf'|'fr-bi'|'fr-bj'|'fr-bl'|'fr-ca'|'fr-cd'|'fr-cf'|'fr-cg'|'fr-ch'|'fr-ci'|'fr-cm'|'fr-dj'|'fr-dz'|'fr-fr'|'fr-ga'|'fr-gf'|'fr-gn'|'fr-gp'|'fr-gq'|'fr-ht'|'fr-km'|'fr-lu'|'fr-ma'|'fr-mc'|'fr-mf'|'fr-mg'|'fr-ml'|'fr-mq'|'fr-mr'|'fr-mu'|'fr-nc'|'fr-ne'|'fr-pf'|'fr-pm'|'fr-re'|'fr-rw'|'fr-sc'|'fr-sn'|'fr-sy'|'fr-td'|'fr-tg'|'fr-tn'|'fr-vu'|'fr-wf'|'fr-yt'|'frr'|'frr-de'|'fur'|'fur-it'|'fy'|'fy-nl'|'ga'|'ga-gb'|'ga-ie'|'gd'|'gd-gb'|'gl'|'gl-es'|'gsw'|'gsw-ch'|'gsw-fr'|'gsw-li'|'gu'|'gu-in'|'guz'|'guz-ke'|'gv'|'gv-im'|'ha'|'ha-gh'|'ha-ne'|'ha-ng'|'haw'|'haw-us'|'he'|'he-il'|'hi'|'hi-in'|'hr'|'hr-ba'|'hr-hr'|'hsb'|'hsb-de'|'hu'|'hu-hu'|'hy'|'hy-am'|'ia'|'ia-001'|'id'|'id-id'|'ig'|'ig-ng'|'ii'|'ii-cn'|'is'|'is-is'|'it'|'it-ch'|'it-it'|'it-sm'|'it-va'|'ja'|'ja-jp'|'jgo'|'jgo-cm'|'jmc'|'jmc-tz'|'jv'|'jv-id'|'ka'|'ka-ge'|'kab'|'kab-dz'|'kam'|'kam-ke'|'kde'|'kde-tz'|'kea'|'kea-cv'|'kgp'|'kgp-br'|'kh'|'khq'|'khq-ml'|'ki'|'ki-ke'|'kk'|'kk-kz'|'kkj'|'kkj-cm'|'kl'|'kl-gl'|'kln'|'kln-ke'|'km'|'km-kh'|'kn'|'kn-in'|'ko'|'ko-kp'|'ko-kr'|'kok'|'kok-in'|'ks'|'ks-in'|'ksb'|'ksb-tz'|'ksf'|'ksf-cm'|'ksh'|'ksh-de'|'ku'|'ku-tr'|'kw'|'kw-gb'|'ky'|'ky-kg'|'lag'|'lag-tz'|'lb'|'lb-lu'|'lg'|'lg-ug'|'lkt'|'lkt-us'|'ln'|'ln-ao'|'ln-cd'|'ln-cf'|'ln-cg'|'lo'|'lo-la'|'lrc'|'lrc-iq'|'lrc-ir'|'lt'|'lt-lt'|'lu'|'lu-cd'|'luo'|'luo-ke'|'luy'|'luy-ke'|'lv'|'lv-lv'|'mai'|'mai-in'|'mas'|'mas-ke'|'mas-tz'|'mdf'|'mdf-ru'|'mer'|'mer-ke'|'mfe'|'mfe-mu'|'mg'|'mg-mg'|'mgh'|'mgh-mz'|'mgo'|'mgo-cm'|'mi'|'mi-nz'|'mk'|'mk-mk'|'ml'|'ml-in'|'mn'|'mn-mn'|'mni'|'mni-in'|'mr'|'mr-in'|'ms'|'ms-bn'|'ms-id'|'ms-my'|'ms-sg'|'mt'|'mt-mt'|'mua'|'mua-cm'|'my'|'my-mm'|'mzn'|'mzn-ir'|'naq'|'naq-na'|'nb'|'nb-no'|'nb-sj'|'nd'|'nd-zw'|'nds'|'nds-de'|'nds-nl'|'ne'|'ne-in'|'ne-np'|'nl'|'nl-aw'|'nl-be'|'nl-bq'|'nl-ch'|'nl-cw'|'nl-lu'|'nl-nl'|'nl-sr'|'nl-sx'|'nmg'|'nmg-cm'|'nn'|'nn-no'|'nnh'|'nnh-cm'|'no'|'no-no'|'nus'|'nus-ss'|'nyn'|'nyn-ug'|'oc'|'oc-es'|'oc-fr'|'om'|'om-et'|'om-ke'|'or'|'or-in'|'os'|'os-ge'|'os-ru'|'pa'|'pa-in'|'pa-pk'|'pcm'|'pcm-ng'|'pis'|'pis-sb'|'pl'|'pl-pl'|'prg'|'prg-001'|'ps'|'ps-af'|'ps-pk'|'pt'|'pt-ao'|'pt-br'|'pt-ch'|'pt-cv'|'pt-gq'|'pt-gw'|'pt-lu'|'pt-mo'|'pt-mz'|'pt-pt'|'pt-st'|'pt-tl'|'qu'|'qu-bo'|'qu-ec'|'qu-pe'|'raj'|'raj-in'|'rm'|'rm-ch'|'rn'|'rn-bi'|'ro'|'ro-md'|'ro-ro'|'rof'|'rof-tz'|'ru'|'ru-by'|'ru-kg'|'ru-kz'|'ru-md'|'ru-ru'|'ru-ua'|'rw'|'rw-rw'|'rwk'|'rwk-tz'|'sa'|'sa-in'|'sah'|'sah-ru'|'saq'|'saq-ke'|'sat'|'sat-in'|'sbp'|'sbp-tz'|'sc'|'sc-it'|'sd'|'sd-in'|'sd-pk'|'se'|'se-fi'|'se-no'|'se-se'|'seh'|'seh-mz'|'ses'|'ses-ml'|'sg'|'sg-cf'|'shi'|'shi-ma'|'si'|'si-lk'|'sk'|'sk-sk'|'sl'|'sl-si'|'smn'|'smn-fi'|'sms'|'sms-fi'|'sn'|'sn-zw'|'so'|'so-dj'|'so-et'|'so-ke'|'so-so'|'sq'|'sq-al'|'sq-mk'|'sq-xk'|'sr'|'sr-ba'|'sr-cs'|'sr-me'|'sr-rs'|'sr-xk'|'su'|'su-id'|'sv'|'sv-ax'|'sv-fi'|'sv-se'|'sw'|'sw-cd'|'sw-ke'|'sw-tz'|'sw-ug'|'sy'|'ta'|'ta-in'|'ta-lk'|'ta-my'|'ta-sg'|'te'|'te-in'|'teo'|'teo-ke'|'teo-ug'|'tg'|'tg-tj'|'th'|'th-th'|'ti'|'ti-er'|'ti-et'|'tk'|'tk-tm'|'tl'|'to'|'to-to'|'tok'|'tok-001'|'tr'|'tr-cy'|'tr-tr'|'tt'|'tt-ru'|'twq'|'twq-ne'|'tzm'|'tzm-ma'|'ug'|'ug-cn'|'uk'|'uk-ua'|'ur'|'ur-in'|'ur-pk'|'uz'|'uz-af'|'uz-uz'|'vai'|'vai-lr'|'vi'|'vi-vn'|'vo'|'vo-001'|'vun'|'vun-tz'|'wae'|'wae-ch'|'wo'|'wo-sn'|'xh'|'xh-za'|'xog'|'xog-ug'|'yav'|'yav-cm'|'yi'|'yi-001'|'yo'|'yo-bj'|'yo-ng'|'yrl'|'yrl-br'|'yrl-co'|'yrl-ve'|'yue'|'yue-cn'|'yue-hk'|'zgh'|'zgh-ma'|'zh'|'zh-cn'|'zh-hans'|'zh-hant'|'zh-hk'|'zh-mo'|'zh-sg'|'zh-tw'|'zu'|'zu-za'|\HubspotSDK\Marketing\Emails\EmailUpdateDraftParams\Language $language
     * @param string $name the name of the email, as displayed on the email dashboard
     * @param string|\DateTimeInterface $publishDate The date and time the email is scheduled for, in ISO8601 representation. This is only used in local time or scheduled emails.
     * @param array{
     *   blogEmailType?: string,
     *   blogImageMaxWidth?: int,
     *   blogLayout?: string,
     *   hubspotBlogID?: string,
     *   maxEntries?: int,
     *   rssEntryTemplate?: string,
     *   timing?: array<string,mixed>,
     *   url?: string,
     *   useHeadlineAsSubject?: bool,
     * }|PublicRssEmailDetails $rssData RSS related data if it is a blog or rss email
     * @param bool $sendOnPublish determines whether the email will be sent immediately on publish
     * @param 'AGENT_GENERATED'|'AUTOMATED'|'AUTOMATED_AB'|'AUTOMATED_AB_VARIANT'|'AUTOMATED_DRAFT'|'AUTOMATED_DRAFT_AB'|'AUTOMATED_DRAFT_ABVARIANT'|'AUTOMATED_FOR_FORM'|'AUTOMATED_FOR_FORM_BUFFER'|'AUTOMATED_FOR_FORM_DRAFT'|'AUTOMATED_FOR_FORM_LEGACY'|'AUTOMATED_LOSER_ABVARIANT'|'AUTOMATED_SENDING'|'BLOG_EMAIL_DRAFT'|'BLOG_EMAIL_PUBLISHED'|'DRAFT'|'DRAFT_AB'|'DRAFT_AB_VARIANT'|'ERROR'|'LOSER_AB_VARIANT'|'PAGE_STUB'|'PRE_PROCESSING'|'PROCESSING'|'PUBLISHED'|'PUBLISHED_AB'|'PUBLISHED_AB_VARIANT'|'PUBLISHED_OR_SCHEDULED'|'RSS_TO_EMAIL_DRAFT'|'RSS_TO_EMAIL_PUBLISHED'|'SCHEDULED'|'SCHEDULED_AB'|'SCHEDULED_OR_PUBLISHED'|\HubspotSDK\Marketing\Emails\EmailUpdateDraftParams\State $state the email state
     * @param 'ab_loser_variant'|'ab_loser_variant_site_page'|'ab_master'|'ab_master_site_page'|'ab_variant'|'ab_variant_site_page'|'automated'|'automated_ab_master'|'automated_ab_variant'|'automated_for_crm'|'automated_for_custom_survey'|'automated_for_deal'|'automated_for_feedback_ces'|'automated_for_feedback_custom'|'automated_for_feedback_nps'|'automated_for_form'|'automated_for_form_buffer'|'automated_for_form_draft'|'automated_for_form_legacy'|'automated_for_leadflow'|'automated_for_ticket'|'batch'|'blog_article_instance_layout'|'blog_article_listing'|'blog_author_detail'|'blog_email'|'blog_email_child'|'case_study'|'case_study_instance_layout'|'case_study_listing'|'discardable_stub'|'imported_blog_post'|'kb_404_page'|'kb_article_instance_layout'|'kb_listing'|'kb_search_results'|'kb_support_form'|'landing_page'|'legacy_blog_post'|'legacy_page'|'localtime'|'marketing_single_send_api'|'membership_email_verification'|'membership_follow_up'|'membership_otp_login'|'membership_password_reset'|'membership_password_saved'|'membership_passwordless_auth'|'membership_registration'|'membership_registration_follow_up'|'membership_verification'|'normal_blog_post'|'optin_email'|'optin_followup_email'|'page_instance_layout'|'page_stub'|'performable_landing_page'|'performable_landing_page_cutover'|'podcast_instance_layout'|'podcast_listing'|'portal_content'|'resubscribe_confirmation_email'|'resubscribe_email'|'rss_to_email'|'rss_to_email_child'|'scp_instance_layout_page'|'scp_static_page'|'single_send_api'|'site_page'|'smtp_token'|'staged_page'|'ticket_closed_kickback_email'|'ticket_opened_kickback_email'|'UNKNOWN'|'unsubscribe_confirmation_email'|'web_interactive'|\HubspotSDK\Marketing\Emails\EmailUpdateDraftParams\Subcategory $subcategory the email subcategory
     * @param string $subject the subject of the email
     * @param array{
     *   officeLocationID?: string,
     *   preferencesGroupID?: string,
     *   subscriptionID?: string,
     *   subscriptionName?: string,
     * }|PublicEmailSubscriptionDetails $subscriptionDetails Data structure representing the subscription fields of the email
     * @param array{
     *   abSampleSizeDefault?: 'automated_loser_variant'|'automated_master'|'automated_variant'|'loser_variant'|'mab_master'|'mab_variant'|'master'|'variant'|AbSampleSizeDefault,
     *   abSamplingDefault?: 'automated_loser_variant'|'automated_master'|'automated_variant'|'loser_variant'|'mab_master'|'mab_variant'|'master'|'variant'|AbSamplingDefault,
     *   abStatus?: 'automated_loser_variant'|'automated_master'|'automated_variant'|'loser_variant'|'mab_master'|'mab_variant'|'master'|'variant'|AbStatus,
     *   abSuccessMetric?: 'CLICKS_BY_DELIVERED'|'CLICKS_BY_OPENS'|'OPENS_BY_DELIVERED'|AbSuccessMetric,
     *   abTestPercentage?: int,
     *   hoursToWait?: int,
     *   isAbVariation?: bool,
     *   testID?: string,
     * }|PublicEmailTestingDetails $testing AB testing related data. This property is only returned for AB type emails.
     * @param array{
     *   contactIDs?: array{
     *     exclude?: list<string>, include?: list<string>
     *   }|PublicEmailRecipients,
     *   contactIlsLists?: array{
     *     exclude?: list<string>, include?: list<string>
     *   }|PublicEmailRecipients,
     *   contactLists?: array{
     *     exclude?: list<string>, include?: list<string>
     *   }|PublicEmailRecipients,
     *   limitSendFrequency?: bool,
     *   suppressGraymail?: bool,
     * }|PublicEmailToDetails $to Data structure representing the to fields of the email
     * @param array{
     *   domain?: string,
     *   enabled?: bool,
     *   expiresAt?: string|\DateTimeInterface,
     *   isPageRedirected?: bool,
     *   metaDescription?: string,
     *   pageExpiryEnabled?: bool,
     *   redirectToPageID?: string,
     *   redirectToURL?: string,
     *   slug?: string,
     *   title?: string,
     *   url?: string,
     * }|PublicWebversionDetails $webversion
     *
     * @throws APIException
     */
    public function updateDraft(
        string $emailID,
        ?string $activeDomain = null,
        ?bool $archived = null,
        ?int $businessUnitID = null,
        ?string $campaign = null,
        array|PublicEmailContent|null $content = null,
        ?int $folderIDV2 = null,
        array|PublicEmailFromDetails|null $from = null,
        ?bool $jitterSendTime = null,
        string|\HubspotSDK\Marketing\Emails\EmailUpdateDraftParams\Language|null $language = null,
        ?string $name = null,
        string|\DateTimeInterface|null $publishDate = null,
        array|PublicRssEmailDetails|null $rssData = null,
        ?bool $sendOnPublish = null,
        string|\HubspotSDK\Marketing\Emails\EmailUpdateDraftParams\State|null $state = null,
        string|\HubspotSDK\Marketing\Emails\EmailUpdateDraftParams\Subcategory|null $subcategory = null,
        ?string $subject = null,
        array|PublicEmailSubscriptionDetails|null $subscriptionDetails = null,
        array|PublicEmailTestingDetails|null $testing = null,
        array|PublicEmailToDetails|null $to = null,
        array|PublicWebversionDetails|null $webversion = null,
        ?RequestOptions $requestOptions = null,
    ): PublicEmail {
        $params = Util::removeNulls(
            [
                'activeDomain' => $activeDomain,
                'archived' => $archived,
                'businessUnitID' => $businessUnitID,
                'campaign' => $campaign,
                'content' => $content,
                'folderIDV2' => $folderIDV2,
                'from' => $from,
                'jitterSendTime' => $jitterSendTime,
                'language' => $language,
                'name' => $name,
                'publishDate' => $publishDate,
                'rssData' => $rssData,
                'sendOnPublish' => $sendOnPublish,
                'state' => $state,
                'subcategory' => $subcategory,
                'subject' => $subject,
                'subscriptionDetails' => $subscriptionDetails,
                'testing' => $testing,
                'to' => $to,
                'webversion' => $webversion,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->updateDraft($emailID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
