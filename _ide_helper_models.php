<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models\Admin\API{
/**
 * @property int $id
 * @property int $user_id
 * @property int $lead_form_id
 * @property string $facebook_lead_id
 * @property string|null $facebook_ad_id
 * @property int $is_seen
 * @property string|null $full_name
 * @property string|null $email
 * @property string|null $phone
 * @property array<array-key, mixed>|null $questions
 * @property \Illuminate\Support\Carbon|null $facebook_created_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Admin\LeadForm $leadForm
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Lead newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Lead newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Lead query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Lead whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Lead whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Lead whereFacebookAdId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Lead whereFacebookCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Lead whereFacebookLeadId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Lead whereFullName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Lead whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Lead whereIsSeen($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Lead whereLeadFormId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Lead wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Lead whereQuestions($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Lead whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Lead whereUserId($value)
 */
	class Lead extends \Eloquent {}
}

namespace App\Models\Admin{
/**
 * @property int $id
 * @property string $facebook_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FacebookToken newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FacebookToken newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FacebookToken query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FacebookToken whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FacebookToken whereFacebookToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FacebookToken whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FacebookToken whereUpdatedAt($value)
 */
	class FacebookToken extends \Eloquent {}
}

namespace App\Models\Admin{
/**
 * @property int $id
 * @property int $user_id
 * @property string $form_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Admin\API\Lead> $leads
 * @property-read int|null $leads_count
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LeadForm newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LeadForm newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LeadForm query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LeadForm whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LeadForm whereFormId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LeadForm whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LeadForm whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LeadForm whereUserId($value)
 */
	class LeadForm extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $role_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Role query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Role whereRoleName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Role whereUpdatedAt($value)
 */
	class Role extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $user_id
 * @property int $role_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RoleUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RoleUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RoleUser query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RoleUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RoleUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RoleUser whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RoleUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RoleUser whereUserId($value)
 */
	class RoleUser extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string|null $profile_pic
 * @property string|null $facebook_page
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $stripe_id
 * @property string|null $pm_type
 * @property string|null $pm_last_four
 * @property string|null $trial_ends_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Admin\LeadForm> $facebookForms
 * @property-read int|null $facebook_forms_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Admin\API\Lead> $leads
 * @property-read int|null $leads_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Role> $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Cashier\Subscription> $subscriptions
 * @property-read int|null $subscriptions_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User hasExpiredGenericTrial()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User onGenericTrial()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereFacebookPage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePmLastFour($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePmType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereProfilePic($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereStripeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereTrialEndsAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserAd newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserAd newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserAd query()
 */
	class UserAd extends \Eloquent {}
}

