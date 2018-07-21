<?php

namespace millipixels\evantivreferral\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Cookie;

trait UserReferral {

    public function getReferralLink() {
        return url('/') . '/?ref=' . $this->affiliate_id;
    }

    public static function scopeReferralExists(Builder $query, $referral) {
        return $query->whereAffiliateId($referral)->exists();
    }

    protected static function boot() {
        parent::boot();

        static::creating(function ($model) {
            if ($referredBy = Cookie::get('referral')) {
                $model->referred_by = $referredBy;
            }

            $model->affiliate_id = self::generateReferral();
        });
    }

    protected static function generateReferral() {
        $length = config('referral.referral_length', 5);

        do {
            $referral = str_random($length);
        } while (static::referralExists($referral));

        return $referral;
    }

}
