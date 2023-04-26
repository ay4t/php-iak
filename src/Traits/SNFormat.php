<?php

namespace Ay4t\IAK\Traits;

/**
 * Below is the SN Format for each product.
 * Pulsa, data, and international recharge
 * Format: SerialNumber
 * Example: 123456789
 * 
 * PLN
 * Format: SerialNumber/CustomerName/SegmentPower
 * Example: 0123-4567-8901-2345-6789/PT INDOBEST ARTHA KREASI/R1 /000001300/66.2
 * 
 * Games
 * Format: SerialNumber
 * Example: ABCD-EFGH-IJKL-MNOP
 * 
 * Voucher
 * Format: SerialNumber / ExpiredDate
 * Example: BA4B52862X7P / 2018-12-07
 * 
 * E-Toll
 * Format: CustomerName SerialNumber
 * DIANA 621597343042654
 */
trait SNFormat
{
    
}
