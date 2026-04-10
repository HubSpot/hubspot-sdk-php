<?php

declare(strict_types=1);

namespace HubSpotSDK\Settings\Currencies\ExchangeRates\ExchangeRateUpdateVisibilityParams;

/**
 * This represents the three-letter currency code (such as USD for US Dollar) of the currency you want to convert from.
 */
enum FromCurrencyCode: string
{
    case AED = 'AED';

    case AFN = 'AFN';

    case ALL = 'ALL';

    case AMD = 'AMD';

    case ANG = 'ANG';

    case AOA = 'AOA';

    case ARS = 'ARS';

    case AUD = 'AUD';

    case AWG = 'AWG';

    case AZN = 'AZN';

    case BAM = 'BAM';

    case BBD = 'BBD';

    case BDT = 'BDT';

    case BGN = 'BGN';

    case BHD = 'BHD';

    case BIF = 'BIF';

    case BMD = 'BMD';

    case BND = 'BND';

    case BOB = 'BOB';

    case BOV = 'BOV';

    case BRL = 'BRL';

    case BSD = 'BSD';

    case BTN = 'BTN';

    case BWP = 'BWP';

    case BYN = 'BYN';

    case BZD = 'BZD';

    case CAD = 'CAD';

    case CDF = 'CDF';

    case CHE = 'CHE';

    case CHF = 'CHF';

    case CHW = 'CHW';

    case CLF = 'CLF';

    case CLP = 'CLP';

    case CNY = 'CNY';

    case COP = 'COP';

    case COU = 'COU';

    case CRC = 'CRC';

    case CUC = 'CUC';

    case CUP = 'CUP';

    case CVE = 'CVE';

    case CZK = 'CZK';

    case DJF = 'DJF';

    case DKK = 'DKK';

    case DOP = 'DOP';

    case DZD = 'DZD';

    case EGP = 'EGP';

    case ERN = 'ERN';

    case ETB = 'ETB';

    case EUR = 'EUR';

    case FJD = 'FJD';

    case FKP = 'FKP';

    case GBP = 'GBP';

    case GEL = 'GEL';

    case GHS = 'GHS';

    case GIP = 'GIP';

    case GMD = 'GMD';

    case GNF = 'GNF';

    case GTQ = 'GTQ';

    case GYD = 'GYD';

    case HKD = 'HKD';

    case HNL = 'HNL';

    case HRK = 'HRK';

    case HTG = 'HTG';

    case HUF = 'HUF';

    case IDR = 'IDR';

    case ILS = 'ILS';

    case INR = 'INR';

    case IQD = 'IQD';

    case IRR = 'IRR';

    case ISK = 'ISK';

    case JMD = 'JMD';

    case JOD = 'JOD';

    case JPY = 'JPY';

    case KES = 'KES';

    case KGS = 'KGS';

    case KHR = 'KHR';

    case KMF = 'KMF';

    case KPW = 'KPW';

    case KRW = 'KRW';

    case KWD = 'KWD';

    case KYD = 'KYD';

    case KZT = 'KZT';

    case LAK = 'LAK';

    case LBP = 'LBP';

    case LKR = 'LKR';

    case LRD = 'LRD';

    case LSL = 'LSL';

    case LYD = 'LYD';

    case MAD = 'MAD';

    case MDL = 'MDL';

    case MGA = 'MGA';

    case MKD = 'MKD';

    case MMK = 'MMK';

    case MNT = 'MNT';

    case MOP = 'MOP';

    case MRU = 'MRU';

    case MUR = 'MUR';

    case MVR = 'MVR';

    case MWK = 'MWK';

    case MXN = 'MXN';

    case MXV = 'MXV';

    case MYR = 'MYR';

    case MZN = 'MZN';

    case NAD = 'NAD';

    case NGN = 'NGN';

    case NIO = 'NIO';

    case NOK = 'NOK';

    case NPR = 'NPR';

    case NZD = 'NZD';

    case OMR = 'OMR';

    case PAB = 'PAB';

    case PEN = 'PEN';

    case PGK = 'PGK';

    case PHP = 'PHP';

    case PKR = 'PKR';

    case PLN = 'PLN';

    case PYG = 'PYG';

    case QAR = 'QAR';

    case RON = 'RON';

    case RSD = 'RSD';

    case RUB = 'RUB';

    case RWF = 'RWF';

    case SAR = 'SAR';

    case SBD = 'SBD';

    case SCR = 'SCR';

    case SDG = 'SDG';

    case SEK = 'SEK';

    case SGD = 'SGD';

    case SHP = 'SHP';

    case SLL = 'SLL';

    case SOS = 'SOS';

    case SRD = 'SRD';

    case SSP = 'SSP';

    case STN = 'STN';

    case SVC = 'SVC';

    case SYP = 'SYP';

    case SZL = 'SZL';

    case THB = 'THB';

    case TJS = 'TJS';

    case TMT = 'TMT';

    case TND = 'TND';

    case TOP = 'TOP';

    case TRY = 'TRY';

    case TTD = 'TTD';

    case TWD = 'TWD';

    case TZS = 'TZS';

    case UAH = 'UAH';

    case UGX = 'UGX';

    case USD = 'USD';

    case USN = 'USN';

    case UYI = 'UYI';

    case UYU = 'UYU';

    case UZS = 'UZS';

    case VEF = 'VEF';

    case VND = 'VND';

    case VUV = 'VUV';

    case WST = 'WST';

    case XAF = 'XAF';

    case XAG = 'XAG';

    case XAU = 'XAU';

    case XBA = 'XBA';

    case XBB = 'XBB';

    case XBC = 'XBC';

    case XBD = 'XBD';

    case XCD = 'XCD';

    case XDR = 'XDR';

    case XOF = 'XOF';

    case XPD = 'XPD';

    case XPF = 'XPF';

    case XPT = 'XPT';

    case XSU = 'XSU';

    case XUA = 'XUA';

    case YER = 'YER';

    case ZAR = 'ZAR';

    case ZMW = 'ZMW';

    case ZWL = 'ZWL';
}
