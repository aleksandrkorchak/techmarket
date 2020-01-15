<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\Brand
 *
 * @property int $id
 * @property string $name
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Device[] $devices
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model[] $models
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Brand newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Brand newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Brand query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Brand whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Brand whereName($value)
 */
	class Brand extends \Eloquent {}
}

namespace App{
/**
 * App\Captcha
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Captcha newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Captcha newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Captcha query()
 */
	class Captcha extends \Eloquent {}
}

namespace App{
/**
 * App\Device
 *
 * @property int $id
 * @property string $name
 * @property string|null $category
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Brand[] $brands
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Seller[] $sellers
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Spare[] $spares
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Device newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Device newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Device query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Device whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Device whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Device whereName($value)
 */
	class Device extends \Eloquent {}
}

namespace App{
/**
 * App\message
 *
 * @property int $id
 * @property int $parent_id
 * @property int $position
 * @property int $real_depth
 * @property string|null $deleted_at
 * @property string $text
 * @property int $offer_id
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Offer $offer
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\message newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\message newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\message query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\message whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\message whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\message whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\message whereOfferId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\message whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\message wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\message whereRealDepth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\message whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\message whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\message whereUserId($value)
 */
	class message extends \Eloquent {}
}

namespace App{
/**
 * App\messageClosure
 *
 * @property int $closure_id
 * @property int $ancestor
 * @property int $descendant
 * @property int $depth
 * @method static \Illuminate\Database\Eloquent\Builder|\App\messageClosure newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\messageClosure newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\messageClosure query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\messageClosure whereAncestor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\messageClosure whereClosureId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\messageClosure whereDepth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\messageClosure whereDescendant($value)
 */
	class messageClosure extends \Eloquent {}
}

namespace App{
/**
 * App\Model
 *
 * @property int $id
 * @property string $name
 * @property int $brand_id
 * @property int $device_id
 * @property-read \App\Brand $brand
 * @property-read \App\Device $device
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Spare[] $spares
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model whereBrandId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model whereDeviceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model whereName($value)
 */
	class Model extends \Eloquent {}
}

namespace App{
/**
 * App\Notification
 *
 * @property int $id
 * @property string $type
 * @property string $notifiable_type
 * @property int $notifiable_id
 * @property string $data
 * @property string|null $read_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Notification newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Notification newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Notification query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Notification whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Notification whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Notification whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Notification whereNotifiableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Notification whereNotifiableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Notification whereReadAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Notification whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Notification whereUpdatedAt($value)
 */
	class Notification extends \Eloquent {}
}

namespace App{
/**
 * App\Occupation
 *
 * @property int $id
 * @property string $name
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Seller[] $sellers
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Occupation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Occupation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Occupation query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Occupation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Occupation whereName($value)
 */
	class Occupation extends \Eloquent {}
}

namespace App{
/**
 * App\Offer
 *
 * @property int $id
 * @property int $seller_id
 * @property int $search_id
 * @property string $photo
 * @property float $price
 * @property int $state_id
 * @property int $quality_id
 * @property string $comment
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Franzose\ClosureTable\Extensions\Collection|\App\message[] $messages
 * @property-read \App\Quality $quality
 * @property-read \App\State $state
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Offer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Offer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Offer query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Offer whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Offer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Offer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Offer wherePhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Offer wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Offer whereQualityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Offer whereSearchId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Offer whereSellerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Offer whereStateId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Offer whereUpdatedAt($value)
 */
	class Offer extends \Eloquent {}
}

namespace App{
/**
 * App\Quality
 *
 * @property int $id
 * @property string $name
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Quality newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Quality newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Quality query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Quality whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Quality whereName($value)
 */
	class Quality extends \Eloquent {}
}

namespace App{
/**
 * App\Role
 *
 * @property int $id
 * @property string $name
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $users
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role whereName($value)
 */
	class Role extends \Eloquent {}
}

namespace App{
/**
 * App\Search
 *
 * @property int $id
 * @property int $user_id
 * @property int $model_id
 * @property int $spare_id
 * @property int $state_id
 * @property int $quality_id
 * @property int $wait_id
 * @property string|null $comment
 * @property int $view_count
 * @property int $offer_count
 * @property string|null $active_at
 * @property string|null $approve_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Model $model
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Offer[] $offers
 * @property-read \App\Spare $spare
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Search newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Search newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Search query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Search whereActiveAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Search whereApproveAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Search whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Search whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Search whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Search whereModelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Search whereOfferCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Search whereQualityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Search whereSpareId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Search whereStateId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Search whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Search whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Search whereViewCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Search whereWaitId($value)
 */
	class Search extends \Eloquent {}
}

namespace App{
/**
 * App\Seller
 *
 * @property int $user_id
 * @property string $organization
 * @property int $occupation_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Device[] $devices
 * @property-read \App\Occupation $occupation
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Seller newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Seller newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Seller query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Seller whereOccupationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Seller whereOrganization($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Seller whereUserId($value)
 */
	class Seller extends \Eloquent {}
}

namespace App{
/**
 * App\Spare
 *
 * @property int $id
 * @property string $name
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Device[] $devices
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model[] $models
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Spare newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Spare newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Spare query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Spare whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Spare whereName($value)
 */
	class Spare extends \Eloquent {}
}

namespace App{
/**
 * App\State
 *
 * @property int $id
 * @property string $name
 * @method static \Illuminate\Database\Eloquent\Builder|\App\State newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\State newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\State query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\State whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\State whereName($value)
 */
	class State extends \Eloquent {}
}

namespace App{
/**
 * App\User
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $surname
 * @property string|null $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $photo
 * @property string $city
 * @property string|null $address
 * @property string $phone
 * @property string $login
 * @property string $password
 * @property int $role_id
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Offer[] $offers
 * @property-read \App\Role $role
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Search[] $searches
 * @property-read \App\Seller $seller
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereLogin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereSurname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

namespace App{
/**
 * App\View
 *
 * @property int $id
 * @property int $user_id
 * @property int $search_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\View newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\View newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\View query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\View whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\View whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\View whereSearchId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\View whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\View whereUserId($value)
 */
	class View extends \Eloquent {}
}

namespace App{
/**
 * App\Wait
 *
 * @property int $id
 * @property string $name
 * @property string $interval
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Wait newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Wait newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Wait query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Wait whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Wait whereInterval($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Wait whereName($value)
 */
	class Wait extends \Eloquent {}
}

